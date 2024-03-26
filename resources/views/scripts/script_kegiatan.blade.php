<script>
    $(document).ready(function() {
        $('#kegiatan').DataTable({
            dom: '<"row"<"col-md-6"B><"col-md-6"f>>rt<"row"<"col-md-6"l><"col-md-6"p>>',
            buttons: [{
                text: '+',
                className: 'btn btn-sm btn-primary',
                action: function(e, dt, node, config) {
                    $('#tambahKegiatan').modal('toggle');
                }
            }]
        });
    });

    moment.locale('id');
    $('input[name="tanggal"]').daterangepicker({
        timePicker: true,
        startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(32, 'hour'),
        locale: {
            format: 'DD MMMM, hh:mm A'
        }
    });
    $('input[name="tanggalEdit"]').daterangepicker({
        timePicker: true,
        startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(32, 'hour'),
        locale: {
            format: 'DD MMMM, hh:mm A'
        }
    });
</script>
