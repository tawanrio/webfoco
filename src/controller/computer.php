<?php 

loadModel('Computer');

// filtro de busca
$search = isset($_POST['search']) ? $_POST['search'] : '1';
$filter = isset($_POST['filter']) ? $_POST['filter'] : '1';
if($search == '1' || $search == ''){
   $search = '1';
   $filter = '1';
}

// Cria ou edita o computador
if(isset($_POST) && count($_POST) > 1 && !isset($_POST['filter'])){
   Computer::newComputer($_POST);
}

// deleta o computador
$iddelete = isset($_GET['id']) ? $_GET['id'] : false;
$macdelete = isset($_GET['mac']) ? $_GET['mac'] : false;
if($iddelete && $macdelete){
   Computer::deleteComputer($iddelete, $macdelete);
}

// paginação
$np = isset($_GET['np']) ? $_GET['np'] : '1';
$limit = 6;

// captura a lista no banco de dados
$Computer = new Computer($np, $limit);
$qtdTotalPc = Computer::getAllQtdPc();
$qtdPc = Computer::getQtdPc($filter, $search);
$totpg = ceil($qtdPc / $limit);
$arr = $Computer->getFilterPc($filter, $search);



$arr['info'] = [
   'qtdTotalPc' => $qtdTotalPc,
   'qtdPc' => $qtdPc,
   'using' => Computer::checkInUse(),
   'available' => Computer::checkAvailable(),
   'np' => $np,
   'totpg' => $totpg,
   'limit' => $limit
]; 

loadTemplate('manage/manage', $arr);
