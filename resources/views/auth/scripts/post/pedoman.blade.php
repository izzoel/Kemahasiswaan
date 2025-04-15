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
                data: 'judul',
                name: 'judul'
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

    $(document).on('click', '.U_B_pedoman', function() {
        let id = $(this).data("id").split('-').pop();

        $(".modalUpdate").attr("id", "M_U_pedoman-" + id);
        $("#M_U_pedoman-" + id).modal('show');
        $("#U_route").attr('action', "/{{ request()->segment(1) }}/{{ request()->segment(2) }}/{{ request()->segment(3) }}/update/" + id);

        $.get("/{{ request()->segment(1) }}/{{ request()->segment(2) }}/{{ request()->segment(3) }}/show/" + id, function(data) {
            $("#U_judul").val(data.judul);

            // Tampilkan link file pedoman jika ada
            if (data.pedoman) {
                $("#U_pedoman_link").html(
                    `Lihat Pedoman : <a href="/pedoman/${data.pedoman}" target="_blank" class="text-primary">${data.pedoman}</a>`
                );
            } else {
                $("#U_pedoman_link").html('');
            }

            if (data.cover) {
                let profilPath = "/pedoman/cover/" + data.cover;
                $("#preview_cover").attr("src", profilPath).show();
            } else {
                $("#preview_cover").hide();
            }
        });
    });

    $(document).on("click", ".D_B_pedoman", function() {
        let id = $(this).data("id");

        $(".modalDelete").attr("id", "M_D_pedoman-" + id);
        $("#M_D_pedoman-" + id).modal('show');
        $("#D_route").attr('action', "/{{ request()->segment(1) }}/{{ request()->segment(2) }}/{{ request()->segment(3) }}/destroy/" + id);
    });

    $(document).ready(function() {
        $("#M_S_pedoman form").on("submit", function(e) {
            e.preventDefault();

            let btn = $(this).find("button[type='submit']");
            let originalText = btn.html();
            let formData = new FormData(this); // Ambil data form, termasuk file

            btn.html("<i class='bx bx-loader-circle bx-spin'></i>").prop("disabled", true);

            $.ajax({
                url: $(this).attr("action"),
                type: "POST",
                data: formData,
                contentType: false, // Wajib agar bisa upload file
                processData: false, // Wajib agar FormData dikirim apa adanya
                success: function(response) {
                    if (response.status === "success") {
                        showToast("success", response.message);
                        $("#M_S_pedoman").modal("hide").find("form")[0].reset();
                        $('#table_' + '{{ request()->segment(3) }}').DataTable().ajax.reload();
                    } else {
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

        $("#M_U_pedoman form").on("submit", function(e) {
            e.preventDefault();

            let btn = $(this).find("button[type='submit']");
            let id = $(".modalUpdate").attr("id").replace("M_U_pedoman-", "");
            let originalText = btn.html();
            let formData = new FormData(this);

            formData.append("_method", "PUT");

            btn.html("<i class='bx bx-loader-circle bx-spin'></i>").prop("disabled", true);

            $.ajax({
                url: $("#M_F_pedoman").attr("action") + "/" + id,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status === "success") {
                        showToast("success", response.message);
                        $("#M_U_pedoman-" + id).modal("hide");
                        $("#table_pedoman").DataTable().ajax.reload(null, false);
                    } else {
                        showToast("error", "Gagal memperbarui data.");
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
