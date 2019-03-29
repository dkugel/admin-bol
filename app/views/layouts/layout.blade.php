<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Directorio Médico</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="/css/app.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>         
    <script src="js/bootstrap.js"></script>   
    <script src="js/main.js"></script>  
               
</head>

<body class="home">    
    <header> 
        <div class="container-fluid" style="padding:0">
            <div class="row no-gutters">
                <div class="col-6">
                    <div class="elipse">                    
                        <img src="images/logo-seguros-bolivar.svg">                               
                    </div>
                </div>
                <div class="col-6"></div>                
            </div>
        </div>        
    </header>
    
    
       
    @yield('content')


    <footer>
        <div class="container">                                 
            <div class="row">
                <div class="col-12">                    
                    <ul class="social-media">
                        <li>
                            <a title="Facebook" target="_blank" href="https://www.facebook.com/pages/Seguros-Bol%C3%ADvar/143296635757515">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a title="Twitter" target="_blank" href="https://twitter.com/segurosbolivar">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a title="YouTube" target="_blank" href="https://www.youtube.com/segurosbolivar">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="copyright desktop">
                        © 2019 - <a title="Seguros Bolivar" target="_blank" href="http://www.segurosbolivar.co">Seguros Bolivar</a> - Todos los derechos reservados
                    </div>
                    
                </div>
            </div>
        </div>
    </footer>
</body>
</html>