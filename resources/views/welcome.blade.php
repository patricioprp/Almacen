<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <title>Tucuman Informatico</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/estilos.css')}}">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <h4 class="display-4"><p>Tucuman Tecnologias</p></h4>                       
                </div>
                <div class="container-fluid">
                <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div class="card mb-4 bg-danger text-white">
                                <div class="card-body text-center">
                                  <h5 class="card-title">NOTEBOOK-NETBOOK-PC</h5>
                                  <p class="card-text">LENOVO-SAMSUNG-TOSHIBA-SONY VAIO-MAC-ACER</p>
                                  <a href="#"><img src="{{ asset('images/notebook')}}" class="img-thumbnail rounded-circle" alt=""></a>
            
                                </div>
                              </div>    
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="card mb-4 bg-primary text-white">
                                <div class="card-body text-center">
                                  <h5 class="card-title">REPUESTOS Y ACCESORIOS</h5>
                                  <p class="card-text">NOGANET-KINGSTON-PC BOX-TP LINK-DLINK-CISCO</p>
                                  <a href="#"><img src="{{ asset('images/tarjeta')}}" class="img-thumbnail rounded-circle" alt=""></a>
                                </div>
                            </div>    
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="card mb-4 bg-warning text-white">
                                <div class="card-body text-center">
                                  <h5 class="card-title">CELULARES</h5>
                                  <p class="card-text">SAMSUNG-SONY-LG-ALCATEL-MOTOROLA-NOKIA-IPHONE</p>
                                  <a href="#"><img src="{{ asset('images/celulares')}}" class="img-thumbnail rounded-circle" alt=""></a>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-center"><a href="{{asset('/')}}"><img src="{{asset('images/marca_tucuman.png')}}" srcset="{{asset('images/marca_tucuman.png')}} 2x" width="60"></a> Tucuman Tecnologias © {{date("Y")}} | Todos los derechos reservados </div>          
            </div>
        </div>
    </body>
</html>
