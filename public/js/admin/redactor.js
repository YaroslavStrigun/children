CKEDITOR.config.extraPlugins = 'justify,colorbutton,font';
CKEDITOR.config.protectedSource.push( /\n/g );
$('textarea:not(.without-rich-editor)').ckeditor();