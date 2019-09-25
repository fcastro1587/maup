<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ asset('img/logo-bco.jpg') }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif
        <ul class="sidebar-menu" data-widget="tree">

          @can('users.index')
          <li class="header">USUARIOS Y ROLES</li>
          <li><a href="{{ route('users.index')}}"><i class='fa fa-users'></i> <span><strong>Usuarios</strong></span></a></li>
          @endcan

          @can('roles.index')
          <li><a href="{{ route('roles.index')}}"><i class='fa fa-user'></i> <span><strong>Roles</strong></span></a></li>
          @endcan

          @can('bloqueos.index')
          <li class="header">BLOQUEOS</li>
          <li><a href="{{ route('bloqueos.index')}}"><i class='fa fa-file-archive-o'></i> <span>Imagen bloqueos</span></a></li>
          @endcan

          @can('viaje.index')
          <li class="header">ADMINISTRACIÓN DE PROGRAMAS</li>
          <li><a href="{{ route('viaje.index')}}"><i class='fa fa-file-archive-o'></i> <span>Programas</span></a></li>
          @endcan

          @can('alert.alert')
          <li><a href="{{ route('alert.alert')}}"><i class="fa fa-warning"></i><span>alertas</span></a></li>
          @endcan


          @can('tours.index')
          <li class="treeview">
            <a href="#">
              <i class="fa fa-book"></i>
              <span>Catalogos</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              @can('tours.index')
              <li><a href="{{ url('tours') }}"><i class='fa fa-map-o'></i> <span>Tours opcionales</span></a></li>
              @endcan

              @can('rooms.index')
              <li><a href="{{ url('rooms') }}"><i class='fa fa-bed'></i> <span>Tipos de habitación</span></a></li>
              @endcan

              @can('city.index')
              <li><a href="{{ url('city') }}"><i class='fa fa-map-pin'></i> <span>Ciudades</span></a></li>
              @endcan

              @can('visas.index')
              <li><a href="{{ url('visas') }}"><i class='fa fa-cc-visa'></i> <span>Visas</span></a></li>
              @endcan


            </ul>
          </li>
          @endcan


          @can('department.index')
          <li class="treeview">
            <a href="#">
              <i class="fa fa-pie-chart"></i>
              <span>Carruseles</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
          @can('department.index')
          <li><a href="{{ route('department.index')}}"><i class="fa fa-filter"></i><span>Panoramica(s) por depto</span></a></li>
          @endcan

          @can('season_travel.index')
          <li><a href="{{ route('season_travel.index')}}"><i class="fa fa-image"></i><span>Temporadas | Home</span></a></li>
          @endcan

          @can('carousel.index')
          <li><a href="{{ route('carousel.index')}}"><i class="fa fa-image"></i><span>Descatacados por depto</span></a></li>
          @endcan

          @can('main.index')
          <li><a href="{{ route('main.index')}}"><i class="fa fa-image"></i><span>Principal | Home</span></a></li>
          @endcan

          @can('recommend.index')
          <li><a href="{{ route('recommend.index')}}"><i class="fa fa-image"></i><span>Detalle recomendados</span></a></li>
          @endcan
            </ul>
          </li>
          @endcan

          @can('offers.index')
          <li><a href="{{ route('offers.index')}}"><i class='fa  fa-star-o'></i> <span>Ofertas especiales</span></a></li>
          @endcan

          @can('congratulations.index')
          <li><a href="{{ route('congratulations.index')}}"><i class='fa fa-thumbs-o-up'></i> <span>Felicitaciones</span></a></li>
          @endcan

          @can('revistas.index')
          <li class="header">REVISTAS</li>
          <li><a href="{{ route('revistas.index')}}"><i class="fa fa-book"></i><span>Magazines</span></a></li>
          @endcan

          @can('file.index')
          <li class="header">IMAGENES</li>
          <li><a href="{{ route('file.index')}}"><i class="fa  fa-image"></i><span>Cargar Imagenes</span></a></li>
          @endcan

          <!--@can('filters.index')
          <li><a href="{{ route('filters.index')}}"><i class="fa fa-filter"></i><span>Divisiones</span></a></li>
          @endcan-->

          <!--@can('admintc.admin')
          <li class="header">TIPO DE CAMBIO</li>
          <li><a href="{{ route('admintc.admin')}}"><i class="fa fa-filter"></i><span>Tipo de cambio</span></a></li>
          @endcan-->

          <!--<li><a href="{{ url('tools/vi.php')}}"><i class="fa fa-filter"></i><span>tools</span></a></li>-->

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
