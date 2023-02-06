<script>

function msgStatus(classname, text){
    setTimeout(() => {
       const msg = document.createElement('span')
       msg.className = classname;
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

   public static function newComponents($arr){

      // $historico = '';
      // $tipolimpeza = [
      //    'pastater' => isset($arr['pastater']) ? 'pastater' : 0,
      //    "culer" => isset($arr['culer']) ? 'culer' : 0,
      //    'memoria' => isset($arr['memorialimp']) ? 'memorialimp' : 0,
      //    'carcaca' => isset($arr['carcaca']) ? 'carcaca' : 0
      // ];

      // $tipolimpeza = implode('_', $tipolimpeza);
      
      // $ultLimpeza = trim(isset($arr['ultlimpeza']) ? $arr['ultlimpeza'] : '');
      
      // if(HistoricoLimp::checkExistDate($arr['historico'],$ultLimpeza)){
      //    $historico = $ultLimpeza. '/' . $tipolimpeza;

      //    if($arr['historico'] != null){
      //       $historico .= ','.$arr['historico'];
      //    }
      // }
   


      $marca = trim($arr['marca']);
      $nome = trim($arr['nome']);
      // $processador = trim($arr['processador']);
      // $propriedade = trim(isset($arr['propriedade']) ? $arr['propriedade'] : '');
      // $hd = trim($arr['hd']);
      // $tipolimpeza = trim($tipolimpeza);
      // $mac = trim($arr['mac']);
      $numserie = trim($arr['numserie']);
      // $memoria = trim($arr['memoria']);
      // $idpc = $arr['id_pc'];
      $tipo = trim($arr['tipo']);
      $codigo = trim($arr['tipo']);
      // $id = $arr['id'];

      
      $query = "INSERT INTO components (`nome`,'marca',`tipo`,`codigo`,`numserie`) VALUES ('$nome','$marca','$tipo','$codigo','$numserie')";
      $class = 'success';

      $text = 'Computador Cadastrado!';

      if(self::checkExistComponents($numserie, $codigo)){
         $query = "UPDATE `components` SET `marca`='$marca',`tipo`='$tipo',`numserie`='$numserie' WHERE `codigo` = '$codigo' AND `numserie` = '$numserie'";
         $class = 'danger';
         $text = 'Computador Editado!';
         // echo $query;
       }

      $qtdPc = Database::getResultFromQuery($query);
      Synchronize::synchronizeDB();

      ?><script>

         msgStatus('<?=$class?>', '<?=$text?>');

      </script><?php 

      return;
   }

   public static function checkExistComponents($numserie, $codigo){
      $query = "SELECT count(*) FROM `components` WHERE numserie LIKE '$numserie' OR codigo = '$codigo'";
      $result = Database::getResultFromQuery($query);
      $result = $result->fetch(PDO::FETCH_ASSOC);

      if($result['count(*)'] > 0){
         $_POST = [];    

         return true;
      } 
      return false;
   }

   public static function deleteComponents($idcpnt, $codigo){
      $query = "DELETE FROM `components` WHERE `id_cpnt` = '$idcpnt' AND `codigo`= '$codigo'";

      $delete = Database::getResultFromQuery($query);

      ?><script>
         msgStatus('danger', 'Componente Deletado!');
      </script><?php       
   }

   public static function getQtdCpnt($filter, $search){
      $query = 'SELECT COUNT(*) FROM `components` LEFT OUTER JOIN `user` ON user.id_user = components.id_userp ';
      $query .= "WHERE $filter LIKE '$search%' ";
      $qtdPc = Database::getResultFromQuery($query);
      $qtdPc = $qtdPc->fetch(PDO::FETCH_ASSOC);
      
      return $qtdPc['COUNT(*)'];
   }

   public static function getAllQtdCpnt(){
      $query = 'SELECT COUNT(*) FROM `components`';
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

   public function getFilterCpnt($filter = 1, $search = 1){
      $offset = $this->offset;
      $offset = ($offset * $this->limit) - $this->limit;
      $query = 'SELECT *, user.name FROM `components` LEFT OUTER JOIN `user` ON user.id_user = components.id_userp ';
      $query .= "WHERE $filter LIKE '$search%'";
      $query .= "ORDER BY id_cpnt DESC ";
      $query .= "LIMIT " . $this->limit;
      $query .= " OFFSET " . $offset;

      $result = Database::getResultFromQuery($query);

      $result = $result->fetchAll(PDO::FETCH_ASSOC);

      return $result;
   }
}