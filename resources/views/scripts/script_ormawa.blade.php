<script>
    $(document).ready(function() {
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

        $('#periodeTable').DataTable({
            // // Customize DataTables layout
            dom: '<"row"<"col-md-6"B><"col-md-6"f>>rt<"row"<"col-md-6"l><"col-md-6"p>>',
            buttons: [
                // Custom button definition
                {
                    text: '+',
                    className: 'btn btn-sm btn-primary',
                    action: function(e, dt, node, config) {
                        // Your custom button action here
                        $('#tambahPeriode').modal('toggle');
                    }
                }
            ]
        });

        $('#proker').DataTable({
            dom: '<"row"<"col-md-6"B><"col-md-6"f>>rt<"row"<"col-md-6"l><"col-md-6"p>>',
            buttons: [{
                text: '+',
                className: 'btn btn-sm btn-primary',
                action: function(e, dt, node, config) {
                    $('#tambahProker').modal('toggle');
                }
            }]
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

        $.ajax({
            url: "{{ route('show-periode') }}",
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $.each(response, function(index, data) {
                    console.log(data.periode);
                    $('#id_periode').append(
                        '<option value="' + data.id +
                        '">' + data.periode +
                        '</option>');

                    var existingOption = $('id_periode option[value="' + data.id + '"]');
                    if (existingOption.length === 0) {
                        $('id_periode').append('<option value="' + data.id + '">' + data
                            .periode +
                            '</option>');
                    }
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

        $('#tambahOrmawa').on('keyup', 'input[name="nama"]', function() {
            $('input[name="username"]').val($(this).val().toLowerCase());
        });

        $('input[name="anggaran"]').on('keyup', function() {
            $(this).val(function(index, value) {
                return formatRupiah($(this).val(), 'Rp ');
            });
        });

        $('input[name="anggaranEdit"]').on('keyup', function() {
            $(this).val(function(index, value) {
                return formatRupiah($(this).val(), 'Rp ');
            });
        });

        $('#periodePilih').change(function() {
            if ($(this).val() === 'setting') {
                $('#settingPeriode').modal('show');
                $(this).val($(this).find('option:first').val());
            }
        });

        $('#prestasi').DataTable();

    });
</script>
