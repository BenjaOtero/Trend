<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>jQuery Bootstrap Submenu Plugin Demo</title>


<link rel="stylesheet" href="./bootstrap-3.3.5-dist/css/bootstrap.css">
<link rel="stylesheet" href="./bootstrap-3.3.5-dist/css/bootstrap-submenu.min.css">


<script src="app_js/jquery-1.10.2.min.js" type="text/javascript" ></script> 
<script src="./bootstrap-3.3.5-dist/js/bootstrap.js" type="text/javascript" ></script> 
<script src="app_js/bootstrap-submenu.min.js" defer></script>
<script src="app_js/docs.js" defer></script>
<script type="text/javascript" src="app_js/jquery.preload.min.js"></script> 
<script type="text/javascript" src="app_js/functions_f.js"></script>   
<link rel="stylesheet" href="app_css/style.css" type="text/css" media="screen" /> 

</head>
<body>
    <header id="main-header">
        <div id="div-header-xs" class="visible-xs">
            <div style="overflow: hidden">
            </div>                
        </div>                   
        <div id="div-header" class="hidden-xs" align="center">   
        </div>  
        <div style="background-color: #000;">
            <nav class="navbar navbar-default">
              <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                  <li>
                    <a tabindex="0" >Inicio</a>
                  </li>	      
                  <li>
                    <a tabindex="0" >Stock y ventas</a>
                </li>		  
                <li>
                  <a tabindex="0" >Sitio web</a>
                </li>			
                <li class="dropdown">
                  <a tabindex="0" data-toggle="dropdown">Marketing<span class="caret"></span></a>
                  <!-- role="menu": fix moved by arrows (Bootstrap dropdown) -->
                  <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-submenu">
                      <a tabindex="0" data-toggle="dropdown">Facebook</a>
                      <ul class="dropdown-menu">
                        <li><a id="facebook-contest" tabindex="0">Crear concurso</a></li>
                        <li><a tabindex="0">Crear ficha contacto</a></li>
                      </ul>
                    </li>
                    <li><a tabindex="0">E-mail marketing</a></li>
                    <li class="divider"></li>
                    <li><a tabindex="0">Separated link</a></li>
                  </ul>
                </li>
                <li>
                  <a tabindex="0" >Contacto</a>
                </li>	                
                </ul>
              </div>
            </nav>  
        </div>
    </header>   
    <div id="div-contenido">      
        <?php include_once ($view->contentTemplate); // incluyo el template que corresponda ?>
    </div>    
</body>
</html>