<?php 
if(!isset($_SESSION)) {
	session_start();
}
error_reporting(E_ALL);
date_default_timezone_set('America/Caracas');
ini_set('display_errors', 1);
ini_set('memory_limit', -1);
extract($_POST);
?>