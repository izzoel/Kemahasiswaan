<script>
    $('#table_' + '{{ request()->segment(3) }}').DataTable({
        serverSide: true,
        processing: true,
        ajax: {
            url: "{{ url('/' . request()->segment(1) . '/' . request()->segment(2) . '/' . request()->segment(3) . '/table') }}"
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                className: 'text-center',
                orderable: false,
                searchable: false
            },
            {
                data: 'kategori',
                name: 'kategori',
                className: 'text-center'
            },
            {
                data: 'aksi',
                name: 'aksi',
                className: 'text-center',
                orderable: false,
                searchable: false
            }
        ],
        order: [
            [1, 'asc']
        ],
        dom: '<"row mb-2"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
            '<"row mb-2"<"col-sm-12">>' +
            '<"row mb-2"<"col-sm-12"t>>' +
            '<"row mb-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6 d-flex flex-row-reverse"p>>',
        language: {
            "lengthMenu": "Tampilkan _MENU_ baris",
            "info": "Menampilkan _START_ ke _END_ dari _TOTAL_ baris",
            "search": "Cari:",
            "emptyTable": "Tidak ada data yang tersedia",
            "zeroRecords": "Tidak ada data yang ditemukan"
        },
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "Semua"]
        ],
        columnDefs: [{
                responsivePriority: 1,
                targets: 1
            },
            {
                responsivePriority: 2,
                targets: -1
            }
        ],
    });

    $("#formKategori").submit(function(e) {
        e.preventDefault();

        let btn = $(this).find("button[type='submit']");
        let originalText = btn.html();

        btn.html("<i class='bx bx-loader-circle bx-spin'></i>").prop("disabled", true);

        $.post("{{ url('/' . request()->segment(1) . '/' . request()->segment(2) . '/' . request()->segment(3) . '/store') }}", {
            S_kategori: $("#S_kategori").val(),
            _token: "{{ csrf_token() }}"
        }).done(function(response) {
            $("#formKategori")[0].reset();
            $("#U_kategori, #kategori").append(
                `<option value="${response.id}" selected>${response.kategori}</option>`
            );
            showToast('success', response.message);
            $('#table_' + '{{ request()->segment(3) }}').DataTable().ajax.reload(null, false);
        }).fail(function(xhr) {
            let message = xhr.responseJSON?.message || "Terjadi kesalahan!";
            showToast('error', message);
        }).always(function() {
            btn.html(originalText).prop("disabled", false);
        });
    });

    $(document).on('click', '.U_B_kategori', function() {
        let id = $(this).data("id").split('-').pop();

        $(".modalUpdate").attr("id", "M_U_kategori-" + id);
        $("#M_U_kategori-" + id).modal('show');
        $("#U_route").attr('action', "/{{ request()->segment(1) }}/{{ request()->segment(2) }}/{{ request()->segment(3) }}/update/" + id);

        $.get("/{{ request()->segment(1) }}/{{ request()->segment(2) }}/{{ request()->segment(3) }}/show/" + id, function(data) {
            $("#U_kategori").val(data[0].kategori);
        });

    });

    $(document).on("click", ".D_B_kategori", function() {
        let id = $(this).data("id");

        $(".modalDelete").attr("id", "M_D_kategori-" + id);
        $("#M_D_kategori-" + id).modal('show');
        $("#D_route").attr('action', "/{{ request()->segment(1) }}/{{ request()->segment(2) }}/{{ request()->segment(3) }}/destroy/" + id);
    });
</script>
