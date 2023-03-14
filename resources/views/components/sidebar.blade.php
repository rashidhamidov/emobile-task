<!-- Sidebar Menu -->
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin_home')}}" class="brand-link text-center ">
        <span class="brand-text font-weight-light">EMOBILE ADMIN</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('admin_costumer')}}"
                       class="nav-link @if(isset($page) and ($page["route"]=="costumer" or $page["route"]=="home")) active @endif">
                        <i class="nav-icon far fa-circle"></i>
                        <p>
                            Müştəri Paneli
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin_car')}}"
                       class="nav-link @if(isset($page) and $page["route"]=="car") active @endif">
                        <i class="nav-icon far fa-circle"></i>
                        <p>
                            Avtomobil Paneli
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin_city')}}"
                       class="nav-link @if(isset($page) and $page["route"]=="city") active @endif">
                        <i class="nav-icon far fa-circle"></i>
                        <p>
                            Rayon Paneli
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>
