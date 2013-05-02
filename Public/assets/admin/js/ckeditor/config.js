/**
 * @license Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'zh-cn';
	config.toolbar = [
		[ 'Bold','Italic','Underline', '-', 'Strike' ],
		[ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', '-', 'JustifyBlock' ],
		[ 'Blockquote', '-', 'NumberedList','BulletedList' ],
		[ 'Undo', 'Redo', '-', 'Link','Unlink' ],
		[ 'RemoveFormat', 'PasteText', 'Source', 'Preview', '-', 'Maximize' ]
	];
};
