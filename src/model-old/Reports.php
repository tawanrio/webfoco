<?php 

class Reports{

   public $limit;
   public $offset;

   public function __construct($offset = 0, $limit = 7){
      $this->offset = $offset;
      $this->limit = $limit;
   }

   public static function getQtdPc(){
      $query = 'SELECT COUNT(*) FROM `computer` WHERE 1';
      $qtdPc = Database::getResultFromQuery($query);
      $qtdPc = $qtdPc->fetch(PDO::FETCH_ASSOC);
      
      return $qtdPc['COUNT(*)'];
   }

   public static function checkInUse(){
      $query = 'SELECT COUNT(*) FROM `computer` WHERE id_user IS NOT NULL';
      $using = Database::getResultFromQuery($query);
      $using = $using->fetch(PDO::FETCH_ASSOC);
      
      return $using['COUNT(*)'];
   }
   
   public static function checkAvailable(){
      $query = 'SELECT COUNT(*) FROM `computer` WHERE id_user IS NULL';
      $Available = Database::getResultFromQuery($query);
      $Available = $Available->fetch(PDO::FETCH_ASSOC);
     
      return $Available['COUNT(*)'];
   }

   public function getAllPc(){
      $offset = $this->offset;

      $offset = ($offset * $this->limit) - $this->limit;
      $query = 'SELECT *, user.name FROM `computer` LEFT OUTER JOIN `user` ON user.id_user = computer.id_user ';
      $query .= "LIMIT " . $this->limit;
      $query .= " OFFSET " . $offset;
      $qtdPc = Database::getResultFromQuery($query);
      $qtdPc = $qtdPc->fetchAll(PDO::FETCH_ASSOC);

      return $qtdPc;
   }
}