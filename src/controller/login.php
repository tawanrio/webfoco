<?php 

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















