<?php 

session_start();



// requireValidSession();


session_destroy();


$_SESSION = [];


header('Location: index.php');


// loadTemplate('login');





