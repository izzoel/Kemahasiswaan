<script>
    $(document).ready(function() {

        $('#jenisBeasiswaModal').on('show.bs.modal', function() {
            $('#nonkademikModal').on('shown.bs.modal', function() {
                if ($('#jenisBeasiswaModal').hasClass('show')) {
                    $('#jenisBeasiswaModal').removeClass('show');
                    $('#jenisBeasiswaModal').addClass('hide');
                }

                $('#nama_beasiswa_nonakademik').select2({
                    placeholder: "-- Pilih --",
                    dropdownParent: $('#nonkademikModal')
                }).val(null).trigger('change');
            });
            $('#nonkademikModal').on('hidden.bs.modal', function() {
                if ($('#jenisBeasiswaModal').hasClass('hide')) {
                    $('#jenisBeasiswaModal').removeClass('hide');
                    $('#jenisBeasiswaModal').addClass('show');
                }
            });
        });



        $.ajax({
            url: "{{ route('beasiswa-mahasiswa') }}",
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#nama_beasiswa_nonakademik').empty();
                $.each(data, function(index, mahasiswa) {
                    $('#nama_beasiswa_nonakademik').append(
                        '<option value="' + mahasiswa.nim + '">' + mahasiswa.nama +
                        ' (' + mahasiswa.nim + ')' + '</option>'
                    );
                });
                $('#nama_beasiswa_nonakademik').trigger('change');
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + status + error);
            }
        });

        $('#nama_beasiswa_nonakademik').on('change', function() {
            var nim = $(this).val(); // Ambil NIM yang dipilih

            if (nim) {
                $.ajax({
                    url: "{{ route('prestasi-lomba', '') }}" + "/" + nim,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#prestasi').empty();
                        $('#prestasi').append('<option disabled selected>-- Pilih Prestasi --</option>');

                        $.each(data, function(index, prestasi) {
                            $('#prestasi').append(
                                '<option value="' + prestasi.id + '">' + prestasi.lomba + " (" + prestasi.tahun + ") " + prestasi
                                .prestasi + " tingkat " + prestasi.tingkat + '</option>'
                            );
                        });

                        $('#prestasi').show();
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error: ' + status + error);
                    }
                });
            } else {
                // Jika tidak ada mahasiswa yang dipilih, sembunyikan dropdown prestasi
                $('#prestasi').hide();
            }
        });



    });
</script>
