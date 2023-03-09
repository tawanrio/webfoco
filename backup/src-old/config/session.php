<?php 

function requireValidSession($isAdmin = false){
   if(!$_SESSION) {
      loadController('login', $arr['errors'] = 'Acesso negado');
      exit(); 
   
   }
   $userId = $_SESSION['userId'];
   $userAdmin = $_SESSION['isAdmin'];
   if(!isset($userId)){
      loadController('login', $arr['errors'] = 'Acesso negado');
      exit();
   }elseif($isAdmin && !$userAdmin){
      throw new ValidationException('Acesso negado');
      exit();
   }
}