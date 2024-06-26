<script>
    $('#mahasiswa').DataTable({
        dom: '<"row"<"col-md-6"B><"col-md-6"f>>rt<"row"<"col-md-6"l><"col-md-6"p>>',
        buttons: [{
            text: '+',
            className: 'btn btn-sm btn-primary',
            action: function(e, dt, node, config) {
                $('#tambahMahasiswa').modal('toggle');
            }
        }]
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
            $('#prodi').append('<option value="' + prodi + '" ' + selected + '>' +
                prodi +
                '</option>');
        });
    });
</script>
