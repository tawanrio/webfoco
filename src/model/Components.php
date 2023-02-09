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

   public static function editComponents($arr){
      $qntCpnt = Components::getQtdCpnt('tipo',$arr['tipo']) +1;
         $CpntLength = ceil(log10($qntCpnt));
         
         switch ($CpntLength) {
            case $CpntLength == 1:
               $codeMaq = '.000';
               break;
            case $CpntLength == 2:
               $codeMaq = '.00';
               break;
            case $CpntLength == 3:
               $codeMaq = '.0';
               break;
            case $CpntLength == 4:
               $codeMaq = '.';
               break;
         }

      switch ($arr['tipo']) {
         case 'monitor':
            $codigo = '01.02' . $codeMaq . $qntCpnt;
            break;
         case 'mouse':
            $codigo = '01.03' . $codeMaq . $qntCpnt;
            break;
         case 'teclado':
            $codigo = '01.04' . $codeMaq . $qntCpnt;
            break;
         case 'suportenot':
            $codigo = '01.05' . $codeMaq . $qntCpnt;
            break;
         case 'outro':
            $codigo = '01.06' . $codeMaq . $qntCpnt;
            break;

      }
      $marca = trim($arr['marca']);
      $modelo = trim($arr['modelo']);
      $tamanho = trim($arr['tamanho']);
      $numserie = trim($arr['numserie']);
      $idcpnt = isset($arr['idcpnt']) ? trim($arr['idcpnt']) : throw new Exception('idcpnt não existe');

      echo $idcpnt;
      
      $query = "UPDATE `components` SET `marca`='$marca',`modelo`='$modelo',`tamanho`='$tamanho',`numserie`='$numserie' WHERE `id_cpnt` = '$idcpnt'";

      $class = 'success';
      $text = 'Componente Cadastrado!';
   
      
      // echo $query;

      Database::getResultFromQuery($query);
      Synchronize::synchronizeDB();

      ?><script>

         msgStatus('<?=$class?>', '<?=$text?>');

      </script><?php 

      return;

   }
   public static function newComponents($arr){

         // print_r($arr);

         $qntCpnt = Components::getQtdCpnt('tipo',$arr['tipo']) +1;
         $CpntLength = ceil(log10($qntCpnt));
         
         switch ($CpntLength) {
            case $CpntLength == 1:
               $codeMaq = '.000';
               break;
            case $CpntLength == 2:
               $codeMaq = '.00';
               break;
            case $CpntLength == 3:
               $codeMaq = '.0';
               break;
            case $CpntLength == 4:
               $codeMaq = '.';
               break;
         }

      switch ($arr['tipo']) {
         case 'monitor':
            $codigo = '01.02' . $codeMaq . $qntCpnt;
            break;
         case 'mouse':
            $codigo = '01.03' . $codeMaq . $qntCpnt;
            break;
         case 'teclado':
            $codigo = '01.04' . $codeMaq . $qntCpnt;
            break;
         case 'suportenot':
            $codigo = '01.05' . $codeMaq . $qntCpnt;
            break;
         case 'outro':
            $codigo = '01.06' . $codeMaq . $qntCpnt;
            break;

      }

      // echo $codigo ;

      $tipo = trim($arr['tipo']);
      $marca = trim($arr['marca']);
      $modelo = trim($arr['modelo']);
      $tamanho = trim($arr['tamanho']);
      $numserie = trim($arr['numserie']);
      $idcpnt = isset($arr['idcpnt']) ? trim($arr['idcpnt']) : '';

      // echo $idcpnt;
      
      $query = "INSERT INTO `components` (`tipo`,`marca`,`modelo`,`tamanho`,`codigo`,`numserie`) VALUES ('$tipo','$marca','$modelo','$tamanho','$codigo','$numserie')";

      $class = 'success';
      $text = 'Componente Cadastrado!';
   
      if(self::checkExistComponents($codigo, $idcpnt)){
         $codigo = $arr['codigo'];

         $query = "UPDATE `components` SET `marca`='$marca',`modelo`='$modelo',`tamanho`='$tamanho',`numserie`='$numserie' WHERE `id_cpnt` = '$idcpnt'";
         
         $class = 'danger';
         $text = 'Componente Editado!';
      }
      
      // echo $query;

      Database::getResultFromQuery($query);
      Synchronize::synchronizeDB();

      ?><script>

         msgStatus('<?=$class?>', '<?=$text?>');

      </script><?php 

      return;
   }

   public static function checkExistComponents($codigo, $idcpnt){
      $query = "SELECT count(*) FROM `components` WHERE `codigo` = '$codigo' AND `id_cpnt` = '$idcpnt'";
      $result = Database::getResultFromQuery($query);
      $result = $result->fetch(PDO::FETCH_ASSOC);

      if($result['count(*)'] > 0){
         $_POST = [];    

         return true;
      } 
      return false;
   }

   public static function deleteComponents($codigo, $idcpnt){
      $query = "DELETE FROM `components` WHERE `codigo` = '$codigo' AND `id_cpnt` = '$idcpnt'";

      // echo $query;
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

   public static function getTesting(){
      $query = "SELECT `marca`,`modelo`,`id_cpnt`,`codigo` FROM `components` WHERE `numserie` LIKE '83807'";
      $result = Database::getResultFromQuery($query);
      $result = $result->fetch(PDO::FETCH_ASSOC);
      if(!empty($result)) return $result;

      $result = ['marca' => 'Não Encontrado', 'modelo' => 'Não Encontrado', 'id_cpnt' => 'Não Encontrado', 'codigo' => 'Não Encontrado'];
      return $result;
   }
}