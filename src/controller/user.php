<?php 

loadModel('User');
loadModel('Computer');

// filtro
$search = isset($_POST['search']) ? $_POST['search'] : '1';
$filter = isset($_POST['filter']) ? $_POST['filter'] : '1';
if($search == '1' || $search == ''){
   $search = '1';
   $filter = '1';
}

// paginação
$np = isset($_GET['np']) ? $_GET['np'] : '1';
$limit = 6;

$User = new User($np, $limit);
$Computer = new Computer();

// Cria ou edita o colaborador
if(isset($_POST) && count($_POST) > 1 && !isset($_POST['filter'])){
   $User->newUser($_POST);
}

// Deleta Colaborador
$iddelete = isset($_GET['id']) ? $_GET['id'] : false;
$cpfdelete = isset($_GET['cpf']) ? $_GET['cpf'] : false;
if($iddelete && $cpfdelete){
   User::deleteUser($iddelete, $cpfdelete);
}

// captura info no banco de dados
$qtdTotalUser = User::getAllQtdUser();
$qtdUser = User::getQtdUser($filter, $search);
$totpg = ceil($qtdUser / $limit);
$arr = $User->getFilterUser($filter, $search);



$arr['info'] = [
   'qtdTotalUser' => $qtdTotalUser,
   'pcAvailable' => User::computerAvailable(),
   // 'using' => User::checkInUse(),
   'available' => User::checkAvailable(),
   'allComputer' => User::getAllPc(),
   'np' => $np,
   'totpg' => $totpg,
   'limit' => $limit
]; 

loadTemplate('manage/manage', $arr);
