<script>
    $(document).ready(function () {
      // Destroy action question
      $('.table__actions__destroy').submit(function (e) {
        if(!confirm('Точно хотите удалить?')) {
          e.preventDefault()
        }
      });

      // Summernote editor init
      $('.summernote-editor').summernote({
        height: 380,                 // set editor height
        minHeight: 200,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: false                  // set focus to editable area after initializing summernote
      });

    });
</script>