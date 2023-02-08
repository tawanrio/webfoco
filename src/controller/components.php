<?php 
loadModel('Components');
loadModel('HistoricoLimp');

// filtro de busca
$search = isset($_POST['search']) ? $_POST['search'] : '1';
$filter = isset($_POST['filter']) ? $_POST['filter'] : '1';
if($search == '1' || $search == ''){
   $search = '1';
   $filter = '1';
}

// Cria ou edita o computador
if(isset($_POST) && count($_POST) > 1 && !isset($_POST['filter'])){
   Components::newComponents($_POST);
}

// deleta o computador
$codigodelete = isset($_GET['codigo']) ? $_GET['codigo'] : false;
$idcpntdelete = isset($_GET['id']) ? $_GET['id'] : false;
if($codigodelete && $idcpntdelete ){
   Components::deleteComponents($codigodelete, $idcpntdelete);
}

// paginação
$np = isset($_GET['np']) ? $_GET['np'] : '1';
$limit = 6;

// captura a lista no banco de dados
$Components = new Components($np, $limit);
$qtdTotalPc = Components::getAllQtdCpnt();
$qtdPc = Components::getQtdCpnt($filter, $search);
$totpg = ceil($qtdPc / $limit);
$arr = $Components->getFilterCpnt($filter, $search);

$arr['info'] = [
   'qtdTotalPc' => $qtdTotalPc,
   'qtdPc' => $qtdPc,
   'using' => Components::checkInUse(),
   'available' => Components::checkAvailable(),
   'np' => $np,
   'totpg' => $totpg,
   'limit' => $limit
]; 

loadTemplate('manage/manage', $arr);

