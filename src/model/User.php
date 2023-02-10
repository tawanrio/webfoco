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

class User{

   public $limit;
   public $offset;

   public function __construct($offset = 0, $limit = 5){
      $this->offset = $offset;
      $this->limit = $limit;

   }

   public static function editUser($arr){

      $historicoMaq = HistoricoMaq::checkExistHistoric($arr);

      $time = trim(isset($arr['time']) ? $arr['time'] :  new Exception('time não existe'));
      $nome = trim(isset($arr['nome']) ? $arr['nome'] :  new Exception('nome não existe'));
      $sobrenome = trim(isset($arr['sobrenome']) ? $arr['sobrenome'] :  new Exception('sobrenome não existe'));
      $cpf = trim(isset($arr['cpf']) ? $arr['cpf'] :  new Exception('cpf não existe'));
      $telpessoal = trim(isset($arr['telpessoal']) ? $arr['telpessoal'] :  new Exception('telpessoal não existe'));
      $telempresarial = trim(isset($arr['telempresarial']) ? $arr['telempresarial'] :  new Exception('telempresarial não existe'));
      $email = trim(isset($arr['email']) ? $arr['email'] :  new Exception('email não existe'));
      $senha = trim(isset($arr['senha']) ? $arr['senha'] :  new Exception('senha não existe'));
      $iduser = trim(isset($arr['id']) ? $arr['id'] :  new Exception('id não existe'));
      $idpcu = self::getFormateddValue($arr['idpcu']); 
      

      $query = "UPDATE `user` SET `time`='$time',`name`='$nome',`sobrenome`='$sobrenome',`cpf` = '$cpf',`password`='$senha',`historicoMaq` = '$historicoMaq',`id_pcu`= $idpcu,`email`='$email',`telPessoal`= '$telpessoal',`telEmpresarial`= $telempresarial WHERE `id_user` = '$iduser'";
         
      $text = 'Usuário Editado!';

      
      Database::getResultFromQuery($query);
      Synchronize::synchronizeDB();

      ?><script>
         msgStatus('<?=$text?>');
      </script><?php 

   }
   public static function newUser($arr){

      $historicoMaq = HistoricoMaq::checkExistHistoric($arr);

      
      $time = trim(isset($arr['time']) ? $arr['time'] :  new Exception('time não existe'));
      $nome = trim(isset($arr['nome']) ? $arr['nome'] :  new Exception('nome não existe'));
      $sobrenome = trim(isset($arr['sobrenome']) ? $arr['sobrenome'] :  new Exception('sobrenome não existe'));
      $cpf = trim(isset($arr['cpf']) ? $arr['cpf'] :  new Exception('cpf não existe'));
      $telpessoal = trim(isset($arr['telpessoal']) ? $arr['telpessoal'] :  new Exception('telpessoal não existe'));
      $telempresarial = trim(isset($arr['telempresarial']) ? $arr['telempresarial'] :  new Exception('telempresarial não existe'));
      $email = trim(isset($arr['email']) ? $arr['email'] :  new Exception('email não existe'));
      $senha = trim(isset($arr['senha']) ? $arr['senha'] :  new Exception('senha não existe'));
      $idpcu = self::getFormateddValue($arr['idpcu']); 


      $query = "INSERT INTO `user`( `time`, `name`, `sobrenome`,`cpf`, `password`,`historicoMAq`, `id_pcu`, `email`, `telPessoal`, `telEmpresarial`) VALUES ('$time','$nome','$sobrenome','$cpf','$senha','$historicoMaq', $idpcu, '$email', '$telpessoal', $telempresarial)";
      $text = 'Usuário Cadastrado!';


      if(self::checkExistUser($cpf))  return  new Exception('Usuário já existe');
   
      //  echo $query;
      Database::getResultFromQuery($query);
      Synchronize::synchronizeDB();

      ?><script>
         msgStatus('<?=$text?>');
      </script><?php 

      return;
   }

   public static function getFormateddValue($value){
      if($value == ' ') return 'null';
      if($value == 0) return 'null';
      if($value == 'null') return 'null';
      if(is_null($value)) return 'null';
      if(is_string($value)) return "'$value'";
      if(is_numeric($value)) return $value;

  }

   public static function checkExistUser($cpf, $iduser = null){
      $query = "SELECT count(*) FROM `user` WHERE id_user = '$iduser' OR CPF = '$cpf' ";
      $result = Database::getResultFromQuery($query);
      $result = $result->fetch(PDO::FETCH_ASSOC);

      if($result['count(*)'] > 0){
         $_POST = [];

         return true;
      } 
      return false;
   }

   public static function deleteUser($iduser, $cpf){
      $query = "DELETE FROM `user` WHERE `id_user` = '$iduser' AND `CPF`= '$cpf'";
      Database::getResultFromQuery($query);

      ?><script>
         msgStatus( 'Usuário Deletado!','danger');
      </script><?php       
   }

   public static function getQtdUser($filter, $search){
      $query = 'SELECT COUNT(*) FROM `user`';
      $query .= "WHERE $filter LIKE '$search%' ";

      $qtdPc = Database::getResultFromQuery($query);
      $qtdPc = $qtdPc->fetch(PDO::FETCH_ASSOC);

      return $qtdPc['COUNT(*)'];
   }

   public static function getAllQtdUser(){
      $query = 'SELECT COUNT(*) FROM `user`';
      $qtdPc = Database::getResultFromQuery($query);
      $qtdPc = $qtdPc->fetch(PDO::FETCH_ASSOC);

      return $qtdPc['COUNT(*)'];
   }

   public static function checkInUse(){
      $query = 'SELECT COUNT(*) FROM `user` WHERE id_user IS NOT NULL';
      $using = Database::getResultFromQuery($query);
      $using = $using->fetch(PDO::FETCH_ASSOC);

      return $using['COUNT(*)'];
   }

   public static function checkAvailable(){
      $query = 'SELECT COUNT(*) FROM `user`';
      $Available = Database::getResultFromQuery($query);
      $Available = $Available->fetch(PDO::FETCH_ASSOC);

      return $Available['COUNT(*)'];

   }

   public function getFilterUser($filter = 1, $search = 1){
      $offset = $this->offset;

      $offset = ($offset * $this->limit) - $this->limit;
      $query = 'SELECT * FROM `user` LEFT OUTER JOIN `computer` ON computer.id_pc = user.id_pcu ';
      $query .= "WHERE $filter LIKE '$search%' ";
      $query .= "LIMIT " . $this->limit;
      $query .= " OFFSET " . $offset;

      $result = Database::getResultFromQuery($query);
      $result = $result->fetchAll(PDO::FETCH_ASSOC);

      return $result;
   }
   public static function getIdUser($id){
      $query = 'SELECT * FROM `user` ';
      $query .= "WHERE id_user = '$id' ";

      $result = Database::getResultFromQuery($query);
      $result = $result->fetch(PDO::FETCH_ASSOC);

      return $result;
   }

   public static function computerAvailable(){
      $query = 'SELECT id_pc, marca, processador, memoria FROM `computer` WHERE id_userP IS NULL';
      $Available = Database::getResultFromQuery($query);
      $Available = $Available->fetchAll(PDO::FETCH_ASSOC);

      return $Available;
   }
 
   public static function getAllPc(){
      $query = 'SELECT *, user.name FROM `computer` LEFT OUTER JOIN `user` ON user.id_user = computer.id_userp ';
      $result = Database::getResultFromQuery($query);
      $result = $result->fetchAll(PDO::FETCH_ASSOC);

      return $result;
   }

   public static function getTesting(){
      $query = "SELECT `name`,`sobrenome`,`id_user`,`cpf` FROM `user` WHERE `CPF` LIKE '957838'";
      $result = Database::getResultFromQuery($query);
      $result = $result->fetch(PDO::FETCH_ASSOC);
      if(!empty($result)) return $result;

      $result = ['name' => 'Não Encontrado', 'sobrenome' => 'Não Encontrado', 'id_user' => 'Não Encontrado', 'cpf' => 'Não Encontrado'];
      return $result;
   }
}