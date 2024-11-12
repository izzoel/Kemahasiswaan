<script>
    $(document).on('click', '.postGaleriModal', function() {
        let id = $(this).data('id');
        let route = "{{ route('post-galeri') }}";
        $.ajax({
            url: route,
            type: 'GET',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                let asset = "{{ asset('storage') . '/' }}";
                $('#imgPostGaleri').attr('src', asset + data.gambar);
                $('#imgPostGaleri').attr('alt', data.excerpt);
                $('#titlePostGaleri').text(data.deskripsi);
                $('#contentPostGaleri').html(data.konten);

                $('#modalPostGaleri').modal('show');
                // alert(data);
            }
        })
    });
</script>
