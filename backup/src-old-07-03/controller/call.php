<?php 
if(!isset($_SESSION)){
   session_start();
}
requireValidSession();

loadTemplate('call/call');
