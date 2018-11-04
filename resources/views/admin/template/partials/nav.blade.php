<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
     <button type="button" class="navbar-toggle" data-toggle="collapse"
             data-target=".navbar-ex1-collapse">
       <span class="sr-only">Desplegar navegación</span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
     </button>
     <a class="navbar-brand img-responsive" rel="home" href="/home"><img src="{{ asset('images/img')}}" style="max-width:200px; margin-top: -7px; " ></a>
   </div>
   
       <!-- Brand and toggle get grouped for better mobile display -->
       <!-- Collect the nav links, forms, and other content for toggling -->
       <div class="collapse navbar-collapse navbar-ex1-collapse">
         <ul class="nav navbar-nav navbar-right">
            @if ( Auth::user()->type=='admin')
           <li class="@yield('venta')"><a href="{{ asset('admin/ventaContado')}}"><b>Gestionar Venta</b></a></li>
           <li class="@yield('producto')"><a href="{{ asset('admin/producto')}}"><b>Gestionar Producto</b></a></li>
           <li class="@yield('proveedor')"><a href="{{ asset('admin/proveedor')}}"><b>Gestionar Proveedor</b></a></li>
           <li class="@yield('cliente')"><a href="{{ asset('admin/cliente')}}"><b>Gestionar Cliente</b></a></li>
           <li class="@yield('usuario')"><a href="{{ asset('admin/user')}}"><b>Gestion de Empleado</b></a></li>
           @elseif (Auth::user()->type=='member')
           <li class="@yield('venta')"><a href="{{ asset('admin/ventaContado')}}"><b>Gestionar Venta</b></a></li>
           <li class="@yield('proveedor')"><a href="{{ asset('admin/proveedor')}}"><b>Gestionar Proveedor</b></a></li>
           <li class="@yield('cliente')"><a href="{{ asset('admin/cliente')}}"><b>Gestionar Cliente</b></a></li>
           @endif
         </ul>
   
         <ul class="nav navbar-nav navbar-right">
   
           <li class="dropdown">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
   <span class="glyphicon glyphicon-user"></span>{{ Auth::user()->name }}<span class="caret"></span></a>
             <ul class="dropdown-menu">
             <li><a href="{{ asset('/')}}">Pagina Principal</a></li>
               <li><a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Cerrar Sesion</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form></li>
             </ul>
           </li>
         </ul>
       </div><!-- /.navbar-collapse -->
     <!-- /.container-fluid -->
   </nav>