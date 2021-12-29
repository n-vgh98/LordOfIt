@if (session('success'))
    <script>
        Swal.fire({
            title: '!انجام شد',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'باشه'
        })
    </script>
@endif
@if (session('fail'))
    <script>
        Swal.fire({
            title: '!خطا',
            text: '{{ session('fail') }}',
            icon: 'error',
            confirmButtonText: 'باشه'
        })
    </script>
@endif
