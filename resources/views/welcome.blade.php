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
                background-color: #ccc;
                color: #008080;
                font-weight: 70;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
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
                font-size: 54px;
            }

            .links > a {
                color: #636b6f;
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
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                          <h4 class="display-4">Tucuman Informatica</h4>
                          <hr class="my-4">
                        </div>
                      </div>
                </div>
                <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div class="card mb-4 bg-danger text-white">
                                <div class="card-body text-center">
                                  <h5 class="card-title">NOTEBOOK-NETBOOK-PC</h5>
                                  <p class="card-text">LENOVO-SAMSUNG-TOSHIBA-SONY VAIO-MAC-ACER</p>
                                  <a href="#"><img src="http://assets.pokemon.com/assets/cms2/img/video-games/_news/pokemon_sun_moon/a_rattata.jpg" class="img-thumbnail rounded-circle" alt=""></a>
            
                                </div>
                              </div>    
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="card mb-4 bg-primary text-white">
                                <div class="card-body text-center">
                                  <h5 class="card-title">REPUESTOS Y ACCESORIOS</h5>
                                  <p class="card-text">NOGANET-KINGSTON-PC BOX-TP LINK-DLINK-CISCO</p>
                                  <a href="#"><img src="http://assets.pokemon.com/assets/cms2/img/video-games/_news/pokemon_sun_moon/munchlax_b.jpg" class="img-thumbnail rounded-circle" alt=""></a>
                                </div>
                            </div>    
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="card mb-4 bg-warning text-white">
                                <div class="card-body text-center">
                                  <h5 class="card-title">CELULARES</h5>
                                  <p class="card-text">SAMSUNG-SONY-LG-ALCATEL-MOTOROLA-NOKIA-IPHONE</p>
                                  <a href="#"><img src="http://assets.pokemon.com/assets/cms2/img/video-games/_news/pokemon_sun_moon/snorlax.jpg" class="img-thumbnail rounded-circle" alt=""></a>
                                </div>
                              </div>
                        </div>
                    </div>
            </div>
        </div>
    </body>
</html>
