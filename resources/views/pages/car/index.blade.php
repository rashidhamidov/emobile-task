@extends('layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('components.breadcrumb')
        <!-- Main content -->
        <section class="content">
            <div class="card card-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>
                                {{$page["title_sum"]}}
                            </h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <a role="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                                Yeni {{$page["title"]}}
                            </a>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>
                                        No
                                    </th>
                                    <th>
                                        Marka
                                    </th>
                                    <th>
                                        Əməliyyat
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('components.confirmation_modal')
    @include('pages.car.create')
    @include('pages.car.update')

@endsection

@section('end')
    <script>
        function fetchData() {
            $.ajax({
                type: "GET",
                url: "/{{$page["route"]}}/fetchCars",
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    $('tbody').html("");
                    $.each(response, function (key, item) {
                        $('tbody').append('<tr>\
                            <td>' + item.id + '</td>\
                            <td>' + item.name + '</td>\
                            <td><button type="button" value="' + item.id + '" class="btn btn-primary editbtn btn-sm">Düzəlt</button>\
                            <button type="button" value="' + item.id + '" class="btn btn-danger deletebtn btn-sm">Sil</button></td>\
                        \</tr>');
                    });
                }
            });
        }

        fetchData();

        $(document).on('click', '.editbtn', function (e) {
            e.preventDefault();
            var model_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "/{{$page["route"]}}/edit/" + model_id,
                success: function (response) {
                    inputs = document.getElementById("updateForm").elements;
                    inputs["name"].value = response.name;
                    inputs["{{$page["route"]}}_id"].value = response.id;
                    $('#updateModal').modal('show');
                }
            });
        });
    </script>
@endsection
