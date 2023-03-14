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
                            <a href="{{route('admin_'.$page["route"].'_create')}}" class="btn btn-primary">
                                Yeni {{$page["title"]}}
                            </a>
                        </div>
                    </div>
                    <form action="{{route('admin_costumer')}}" method="get">
                        <div class="row mt-3 p-3 border-1">
                            <div class="col-md-12">
                                <h4>Axtaris</h4>
                            </div>
                            <div class="col-md-4 mb-2">
                                <input value="{{old("name")}}" type="text" name="name" placeholder="Ad" class="form-control">
                            </div>
                            <div class="col-md-4 mb-2">
                                <input type="text" name="surname" placeholder="Soyad" class="form-control">
                            </div>
                            <div class="col-md-4 mb-2">
                                <input type="number" name="birthday" placeholder="Yas" class="form-control">
                            </div>
                            <div class="col-md-4 mb-2">
                                <select name="gender" class="form-control">
                                    <option value="man">Kisi</option>
                                    <option value="woman">Qadin</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-2">
                                <select name="car_id" class="form-control">
                                    @foreach($cars as $rs)
                                        <option value="{{$rs->id}}">{{$rs->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mb-2">
                                <button type="submit" class="btn btn-primary">Axtar</button>
                            </div>
                        </div>

                    </form>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordere">
                                <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>AD SOYAD</th>
                                    <th>Yas</th>
                                    <th>Cinsiyyet</th>
                                    <th>Avtomobil Markasi</th>
                                    <th>Son Seyahet Etdiyi Rayon</th>
                                    <th>Toplam Muddet</th>
                                    <th>Toplam Mesafe</th>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datalist as $rs)
                                    <tr>
                                        <td>{{$rs->id}}</td>
                                        <td>{{$rs->getFullName()}}</td>
                                        <td>{{$rs->getOld()}}</td>
                                        <td>{{$rs->getGender()}}</td>
                                        <td>{{$rs->car->name}}</td>
                                        <td>
                                            @if($rs->getLastCity())
                                                {{$rs->getLastCity()->city->name}}
                                            @endif
                                        </td>
                                        <td>
                                            {{$rs->getFullDuration()}} Gun
                                        </td>
                                        <td>
                                            {{$rs->getFullDistance()}} KM
                                        </td>
                                        <td class="d-flex justify-content-between">
                                            <a href="{{route('admin_costumer_trip',['id'=>$rs->id])}}"
                                               class="btn-sm btn-dark" style="margin-right: 10px;">
                                                Seyahetler
                                            </a>
                                            <a href="{{route('admin_costumer_edit',['id'=>$rs->id])}}"
                                               class="btn-sm btn-primary" style="margin-right: 10px;">
                                                Duzelt
                                            </a>
                                            <a href="{{route('admin_costumer_destroy',['id'=>$rs->id])}}"
                                               class="btn-sm btn-danger confirmation">Sil</a>

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
