<script>
    $.ajax({
        url: "{{ route('show-kategori') }}",
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $.each(response, function(index, data) {
                $('#kategori').append('<option value="' + data.id +
                    '">' + data.nama + '</option>');
                var existingOption = $('#kategoriEdit option[value="' + data.id + '"]');
                if (existingOption.length === 0) {
                    $('#kategoriEdit').append('<option value="' + data.id + '">' + data.nama +
                        '</option>');
                }
            });
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });

    $('#submitKategori').click(function() {

        var selectedValue = $('#kategori').val();
        if ($('#kategori option[value="' + selectedValue + '"]').length > 0) {
            alert('Kategori sudah ada');
            return;
        }

        $.ajax({
            type: 'POST',
            url: "{{ route('store-kategori') }}",
            data: $('#kategoriForm').serialize(),
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
