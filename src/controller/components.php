<?php 
loadModel('Components');
loadModel('HistoricoLimp');

// filtro de busca
$search = isset($_GET['search']) ? $_GET['search'] : '1';
$filter = isset($_GET['filter']) ? $_GET['filter'] : '1';
if($search == '1' || $search == ''){
   $search = '1';
   $filter = '1';
}

// Cria ou edita o Components
if(isset($_POST) && count($_POST) > 1 && !isset($_POST['search'])){
   try{
      // Cria o Components
      if($_POST['form'] == 'create'){
         Components::newComponents($_POST);
      }
      // Edita o Components
      elseif($_POST['form'] == 'edit'){
         Components::editComponents($_POST);
      }

   }catch(Exception $error){
      ?><script>
      msgStatus('<?='Desculpe algo inesperado aconteceu! - Erro: ' . $error->getMessage() ?>','danger' );
   </script><?php 
   }
}


// deleta o computador
$idcpntdelete = isset($_GET['id']) ? $_GET['id'] : false;
if($idcpntdelete ){
   Components::deleteComponents($idcpntdelete);
}

// paginação
$np = isset($_GET['np']) ? $_GET['np'] : '1';
$limit = 6;

// captura a lista no banco de dados
$Components = new Components($np, $limit);
$allCpnt = [
'monitor' => Components::getAllQtdCpnt('tipo', 'monitor'),
'mouse' => Components::getAllQtdCpnt('tipo', 'mouse'),
'teclado' => Components::getAllQtdCpnt('tipo', 'teclado'),
'suportenot' => Components::getAllQtdCpnt('tipo', 'suportenot'),
'outro' => Components::getAllQtdCpnt('tipo', 'outro')
];
$qtdPc = Components::getQtdCpnt($filter, $search);
$totpg = ceil($qtdPc / $limit);
$arr = $Components->getFilterCpnt($filter, $search);

$arr['info'] = [
   'allCpnt' => $allCpnt,
   'qtdPc' => $qtdPc,
   'using' => Components::checkInUse(),
   'available' => Components::checkAvailable(),
   'np' => $np,
   'totpg' => $totpg,
   'limit' => $limit,
   'filter' => $filter,
   'search' => $search
]; 

loadTemplate('manage/manage', $arr);

