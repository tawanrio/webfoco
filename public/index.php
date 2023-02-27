<?php 
require_once(dirname(__FILE__, 2) . '/src/config/config.php');

$page = isset($_GET['page']) ? $_GET['page'] : 'login';


loadController($page);
