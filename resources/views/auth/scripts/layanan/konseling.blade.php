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
                name: 'nama',
                orderable: true,
                searchable: true
            },
            {
                data: 'tanggal',
                name: 'tanggal',
            },
            {
                data: 'hp',
                name: 'hp',
                className: 'text-center',
                orderable: false,
                searchable: false
            },
            {
                data: 'status',
                name: 'status',
                className: 'text-center',
                orderable: true,
                searchable: true
            },
            {
                data: 'aksi',
                name: 'aksi',
                className: 'text-center',
                orderable: false,
                searchable: false
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
                targets: 5
            },
            {
                responsivePriority: 2,
                targets: 2
            },
            {
                responsivePriority: 3,
                targets: -1
            }
        ]
    });

    $(document).on('change', '.status-btn', function() {
        let btn = $(this);
        let id = btn.data('id');
        let status = btn.is(':checked') ? 1 : 0;

        $.get("/{{ request()->segment(1) }}/{{ request()->segment(2) }}/{{ request()->segment(3) }}/status/", {
                id: id,
                status: status
            })
            .done(function(response) {
                $('#table_' + '{{ request()->segment(3) }}').DataTable().ajax.reload(null, false);
            })
            .fail(function() {
                alert("Gagal memperbarui status.");
                btn.prop('checked', !status);
            });
    });

    $(document).on('click', '.U_B_konseling', function() {
        let id = $(this).data("id").split('-').pop();

        $(".modalUpdate").attr("id", "M_U_konseling-" + id);
        $("#M_U_konseling-" + id).modal('show');
        $("#U_route").attr('action', "/{{ request()->segment(1) }}/{{ request()->segment(2) }}/{{ request()->segment(3) }}/update/" + id);

        $.get("/{{ request()->segment(1) }}/{{ request()->segment(2) }}/{{ request()->segment(3) }}/show/" + id, function(data) {
            $("#U_nama").val(data.mahasiswa.nama);
            $("#U_tanggal").val(data.tanggal);
            $("#U_hp").val(data.hp);
        });
    });

    $(document).on("click", ".D_B_konseling", function() {
        let nim = $(this).data("id");

        $(".modalDelete").attr("id", "M_D_konseling-" + nim);
        $("#M_D_konseling-" + nim).modal('show');
        $("#D_route").attr('action', "/{{ request()->segment(1) }}/{{ request()->segment(2) }}/{{ request()->segment(3) }}/destroy/" + nim);
    });

    $(document).ready(function() {

        $("#M_U_konseling form").on("submit", function(e) {
            e.preventDefault();

            let btn = $(this).find("button[type='submit']");
            let id = $(".modalUpdate").attr("id").replace("M_U_mahasiswa-", "");
            let originalText = btn.html();
            let formData = new FormData(this);

            formData.append("_method", "PUT");

            btn.html("<i class='bx bx-loader-circle bx-spin'></i>").prop("disabled", true);

            $.ajax({
                url: $("#M_F_mahasiswa").attr("action") + "/" + id,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status === "success") {

                        showToast("success", response.message);
                        $("#M_U_mahasiswa-" + id).modal("hide");
                        $("#table_mahasiswa").DataTable().ajax.reload(null, false);
                    } else {
                        showToast("error", "Gagal memperbarui data.");
                    }
                },
                error: function(xhr) {
                    let message = xhr.responseJSON?.message || "Terjadi kesalahan!";
                    showToast("error", message);
                    console.log($("#M_F_mahasiswa").attr("action") + "/" + $(".modalUpdate").attr("id").replace("M_U_mahasiswa-", ""));


                },
                complete: function() {
                    btn.html(originalText).prop("disabled", false);
                }
            });
        });
    });
</script>
