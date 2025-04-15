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
                data: 'prestasi',
                name: 'prestasi',
            },
            {
                data: 'tahun',
                name: 'tahun',
            },
            {
                data: 'jenis',
                name: 'jenis',
            },
            {
                data: 'raihan',
                name: 'raihan',
            },
            {
                data: 'tingkat',
                name: 'tingkat',
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

    $(document).on('click', '.U_B_prestasi', function() {
        let id = $(this).data("id").split('-').pop();

        $(".modalUpdate").attr("id", "M_U_prestasi-" + id);
        $("#M_U_prestasi-" + id).modal('show');
        $("#U_route").attr('action', "/{{ request()->segment(1) }}/{{ request()->segment(2) }}/{{ request()->segment(3) }}/update/" + id);

        $.get("/{{ request()->segment(1) }}/{{ request()->segment(2) }}/{{ request()->segment(3) }}/show/" + id, function(data) {
            $("#U_nama").val(data.mahasiswa.nama);
            $("#U_prestasi").val(data.prestasi);
            $("#U_tahun").val(data.tahun);
            $("#U_jenis").val(data.jenis);
            $("#U_raihan").val(data.raihan);
            $("#U_tingkat").val(data.tingkat);

            if (data.sertifikat) {
                $("#U_sertifikat_link").html(
                    `<a href="/prestasi/${data.prestasi}/sertifikat/${data.sertifikat}" target="_blank" class="text-primary">${data.sertifikat}</a>`
                );
            } else {
                $("#U_sertifikat_link").html('');
            }

            if (data.dokumentasi) {
                $("#U_dokumentasi_link").html(
                    `<a href="/prestasi/${data.prestasi}/dokumentasi/${data.dokumentasi}" target="_blank" class="text-primary">${data.dokumentasi}</a>`
                );
            } else {
                $("#U_dokumentasi_link").html('');
            }

            if (data.foto) {
                $("#U_foto_link").html(
                    `<a href="/prestasi/${data.prestasi}/foto/${data.foto}" target="_blank" class="text-primary">${data.foto}</a>`
                );
            } else {
                $("#U_foto_link").html('');
            }
        });
    });

    $(document).on("click", ".D_B_prestasi", function() {
        let nim = $(this).data("id");

        $(".modalDelete").attr("id", "M_D_prestasi-" + nim);
        $("#M_D_prestasi-" + nim).modal('show');
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

        $("#M_U_prestasi form").on("submit", function(e) {
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
