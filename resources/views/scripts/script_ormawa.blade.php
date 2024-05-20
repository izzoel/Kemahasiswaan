<script>
    $(document).ready(function() {
        // Initialize the DataTable
        $('#ormawa').DataTable({
            // // Customize DataTables layout
            dom: '<"row"<"col-md-6"B><"col-md-6"f>>rt<"row"<"col-md-6"l><"col-md-6"p>>',
            buttons: [
                // Custom button definition
                {
                    text: '+',
                    className: 'btn btn-sm btn-primary',
                    action: function(e, dt, node, config) {
                        // Your custom button action here
                        $('#tambahOrmawa').modal('toggle');
                    }
                }
            ]
        });

        $('#tambahOrmawa').on('keyup', 'input[name="nama"]', function() {
            $('input[name="username"]').val($(this).val().toLowerCase());
        });

        $('#strukturOrmawa').DataTable({
            // // Customize DataTables layout
            dom: '<"row"<"col-md-6"B><"col-md-6"f>>rt<"row"<"col-md-6"l><"col-md-6"p>>',
            buttons: [
                // Custom button definition
                {
                    text: '+',
                    className: 'btn btn-sm btn-primary',
                    action: function(e, dt, node, config) {
                        // Your custom button action here
                        $('#tambahStrukturOrmawa').modal('toggle');
                    }
                }
            ]
        });

    });
</script>
