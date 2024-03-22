<script type="text/javascript">
    $(document).ready(function() {
        // Initialize the DataTable
        $('#artikel').DataTable({
            // // Customize DataTables layout
            dom: '<"row"<"col-md-6"B><"col-md-6"f>>rt<"row"<"col-md-6"l><"col-md-6"p>>',
            buttons: [
                // Custom button definition
                {
                    text: '+',
                    className: 'btn btn-sm btn-primary',
                    action: function(e, dt, node, config) {
                        // Your custom button action here
                        $('#tambahArtikel').modal('toggle');
                    }
                }
            ]
        });
    });

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

    $.ajax({
        url: "{{ route('show-edit-artikel') }}",
        method: 'GET',
        success: function(data) {
            console.log(data);
            data.forEach(function(artikel) {
                $('#summernote-edit' + artikel.id).summernote({
                    placeholder: 'Tulis sesuatu yang menginspirasimu!',
                    tabsize: 2,
                    height: 400,
                    callbacks: {
                        onInit: function() {
                            var $noteEditable = $('#summernote-edit' + artikel.id).next(
                                '.note-editor').find('.note-editable');
                            var plainContent = $noteEditable.text();
                            var excerpt = plainContent.substring(0, 300);
                            $('#excerptEdit' + artikel.id).val(excerpt);
                        },
                        onKeyup: function(e) {
                            var $noteEditable = $('#summernote-edit' + artikel.id).next(
                                    '.note-editor')
                                .find('.note-editable');
                            var plainContent = $noteEditable.text();
                            var excerpt = plainContent.substring(0, 300);
                            $('#excerptEdit' + artikel.id).val(excerpt);
                        }
                    }
                });
            });
        }
    });
</script>
