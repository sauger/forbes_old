<<<<<<< HEAD
=======
<<<<<<< HEAD:ckeditor/config.js
>>>>>>> 29b09e782dc345a5d95930bc6c08e62ace7529ca
﻿/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
<<<<<<< HEAD
		config.skin='kama';
		config.toolbarLocation = 'bottom';



	 	config.toolbar = 'title';


=======
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
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
=======
﻿/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.language = 'zh-cn';
	config.toolbarLocation = 'bottom';	
	 	config.toolbar = 'title';

>>>>>>> 29b09e782dc345a5d95930bc6c08e62ace7529ca
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
<<<<<<< HEAD
=======
>>>>>>> 31117988e98f765162011e0404e68d9e6c40115a:ckeditor/config.js
>>>>>>> 29b09e782dc345a5d95930bc6c08e62ace7529ca
