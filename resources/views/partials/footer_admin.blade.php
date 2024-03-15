<!-- jQuery -->
<script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('vendors/fastclick/lib/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{ asset('vendors/nprogress/nprogress.js') }}"></script>
<!-- bootstrap-wysiwyg -->
<script src="{{ asset('vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') }}"></script>
<script src="{{ asset('vendors/jquery.hotkeys/jquery.hotkeys.js') }}"></script>
<script src="{{ asset('vendors/google-code-prettify/src/prettify.js') }}"></script>

<!-- Custom Theme Scripts -->
<script src="{{ asset('js/custom.min.js') }}"></script>

<!-- Datatables -->
<script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
<script src="{{ asset('vendors/jszip/dist/jszip.min.js') }}"></script>
<script src="{{ asset('vendors/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('vendors/pdfmake/build/vfs_fonts.js') }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // Initialize the DataTable
        $('#postingan').DataTable({
            // // Customize DataTables layout
            dom: '<"row"<"col-md-6"B><"col-md-6"f>>rt<"row"<"col-md-6"l><"col-md-6"p>>',
            buttons: [
                // Custom button definition
                {
                    text: '+',
                    className: 'btn btn-sm btn-primary',
                    action: function(e, dt, node, config) {
                        // Your custom button action here
                        $('#tambahPost').modal('toggle');
                    }
                }
            ]
        });
    });
</script>

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
    $('#summernoteEdit').summernote({
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
