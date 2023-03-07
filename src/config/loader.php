<?php 



function loadTemplate($page, $arr = [], $erro = []){



   require_once(VIEW_PATH . '/template/header.php');

   require_once(VIEW_PATH . "/$page.php");

   require_once(VIEW_PATH . '/template/footer.php');



}



function loadController($controllerName){



   require_once(CONTROLLER_PATH . "/$controllerName.php");



}



function loadModel($modelName){



   require_once(MODEL_PATH ."/$modelName.php");



}



function loadRouteReports($route, $arr = []){


   require_once(VIEW_PATH . "/manage/$route.php");



}