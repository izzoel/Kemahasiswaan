<script>
    let table = $('#table_' + '{{ request()->segment(3) }}').DataTable({
        serverSide: true,
        processing: true,
        ajax: {
            url: "{{ url('/' . request()->segment(1) . '/' . request()->segment(2) . '/' . request()->segment(3) . '/table') }}",
            data: function(d) {
                d.periode = $('#filter_periode').val(); // Kirim periode yang dipilih
            }
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
                data: 'logo',
                name: 'logo',
                className: 'text-center',
                orderable: false,
                searchable: false
            },
            {
                data: 'anggaran',
                name: 'anggaran',
                className: 'text-center'
            },
            {
                data: 'periode',
                name: 'periode',
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

    $('#filter_periode').on('change', function() {
        table.ajax.reload();
    });

    document.addEventListener("DOMContentLoaded", function() {
        new AirDatepicker('#periode', {
            view: 'years',
            minView: 'years',
            dateFormat: 'yyyy',
            autoClose: true,
            container: '#M_S_organisasi',
        });
    });

    $('input[name="anggaran"]').on('keyup', function() {
        $(this).val(function(index, value) {
            return formatRupiah($(this).val(), 'Rp ');
        });
    });
    $(document).on('click', '.U_B_organisasi', function() {
        let id = $(this).data("id").split('-').pop();

        $(".modalUpdate").attr("id", "M_U_organisasi-" + id);
        $("#M_U_organisasi-" + id).modal('show');
        $("#U_route").attr('action', "/{{ request()->segment(1) }}/{{ request()->segment(2) }}/{{ request()->segment(3) }}/update/" + id);

        $.get("/{{ request()->segment(1) }}/{{ request()->segment(2) }}/organisasi/show/" + id, function(data) {

            $("#U_nama").val(data.nama);
            $("#U_anggaran").val(formatRupiah(String(data.anggaran), 'Rp '));
            $("#U_periode").val(data.periode);
            $("#U_keterangan").val(data.keterangan);
            $("#U_username").val(data.name);
            $("#U_password").val(data.password);

            if (data.logo) {
                $("#preview_logo").attr("src", "/logo/" + data.logo).show();
            } else {
                $("#preview_logo").hide();
            }

            new AirDatepicker('#U_periode', {
                view: 'years',
                minView: 'years',
                dateFormat: 'yyyy',
                autoClose: true,
                container: '#M_U_organisasi-' + data.id,
            });
        });
    });
    $(document).on('click', '.V_B_organisasi', function() {
        let id = $(this).data("id").split('-').pop();

        // Buat ID unik untuk modal dan tabel
        let modalId = "M_V_organisasi-" + id;
        let tableId = "table_view_{{ request()->segment(3) }}" + "-" + id;

        // Duplikasi modal jika belum ada
        if ($("#" + modalId).length === 0) {
            let newModal = $("#M_V_organisasi").clone().attr("id", modalId);
            newModal.find(".tableView").attr("id", tableId);
            newModal.appendTo("body");
        }

        // Tampilkan modal yang sesuai
        $("#" + modalId).modal('show');

        // Hapus DataTable jika sudah ada sebelumnya
        if ($.fn.DataTable.isDataTable("#" + tableId)) {
            $("#" + tableId).DataTable().destroy();
        }

        // Inisialisasi DataTable baru
        $("#" + tableId).DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                url: "{{ url('/' . request()->segment(1) . '/' . request()->segment(2) . '/struktur/table') }}" + '/' + id
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: 'text-center',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'nim',
                    name: 'nim',
                    className: 'text-center'
                },
                {
                    data: 'nama',
                    name: 'mahasiswa.nama',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'prodi',
                    name: 'mahasiswa.prodi',
                    className: 'text-center',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'jabatan',
                    name: 'jabatan',
                    className: 'text-center'
                },
                {
                    data: 'profil',
                    name: 'profil',
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
    });
    $(document).on('click', '.P_B_organisasi', function() {
        let id = $(this).data("id").split('-').pop();
        let modalId = "M_P_organisasi-" + id;
        let tableId = "table_program_{{ request()->segment(3) }}" + "-" + id;

        if ($("#" + modalId).length === 0) {
            let newModal = $("#M_P_organisasi").clone().attr("id", modalId);
            newModal.find(".tableView").attr("id", tableId);
            newModal.appendTo("body");
        }

        $("#" + modalId).modal('show');

        if ($.fn.DataTable.isDataTable("#" + tableId)) {
            $("#" + tableId).DataTable().destroy();
        }

        let columns = [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                className: 'text-center',
                orderable: false,
                searchable: false
            },
            {
                data: 'program',
                name: 'program',
                className: 'text-center'
            },
            {
                data: 'pelaksanaan',
                name: 'pelaksanaan',
                orderable: false,
                searchable: false
            },
            {
                data: 'anggaran',
                name: 'anggaran',
                className: 'text-center'
            },
            {
                data: 'keterangan',
                name: 'keterangan'
            }
        ];

        let isOrganisasi = {{ Auth::guard('organisasi')->check() ? 'true' : 'false' }}; // Cek apakah user adalah organisasi

        if (isOrganisasi) {
            columns.push({
                data: 'aksi',
                name: 'aksi',
                className: 'text-center',
                orderable: false,
                searchable: false
            });
        }

        $("#" + tableId).DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                url: "{{ url('/' . request()->segment(1) . '/' . request()->segment(2) . '/program/table') }}" + '/' + id
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
            ]
        });
    });
    $(document).on("click", ".D_B_organisasi", function() {
        let id = $(this).data("id");

        $(".modalDelete").attr("id", "M_D_organisasi-" + id);
        $("#M_D_organisasi-" + id).modal('show');
        $("#D_route").attr('action', "/{{ request()->segment(1) }}/{{ request()->segment(2) }}/{{ request()->segment(3) }}/destroy/" + id);
    });
    $(document).ready(function() {
        $.get("/{{ request()->segment(1) }}/{{ request()->segment(2) }}/{{ request()->segment(3) }}/periode", function(data) {
            $("#filter_periode").empty().append('<option selected value="">Semua Periode</option>');
            data.forEach(function(item) {
                $("#filter_periode").append(`<option value="${item.periode}">${item.periode}</option>`);
            });
        });

        $("#M_S_organisasi form").on("submit", function(e) {
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
                        $("#M_S_organisasi").modal("hide").find("form")[0].reset();
                        $("#table_organisasi").DataTable().ajax.reload(null, false);
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

        $("#M_U_organisasi form").on("submit", function(e) {
            e.preventDefault();

            let btn = $(this).find("button[type='submit']");
            let id = $(".modalUpdate").attr("id").replace("M_U_organisasi-", "");
            let originalText = btn.html();
            let formData = new FormData(this);

            formData.append("_method", "PUT");

            btn.html("<i class='bx bx-loader-circle bx-spin'></i>").prop("disabled", true);

            $.ajax({
                url: $("#M_F_organisasi").attr("action") + "/" + id,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status === "success") {

                        showToast("success", response.message);
                        $("#M_U_organisasi-" + id).modal("hide");
                        $("#table_organisasi").DataTable().ajax.reload(null, false);
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
