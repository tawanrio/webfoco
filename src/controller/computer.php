<?php 



// filtro de busca

$search = isset($_GET['search']) ? $_GET['search'] : '1';

$filter = isset($_GET['filter']) ? $_GET['filter'] : '1';



if($search == '1' || $search == ''){

   $search = '1';

   $filter = '1';

}

$arrfilter = explode('-', $filter);
$arrsearch = explode('-', $search);


// Cria ou edita o computador

if(isset($_POST) && count($_POST) > 1 && !isset($_POST['search'])){

   try{
      // Cria o computador

      if($_POST['form'] == 'create'){

         Computer::newComputer($_POST);
      }

      // Edita o computador

      elseif($_POST['form'] == 'edit'){

            Computer::editComputer($_POST);

         }


   }catch(Exception $error){

      ?><script>

      msgStatus('<?='danger'?>', '<?='Desculpe algo inesperado aconteceu! - Erro: ' . $error->getMessage() ?>');

   </script><?php 

   }

}



// deleta o computador

$iddelete = isset($_GET['id']) ? $_GET['id'] : false;

// $macdelete = isset($_GET['mac']) ? $_GET['mac'] : false;

if($iddelete){

   Computer::deleteComputer($iddelete);

}



// paginação

$np = isset($_GET['np']) ? $_GET['np'] : '1';

$limit = 6;



// captura a lista no banco de dados

$Computer = new Computer($np, $limit);

$qtdTotalPc = Computer::getAllQtdPc();

$qtdPc = Computer::getQtdPc($arrfilter, $arrsearch);
// $qtdPc = Computer::getQtdPc($filter, $search);

// print_r($qtdPc);

$getTest = Computer::getTest($arrfilter, $arrsearch);

$qtdPcWebfoco = Computer::getQtdPc(['propriedade'], ['webfoco']);
$qtdPcProprio = Computer::getQtdPc(['propriedade'], ['proprio']);

$totpg = ceil($qtdPc / $limit);

// $arr = $Computer->getFilterPc($filter, $search);
$arr = $Computer->getFilterPc($arrfilter, $arrsearch);


$arr['info'] = [

   'qtdTotalPc' => $qtdTotalPc,

   'qtdPc' => $qtdPc,

   'using' => Computer::checkInUse(),

   'available' => Computer::checkAvailable(),

   'np' => $np,

   'totpg' => $totpg,

   'limit' => $limit,
   'qtdPcWebfoco' => $qtdPcWebfoco,
   'qtdPcProprio' => $qtdPcProprio,

   'filter' => $filter,
   'search' => $search,
   'arrfilter' => $arrfilter,
   'arrsearch' => $arrsearch,

]; 



loadTemplate('manage/manage', $arr);



