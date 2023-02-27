<?php 
if(!isset($_SESSION)){
   session_start();
}
requireValidSession();
session_destroy();
$_SESSION = [];
header('Location: index.php');
// loadTemplate('login');

