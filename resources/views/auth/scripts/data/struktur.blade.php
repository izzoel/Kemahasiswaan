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
                data: 'nim',
                name: 'nim',
                className: 'text-center'
            },
            {
                data: 'nama',
                name: 'mahasiswa.nama',
                orderable: true,
                searchable: true
            }, // Pastikan `mahasiswa.nama`
            {
                data: 'prodi',
                name: 'mahasiswa.prodi',
                className: 'text-center',
                orderable: true,
                searchable: true
            }, // `mahasiswa.prodi`
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


    document.addEventListener("DOMContentLoaded", function() {

        new AirDatepicker('#periode', {
            view: 'years',
            minView: 'years',
            dateFormat: 'yyyy',
            autoClose: true,
            container: '#M_S_struktur',
        });


    });

    $('#select_' + '{{ request()->segment(3) }}').select2({
        theme: 'bootstrap-5',
        placeholder: "-- Pilih --",
        allowClear: true,
        dropdownParent: $('#M_S_struktur'),
        ajax: {
            url: "{{ url('/' . request()->segment(1) . '/' . request()->segment(2) . '/mahasiswa/select') }}",
            type: 'GET',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    search: params.term
                };
            },
            processResults: function(data) {
                const uniqueData = [];
                const seen = new Set();

                data.forEach(item => {
                    if (!seen.has(item.nim)) {
                        seen.add(item.nim);
                        uniqueData.push(item);
                    }
                });

                return {
                    results: uniqueData.map(mahasiswa => ({
                        id: mahasiswa.nim,
                        text: mahasiswa.nama + ' (' + mahasiswa.nim + ')'
                    }))
                };
            },
            cache: true
        },
        minimumInputLength: 1,
        language: {
            inputTooShort: function() {
                return "Ketik untuk mencari";
            },
            noResults: function() {
                return "Tidak ada hasil yang ditemukan";
            },
            searching: function() {
                return "Sedang mencari...";
            }
        }
    });

    $(document).on('click', '.U_B_struktur', function() {
        let id = $(this).data("id").split('-').pop();

        $(".modalUpdate").attr("id", "M_U_struktur-" + id);
        $("#M_U_struktur-" + id).modal('show');
        $("#U_route").attr('action', "/{{ request()->segment(1) }}/{{ request()->segment(2) }}/{{ request()->segment(3) }}/update/" + id);

        $.get("/{{ request()->segment(1) }}/{{ request()->segment(2) }}/struktur/show/" + id, function(data) {
            $("#U_jabatan").val(data.jabatan);

            // Update Select2
            let selectEl = $("#U_select_{{ request()->segment(3) }}");
            selectEl.empty(); // Kosongkan select

            if (data.nim) {
                let option = new Option(data.nama_mahasiswa + ' (' + data.nim + ')', data.nim, true, true);
                selectEl.append(option).trigger('change');
            }

            selectEl.select2({
                theme: 'bootstrap-5',
                placeholder: "-- Pilih --",
                allowClear: true,
                dropdownParent: $("#M_U_struktur-" + id),
                ajax: {
                    url: "{{ url('/' . request()->segment(1) . '/' . request()->segment(2) . '/mahasiswa/select') }}",
                    type: 'GET',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            search: params.term
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: data.map(mahasiswa => ({
                                id: mahasiswa.nim,
                                text: mahasiswa.nama + ' (' + mahasiswa.nim + ')'
                            }))
                        };
                    },
                    cache: true
                },
                minimumInputLength: 1,
            });

            $('#U_profil').change(function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#preview_profil').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });

            if (data.profil && data.nama_organisasi) {
                let profilPath = "/profil/" + data.nama_organisasi + "/" + data.profil;
                $("#preview_profil").attr("src", profilPath).show();
            } else {
                $("#preview_profil").hide();
            }
        });
    });

    $(document).on("click", ".D_B_struktur", function() {
        let id = $(this).data("id");

        $(".modalDelete").attr("id", "M_D_struktur-" + id);
        $("#M_D_struktur-" + id).modal('show');
        $("#D_route").attr('action', "/{{ request()->segment(1) }}/{{ request()->segment(2) }}/{{ request()->segment(3) }}/destroy/" + id);
    });
    $(document).ready(function() {
        $("#M_S_struktur form").on("submit", function(e) {
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
                        $("#M_S_struktur").modal("hide").find("form")[0].reset();
                        $("#table_struktur").DataTable().ajax.reload();
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

        $("#M_U_struktur form").on("submit", function(e) {
            e.preventDefault();

            let btn = $(this).find("button[type='submit']");
            let id = $(".modalUpdate").attr("id").replace("M_U_struktur-", "");
            let originalText = btn.html();
            let formData = new FormData(this);

            formData.append("_method", "PUT");

            btn.html("<i class='bx bx-loader-circle bx-spin'></i>").prop("disabled", true);

            $.ajax({
                url: $("#M_F_struktur").attr("action") + "/" + id,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status === "success") {

                        showToast("success", response.message);
                        $("#M_U_struktur-" + id).modal("hide");
                        $("#table_struktur").DataTable().ajax.reload(null, false);
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
