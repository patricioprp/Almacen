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
        <style>
            html, body {
                background-color: #580e0e;
                color: #ffff;
                font-weight: 70;
                height: 90vh;
                margin: 0;
                font-family: serifa;
            }

            .full-height {
                height: 90vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 34px;
            }

            .links > a {
                color: #ffff;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
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
                    <h4 class="display-4"><p>Tucuman Informatica</p></h4>                       
                </div>
                <div class="container-fluid">
                <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div class="card mb-4 bg-danger text-white">
                                <div class="card-body text-center">
                                  <h5 class="card-title">NOTEBOOK-NETBOOK-PC</h5>
                                  <p class="card-text">LENOVO-SAMSUNG-TOSHIBA-SONY VAIO-MAC-ACER</p>
                                  <a href="#"><img src="http://sodimac.scene7.com/is/image/SodimacPeru/2491877?$lista175$" class="img-thumbnail rounded-circle" alt=""></a>
            
                                </div>
                              </div>    
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="card mb-4 bg-primary text-white">
                                <div class="card-body text-center">
                                  <h5 class="card-title">REPUESTOS Y ACCESORIOS</h5>
                                  <p class="card-text">NOGANET-KINGSTON-PC BOX-TP LINK-DLINK-CISCO</p>
                                  <a href="#"><img src="http://3.bp.blogspot.com/_7-gup3wtid0/SxVNEGsnj-I/AAAAAAAAABw/OHVpfdRR9hY/s200/tarjeta+lan.jpg" class="img-thumbnail rounded-circle" alt=""></a>
                                </div>
                            </div>    
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="card mb-4 bg-warning text-white">
                                <div class="card-body text-center">
                                  <h5 class="card-title">CELULARES</h5>
                                  <p class="card-text">SAMSUNG-SONY-LG-ALCATEL-MOTOROLA-NOKIA-IPHONE</p>
                                  <a href="#"><img src="http://roycortina.com.ar/wp-content/uploads/2014/05/celulares--175x175.jpg" class="img-thumbnail rounded-circle" alt=""></a>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
