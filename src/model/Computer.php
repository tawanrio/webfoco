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
class Computer{

   public $limit;
   public $offset;

   public function __construct($offset = 0, $limit = 5){
      $this->offset = $offset;

      $this->limit = $limit;

   }

   public static function newComputer($arr){
      $marca = trim($arr['marca']);
      $modelo = trim($arr['modelo']);
      $processador = trim($arr['processador']);
      $propriedade = trim($arr['propriedade']);
      $hd = trim($arr['hd']);
      $mac = trim($arr['mac']);
      $numserie = trim($arr['numserie']);
      $memoria = trim($arr['memoria']);
      // $idpc = $arr['id_pc'];
      $typepc = trim($arr['typepc']);
      // $id = $arr['id'];
      
      $query = "INSERT INTO computer (`marca`,`propriedade`,`modelo`,`numserie`,`memoria`,`type`, `hd`,`processador`, `mac` ) VALUES ('$marca','$propriedade','$modelo','$numserie','$memoria', '$typepc', '$hd', '$processador', '$mac')";
      $class = 'success';

      $text = 'Computador Cadastrado!';

      if(self::checkExistComputer($numserie, $mac)){
         $query = "UPDATE `computer` SET `marca`='$marca',`propriedade`='$propriedade',`type`='$typepc',`numserie`='$numserie',`hd`='$hd',`processador`='$processador',`modelo`='$modelo',`mac`='$mac',`memoria`='$memoria' WHERE `mac` = '$mac' AND `numserie` = '$numserie'";
         $class = 'danger';
         $text = 'Computador Editado!';

       }

      $qtdPc = Database::getResultFromQuery($query);
      Synchronize::synchronizeDB();

      ?><script>

         msgStatus('<?=$class?>', '<?=$text?>');

      </script><?php 

      return;
   }

   public static function checkExistComputer($numserie, $mac){
      $query = "SELECT count(*) FROM `computer` WHERE numserie LIKE '$numserie' OR mac = '$mac'";
      $result = Database::getResultFromQuery($query);
      $result = $result->fetch(PDO::FETCH_ASSOC);

      if($result['count(*)'] > 0){
         $_POST = [];    

         return true;
      } 
      return false;
   }

   public static function deleteComputer($idpc, $mac){
      $query = "DELETE FROM `computer` WHERE `id_pc` = '$idpc' AND `mac`= '$mac'";

      $delete = Database::getResultFromQuery($query);

      ?><script>
         msgStatus('danger', 'Computador Deletado!');
      </script><?php       
   }

   public static function getQtdPc($filter, $search){
      $query = 'SELECT COUNT(*) FROM `computer` LEFT OUTER JOIN `user` ON user.id_user = computer.id_userp ';
      $query .= "WHERE $filter LIKE '$search%' AND NOT id_pc = '0' AND NOT id_pc = '999' ";
      $qtdPc = Database::getResultFromQuery($query);
      $qtdPc = $qtdPc->fetch(PDO::FETCH_ASSOC);
      
      return $qtdPc['COUNT(*)'];
   }

   public static function getAllQtdPc(){
      $query = 'SELECT COUNT(*) FROM `computer`';
      $query .= "WHERE NOT id_pc = '0' AND NOT id_pc = '999'";
      $qtdPc = Database::getResultFromQuery($query);
      $qtdPc = $qtdPc->fetch(PDO::FETCH_ASSOC);

      return $qtdPc['COUNT(*)'];
   }

   public static function checkInUse(){
      $query = "SELECT COUNT(*) FROM `computer` WHERE id_userp IS NOT NULL AND NOT id_pc = '999'";
      $using = Database::getResultFromQuery($query);
      $using = $using->fetch(PDO::FETCH_ASSOC);    

      return $using['COUNT(*)'];

   }

   public static function checkAvailable(){
      $query = "SELECT COUNT(*) FROM `computer` WHERE id_userp IS NULL AND NOT id_pc = '0' AND NOT id_pc = '999'";
      $Available = Database::getResultFromQuery($query);
      $Available = $Available->fetch(PDO::FETCH_ASSOC);

      return $Available['COUNT(*)'];
   }

   public function getFilterPc($filter = 1, $search = 1){
      $offset = $this->offset;
      $offset = ($offset * $this->limit) - $this->limit;
      $query = 'SELECT *, user.name FROM `computer` LEFT OUTER JOIN `user` ON user.id_user = computer.id_userp ';
      $query .= "WHERE $filter LIKE '$search%' AND NOT id_pc = '0' ";
      $query .= "LIMIT " . $this->limit;
      $query .= " OFFSET " . $offset;

      $result = Database::getResultFromQuery($query);

      $result = $result->fetchAll(PDO::FETCH_ASSOC);

      return $result;
   }
}