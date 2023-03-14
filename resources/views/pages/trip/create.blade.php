@extends('layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('components.breadcrumb')
        <!-- Main content -->
        <section class="content">
            <div class="card card-primary">
                <div class="card-body">
                    <form action="{{route('admin_'.$page["route"].'_store',['id'=>$costumer_id])}}" method="post">
                        @csrf<div class="row">
                            <div class="col-md-6">
                                <h4>Yeni {{$page["title"]}}</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <button class="btn btn-success" type="submit">Yadda Saxla</button>
                                <a class="btn btn-dark" href="{{route('admin_'.$page["route"])}}">İmtina Et</a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label for="car">Rayon</label>
                                <select name="city_id" class="form-control">
                                    @foreach($cities as $rs)
                                        <option value="{{$rs->id}}">{{$rs->name}}</option>
                                    @endforeach
                                </select>
                                @error('city_id') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="surname">Baslama Tarixi</label>
                                <input value="{{old("start_date")}}" type="date" name="start_date" class="form-control">
                                @error('start_date') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="surname">Muddet</label>
                                <input value="{{old("duration")}}" type="number" name="duration" class="form-control">
                                @error('duration') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="surname">Mesafe</label>
                                <input value="{{old("distance")}}" step="any" type="number" name="distance" class="form-control">
                                @error('distance') <span class="text-danger">{{$message}}</span> @enderror
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
