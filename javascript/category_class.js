/**
 * @author sauger
 */
function category_item_class(id,name,parent_id,priority){
	this.name = name;
	this.id = id;
	this.parent_id = parent_id;
	this.description = '';
	this.priority = priority;
	var init = function(id,name,parent_id,priority){
		this.name = name;
		this.id = id;
		this.parent_id = parent_id;
		this.priority = priority;
	}
	//init(id,name,parent_id,priority,short_title_length);
	
}

function category_class(){
	var items = new Array();
	this.class_name;
	this.push = function(item){
		items.push(item);
	}
	this.get_sub_category = function(parent){
		parent = parent || 0;
		var ret = new Array();
		var icount = items.length;
		for(i=0;i<icount ; i++){
			if (items[i].parent_id == parent){
				ret.push(items[i]);
			}
		}
		return ret;
	}
	
	this.get_brother_category=function(id){
		var ret = new Array();
		item = this.get_item(id);
		parent = item.parent_id;
		var icount = this.items.length;
		for(i=0;i<icount ; i++){
			if (items[i].parent_id == parent){
				ret.push(items[i]);
			}
		}
		return ret;
	}
	
	this.get_item = function(id){
		
		var icount = items.length;
		
		for(i=0;i<icount ; i++){
			
			if (items[i].id == id){
				return items[i];
			}
		}
	}
	
	this.display_select=function(name,ob,id,object,callback){
		this.class_name = name;
		if(id == 0 || id == '') {
			id = -1;
		}
		var othis = this;
		if(object){
			var t_parent_id = $(object).attr('parent_id');			
		}

		$(ob).find('select').remove();

		if(id==-1 || id == 0 || id== ""){						
			if(object){				
				this.display_select(name,ob,t_parent_id,'',callback);
			}else{
				this.echo_category(ob,name,0,-1);
				$(ob).find('select:first').change(function(){
					othis.display_select(name,$(ob),$(this).attr('value'),'',callback);	
					if(callback){
						var tid = $(this).val();
						if(tid != -1){
							var item = othis.get_item(tid);
							var max_len = item.short_title_length;
						}else{
							var max_len = -1;
						}							
						callback(tid,max_len);
					}
									
				});		
				$(ob).find('select').not($(ob).find('select:first')).change(function(){
					othis.display_select(name,$(ob),$(this).attr('value'),this,callback);
					if(callback){
						var tid = $(this).val();
						if(tid != -1){
							var item = othis.get_item(tid);
							var max_len = item.short_title_length;
						}else{
							var max_len = -1;
						}							
						callback(tid,max_len);
					}
				});	
			}
			return;
		}else{
			
			var tparent = new Array();			
			tparent.push(id);
			
			var tmp_id = id;
			while(true){
				
				var item = othis.get_item(tmp_id);
				if(item == undefined){
					tparent.push(0);
					break;	
				}
				tparent.push(item.parent_id);
				if(item.parent_id == 0) break;
				tmp_id = item.parent_id;
			}
			var item1 = tparent.pop();
			var item2 = item1;
			while(true){
				item2 = tparent.pop();
				if (item2 == undefined) break;
				this.echo_category(ob,name,item1,item2);
				item1 = item2;
			}
		}
		
		this.echo_category(ob,name,item1,-1);
		$(ob).find('select:first').change(function(){
			othis.display_select(name,$(ob),$(this).attr('value'),'',callback);
			if(callback){
						var tid = $(this).val();
						if(tid != -1){
							var item = othis.get_item(tid);
							var max_len = item.short_title_length;
						}	else{
							var max_len = -1;
						}						
						callback(tid,max_len);
					}
		});		
		$(ob).find('select').not($(ob).find('select:first')).change(function(){
			othis.display_select(name,$(ob),$(this).attr('value'),this,callback);
			if(callback){
						var tid = $(this).val();
						if(tid != -1 || id == 0 || id== ""){
							var item = othis.get_item(tid);
							var max_len = item.short_title_length;
						}else{
							var max_len = -1;
						}							
						callback(tid,max_len);
					}
		});	
	}
	
	this.echo_category=function(ob,name,parent_id,id){
		var str = '<select class="' + name + '" id="' + name +'_' + parent_id + '" parent_id=' + parent_id +'>';
		str += '<option value="-1">请选择分类</option>';
		var items = this.get_sub_category(parent_id);
		if (items.length <= 0) {
			return;
		}
		for(i=0;i<items.length; i++){
			str += '<option value=' + items[i].id;
			if(items[i].id == id ){
				str += ' selected="selected"';
			}
			str +=   '>' + items[i].name + '</option>';
		}
		str += '</select>';
			$(ob).append(str);

	}
	
	
}

