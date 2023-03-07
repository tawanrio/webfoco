<?php 


if(!isset($_SESSION)){


   session_start();


}


// requireValidSession();



$route = (isset($_GET['route']) ? $_GET['route'] : 'user');


loadController($route);

