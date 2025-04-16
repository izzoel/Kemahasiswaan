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
        name: 'kegiatan'
    }, {
        data: 'pelaksanaan',
        name: 'pelaksanaan'
    }, {
        data: 'anggaran',
        name: 'anggaran',
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

    $('input[name="anggaran"]').on('keyup', function() {
        $(this).val(function(index, value) {
            return formatRupiah($(this).val(), 'Rp ');
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        new AirDatepicker('#pelaksanaan', {
            range: true, // Menyalakan fitur range tanggal
            dateFormat: 'dd MMMM yyyy',
            multipleDatesSeparator: " - ", // Pemisah tanggal range
            autoClose: true,
            locale: {
                days: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
                daysShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
                daysMin: ['Mg', 'Sn', 'Sl', 'Rb', 'Km', 'Jm', 'Sb'],
                months: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                today: 'Hari Ini',
                clear: 'Hapus',
                firstDay: 1
            },
            container: '#M_S_kegiatan',
        });
    });

    $(document).on('click', '.U_B_kegiatan', function() {
        let id = $(this).data("id").split('-').pop();

        let modalId = "M_U_kegiatan-" + id;
        $(".modalUpdate").attr("id", modalId);
        $("#" + modalId).modal('show');
        $("#U_route").attr('action', "/{{ request()->segment(1) }}/{{ request()->segment(2) }}/{{ request()->segment(3) }}/update/" + id);

        $.get("/{{ request()->segment(1) }}/{{ request()->segment(2) }}/{{ request()->segment(3) }}/show/" + id, function(data) {
            $("#U_kegiatan").val(data.kegiatan);
            $("#U_pelaksanaan").val(data.pelaksanaan);
            $("#U_anggaran").val(formatRupiah(String(data.anggaran), 'Rp '));

            // Kosongkan input file, karena tidak bisa set value
            $("#U_proposal").val('');

            // Tampilkan link file proposal
            if (data.proposal) {
                $("#U_proposal_link").html(
                    `Lihat Berkas Proposal : <a href="/kegiatan/proposal/${data.organisasi.nama}/${data.proposal}" target="_blank" class="text-primary">${data.proposal}</a>`
                );
            } else {
                $("#U_proposal_link").html('');
            }
        });
    });

    $(document).on("click", ".D_B_kegiatan", function() {
        let id = $(this).data("id");

        $(".modalDelete").attr("id", "M_D_kegiatan-" + id);
        $("#M_D_kegiatan-" + id).modal('show');
        $("#D_route").attr('action', "/{{ request()->segment(1) }}/{{ request()->segment(2) }}/{{ request()->segment(3) }}/destroy/" + id);
    });

    $(document).ready(function() {
        $("#M_S_kegiatan form").on("submit", function(e) {
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
                        $("#M_S_kegiatan").modal("hide").find("form")[0].reset();
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

        $("#M_U_kegiatan form").on("submit", function(e) {
            e.preventDefault();

            let btn = $(this).find("button[type='submit']");
            let id = $(".modalUpdate").attr("id").replace("M_U_kegiatan-", "");
            let originalText = btn.html();
            let formData = new FormData(this);

            formData.append("_method", "PUT");

            btn.html("<i class='bx bx-loader-circle bx-spin'></i>").prop("disabled", true);

            $.ajax({
                url: $("#M_F_kegiatan").attr("action") + "/" + id,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status === "success") {

                        showToast("success", response.message);
                        $("#M_U_kegiatan-" + id).modal("hide");
                        $("#table_kegiatan").DataTable().ajax.reload(null, false);
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
