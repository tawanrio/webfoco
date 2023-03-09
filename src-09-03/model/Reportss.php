<?php 

class Reports{

   public $limit;
   public $offset;

   public function __construct($offset = 0, $limit = 5){
      $this->offset = $offset;
      $this->limit = $limit;
   }

   public static function getQtdPc($filter, $search){
      // $query = "SELECT COUNT(*) FROM `computer` WHERE $filter LIKE $search";
      $query = 'SELECT COUNT(*) FROM `computer` LEFT OUTER JOIN `user` ON user.id_user = computer.id_userp ';
      $query .= "WHERE $filter LIKE '$search%' ";

      $qtdPc = Database::getResultFromQuery($query);
      $qtdPc = $qtdPc->fetch(PDO::FETCH_ASSOC);
      
      return $qtdPc['COUNT(*)'];
   }

   public static function checkInUse(){
      $query = 'SELECT COUNT(*) FROM `computer` WHERE id_userp IS NOT NULL';
      $using = Database::getResultFromQuery($query);
      $using = $using->fetch(PDO::FETCH_ASSOC);
      
      return $using['COUNT(*)'];
   }
   
   public static function checkAvailable(){
      $query = 'SELECT COUNT(*) FROM `computer` WHERE id_userp IS NULL';
      $Available = Database::getResultFromQuery($query);
      $Available = $Available->fetch(PDO::FETCH_ASSOC);
     
      return $Available['COUNT(*)'];
   }

   public function getAllPc($filter = 1, $search = 1){
      $offset = $this->offset;

      $offset = ($offset * $this->limit) - $this->limit;
      $query = 'SELECT *, user.name FROM `computer` LEFT OUTER JOIN `user` ON user.id_user = computer.id_userp ';
      $query .= "WHERE $filter LIKE '$search%' ";
      $query .= "LIMIT " . $this->limit;
      $query .= " OFFSET " . $offset;

      $result = Database::getResultFromQuery($query);
      $result = $result->fetchAll(PDO::FETCH_ASSOC);

      return $result;
   }
   
  
}