/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
<<<<<<< HEAD:ckeditor/config.js
=======
	config.language = 'zh-cn';
	config.skin='kama';
	config.toolbarLocation = 'bottom';	
>>>>>>> d4009668675ad066c0503391cb684da16a76907e:ckeditor/config.js
	 	config.toolbar = 'title';

	    config.toolbar_title =
	    [
	     ['Source','FontSize','TextColor','RemoveFormat','Bold'],
	    ];
	    
	    config.toolbar = 'Admin';
	    config.toolbar_Admin = [
	                                  	['Source','Preview','Undo','Bold','OrderedList','UnorderedList','-','Link','Unlink','-'],	
	                                  	['JustifyLeft','JustifyCenter','JustifyRight','JustifyFull'], 
	                                  	['Image','Flash','Table','Rule','Smiley','SpecialChar','PageBreak'],
	                                  	['Style','FontFormat','FontName','FontSize','TextColor','BGColor','FitWindow','RemoveFormat'],
	                                  ] ;
	    config.resize_enabled = false;
	    config.entities = false;
	    config.ignoreEmptyParagraph = false;
	    config.startupOutlineBlocks = false;

};
