<script>
    $(document).ready(function() {
        $('#beasiswaAkademik').DataTable({
            // // Customize DataTables layout
            dom: '<"row"<"col-md-6"B><"col-md-6"f>>rt<"row"<"col-md-6"l><"col-md-6"p>>',
            buttons: [{
                text: '+',
                className: 'btn btn-sm btn-primary',
                action: function(e, dt, node, config) {
                    $('#tambahAkademik').modal('toggle');

                }
            }]
        });
        $('#beasiswaNonakademik').DataTable({});

        $('#nama_beasiswa_akademik').select2({
            placeholder: "-- Pilih --",
            allowClear: true,
            dropdownParent: $('#tambahAkademik'),
            ajax: {
                url: "{{ route('beasiswa-mahasiswa', '') }}" + "/akademik", // Endpoint yang menyediakan data
                type: 'GET',
                dataType: 'json',
                delay: 250, // Jeda untuk mengurangi permintaan server
                data: function(params) {
                    return {
                        search: params.term // Mengirimkan parameter pencarian ke server
                    };
                },
                processResults: function(data) {
                    // Menghapus duplikat berdasarkan 'nim'
                    const uniqueData = [];
                    const seen = new Set();


                    data.forEach(item => {
                        if (!seen.has(item.nim)) {
                            seen.add(item.nim);
                            uniqueData.push(item);
                        }
                    });


                    // Format data untuk Select2
                    return {
                        results: uniqueData.map(mahasiswa => ({
                            id: mahasiswa.nim,
                            text: mahasiswa.nama + ' (' + mahasiswa.nim + ')'
                        }))
                    };
                },
                cache: true // Mengaktifkan caching untuk respons AJAX
            },
            minimumInputLength: 1, // Aktifkan pencarian hanya setelah 1 karakter diketik
            language: {
                inputTooShort: function(args) {
                    return "Ketik 1 karakter untuk mencari"; // Pesan khusus
                },
                noResults: function() {
                    return "Tidak ada hasil yang ditemukan";
                },
                searching: function() {
                    return "Sedang mencari...";
                }
            }
        });

        moment.locale('id');

        $("#tahun").datepicker({
            format: 'yyyy',
            viewMode: 'years',
            minViewMode: 'years'
        });

        $('#ips').on('input', function() {
            let value = $(this).val();

            // Hapus karakter yang tidak valid (hanya angka diperbolehkan)
            value = value.replace(/[^0-9]/g, '');

            // Batasi digit pertama hanya 1, 2, atau 3
            if (value.length > 0) {
                const firstDigit = value.charAt(0);
                if (!['1', '2', '3'].includes(firstDigit)) {
                    value = value.substring(1); // Hapus digit pertama jika tidak valid
                }
            }

            // Tambahkan koma setelah digit pertama jika ada angka tambahan
            if (value.length > 1) {
                value = value.substring(0, 1) + ',' + value.substring(1);
            }

            // Perbarui nilai input
            $(this).val(value);
        });


        $('#deleteBeasiswa').on('click', function(event) {
            event.preventDefault();

            var articleId = $(this).data('id');

            Swal.fire({
                title: 'Hapus artikel?',
                text: 'Tindakan ini tidak dapat dibatalkan.',
                icon: 'warning',
                showCancelButton: true,
                reverseButtons: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Lakukan permintaan AJAX DELETE
                    $.ajax({
                        url: "{{ route('delete-beasiswa', '') }}" + "/akademik",
                        type: 'DELETE',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content') // Tambahkan CSRF token
                        },
                        success: function(response) {
                            Swal.fire('Berhasil!', 'Artikel berhasil dihapus.', 'success');
                            location.reload(); // Segarkan halaman setelah berhasil
                        },
                        error: function(xhr) {
                            Swal.fire('Gagal!', 'Artikel gagal dihapus.', 'error');
                        }
                    });
                }
            });
        });

    });
</script>
