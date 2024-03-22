<script>
    $('#summernote').summernote({
        placeholder: 'Tulis sesuatu yang menginspirasimu!',
        tabsize: 2,
        height: 400,
        callbacks: {
            onKeyup: function(e) {
                var $noteEditable = $('#summernote').next('.note-editor').find('.note-editable');
                var plainContent = $noteEditable.text();
                var excerpt = plainContent.substring(0, 300);
                $('#excerpt').val(excerpt);
            }
        }
    });
</script>
