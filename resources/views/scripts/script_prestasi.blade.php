<script>
    $(document).ready(function() {
        $('#nama').select2({
            placeholder: "-- Pilih --",
            allowClear: true
        }).val(null).trigger('change');

        $('#tingkat').select2({
            placeholder: "-- Pilih --",
            allowClear: true,
            minimumResultsForSearch: Infinity,
        }).val(null).trigger('change');

        $.ajax({
            url: "{{ route('prestasi-mahasiswa') }}",
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#nama').empty();

                $.each(data, function(index, mahasiswa) {
                    $('#nama').append(
                        '<option value="' + mahasiswa.nim + '">' + mahasiswa.nama +
                        ' (' + mahasiswa.nim + ')' + '</option>'
                    );
                });

                $('#nama').trigger('change');
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + status + error);
            }
        });

        $(".datepicker").datepicker({
            format: 'yyyy',
            viewMode: 'years',
            minViewMode: 'years'
        });

    });
</script>
