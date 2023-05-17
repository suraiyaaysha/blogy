  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('admin/dashboard') }}" class="brand-link">
      {{-- <img src="{{ asset(url('admin/assets/img/AdminLTELogo.png')) }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ __('AdminLTE 3') }}</span> --}}
      <img src="{{ asset(url($cms->app_logo)) }}" alt="logo">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset(Auth::user()->profile_photo) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item">
                <a href="{{ url('admin/dashboard') }}" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    {{ __('Dashboard') }}
                </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ url('/admin/category') }}" class="nav-link {{ Request::is('admin/category') ? 'active' : '' }}">
                <i class="nav-icon fas fa-th"></i>
                <p>{{ __('Categories') }}</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ url('/admin/posts') }}" class="nav-link {{ Request::is('admin/posts') ? 'active' : '' }}">
                <i class="nav-icon fas fa-columns"></i>
                <p>{{ __('Blog Posts') }}</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                    {{ __('Tags') }}
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="{{ url('/admin/tag') }}" class="nav-link {{ Request::is('admin/tag') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{ ('Tag List') }}</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/admin/tag/create') }}" class="nav-link {{ Request::is('admin/tag/create') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{ __('Create Tag') }}</p>
                    </a>
                </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ url('/admin/subscriber-list') }}" class="nav-link {{ Request::is('admin/subscriber-list') ? 'active' : '' }}">
                <i class="nav-icon fas fa-th"></i>
                <p>{{ __('Subscribers') }}</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ url('/admin/settings') }}" class="nav-link {{ Request::is('admin/settings') ? 'active' : '' }}">
                <i class="ion-android-settings nav-icon mr-1"></i>
                <p>{{ __('Website Settings') }}</p>
                </a>
            </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
