CKEDITOR.editorConfig = function (config) {
    config.toolbarGroups = [
        {name: 'clipboard', groups: ['clipboard', 'undo']},
        {name: 'links'},
        {name: 'insert', groups: ['CodeSnippet']},
        {name: 'forms'},
        {name: 'tools'},
        {name: 'document', groups: ['mode', 'document', 'doctools']},
        {name: 'others'},
        '/',
        {name: 'basicstyles', groups: ['basicstyles', 'cleanup']},
        {name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi']},
        {name: 'styles'},
        {name: 'colors'},
    ];
    config.skin = 'kama'
    config.placeholder = 'some value';

    // Remove some buttons provided by the standard plugins, which are
    // not needed in the Standard(s) toolbar.
    config.removeButtons = 'Underline,Subscript,Superscript';
    config.extraPlugins = 'codesnippet,colorbutton,panelbutton,wordcount,imageresizerowandcolumn,imageresize';
    config.codeSnippet_theme = 'monokai_sublime'

    // Set the most common block elements.
    config.format_tags = 'p;h1;h2;h3;pre';

    // Simplify the dialog windows.
    config.removeDialogTabs = 'image:advanced;link:advanced';
    config.imageResize= { maxWidth:200, maxHeight:200 }

    config.wordcount = {
        showParagraphs: false,
        showWordCount: false,
        showCharCount: true,
        countSpacesAsChars: true,
        countHTML: false,
        maxWordCount: 4,
        maxCharCount: 4000,
    }
};
