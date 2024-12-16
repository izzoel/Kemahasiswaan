<script>
    $(document).ready(function() {
        $('#nama_beasiswa_nonakademik').select2({
            placeholder: "-- Pilih --",
            allowClear: true,
            dropdownParent: $('#nonakademikModal'),
            ajax: {
                url: "{{ route('beasiswa-mahasiswa', '') }}" + "/nonakademik", // Endpoint yang menyediakan data
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

        $('#nonakademikModal').on('shown.bs.modal', function() {
            var hasOptions = $('#nama_beasiswa_nonakademik option').length > 1; // Mengabaikan placeholder

            if (!hasOptions) {
                $('#prestasi').hide(); // Sembunyikan elemen prestasi jika tidak ada data
            }

            $('#nama_beasiswa_nonakademik').on('change', function() {
                var nim = $(this).val();
                $('#prestasi').show();
                $('#prestasi').empty();

                $('#prestasi').select2({
                    placeholder: "-- Pilih Prestasi --",
                    allowClear: true,
                    dropdownParent: $('#nonakademikModal'),
                    ajax: {
                        url: "{{ route('prestasi-lomba', '') }}" + "/" + nim,
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
                                results: data.map(prestasi => ({
                                    id: prestasi.id,
                                    text: prestasi.lomba + " (" + prestasi.tahun + ") " + prestasi
                                        .prestasi + " tingkat " + prestasi.tingkat
                                }))
                            };
                        }
                    }
                });
            })
        });

    });
</script>
