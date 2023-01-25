<?php 
if(!isset($_SESSION)){
   session_start();
}
loadModel('Login');

if($_SESSION){
   $_POST = [];
   loadController('manage');
}else{

   if(count($_POST) > 0){
      try {
         new Login($_POST['email'], $_POST['pass']);
         $_POST = [];
         loadController('manage');
      } catch (ValidationException $e) {
         loadTemplate('login', $e);
      }
      
   }else{
      loadTemplate('login');
      
   }
}


// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Headers: access');
// header('Access-Control-Allow-Method: POST');
// header("content-Type: application/json; charset-UTF-8");
// header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');


// require_once(dirname(__FILE__, 2) . '\config\config.php');

// $dataInput = json_decode(file_get_contents("php://input"));

// $data = Database::checkLogin($dataInput);

// die(json_encode($data));


