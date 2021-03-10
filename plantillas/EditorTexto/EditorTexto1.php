    <textarea name="editorS" id="editorS" cols="30" rows="30" style="height: 300px;"></textarea>
    <script>
        ClassicEditor
            .create(document.querySelector('#editorS'), {
                // Para cambiar el idioma predeterminado basarse en: https://en.wikipedia.org/wiki/ISO_639-1.
                language: 'es'
            })
            .catch(error => {
                console.error(error);
            });
    </script>