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

    $.ajax({
        url: "{{ route('show-edit-artikel') }}",
        method: 'GET',
        success: function(data) {
            data.forEach(function(artikel) {
                $('#summernoteEdit' + artikel.id).summernote({
                    placeholder: 'Tulis sesuatu yang menginspirasimu!',
                    tabsize: 2,
                    height: 400,
                    callbacks: {
                        onInit: function() {
                            var $noteEditable = $('#summernoteEdit' + artikel.id).next(
                                '.note-editor').find('.note-editable');
                            var plainContent = $noteEditable.text();
                            var excerpt = plainContent.substring(0, 300);
                            $('#excerptEdit' + artikel.id).val(excerpt);
                        },
                        onKeyup: function(e) {
                            var $noteEditable = $('#summernoteEdit' + artikel.id).next(
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

    $('#deleteArtikel').on('click', function(event) {
        event.preventDefault(); // Prevent the default behavior (i.e., the link from being followed)

        var url = $(this).attr('href'); // Get the href of the delete button

        Swal.fire({
            title: 'Hapus artikel ?',
            icon: 'warning',
            html: `<a autofocus></a>`,
            showCancelButton: true,
            reverseButtons: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to the delete route
                window.location.href = url;
            }
        });
    });
</script>
