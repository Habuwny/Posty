CKEDITOR.replace('txt-area-body', {
    toolbar: [
        {name: 'basicstyles', items: ['Bold', 'Italic','underLine', 'Strike']},
        {name: 'clipboard', items: ['Undo', 'Redo']},
        {name: 'styles', items: ['Styles', 'Format']},
        {
            name: 'paragraph',
            items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
        },
        {name: 'links', items: ['Link', 'Unlink']},
        {name: 'insert', items: ['EmbedSemantic', 'CodeSnippet', 'Image', 'EmbedSemantic']},
        { name: 'riga1',  	items : ['TextColor','BGColor']}
    ],
   codeSnippet_theme: 'atelier-seaside.dark'

});
CKEDITOR.on('instanceReady', function (e) {
    // First time
    e.editor.document.getBody().setStyle('background-color', '#334155');
    e.editor.document.getBody().setStyle('color', 'white');
    // e.editor.document.getBody().setStyle('text-align', 'center');
    e.editor.document.appendStyleText('a { color: white; }');
    // e.editor.document.querySelector('#cke_83_textInput').addEventListener('change', ()=>{
    //     console.log('ee')
    // })
    // in case the user switches to source and back
    e.editor.on('contentDom', function () {
        e.editor.document.getBody().setStyle('background-color', '#334155');
        e.editor.document.getBody().setStyle('color', 'white');
        // e.editor.document.getBody().setStyle('text-align', 'center');
        e.editor.document.appendStyleText('a { color: white; }');
    });

    document.querySelector('#cke_wordcount_txt-area-body').style.color = '#ddd'
    document.querySelector('.cke_wordcount').style.marginTop = '7px';
    document.querySelector('#cke_wordcount_txt-area-body').style.fontWeight = 'bold';

});
// CKEDITOR.plugins.add( 'image', {
//     onLoad: function( editor ) {
//         CKEDITOR.addCss(
//             '.imagePointer {max-width:100%;}')
//     }
// });
let title_ = document.querySelector("#txt-area-title")
let title_counter = document.querySelector(".textarea-char-length-title")
let excerpt_ = document.querySelector("#txt-area-excerpt")
let excerpt_counter = document.querySelector(".textarea-char-length-excerpt")

title_.addEventListener('keyup', ()=>{
    let titleMax = 60;
    let currTextAreaLength = title_.value.length
    title_counter.innerText= `${titleMax - currTextAreaLength}`;

    if (currTextAreaLength===titleMax){
        title_counter.style.backgroundColor = 'red';
    }else {
        title_counter.style.backgroundColor = 'rgb(30 41 59)';

    }
})
excerpt_.addEventListener('keyup', ()=>{
    let excerptMax = 220;
    let currTextAreaLength = excerpt_.value.length
    excerpt_counter.innerText= `${excerptMax - currTextAreaLength}`;

    if (currTextAreaLength===excerptMax){
        excerpt_counter.style.backgroundColor = 'red';
    }else {
        excerpt_counter.style.backgroundColor = 'rgb(30 41 59)';

    }
})

document.querySelector('#cke_88_textInput').addEventListener('change', (e)=>{
    console.log(e)
})
