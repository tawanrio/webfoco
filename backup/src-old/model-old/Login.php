<?php 

class Login{
      public $password;
      public $email;
      public $user;

    function __construct($email, $password){
      $this->password = $password;
      $this->email = $email;

      self::validate();
      self::checkLogin();
   }

   public function validate(){
      $errors = array();

      if(!$this->email){
         $errors[0] = 'Por favor insira o Email';
      }

      if(!$this->password){
         $errors[1] = 'Por favor insira a Senha';
      }

      if(count($errors) > 0){
         throw new ValidationException(...$errors);
      }
   }
   public static function getOne($table, $filter, $name, $comparation = '='){
      $name = Database::getFormatedValue($name);
      $query = "SELECT * FROM $table WHERE $filter $comparation $name";
      print_r($query);
      $data = Database::getResultFromQuery($query);
      $result = $data->fetch(PDO::FETCH_ASSOC);
      
      return $result;
   }

   public function checkLogin(){
      $this->user = self::getOne('user', 'email', $this->email, 'LIKE');
      if($this->user){
         if($this->password === $this->user['password']){
            self::startSession($this->user);
            return true;
         }            
      }

      throw new ValidationException('Usuário ou Senha Inválido');
   }

   public function startSession($user){
      $_SESSION['userEmail'] = $user['email'];
      $_SESSION['userId'] = $user['id_user'];
      $_SESSION['isAdmin'] = $user['is_admin'];
      
   }
}
