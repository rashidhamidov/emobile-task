@extends('layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('components.breadcrumb')
        <!-- Main content -->
        <section class="content">
            <div class="card card-primary">
                <div class="card-body">
                    <form action="{{route('admin_'.$page["route"].'_update',['id'=>$data->id])}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <h4>{{$page["title"]}} Yenileme</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <button class="btn btn-success" type="submit">Yadda Saxla</button>
                                <a class="btn btn-dark" href="{{route('admin_'.$page["route"])}}">İmtina Et</a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="name">Ad</label>
                                <input value="{{$data->name}}" type="text" name="name" class="form-control">
                                @error('name') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="surname">Soyad</label>
                                <input value="{{$data->surname}}" type="text" name="surname" class="form-control">
                                @error('surname') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="name">Cinsiyyet</label><br>

                                <label for="gender">Kişi</label>
                                <input @if($data->gender=="man") checked @endif type="radio" name="gender" value="man" style="margin-right: 30px;">

                                <label for="gender">Qadın</label>
                                <input @if($data->gender=="woman") checked @endif  type="radio" name="gender" value="woman"><br>

                                @error('gender') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="surname">Tevellud</label>
                                <input value="{{$data->birthday}}" type="date" name="birthday" class="form-control">
                                @error('birthday') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label for="car">Avtomobil Markasi</label>
                                <select name="car_id" class="form-control">
                                    @foreach($cars as $rs)
                                        <option @if($rs->id==$data->car_id) selected @endif value="{{$rs->id}}">{{$rs->name}}</option>
                                    @endforeach
                                </select>
                                @error('car_id') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="color">Rengi</label>
                                <input value="{{$data->color}}" type="text" name="color" class="form-control">
                                @error('color') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="color">Buraxilis Ili</label>
                                <select name="year" class="form-control">

                                    @for($i = 2000;$i<=date('Y');$i++)
                                        <option @if($i==$data->year) selected @endif value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                                @error('year') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
