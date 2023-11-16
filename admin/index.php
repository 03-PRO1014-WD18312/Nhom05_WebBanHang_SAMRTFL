<?php
session_start();
ob_start();

require '../core/phpmailer/PHPMailer.php';
require '../core/phpmailer/SMTP.php';
require '../core/phpmailer/Exception.php';

require '../config/config.php';
require '../core/session.php';
require '../core/connect.php';
require '../core/database.php';
require '../core/hepler.php';

$module = _MODULE_DEFAULT_ADMIN;
$action = _ACTION_DEFAULT_ADMIN;

if(!empty($_GET['module'])){
    $module = $_GET['module'];
}

if(!empty($_GET['action'])){
    $action = $_GET['action'];
}

$path = _WEB_PATH_ROOT."/admin/$module/controller/$action.php";

if(file_exists($path)){
    require $path;
}else{
    require _PATH_ERORR_DEFAULT;
    die();
}





?>