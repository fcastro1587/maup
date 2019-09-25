<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ asset('img/profile.png') }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">ADMINISTRACIÓN DE PROGRAMAS</li>
          <li class="active treeview">
            <a href="{{ url('/home') }}">
              <i class="fa fa-dashboard"></i> <span>Home</span>
              <span class="pull-right-container">
              </span>
            </a>
          </li>

          <li><a href="{{ route('viaje.index')}}"><i class='fa fa-file-archive-o'></i> <span>Programas</span></a></li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-pie-chart"></i>
              <span>Catalogos</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ url('tours') }}"><i class='fa fa-map-o'></i> <span>Tours opcionales</span></a></li>
              <li><a href="{{ url('rooms') }}"><i class='fa fa-bed'></i> <span>Tipos de habitación</span></a></li>
            <!--  <li><a href="{{ url('currency') }}"><i class='fa fa-money'></i> <span>Moneda</span></a></li>
-->
              <li><a href="{{ url('city')}}"><i class='fa fa-map-pin'></i> <span>Ciudades</span></a></li>
              <li><a href="{{ url('visas') }}"><i class='fa fa-cc-visa'></i> <span>Visas</span></a></li>
            <!--  <li><a href="#"><i class='fa fa-image'></i> <span>Imagenes</span></a></li>-->
            </ul>
          </li>
          <li><a href="{{ route('offers.index')}}"><i class='fa  fa-star-o'></i> <span>Ofertas especiales</span></a></li>
          <li><a href="{{ route('congratulations.index')}}"><i class='fa fa-thumbs-o-up'></i> <span>Felicitaciones</span></a></li>
          <li><a href="{{ route('toptravels.index')}}"><i class='fa fa-star-o'></i> <span>Top ten</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
