<?php 
if(!isset($_SESSION)){
   session_start();
}
requireValidSession();
loadModel('Reports');

$np = isset($_GET['np']) ? $_GET['np'] : '1';
$limit = 5;

$Reports = new Reports($np, $limit);
$totpg = ceil(Reports::getQtdPc() / $limit);

$arr = $Reports->getAllPc();
$arr['info'] = [
   'qtdPc' => Reports::getQtdPc(),
   'using' => Reports::checkInUse(),
   'available' => Reports::checkAvailable(),
   'np' => $np,
   'totpg' => $totpg
]; 

loadTemplate('reports/reports', $arr);