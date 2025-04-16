<script>
    let columns = [{
        data: 'DT_RowIndex',
        name: 'DT_RowIndex',
        className: 'text-center',
        orderable: false,
        searchable: false
    }];

    let isOrganisasi = {{ Auth::guard('organisasi')->check() ? 'true' : 'false' }};

    if (!isOrganisasi) {
        columns.push({
            data: 'organisasi',
            name: 'organisasi.nama',
            className: 'text-center',
            orderable: true,
            searchable: true
        });
    }

    columns.push({
        data: 'kegiatan',
        name: 'kegiatan.kegiatan'
    }, {
        data: 'pelaksanaan',
        name: 'pelaksanaan'
    }, {
        data: 'dana',
        name: 'dana',
        className: 'text-center'
    }, {
        data: 'status',
        name: 'status',
        className: 'text-center'
    }, {
        data: 'aksi',
        name: 'aksi',
        className: 'text-center'
    });

    $('#table_' + '{{ request()->segment(3) }}').DataTable({
        serverSide: true,
        processing: true,
        ajax: {
            url: "{{ url('/' . request()->segment(1) . '/' . request()->segment(2) . '/' . request()->segment(3) . '/table') }}"
        },
        columns: columns,
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
            responsivePriority: 2,
            targets: 5
        }, {
            responsivePriority: 1,
            targets: -1
        }]
    });

    $('input[name="dana"]').on('keyup', function() {
        $(this).val(function(index, value) {
            return formatRupiah($(this).val(), 'Rp ');
        });
    });

    $("#M_S_dana").on('show.bs.modal', function() {
        let idOrganisasi = @json(auth('organisasi')->check() ? auth('organisasi')->user()->id : null);

        if (idOrganisasi) {
            $.get("/{{ request()->segment(1) }}/{{ request()->segment(2) }}/kegiatan/select/" + idOrganisasi, function(data) {
                $("#kegiatan").empty().append('<option selected disabled value="">-- Pilih --</option>');
                data.forEach(function(item) {
                    $("#kegiatan").append(`<option value="${item.id}">${item.kegiatan}</option>`);
                });
            });
        }
    });

    $(document).on('click', '.U_B_dana', function() {
        let id = $(this).data("id").split('-').pop();

        let modalId = "M_U_dana-" + id;
        $(".modalUpdate").attr("id", modalId);
        $("#" + modalId).modal('show');
        $("#U_route").attr('action', "/{{ request()->segment(1) }}/{{ request()->segment(2) }}/{{ request()->segment(3) }}/update/" + id);

        $.get("/{{ request()->segment(1) }}/{{ request()->segment(2) }}/{{ request()->segment(3) }}/show/" + id, function(data) {
            $.get("/{{ request()->segment(1) }}/{{ request()->segment(2) }}/kegiatan/select/" + data.id_organisasi, function(dataKegiatan) {
                let select = $("#U_kegiatan");
                select.empty().append('<option selected disabled value="">-- Pilih --</option>');

                dataKegiatan.forEach(function(item) {
                    let selected = item.id == data.id_kegiatan ? "selected" : "";
                    select.append(`<option value="${item.id}" ${selected}>${item.kegiatan}</option>`);
                });
            });
            $("#U_dana").val(formatRupiah(String(data.dana), 'Rp '));

            // Kosongkan input file, karena tidak bisa set value
            $("#U_berkas").val('');

            // Tampilkan link file berkas
            if (data.berkas) {
                $("#U_berkas_link").html(
                    `Lihat Berkas Proposal : <a href="/dana/berkas/${data.nama_organisasi}/${data.berkas}" target="_blank" class="text-primary">${data.berkas}</a>`
                );
            } else {
                $("#U_berkas_link").html('');
            }
        });
    });

    $(document).on("click", ".D_B_dana", function() {
        let id = $(this).data("id");

        $(".modalDelete").attr("id", "M_D_dana-" + id);
        $("#M_D_dana-" + id).modal('show');
        $("#D_route").attr('action', "/{{ request()->segment(1) }}/{{ request()->segment(2) }}/{{ request()->segment(3) }}/destroy/" + id);
    });

    $(document).ready(function() {
        $("#M_S_dana form").on("submit", function(e) {
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
                        $("#M_S_dana").modal("hide").find("form")[0].reset();
                        $('#table_' + '{{ request()->segment(3) }}').DataTable().ajax.reload(null, false);
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

        $("#M_U_dana form").on("submit", function(e) {
            e.preventDefault();

            let btn = $(this).find("button[type='submit']");
            let id = $(".modalUpdate").attr("id").replace("M_U_dana-", "");
            let originalText = btn.html();
            let formData = new FormData(this);

            formData.append("_method", "PUT");

            btn.html("<i class='bx bx-loader-circle bx-spin'></i>").prop("disabled", true);

            $.ajax({
                url: $("#M_F_dana").attr("action") + "/" + id,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status === "success") {

                        showToast("success", response.message);
                        $("#M_U_dana-" + id).modal("hide");
                        $("#table_dana").DataTable().ajax.reload(null, false);
                    } else {
                        showToast("error", "Gagal memperbarui data.");
                    }
                },
                error: function(xhr) {
                    let message = xhr.responseJSON?.message || "Terjadi kesalahan!";
                    showToast("error", message);
                    console.log($("#M_F_dana").attr("action") + "/" + $(".modalUpdate").attr("id").replace("M_U_dana-", ""));


                },
                complete: function() {
                    btn.html(originalText).prop("disabled", false);
                }
            });
        });
    });
</script>
