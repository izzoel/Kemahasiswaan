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
                name: 'judul',
                orderable: false
            },
            {
                data: 'kategori',
                name: 'kategori',
                className: 'text-center',
                orderable: true
            },
            {
                data: 'tanggal',
                name: 'tanggal',
                className: 'text-center',
                orderable: true
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
            [3, 'desc']
        ], // Urutkan tanggal terbaru terlebih dahulu
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

    $('#summernote').summernote({
        placeholder: 'Tulis sesuatu yang menginspirasimu!',
        tabsize: 2,
        height: 400,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['codeview', 'help']] // Fullscreen dihapus
        ]
    });

    $("#M_S_artikel").on('show.bs.modal', function() {
        $.get("/{{ request()->segment(1) }}/{{ request()->segment(2) }}/kategori/show", function(data) {
            $("#kategori").empty().append('<option selected disabled value="">-- Pilih --</option>');
            data.forEach(function(item) {
                $("#kategori").append(`<option value="${item.id}">${item.kategori}</option>`);
            });
        });
    });

    $("#formKategori").submit(function(e) {
        e.preventDefault();

        let btn = $(this).find("button[type='submit']");
        let originalText = btn.html();

        btn.html("<i class='bx bx-loader-circle bx-spin'></i>").prop("disabled", true);

        $.post("{{ url('/' . request()->segment(1) . '/' . request()->segment(2) . '/kategori/store') }}", {
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

    $(document).on('click', '.U_B_artikel', function() {
        let id = $(this).data("id").split('-').pop();

        $(".modalUpdate").attr("id", "M_U_artikel-" + id);
        $("#M_U_artikel-" + id).modal('show');
        $("#U_route").attr('action', "/{{ request()->segment(1) }}/{{ request()->segment(2) }}/{{ request()->segment(3) }}/update/" + id);

        $.get("/{{ request()->segment(1) }}/{{ request()->segment(2) }}/artikel/show/" + id, function(dataArtikel) {

            $.get("/{{ request()->segment(1) }}/{{ request()->segment(2) }}/kategori/show", function(dataKategori) {
                let select = $("#U_kategori");
                select.empty().append('<option selected disabled value="">-- Pilih --</option>');

                dataKategori.forEach(function(item) {
                    let selected = item.id == dataArtikel.id_kategori ? "selected" : "";
                    select.append(`<option value="${item.id}" ${selected}>${item.kategori}</option>`);
                });
            });

            $(document).on('show.bs.modal', '#M_S_kategori', function(event) {
                let id = $(".U_B_artikel").data("id").split('-').pop();
                let newTarget = "#M_U_artikel-" + id;
                $(this).find(".modalKategori").attr("data-bs-target", newTarget);
            });

            $("#U_judul").val(dataArtikel.judul);

            let summernote = $('#U_summernote');
            summernote.summernote({
                placeholder: 'Tulis sesuatu yang menginspirasimu!',
                tabsize: 2,
                height: 400,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['codeview', 'help']]
                ]
            });

            summernote.summernote('code', dataArtikel.konten);

            if (dataArtikel.thumbnail) {
                $("#preview_thumbnail").attr("src", "/thumbnails/" + dataArtikel.thumbnail).show();
            } else {
                $("#preview_thumbnail").hide();
            }
        });
    });

    $(document).on("click", ".D_B_artikel", function() {
        let id = $(this).data("id");

        $(".modalDelete").attr("id", "M_D_artikel-" + id);
        $("#M_D_artikel-" + id).modal('show');
        $("#D_route").attr('action', "/{{ request()->segment(1) }}/{{ request()->segment(2) }}/{{ request()->segment(3) }}/destroy/" + id);
    });
</script>
