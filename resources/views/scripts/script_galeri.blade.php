<script>
    $(document).ready(function() {
        // Initialize the DataTable
        $('#galeri').DataTable({
            // // Customize DataTables layout
            dom: '<"row"<"col-md-6"B><"col-md-6"f>>rt<"row"<"col-md-6"l><"col-md-6"p>>',
            buttons: [
                // Custom button definition
                {
                    text: '+',
                    className: 'btn btn-sm btn-primary',
                    action: function(e, dt, node, config) {
                        // Your custom button action here
                        $('#tambahGaleri').modal('toggle');
                    }
                }
            ]
        });
    });

    $.ajax({
        url: "{{ route('show-edit-artikel') }}",
        method: 'GET',
        success: function(data) {
            data.forEach(function(galeri) {
                $('#summernoteEdit' + galeri.id).summernote({
                    placeholder: 'Tulis sesuatu yang menginspirasimu!',
                    tabsize: 2,
                    height: 400,
                    callbacks: {
                        onInit: function() {
                            var $noteEditable = $('#summernoteEdit' + galeri.id).next(
                                '.note-editor').find('.note-editable');
                            var plainContent = $noteEditable.text();
                            var excerpt = plainContent.substring(0, 300);
                            $('#excerptEdit' + galeri.id).val(excerpt);
                        },
                        onKeyup: function(e) {
                            var $noteEditable = $('#summernoteEdit' + galeri.id).next(
                                    '.note-editor')
                                .find('.note-editable');
                            var plainContent = $noteEditable.text();
                            var excerpt = plainContent.substring(0, 300);
                            $('#excerptEdit' + galeri.id).val(excerpt);
                        }
                    }
                });
            });
        }
    });
</script>
