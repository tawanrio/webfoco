<?php 
if(!isset($_SESSION)){
   session_start();
}
requireValidSession();


$route = (isset($_GET['r']) ? $_GET['r'] : 'user');



loadController($route);

