<script>



function msgStatus(text,classname = 'success'){

    setTimeout(() => {

       const msg = document.createElement('span')

       msg.className = classname ;

       msg.textContent = text;



       const table = document.querySelector('.table')



       table.insertAdjacentElement('afterbegin',msg);

       

    }, 100);

 }

</script>

<?php 

class Components{



   public $limit;

   public $offset;



   public function __construct($offset = 0, $limit = 5){

      $this->offset = $offset;



      $this->limit = $limit;



   }



   public static function editComponents($arr){



      $idcpnt = isset($arr['idcpnt']) ? trim($arr['idcpnt']) :  new Exception('idcpnt não existe');

      $marca = trim(isset($arr['marca']) ? $arr['marca'] :  new Exception('marca sem conteúdo'));

      $modelo = trim(isset($arr['modelo']) ? $arr['modelo'] :  new Exception('modelo sem conteúdo'));

      $tamanho = trim(isset($arr['tamanho']) ? $arr['tamanho'] :  new Exception('tamanho sem conteúdo'));

      $numserie = trim(isset($arr['numserie']) ? $arr['numserie'] :  new Exception('numserie sem conteúdo'));



      // echo $idcpnt;

      

      $query = "UPDATE `components` SET `marca`='$marca',`modelo`='$modelo',`tamanho`='$tamanho',`numserie`='$numserie' WHERE `id_cpnt` = '$idcpnt'";



      $text = 'Componente Cadastrado!';

      

      // echo $query;



      Database::getResultFromQuery($query);



      ?><script>

         msgStatus('<?=$text?>');

      </script><?php 

      return;
   }

   public static function newComponents($arr){


      $codigo = GenerateCode::createStringCode($arr);


      $tipo = trim(isset($arr['tipo']) ? $arr['tipo'] :  new Exception('tipo sem conteúdo'));
      $marca = trim(isset($arr['marca']) ? $arr['marca'] :  new Exception('marca sem conteúdo'));
      $modelo = trim(isset($arr['modelo']) ? $arr['modelo'] :  new Exception('modelo sem conteúdo'));
      $tamanho = trim(isset($arr['tamanho']) ? $arr['tamanho'] :  new Exception('tamanho sem conteúdo'));
      $numserie = trim(isset($arr['numserie']) ? $arr['numserie'] :  new Exception('numserie sem conteúdo'));
      $idcpnt = isset($arr['idcpnt']) ? trim($arr['idcpnt']) : '';


      // echo $idcpnt;

      $query = "INSERT INTO `components` (`tipo`,`marca`,`modelo`,`tamanho`,`codigo`,`numserie`) VALUES ('$tipo','$marca','$modelo','$tamanho','$codigo','$numserie')";

      $text = 'Componente Cadastrado!';

      if(self::checkExistComponents($numserie, $idcpnt)) return  new Exception('Componente já existe');      

      // echo $query;

      Database::getResultFromQuery($query);

      ?><script>

         msgStatus('<?=$text?>');

      </script><?php 

      return;

   }


   public static function checkExistComponents($numserie, $idcpnt = null){

      $query = "SELECT count(*) FROM `components` WHERE `id_cpnt` = '$idcpnt'";

      $result = Database::getResultFromQuery($query);

      $result = $result->fetch(PDO::FETCH_ASSOC);

      if($result['count(*)'] > 0){

         $_POST = [];    

         return true;

      } 

      return false;

   }


   public static function deleteComponents($idcpnt){

      $query = "DELETE FROM `components` WHERE `id_cpnt` = '$idcpnt'";

      // echo $query;

      $delete = Database::getResultFromQuery($query);

      ?><script>

         msgStatus('Componente Deletado!','danger');

      </script><?php       

   }
 

   public static function getQtdCpnt($filter, $search){

      $query = 'SELECT COUNT(*) FROM `components` LEFT OUTER JOIN `user` ON user.id_user = components.id_userp ';

      $query .= "WHERE $filter LIKE '$search%' ";

      $qtdCpnt = Database::getResultFromQuery($query);

      $qtdCpnt = $qtdCpnt->fetch(PDO::FETCH_ASSOC);

      return $qtdCpnt['COUNT(*)'];

   }

   public static function getAllQtdCpnt($filter = 1, $search = 1){

      $query = 'SELECT COUNT(*) FROM `components` ';

      $query .= "WHERE $filter LIKE '$search%'";

      $qtdPc = Database::getResultFromQuery($query);

      $qtdPc = $qtdPc->fetch(PDO::FETCH_ASSOC);

      return $qtdPc['COUNT(*)'];

   }


   public static function checkInUse(){

      $query = "SELECT COUNT(*) FROM `components` WHERE id_userp IS NOT NULL ";

      $using = Database::getResultFromQuery($query);

      $using = $using->fetch(PDO::FETCH_ASSOC);    

      return $using['COUNT(*)'];

   }

   public static function checkAvailable(){

      $query = "SELECT COUNT(*) FROM `components` WHERE id_userp IS NULL";

      $Available = Database::getResultFromQuery($query);

      $Available = $Available->fetch(PDO::FETCH_ASSOC);

      return $Available['COUNT(*)'];

   }

   public function getFilterCpnt($filter, $search){

      $offset = $this->offset;

      $offset = ($offset * $this->limit) - $this->limit;

      $query = 'SELECT *, user.name FROM `components` LEFT OUTER JOIN `user` ON user.id_user = components.id_userp WHERE ';

      for ($i=0; $i < count($filter); $i++) { 
         $query .= $filter[$i] . " LIKE '" . $search[$i]."%' AND ";
      }
      $query = substr($query, 0, -4);

      // $query .= "WHERE $filter LIKE '$search%'";

      $query .= "ORDER BY id_cpnt DESC ";

      $query .= "LIMIT " . $this->limit;

      $query .= " OFFSET " . $offset;


      $result = Database::getResultFromQuery($query);



      $result = $result->fetchAll(PDO::FETCH_ASSOC);



      return $result;

   }



   public static function getTesting(){

      $query = "SELECT `marca`,`modelo`,`id_cpnt`,`codigo` FROM `components` WHERE `numserie` LIKE '83807'";

      $result = Database::getResultFromQuery($query);

      $result = $result->fetch(PDO::FETCH_ASSOC);

      if(!empty($result)) return $result;



      $result = ['marca' => 'Não Encontrado', 'modelo' => 'Não Encontrado', 'id_cpnt' => 'Não Encontrado', 'codigo' => 'Não Encontrado'];

      return $result;

   }

}