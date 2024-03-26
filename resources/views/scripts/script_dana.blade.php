<script>
    $(document).ready(function() {
        $('#dana').DataTable({
            dom: '<"row"<"col-md-6"B><"col-md-6"f>>rt<"row"<"col-md-6"l><"col-md-6"p>>',
            buttons: [{
                text: '+',
                className: 'btn btn-sm btn-primary',
                action: function(e, dt, node, config) {
                    $('#tambahDana').modal('toggle');
                }
            }]
        });
    });
</script>
