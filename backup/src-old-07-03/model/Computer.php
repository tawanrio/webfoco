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

      $codigo = GenerateCode::createStringCode($arr);

      $marca = trim(isset($arr['marca']) ? $arr['marca'] :  '');
      $modelo = trim(isset($arr['modelo']) ? $arr['modelo'] :  '');
      $processador = trim(isset($arr['processador']) ? $arr['processador'] :  '');
      $propriedade = trim(isset($arr['propriedade']) ? $arr['propriedade'] :  '');
      $hd = trim(isset($arr['hd']) ? $arr['hd'] :  '');
      $mac = trim(isset($arr['mac']) ? $arr['mac'] :  '');
      $ipv6 = trim(isset($arr['ipv6']) ? $arr['ipv6'] :  '');
      $memoria = trim(isset($arr['memoria']) ? $arr['memoria'] :  '');
      $tipo = trim(isset($arr['tipo']) ? $arr['tipo'] :  '');
      $idpc = trim(isset($arr['idpc']) ? $arr['idpc'] :  '');
      

      
      $query = "UPDATE `computer` SET `marca`='$marca',`propriedade`='$propriedade',`historico` = '$historico',`tipo`='$tipo',`ipv6`='$ipv6',`hd`='$hd',`processador`='$processador',`modelo`='$modelo',`mac`='$mac',`memoria`='$memoria' WHERE `id_pc` = $idpc";
      
      $text = 'Computador Editado!';

      
      Database::getResultFromQuery($query);
      Synchronize::synchronizeDB();

      ?><script>
         msgStatus('<?=$text?>');
      </script><?php 

   }

   public static function newComputer($arr){

      $historico = HistoricoLimp::checkExistDate($arr);
      $codigo = GenerateCode::createStringCode($arr);

      $marca = trim(isset($arr['marca']) ? $arr['marca'] :  '');
      $modelo = trim(isset($arr['modelo']) ? $arr['modelo'] :  '');
      $processador = trim(isset($arr['processador']) ? $arr['processador'] :  '');
      $propriedade = trim(isset($arr['propriedade']) ? $arr['propriedade'] :  '');
      $hd = trim(isset($arr['hd']) ? $arr['hd'] :  '');
      $mac = trim(isset($arr['mac']) ? $arr['mac'] :  '');
      $ipv6 = trim(isset($arr['ipv6']) ? $arr['ipv6'] :  '');
      $memoria = trim(isset($arr['memoria']) ? $arr['memoria'] :  '');
      $tipo = trim(isset($arr['tipo']) ? $arr['tipo'] :  '');


      $query = "INSERT INTO computer (`marca`,`propriedade`,`historico`,`modelo`,`ipv6`,`memoria`,`tipo`, `hd`,`processador`, `mac`, `codigo` ) VALUES ('$marca','$propriedade','$historico','$modelo','$ipv6','$memoria', '$tipo', '$hd', '$processador', '$mac', '$codigo')";

      $text = 'Computador Cadastrado!';

      if(self::checkExistComputer($ipv6, $mac)){
         ?><script>
         msgStatus('Computador Já Existe!','danger');
      </script><?php  
         throw new Exception();
      }  
      
      
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

   public static function checkExistComputer($ipv6, $mac){
      $query = "SELECT count(*) FROM `computer` WHERE `ipv6` LIKE '$ipv6' OR `mac` LIKE '$mac' ";
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
      $query = "SELECT COUNT(*) FROM `computer` WHERE id_userp IS NULL AND propriedade = 'webfoco'";
      $Available = Database::getResultFromQuery($query);
      $Available = $Available->fetch(PDO::FETCH_ASSOC);

      return $Available['COUNT(*)'];
   }

   public static function computerAvailable(){
      $query = 'SELECT id_pc, marca, processador, memoria, codigo FROM `computer` WHERE id_userP IS NULL';
      $Available = Database::getResultFromQuery($query);
      $Available = $Available->fetchAll(PDO::FETCH_ASSOC);

      // print_r($Available);
      return $Available;
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
      $query = "SELECT `marca`,`type`,`id_pc` FROM `computer` WHERE `ipv6` LIKE '459957'";
      $result = Database::getResultFromQuery($query);
      $result = $result->fetch(PDO::FETCH_ASSOC);
      if(!empty($result)) return $result;

      $result = ['marca' => 'Não Encontrado', 'tipo' => 'Não Encontrado', 'id_pc' => 'Não Encontrado'];
      return $result;
   }
}