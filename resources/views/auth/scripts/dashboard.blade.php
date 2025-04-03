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
                data: 'organisasi',
                name: 'organisasi'
            },
            {
                data: 'kegiatan',
                name: 'kegiatan',
            },
            {
                data: 'rentang_tanggal',
                name: 'rentang_tanggal',
            },
            {
                data: 'anggaran',
                name: 'anggaran',
            },
            {
                data: 'berkas',
                name: 'berkas',
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

    $("#M_S_mahasiswa").on('show.bs.modal', function(e) {
        ["#S_nim", "#S_nama", "#S_tempat_lahir", "#S_alamat"].forEach(function(selector) {
            $(selector).on('keyup', function() {
                this.value = this.value.toUpperCase();
            });
        });
    })

    $(document).on('click', '.U_B_mahasiswa', function() {
        let nim = $(this).data("id").split('-').pop();

        $(".modalUpdate").attr("id", "M_U_mahasiswa-" + nim);
        $("#M_U_mahasiswa-" + nim).modal('show');
        $("#U_route").attr('action', "/{{ request()->segment(1) }}/{{ request()->segment(2) }}/{{ request()->segment(3) }}/update/" + nim);

        $.get("/{{ request()->segment(1) }}/{{ request()->segment(2) }}/{{ request()->segment(3) }}/show/" + nim, function(data) {
            if (data.kelamin == "L") {
                var kelamin = "#U_l";
            } else {
                var kelamin = "#U_p";
            }
            $("#U_nim").val(data.nim);
            $("#U_nama").val(data.nama);
            $("#U_tempat_lahir").val(data.tempat_lahir);
            $("#U_tanggal_lahir").val(data.tanggal_lahir);
            $(kelamin).val(data.kelamin).prop('checked', true);
            $("#U_prodi").val(data.prodi).prop('selected', true);
            $("#U_hp").val(data.no_hp);
            $("#U_alamat").val(data.alamat);
        });

        ["#U_nim", "#U_nama", "#U_tempat_lahir", "#U_alamat"].forEach(function(selector) {
            $(selector).on('keyup', function() {
                this.value = this.value.toUpperCase();
            });
        });
    });

    $(document).on("click", ".D_B_mahasiswa", function() {
        let nim = $(this).data("id");

        $(".modalDelete").attr("id", "M_D_mahasiswa-" + nim);
        $("#M_D_mahasiswa-" + nim).modal('show');
        $("#D_route").attr('action', "/{{ request()->segment(1) }}/{{ request()->segment(2) }}/{{ request()->segment(3) }}/destroy/" + nim);
    });

    $(document).ready(function() {
        $(".importForm").on("submit", function(event) {
            event.preventDefault();

            let form = $(this);
            let formData = new FormData(this);

            // Tampilkan loading SweetAlert2
            Swal.fire({
                title: 'Ngupload data...',
                html: 'Bentaran yaa...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            // Kirim form dengan AJAX
            $.ajax({
                url: form.attr("action"),
                type: form.attr("method"),
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Data berhasil diimport!',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        location.reload(); // Reload halaman setelah sukses
                    });
                },
                error: function(xhr) {
                    let errorMessage = "Terjadi kesalahan saat mengirim data.";

                    // Jika server mengembalikan response JSON dengan message error
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: 'Terjadi kesalahan saat mengirim data.',
                        footer: 'Error: ' + xhr.status + ' ' + xhr.statusText
                    });
                }
            });
        });

        $("#M_U_mahasiswa form").on("submit", function(e) {
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
