<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>TUC-TECNO</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/estilos.css')}}">
  </head>
  <body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-default">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <b><i>Tucuman Tecnologias</i></b>
                </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>    
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <b>{{ Auth::user()->name }} {{ Auth::user()->apellido }}</b><span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();" class="dropdown-item">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                      </li>
                </ul>
            </div>
        </nav>
        <div class="title m-b-md">
                <h4 class="display-4"><p class="text-center">Tucuman Tecnologias</p></h4>                       
            </div>
        <div class="row">
                <div class="col-sm-12 col-md-2">
                        <div class="card mb-4 bg-danger text-white">
                            <div class="card-body text-center">
                              <h5 class="card-title">EMPLEADO</h5>
                              <p class="card-text"></p>
                              <a href="{{ asset('admin/user')}}"><img src="{{ asset('images/empleado')}}" class="img-thumbnail rounded-circle" alt=""></a>
        
                            </div>
                          </div>    
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <div class="card mb-4 bg-primary text-white">
                            <div class="card-body text-center">
                              <h5 class="card-title">CLIENTE</h5>
                              <p class="card-text"></p>
                              <a href="{{ asset('admin/cliente')}}"><img src="{{ asset('images/cliente')}}" class="img-thumbnail rounded-circle" alt=""></a>
                            </div>
                        </div>    
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <div class="card mb-4 bg-warning text-white">
                            <div class="card-body text-center">
                              <h5 class="card-title">PROVEEDOR</h5>
                              <p class="card-text"></p>
                              <a href="#"><img src="{{ asset('images/proveedor')}}" class="img-thumbnail rounded-circle" alt=""></a>
                            </div>
                          </div>
                    </div>
                    <div class="col-sm-12 col-md-2">
                            <div class="card mb-4 bg-success text-white">
                                <div class="card-body text-center">
                                  <h5 class="card-title">PRODUCTOS</h5>
                                  <p class="card-text"></p>
                                  <a href="#"><img src="{{ asset('images/productos')}}" class="img-thumbnail rounded-circle" alt=""></a>
                                </div>
                              </div>
                        </div>
                        <div class="col-sm-12 col-md-2">
                                <div class="card mb-4 bg-danger text-white">
                                    <div class="card-body text-center">
                                      <h5 class="card-title">VENTAS</h5>
                                      <p class="card-text"></p>
                                      <a href="#"><img src="{{ asset('images/venta')}}" class="img-thumbnail rounded-circle" alt=""></a>
                                    </div>
                                  </div>
                            </div>
        </div>
        <div class="panel-footer text-center"><a href="{{asset('/')}}"><img src="{{asset('images/marca_tucuman.png')}}" srcset="{{asset('images/marca_tucuman.png')}} 2x" width="60"></a> Tucuman Tecnologias © {{date("Y")}} | Todos los derechos reservados </div>          
           
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>