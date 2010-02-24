
(function($) {  
    var self = null;

    $.fn.autoComplete = function(o) {  
    	o = jQuery.extend({
			valueSep:';',
		    minchars:1,
		    meth:"get",
		    varname:"input",
		    className:"autocomplete",
		    timeout:3000,
		    delay:500,
		    offsety:-5,
		    shownoresults: true,
		    noresults: "No results were found.",
		    maxheight: 250,
		    cache: true,
		    maxentries: 25,
		    onAjaxError:null,
		    setWidth: false,
		    minWidth: 100,
		    maxWidth: 200,
		    useNotifier: true
		}, o);  
        return this.each(function() {
            new $.autoComplete(this, o);
        });
    };

    $.autoComplete = function (e, o) {
        this.field = $(e);
        this.options = jQuery.extend(o,this.options);
        this.KEY_UP 	= 38;
        this.KEY_DOWN 	= 40;
        this.KEY_ESC 	= 27;
        this.KEY_RETURN = 13;
        this.KEY_TAB 	= 9;
        
        this.init();
    };

    $.autoComplete.prototype = {
        init : function() {
            var self = this;
             
		    this.sInp 	= ""; 	// input value 
		    this.nInpC 	= 0;	// input value length
		    this.aSug 	= []; 	// suggestions array 
		    this.iHigh 	= 0;	// level of list selection 
		    
		    if(this.options.useNotifier) this.field.addClass('ac_field');
		    
		    this.field.keypress(function(e){
				if(!e) e = window.event;
				var key = e.keyCode || e.which;
				
				 
				switch(key)
				{
					case self.KEY_RETURN: 
						self.setHighlightedValue();
						e.stopPropagation();
						break;
					case self.KEY_TAB: 
						self.setHighlightedValue();
						break;
					case self.KEY_ESC: 
						self.clearSuggestions();
						break;
				}
				return true;
			});
			this.field.keyup(function(e){
				
				if(!e) e = window.event;
				var key = e.keyCode || e.which;
				
				if(key == self.KEY_UP || key == self.KEY_DOWN ) // KEY UP OR KEY DOWN
				{	
					if($('#'+this.acID))
						self.changeHighlight(key);	
				}
				else{ 
					self.getSuggestions(self.field.val());
				};
			
				return true;

			});
			this.field.blur(function(){ self.resetTimeout(); return true;});
			this.field.attr('Autocomplete','off');
        },
        getSuggestions : function(val){
        	var self = this;
        	
        	if(val==this.sInp) return false;
        	
        	if($('#'+this.acID)) $('#'+this.acID).remove();
        	
        	this.sInp = val;
        	
        	if(val.length < this.options.minchars)
        	{
        		this.aSug = [];
        		this.nInpC = val.length;
        		return false;	
        	}
        	var ol = this.nInpC; 
        	this.nInpC = val.length ? val.length : 0;
        	var l = this.aSug.length;
        	if(this.options.cache && (this.nInpC > ol) && l && (l < this.options.maxentries))
        	{
        		var arr = new Array();
        		var oldval = '';
        		$(this.aSug).each(function(i){
        				if(oldval == this.value) return true;
        				oldval = this.value;
        				if(this.value.toLowerCase().indexOf(val.toLowerCase()) != -1)
        					arr.push(this);
        			});	
        		this.aSug = arr;
        		this.createList(this.aSug);
        	}
        	else 
        	{
        		clearTimeout(this.ajID);
        		this.ajID = setTimeout( function(){self.doAjaxRequest(self.sInp)},this.options.delay);
        	}
        	document.helper = this;
        	return false;
        },
        getLastInput : function(str){
        	var ret = str;
        	if(undefined != this.options.valueSep) {
        		var idx = ret.lastIndexOf(this.options.valueSep);
        		ret = idx == -1 ? ret : ret.substring(idx + 1, ret.length);	
        	}
        	return ret;
        },
        doAjaxRequest: function(input) {
        	if($.trim(input) == '') return false;
        	
        	var self = this;
        	
        	if(this.options.useNotifier) this.field.removeClass('ac_field').addClass('ac_field_busy');
			
			if( input != this.field.val())
				return false;
			this.sInp = this.getLastInput(this.sInp);
			
			if(typeof this.options.script == 'undefined') 
				throw('You have to specify a server script to make ajax calls!');
			else if(typeof this.options.script == 'function')
				var url = this.options.script(encodeURIComponent(this.sInp));
			else
				var url = this.options.script+this.options.varname+'='+encodeURIComponent(this.sInp);
			
			if(!url) return false;
			
			var options = {
				url: url,
				type: self.options.meth,
				success: function(req)
				{
					try{
					
						if(self.options.useNotifier)
						{
							self.field.removeClass('ac_field_busy').addClass('ac_field');

						}
						
						self.setSuggestions(req,input);
					}
					catch(e){
						//console.log(e);
						}
				},
				error:	(typeof self.options.onAjaxError == 'function') ? function(status) {
					if (self.options.useNotifier)
					{
						self.field.removeClass('ac_field_busy').addClass('ac_field');	
					}
					self.options.onAjaxError(status);
				} : function(status) {
						if(self.options.useNotifier)
						{
							self.field.removeClass('ac_field_busy').addClass('ac_field');	
							
						}
						alert('AJAX error: '+status);
				}
			}
			$.ajax(options);
        },
        setSuggestions: function(req,input)
        {
        	if(input != this.field.val())
        		return false;
        	if(this.options.json){
    
   	    		var jsondata = eval('('+req+')');
        		this.aSug = jsondata.results;	
        	} else {
        		var results = req.getElementsByTagName('results')[0].childNodes;
        		this.aSug = [];
        		for(var i=0;i<results.length;i++)
				{
				  if(results[i].hasChildNodes())
				    this.aSug.push(  { 'id':results[i].getAttribute('id'), 'value':results[i].childNodes[0].nodeValue, 'info':results[i].getAttribute('info') }  );
				}
        		
        	}
        	this.acID = 'ac_'+this.field.attr('id');
        	this.createList(this.aSug);
        },
        createList: function(arr)
        {
        	var self = this;
        	if($('#'+this.acID)) $('#'+this.acID).remove();
			
			this.killTimeout();
			
			if(arr.length == 0 && !this.options.shownoresults) return false;
			
			var div = $('<div></div>').addClass(this.options.className).attr('id',this.acID);	
			var hcorner = $('<div></div>').addClass('ac_corner');
			var hbar = $('<div></div>').addClass('ac_bar');
			var header = $('<div></div>').addClass('ac_header');
			header.append(hcorner).append(hbar);
			div.append(header);
			
			var ul = $('<ul></ul>').attr('id','ac_ul');
			
			if(arr.length == 0 && this.options.shownoresults)
			{
				var li = $('<li></li>').addClass('ac_warning').html(this.options.noresults);
				ul.append(li);
			}
			else
			{
				
				for(var i= 0;i<arr.length;i++){
					
					var val = arr[i].value;
					var st = val.toLowerCase().indexOf(this.sInp.toLowerCase());
					var output = val.substring(0,st) + '<em>' + val.substring(st,st+this.sInp.length) + '</em>' + val.substring(st+this.sInp.length);
					
					var span = $('<span></span>').html(output);
					
					if(this.info != '')
					{
						var br = $('<br/>');
						span.append(br);
						var small = $('<small></small>').html(arr[i].info);
						span.append(small);	
					}
					var a = $('<a></a>').attr('href','#');
					// USE THE FOLLOWING IF YOU WANT TO PUT TITLES TO ELEMENTS (YOU COULD USE THE SAME AS WE DID WITH INFO ABOVE)
					var tl = $('<span></span>').addClass('tl').html('&nbsp;');
					var tr = $('<span></span>').addClass('tr').html('&nbsp;');
					
					a.append(tl);
					a.append(tr);
					a.append(span).attr('rel',i);
					
					a.click(function(e){self.setHighlightedValue(); return false;});
					a.mouseover(function(e){self.setHighlight($(this).attr('rel'));});
					
					var li = $('<li></li>').html(a);
					ul.append(li);
				};	
			}
			div.append(ul);
			var fcorner = $('<div></div>').addClass('ac_corner');
			var fbar = $('<div></div>').addClass('ac_bar');
			var footer = $('<div></div>').addClass('ac_footer');
			footer.append(fcorner).append(fbar);
			div.append(footer);
			
			var pos = this.field.offset();

			var w = 
		    (
		      this.options.setWidth && this.field.width() < this.options.minWidth
		    )
		    ? this.options.minWidth : 
		    (
		      this.options.setWidth && this.field.width() > this.options.maxWidth
		    )
		    ? this.options.maxWidth : 
		    this.field.width();
		    
		    /*div.left(pos.left).top(pos.top + this.field.height()).width(w).mouseover(function(){self.killTimeout();}).mouseout(function(){self.resetTimeout();});*/
		    // bug fixed by Konstantin
		    div.css('left',pos.left).css('top',pos.top + this.field.height() + this.options.offsety).width(w).mouseover(function(){self.killTimeout();}).mouseout(function(){self.resetTimeout();});

		    
		    $(document.body).append(div);
		    this.setHighlight(0);
		    this.toID = setTimeout(function(){self.clearSuggestions();},this.options.timeout);
        },
        changeHighlight: function(key){
        	var list = $('#ac_ul');
        	
        	if(!list) return false;
        	
        	var n = (key == this.KEY_TAB || key == this.KEY_DOWN)? this.iHigh + 1 : this.iHigh - 1; 
			
			n = (n >= list.children().length)? list.children().length -1 : ((n < 0)? 0 : n);
			
			this.setHighlight(n);
        },
        setHighlight: function(n){
        	
        	var list = $('#ac_ul');
        	
        	if(!list) return false;
        	
        	
        	this.iHigh = Number(n);
        	
        	list.children().removeClass('ac_highlight').eq(this.iHigh).addClass('ac_highlight');
        	
        	this.killTimeout();
        },
        clearHighlight: function(){
        	var list = $('#ac_ul');
        	
        	if(!list) return false;
        	list.children().removeClass('ac_highlight');
        	this.iHigh = 0;	
        },
        setHighlightedValue: function(){
        	
        	if(this.iHigh>=0)
        	{
        		if(!this.aSug[this.iHigh]) return;
        		if(null != this.options.valueSep)
        		{
        			var str = this.getLastInput(this.field.val());
        			var idx = this.field.val().lastIndexOf(str);
        			str	= this.aSug[this.iHigh].value+this.options.valueSep;
        			this.sInp = idx == -1? str: this.field.val().substring(0, idx) + str;
        			this.field.val(this.sInp);
        		}
        		else
        		{
        			var str = this.getLastInput(this.field.val());
        			var idx = this.field.val().lastIndexOf(str);
        			str = this.aSug[this.iHigh].value;
        			this.sInp =  idx == -1? str: this.field.val().substring(0,idx) + str;
        			this.field.val(this.sInp);
        		}
        		this.field.focus();
        		if(this.field.selectionStart)
        		{
        			this.field.setSelectionRange(this.sInp.length, this.sInp.length);
        		}
        		this.clearSuggestions();
        		if(typeof this.options.callback == 'function')
        			this.options.callback(this.aSug[this.iHigh]);
        	}
        },
        killTimeout: function(){
        	clearTimeout(this.toID);
        },
        resetTimeout: function(){
        	this.killTimeout();
        	var self = this;
        	this.toID = setTimeout(function(){ self.clearSuggestions()}, self.options.timeout);
        },
        clearSuggestions: function(){
        	this.killTimeout();
        	if($('#'+this.acID))
        	{
        		$('#'+this.acID).fadeOut('fast',function(){$(this).remove();});	
        	}
        }

}})(jQuery);
