<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trend Sistemas</title>
    <link rel="stylesheet" href="./bootstrap-3.3.5-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./bootstrap-3.3.5-dist/css/bootstrap-submenu.min.css">
    <link rel="stylesheet" href="app_css/style.css" type="text/css" media="screen" /> 
    <script type="text/javascript" src="app_js/jquery-1.10.2.min.js"></script> 
    <script type="text/javascript" src="app_js/sammy-0.7.6.min.js"></script> 
    <script type="text/javascript" src="app_js/jquery.preload.min.js"></script> 
    <script type="text/javascript" src="./bootstrap-3.3.5-dist/js/bootstrap.js"></script> 
    <script type="text/javascript" src="app_js/functions_f.js"></script>     
</head>
<body>
    <div id="fondo-loader"></div>     
    <div id="modal-cargador" class="modal-dialog modal-chica">
        <div id="modal-cargador-content" class="modal-content">
            <div id="modal-cargador-header" class="modal-header">
                <h4 id="modal-cargador-title" class="modal-title">
                    <span class="glyphicon glyphicon-time">
                    </span>Please Wait
                </h4>
            </div>
            <div id="modal-cargador-body" class="modal-body">
                <div>
                    <div>
                        <p><img src="app_images/barraProgreso.gif" /></p>			  
                    </div>
                </div>
            </div>
        </div>
    </div>       
    <header id="main-header">
        <div id="div-header-xs" class="visible-xs">
            <div style="overflow: hidden; background-color: #000;" align="center" class="img-responsive">
                <img src="app_images/header-xs.jpg">
            </div>                
        </div>                   
        <div id="div-header" class="hidden-xs" align="center">              
        </div>  
        <div style="background-color: #000;" class="hidden-xs"> 
            <nav class="navbar navbar-default">
              <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                      <a href="#/inicio" tabindex="0" >Inicio</a>
                    </li>	      
                    <li>                        
                    <li class="dropdown">
                      <a tabindex="0" data-toggle="dropdown">Productos<span class="caret"></span></a>
                      <!-- role="menu": fix moved by arrows (Bootstrap dropdown) -->
                      <ul class="dropdown-menu" role="menu">
                        <li><a  href="#/gestion"tabindex="0">Gestión</a></li>
                        <li><a  href="#/pos"tabindex="0">Punto de venta</a></li>
                      </ul>
                    </li>                                                
                    <li>
                        <a href="#/contacto" tabindex="0" >Contacto</a>
                    </li>	                
                </ul>
              </div>
            </nav>  
        </div>
        
        <div class="dropdown visible-xs">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="background-color: #000;">
                Menú<span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
              <li><a href="#/inicio">Inicio</a></li>
              <li><a href="#/contacto">Contacto</a></li>
            </ul>
       </div>        
        
    </header>   
    <div id="div-contenido">      
        <?php include_once ($view->contentTemplate); // incluyo el template que corresponda ?>
    </div>   
    <div id="div-footer-xs" class="visible-xs">
                <div style="margin: 30px 0px;" align="center">
                    <img src="app_images/wathsapp.jpg" style="padding-right:10px;">
                    <p style="padding-top:10px;">54 9 351 347 7670</p>
                </div>
                <div style="margin: 30px 0px;" align="center">
                    <img src="app_images/mail.jpg" style="padding-right:10px;">
                    <p style="padding-top:10px;">info@trendsistemas.com</p>
                </div>
                <div style="margin: 30px 0px;" align="center">
                    <img src="app_images/facebook.jpg" style="display:inline;">
                    <p style="padding-top:10px;">https://www.facebook.com/Trend-Sistemas</p>
                </div>
                <div style="padding-top: 20px;">
                    <p style="margin: 0px;">&bull;&nbsp; Powered by Trend Sistemas &copy;&nbsp;&nbsp;2009 All Rights Reserved &nbsp;&bull;</p>
                </div>     
    </div>
    <div class="hidden-xs" style="background-color: #000; padding: 30px 30px 0 30px;" align="center">
        <div id="div-footer" class="container hidden-xs">
            <div class="rows">
                    <div class="col-md-3 col-md-push-2">
                        <img src="app_images/wathsapp.jpg">
                        <p>54 9 351 347 7670</p>
                    </div>                
                    <div class="col-md-2 col-md-offset-2">
                        <img src="app_images/facebook.jpg">
                        <p>https://facebook.com/trend-sistemas</p>
                    </div>
                    <div class="col-md-3">
                        <img src="app_images/mail.jpg" style="padding-right:10px;">
                        <p>info@trendsistemas.com</p>
                    </div>                
                    <div class="col-md-12" style="padding-top: 20px;">
                        <p>&bull;&nbsp; Powered by Trend Sistemas &copy;&nbsp;&nbsp;2009 All Rights Reserved &nbsp;&bull;</p>
                    </div>
            </div>        
        </div>  
    </div>
</body>
</html>