<?php
session_start();
include_once ("../controllers/componentes/utilitarios.php");
require_once("../PHPMailer/PHPMailerAutoload.php");
include_once '../fblogin-v5/src/Facebook/autoload.php';
function limpiarString($string){
    $clean_string=htmlspecialchars(mysql_escape_string(trim($string)));
    return $clean_string;
  }  
$action='index';
if(isset($_REQUEST['action'])):
    $action=$_REQUEST['action'];
endif;
$utilitarios = new Utilitarios();
$view= new stdClass(); // creo una clase standard para contener la vista
$view->disableLayout=false;// marca si usa o no el layout , si no lo usa imprime directamente el template
switch ($action)
{
    case 'index':
        $utilitarios->contador();
        $view->contentTemplate="../views/templates/index_tpl.php"; // seteo el template que se va a mostrar
        $view_login = new stdClass();
        $view_login->contentTemplate="/facebook_app/login.php";
        break;
    case 'refreshIndex':
        $view->disableLayout=true;
        $view->contentTemplate="../views/templates/index_tpl.php";
        break;  
    case 'login':
        $view->disableLayout=true;
        $view->contentTemplate="../views/templates/login.php";
        break;      
    case 'facebook-contest':
        $view->disableLayout=true;
        $view->contentTemplate="../views/templates/login.php";
        break;      
    case 'gestion':
        $view->disableLayout=true;
        $view->contentTemplate="../views/templates/gestion_tpl.php";
        break;
    case 'contacto':
        $view->disableLayout=true;
        $view->contentTemplate="../views/templates/contacto_tpl.php";
        break;
    case 'enviarConsulta':
        $view->disableLayout=true;
        $datos = $utilitarios->PrepararHtml();
        break;
    case 'cupon':
        $perfil = $utilitarios->LoginFacebook();
        $nombre = $perfil['first_name'];
        $apellido = $perfil['last_name'];
        $correo = $perfil['email'];
        $dominio=$_REQUEST['dominio'];
      //  echo $correo;
     //   $uri=$_REQUEST['uri']; //La URI que se empleó para acceder a la página. Por ejemplo: '/index.html'. 
     //   $url = $dominio.$uri.'?cupon=cupon&nombre=$nombre&apellido=$apellido&correo=$correo';
        $url = 'http://'.$dominio.'/Ecommerce/trunk/public_html/index.php?cupon=cupon&nombre='.$nombre.'&apellido='.$apellido.'&correo='.$correo;
        header('Location: '.$url);
        exit;
        break;
    default :
} 

if($view->disableLayout==true) 
    {include_once ($view->contentTemplate);}
else
    {include_once ('../views/layouts/front_end.php');} // el layout incluye el template adentro     
 


