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

    $.ajax({
        url: "{{ route('show-edit-kegiatan') }}",
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            // alert('asd');
            $.each(response, function(index, data) {
                $('#id_kegiatan').append('<option value="' + data.id +
                    '">' + data.nama + '</option>');

                $('#id_kegiatan').on('change', function() {
                    var selectedOption = $(this).find("option:selected");
                    var selectedId = selectedOption.val();

                    // Mencari data tanggal berdasarkan id yang dipilih
                    var selectedData = response.find(function(item) {
                        return item.id == selectedId;
                    });

                    // Menampilkan tanggal terkait dengan opsi yang dipilih
                    if (selectedData) {
                        $('#tanggal_kegiatan').val(selectedData.tanggal);
                        $('#dana_kegiatan').val(selectedData.anggaran);
                    }
                    $('#tanggal').val(selectedData.tanggal);
                });

                $('#id_ormawa').val(data.id_ormawa);


                var existingOption = $('#kegiatanEdit option[value="' + data.id + '"]');
                if (existingOption.length === 0) {
                    $('#kegiatanEdit').append('<option value="' + data.id + '">' + data.nama +
                        '</option>');
                }
            });
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });

    $('input[name="dana"]').on('keyup', function() {
        $(this).val(function(index, value) {
            return formatRupiah($(this).val(), 'Rp ');
        });
    });
    $('input[name="danaEdit"]').on('keyup', function() {
        $(this).val(function(index, value) {
            return formatRupiah($(this).val(), 'Rp ');
        });
    });

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/g);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
    }
</script>
