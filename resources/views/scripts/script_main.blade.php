<script>
    $('#summernote').summernote({
        placeholder: 'Tulis sesuatu yang menginspirasimu!',
        tabsize: 2,
        height: 400,
        callbacks: {
            onKeyup: function(e) {
                var $noteEditable = $('#summernote').next('.note-editor').find('.note-editable');
                var plainContent = $noteEditable.text();
                var excerpt = plainContent.substring(0, 300);
                $('#excerpt').val(excerpt);
            }
        }
    });

    $('#logout').on('click', function(event) {
        event.preventDefault(); // Prevent the default behavior (i.e., the link from being followed)

        Swal.fire({
            title: 'Logout dari aplikasi?',
            icon: 'warning',
            html: `<a autofocus></a>`,
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Logout!',

        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('logout') }}"; // Redirect to the logout route
            }
        });
    });
</script>
