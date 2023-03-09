<?php 


if(!isset($_SESSION)){


   session_start();

}
echo session_id();

// requireValidSession();



$route = (isset($_GET['route']) ? $_GET['route'] : 'user');


loadController($route);

