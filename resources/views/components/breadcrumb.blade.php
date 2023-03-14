<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{$page["title"]}} Paneli</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin_home')}}">Ana Səhifə</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('admin_'.$page['route'])}}">{{$page["title"]}}</a></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
