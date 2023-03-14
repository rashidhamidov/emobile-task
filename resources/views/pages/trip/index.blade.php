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
                            <a href="{{route('admin_'.$page["route"].'_create',['id'=>$costumer->id])}}" class="btn btn-primary">
                                Yeni {{$page["title"]}}
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordere">
                                <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Rayon</th>
                                    <th>Baslama Tarixi</th>
                                    <th>Muddet</th>
                                    <th>Mesafe</th>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datalist as $rs)
                                    <tr>
                                        <td>{{$rs->id}}</td>
                                        <td>{{$rs->city->name}}</td>
                                        <td>{{$rs->start_date}}</td>
                                        <td>{{$rs->duration}}</td>
                                        <td>{{$rs->distance}}</td>
                                        <td class="d-flex justify-content-between">
                                            <a href="{{route('admin_trip_edit',['id'=>$rs->id])}}"
                                               class="btn-sm btn-primary">
                                                Duzelt
                                            </a>
                                            <a href="{{route('admin_trip_destroy',['id'=>$rs->id])}}" class="btn-sm btn-danger confirmation">Sil</a>

                                        </td>
                                    </tr>
                                @endforeach
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
@endsection
