<script>
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
</script>

@if ($message = Session::get('success'))
    <script>
        Toast.fire({
            icon: 'success',
            title: ' {{ $message }}'
        });
    </script>
@endif
@if ($message = Session::get('error'))
    <script>
        Toast.fire({
            icon: 'error',
            title: ' {{$message}}'
        });
    </script>
@endif
@if ($message = Session::get('warning'))
    <script>
        Toast.fire({
            icon: 'warning',
            title: ' {{$message}}'
        });
    </script>
@endif

@if ($message = Session::get('info'))
    <script>
        Toast.fire({
            icon: 'info',
            title: ' {{$message}}'
        });
    </script>
@endif

@if ($errors->any())
    <script>
        Toast.fire({
            icon: 'question',
            title: ' Please check the form below for errors'
        });
    </script>
@endif
