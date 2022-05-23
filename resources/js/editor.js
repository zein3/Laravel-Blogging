import Editor from '@toast-ui/editor';
import '@toast-ui/editor/dist/toastui-editor.css';

const editor = new Editor({
    el: document.querySelector('#editor'),
    previewStyle: 'vertical',
    height: `${window.screen.height}px`,
    initialEditType: 'wysiwyg',
    usageStatistics: false
});

editor.getMarkdown();


document.querySelector('#post_submit').addEventListener('click', () => {
    document.querySelector('#editor_result').value = editor.getHTML();
    document.querySelector('#post_form').submit();
});
