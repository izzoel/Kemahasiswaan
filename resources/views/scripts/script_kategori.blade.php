<script>
    $.ajax({
        url: "{{ route('show-kategori') }}",
        type: 'GET',
        dataType: 'json',
        success: function(response) {

            // Append options from the database to the select element
            $.each(response, function(index, data) {
                $('#kategori').append('<option value="' + data.id +
                    '">' + data.nama + '</option>');
            });
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });

    $('#submitKategori').click(function() {

        var selectedValue = $('#kategori').val();
        if ($('#kategori option[value="' + selectedValue + '"]').length > 0) {
            // If the value already exists, show an alert and return
            alert('Kategori sudah ada');
            return;
        }

        $.ajax({
            type: 'POST',
            url: "{{ route('store-kategori') }}",
            data: $('#kategoriForm').serialize(), // Serialize form data
            success: function(data) {
                $.ajax({
                    url: "{{ route('show-kategori') }}",
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {

                        $('#kategori').empty();
                        $('#kategori').append(
                            '<option value="0" disabled selected> -- Pilih -- </option>'
                        );
                        $.each(response, function(index, data) {
                            $('#kategori').append('<option value="' + data.id +
                                '">' + data.nama + '</option>');
                        });

                    },
                    error: function(xhr, status, error) {
                        alert('kategori sudah ada');
                    }
                });
                $('#tambahKategori').modal('hide');
            },
            error: function(xhr, status, error) {
                alert('kategori sudah ada');
            }
        });
    });
</script>
