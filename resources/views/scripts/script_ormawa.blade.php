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
            // // Customize DataTables layout
            dom: '<"row"<"col-md-6"B><"col-md-6"f>>rt<"row"<"col-md-6"l><"col-md-6"p>>',
            buttons: [
                // Custom button definition
                {
                    text: '+',
                    className: 'btn btn-sm btn-primary',
                    action: function(e, dt, node, config) {
                        // Your custom button action here
                        $('#tambahProker').modal('toggle');
                    }
                }
            ]
        });
        $('#mahasiswa').DataTable({
            // // Customize DataTables layout
            dom: '<"row"<"col-md-6"B><"col-md-6"f>>rt<"row"<"col-md-6"l><"col-md-6"p>>',
            buttons: [
                // Custom button definition
                {
                    text: '+',
                    className: 'btn btn-sm btn-primary',
                    action: function(e, dt, node, config) {
                        // Your custom button action here
                        $('#tambahMahasiswa').modal('toggle');
                    }
                }
            ]
        });
        $('#input_mahasiswa, #import_mahasiswa').on('change', function() {
            $('#form_import').toggle('fast');
            $('#form_submit').toggle('fast');
        });


        $('#fakultas').change(function() {
            var fakultas = $(this).val();
            var prodis = [];
            if (fakultas == 'Farmasi') {
                prodis = ['D3 Farmasi', 'S1 Farmasi'];
            } else if (fakultas == 'Ilmu Kesehatan Dan Sains Teknologi') {
                prodis = ['D3 TLM', 'S1 ARS', 'S1 Gizi'];
            } else {
                prodis = ['S1 Hukum', 'S1 Manajemen', 'S1 PGSD'];
            }
            $('#prodi').empty();
            $('#prodi').append(
                '<option value="" disabled>--Pilih--</option>'
            );
            $.each(prodis, function(index, prodi) {
                var selected = (prodi == '{{ old('prodi') }}') ? 'selected' : '';
                $('#prodi').append('<option value="' + prodi + '" ' + selected + '>' + prodi +
                    '</option>');
            });
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

    });
</script>
