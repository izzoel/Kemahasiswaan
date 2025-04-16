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
                data: 'nama',
                name: 'nama'
            },
            {
                data: 'beasiswa',
                name: 'beasiswa',
            },
            {
                data: 'status',
                name: 'status',
            },
            {
                data: 'aksi',
                name: 'aksi',
                className: 'text-center'
            }
        ],
        dom: '<"row mb-2"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>><"row mb-2"<"col-sm-12">><"row mb-2"<"col-sm-12"t>><"row mb-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6 d-flex flex-row-reverse"p>>',
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
            targets: -1
        }]
    });

    $(document).on('click', '.U_B_beasiswa', function() {
        let id = $(this).data("id").split('-').pop();

        $(".modalUpdate").attr("id", "M_U_beasiswa-" + id);
        $("#M_U_beasiswa-" + id).modal('show');

        $.get("/{{ request()->segment(1) }}/{{ request()->segment(2) }}/{{ request()->segment(3) }}/show/" + id, function(data) {
            $("#U_nama").val(data.mahasiswa.nama);
            $("#U_beasiswa").val(data.beasiswa);
            if (data.beasiswa === 'akademik') {
                $("#U_prestasi").parent().hide();
            } else {
                $("#U_prestasi").val(data.prestasi.prestasi);
            }
            $("#U_status").val(data.status);
        });
    });

    $(document).on("click", ".D_B_beasiswa", function() {
        let nim = $(this).data("id");

        $(".modalDelete").attr("id", "M_D_beasiswa-" + nim);
        $("#M_D_beasiswa-" + nim).modal('show');
        $("#D_route").attr('action', "/{{ request()->segment(1) }}/{{ request()->segment(2) }}/{{ request()->segment(3) }}/destroy/" + nim);
    });

    $(document).ready(function() {
        $(document).on("submit", ".modalUpdate form", function(e) {
            e.preventDefault();

            let modal = $(this).closest(".modal");
            let id = modal.attr("id").replace("M_U_beasiswa-", "");
            let btn = $(this).find("button[type='submit']");
            let originalText = btn.html();
            let formData = new FormData(this);

            btn.html("<i class='bx bx-loader-circle bx-spin'></i>").prop("disabled", true);

            $.ajax({
                url: $(this).attr("action") + "/" + id,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status === "success") {
                        showToast("success", response.message);

                        modal.modal("hide");

                        let formEl = modal.find("form").get(0);
                        if (formEl) formEl.reset();

                        $('#table_' + '{{ request()->segment(3) }}').DataTable().ajax.reload(null, false);
                    } else {
                        console.log(response);
                        showToast("error", "Gagal menyimpan data.");
                    }
                },
                error: function(xhr) {
                    let message = xhr.responseJSON?.message || "Terjadi kesalahan!";
                    showToast("error", message);
                },
                complete: function() {
                    btn.html(originalText).prop("disabled", false);
                }
            });
        });

    });
</script>
