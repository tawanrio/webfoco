<script>

function msgStatus(text, classname = 'success'){
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

   public static function editComputer($arr){

      $historico = HistoricoLimp::checkExistDate($arr) ;

      $marca = trim(isset($arr['marca']) ? $arr['marca'] : throw new Exception('marca não existe'));
      $modelo = trim(isset($arr['modelo']) ? $arr['modelo'] : throw new Exception('modelo não existe'));
      $processador = trim(isset($arr['processador']) ? $arr['processador'] : throw new Exception('processador não existe'));
      $propriedade = trim(isset($arr['propriedade']) ? $arr['propriedade'] : throw new Exception('propriedade não existe'));
      $hd = trim(isset($arr['hd']) ? $arr['hd'] : throw new Exception('hd não existe'));
      $mac = trim(isset($arr['mac']) ? $arr['mac'] : throw new Exception('mac não existe'));
      $numserie = trim(isset($arr['numserie']) ? $arr['numserie'] : throw new Exception('numserie não existe'));
      $memoria = trim(isset($arr['memoria']) ? $arr['memoria'] : throw new Exception('memoria não existe'));
      $typepc = trim(isset($arr['typepc']) ? $arr['typepc'] : throw new Exception('typepc não existe'));
      $idpc = trim(isset($arr['idpc']) ? $arr['idpc'] : throw new Exception('idpc não existe'));
      

      // print_r($arr);
      
      $query = "UPDATE `computer` SET `marca`='$marca',`propriedade`='$propriedade',`historico` = '$historico',`type`='$typepc',`numserie`='$numserie',`hd`='$hd',`processador`='$processador',`modelo`='$modelo',`mac`='$mac',`memoria`='$memoria' WHERE `id_pc` = $idpc";
      
      $text = 'Computador Editado!';

      
      Database::getResultFromQuery($query);
      Synchronize::synchronizeDB();

      ?><script>
         msgStatus('<?=$text?>');
      </script><?php 

   }

   public static function newComputer($arr){

      $historico = HistoricoLimp::checkExistDate($arr);

      $marca = trim(isset($arr['marca']) ? $arr['marca'] : throw new Exception('marca sem conteúdo'));
      $modelo = trim(isset($arr['modelo']) ? $arr['modelo'] : throw new Exception('modelo sem conteúdo'));
      $processador = trim(isset($arr['processador']) ? $arr['processador'] : throw new Exception('processador sem conteúdo'));
      $propriedade = trim(isset($arr['propriedade']) ? $arr['propriedade'] : throw new Exception('propriedade sem conteúdo'));
      $hd = trim(isset($arr['hd']) ? $arr['hd'] : throw new Exception('hd sem conteúdo'));
      $mac = trim(isset($arr['mac']) ? $arr['mac'] : throw new Exception('mac sem conteúdo'));
      $numserie = trim(isset($arr['numserie']) ? $arr['numserie'] : throw new Exception('numserie sem conteúdo'));
      $memoria = trim(isset($arr['memoria']) ? $arr['memoria'] : throw new Exception('memoria sem conteúdo'));
      $typepc = trim(isset($arr['typepc']) ? $arr['typepc'] : throw new Exception('typepc sem conteúdo'));


      $query = "INSERT INTO computer (`marca`,`propriedade`,`historico`,`modelo`,`numserie`,`memoria`,`type`, `hd`,`processador`, `mac` ) VALUES ('$marca','$propriedade','$historico','$modelo','$numserie','$memoria', '$typepc', '$hd', '$processador', '$mac')";

      $text = 'Computador Cadastrado!';

      if(self::checkExistComputer($numserie, $mac))   return throw new Exception('Computador já existe');
      
      Database::getResultFromQuery($query);
      Synchronize::synchronizeDB();

      ?><script>
         msgStatus('<?=$text?>');
      </script><?php 

   }

   public static function getOnePc($filter = 1, $search = 1){
      $query = 'SELECT * FROM `computer`  ';
      $query .= "WHERE $filter LIKE '$search%'";

      $result = Database::getResultFromQuery($query);
      $result = $result->fetch(PDO::FETCH_ASSOC);

      return $result;
   }

   public static function checkExistComputer($numserie, $mac){
      $query = "SELECT count(*) FROM `computer` WHERE `numserie` LIKE '$numserie' OR `mac` LIKE '$mac' ";
      $result = Database::getResultFromQuery($query);
      $result = $result->fetch(PDO::FETCH_ASSOC);

      if($result['count(*)'] > 0){
         $_POST = [];    

         return true;
      } 
      return false;
   }

   public static function deleteComputer($idpc){
      $query = "DELETE FROM `computer` WHERE `id_pc` = '$idpc'";

      $delete = Database::getResultFromQuery($query);

      ?><script>
         msgStatus('Computador Deletado!','danger');
      </script><?php       
   }

   public static function getQtdPc($filter, $search){
      $query = 'SELECT COUNT(*) FROM `computer` LEFT OUTER JOIN `user` ON user.id_user = computer.id_userp ';
      $query .= "WHERE $filter LIKE '$search%'  ";
      $qtdPc = Database::getResultFromQuery($query);
      $qtdPc = $qtdPc->fetch(PDO::FETCH_ASSOC);
      
      return $qtdPc['COUNT(*)'];
   }

   public static function getAllQtdPc(){
      $query = 'SELECT COUNT(*) FROM `computer`';
      $qtdPc = Database::getResultFromQuery($query);
      $qtdPc = $qtdPc->fetch(PDO::FETCH_ASSOC);

      return $qtdPc['COUNT(*)'];
   }

   public static function checkInUse(){
      $query = "SELECT COUNT(*) FROM `computer` WHERE id_userp IS NOT NULL ";
      $using = Database::getResultFromQuery($query);
      $using = $using->fetch(PDO::FETCH_ASSOC);    

      return $using['COUNT(*)'];

   }

   public static function checkAvailable(){
      $query = "SELECT COUNT(*) FROM `computer` WHERE id_userp IS NULL";
      $Available = Database::getResultFromQuery($query);
      $Available = $Available->fetch(PDO::FETCH_ASSOC);

      return $Available['COUNT(*)'];
   }

   public function getFilterPc($filter = 1, $search = 1){
      $offset = $this->offset;
      $offset = ($offset * $this->limit) - $this->limit;
      $query = 'SELECT *, user.name FROM `computer` LEFT OUTER JOIN `user` ON user.id_user = computer.id_userp ';
      $query .= "WHERE $filter LIKE '$search%' ";
      $query .= "ORDER BY id_pc DESC ";
      $query .= "LIMIT " . $this->limit;
      $query .= " OFFSET " . $offset;
      
      $result = Database::getResultFromQuery($query);
      
      $result = $result->fetchAll(PDO::FETCH_ASSOC);
      
      return $result;
   }
   
   public static function getTesting(){
      $query = "SELECT `marca`,`type`,`id_pc` FROM `computer` WHERE `numserie` LIKE '459957'";
      $result = Database::getResultFromQuery($query);
      $result = $result->fetch(PDO::FETCH_ASSOC);
      if(!empty($result)) return $result;

      $result = ['marca' => 'Não Encontrado', 'type' => 'Não Encontrado', 'id_pc' => 'Não Encontrado'];
      return $result;
   }
}