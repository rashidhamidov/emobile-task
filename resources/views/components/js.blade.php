<!-- jQuery -->
<script src="{{asset('assets')}}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('assets')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 4 -->
<script src="{{asset('assets')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- JQVMap -->
<script src="{{asset('assets')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('assets')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('assets')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('assets')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('assets')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('assets')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('assets')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('assets')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets')}}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets')}}/dist/js/demo.js"></script>
<!-- InputMask -->
<!-- SweetAlert2 -->
<script src="{{asset('assets/plugins/sweetalert2/sweetalert2.min.js')}}"></script>

<script type="text/javascript">


    // AJAX FUNCTIONS CRUD
    function addForm(route) {
        $.ajax({
            type: "POST",
            url: route,
            data: $("#addForm").serialize(),
            dataType: "json",
            success: function (response) {
                Toast.fire({
                    icon: 'success',
                    title: response.message
                });
                fetchData();
                $('#addModal').modal('hide');
                $("#addForm")[0].reset();
            },
            error: function (response) {
                errors = response.responseJSON.errors;
                $.each(errors, (name, error) => {
                    Toast.fire({
                        icon: 'error',
                        title: error
                    });
                });
            }
        });
    }

    function updateForm(route) {
        $.ajax({
            type: "POST",
            url: route,
            data: $("#updateForm").serialize(),
            dataType: "json",
            success: function (response) {
                Toast.fire({
                    icon: 'success',
                    title: response.message
                });
                fetchData();
                $('#updateModal').modal('hide');
                $("#updateForm")[0].reset();
            },
            error: function (response) {
                errors = response.responseJSON.errors;
                $.each(errors, (name, error) => {
                    Toast.fire({
                        icon: 'error',
                        title: error
                    });
                });
            }
        });
    }

    // DELETE FUNCTION
    $(document).on('click', '.deletebtn', function () {
        var model_id = $(this).val();
        $('#deleteModal').modal('show');
        $('#deleteing_id').val(model_id);
    });

    $(document).on('click', '.delete_{{$page["route"]}}', function (e) {
        e.preventDefault();
        var id = $('#deleteing_id').val();
        $.ajax({
            url: "/{{$page["route"]}}/destroy/" + id,
            type: 'GET',
            success: function (response) {
                Toast.fire({
                    icon: 'success',
                    title: response.message
                });
                $("#deleteModal").modal('hide');
                fetchData();
            },
            error: function (response) {
                errors = response.responseJSON.errors;
                $.each(errors, (name, error) => {
                    Toast.fire({
                        icon: 'error',
                        title: error
                    });
                });
            }
        });
    });

    //END AJAX FUNCTIONS CRUD


</script>
<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Silmek istediyinizden Eminsiniz mi?');
    });
</script>
@yield('end')
