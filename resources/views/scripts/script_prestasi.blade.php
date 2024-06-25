<script>
    $(document).ready(function() {
        // Initialize Select2
        $('#nama').select2({
            // dropdownCssClass: 'big-drop', // Apply custom class to the dropdownropdownCssClass: 'custom-scrollbar'
            // width: 'resolve', // Ensure the dropdown width is correctly set
            placeholder: "-- Pilih --",
            allowClear: true
        }).val(null).trigger('change');

        $('#tingkat').select2({
            placeholder: "-- Pilih --",
            allowClear: true,
            minimumResultsForSearch: Infinity,
        }).val(null).trigger('change');

        // AJAX request to fetch data from the server
        $.ajax({
            url: "{{ route('select-mahasiswa') }}",
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // Clear any existing options
                $('#nama').empty();

                // Iterate through the data and add options
                $.each(data, function(index, mahasiswa) {
                    $('#nama').append(
                        '<option value="' + mahasiswa.nim + '">' + mahasiswa.nama +
                        ' (' + mahasiswa.nim + ')' + '</option>'
                    );
                });

                // Trigger change to update Select2
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
