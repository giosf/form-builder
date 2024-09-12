const quill = new Quill('#editor', {
    theme: 'snow'
  });

  const delta = quill.clipboard.convert({html: document.querySelector('#hiddenArea').value});
  quill.setContents(delta, 'silent');
  quill.on('editor-change', (eventName, ...args) => {
    if (eventName === 'text-change')
    {
      document.querySelector('#hiddenArea').value = quill.getSemanticHTML();
    }
    else if (eventName === 'selection-change')
    {
      // document.querySelector('#hiddenArea').value = quill.getSemanticHTML();
    }
});