<?php
@session_start();
define ('PATH_ROOT',$_SERVER['DOCUMENT_ROOT'].'/'); 
define ('FUNCIONES','/inc/funciones.php');
define ('MODULOS', 'modulos/');
define ('IMAGENES', PATH_ROOT.'imagenes/');

/**
 * DB CONFIG
 */
$_SESSION['DB_HOST']='localhost';
$_SESSION['DB_USER']='root';
$_SESSION['DB_PASS']='';
$_SESSION['DB_NAME']='halloween';
$_SESSION['DB_PORT']='3306';
$_SESSION['ENTORNO']='LOCAL';
?>