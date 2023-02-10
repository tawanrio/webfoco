<?php 



class Synchronize{

   public static function synchronizeDB(){

      $reset = "UPDATE `computer` SET `id_userp`= NULL WHERE 1";
      Database::getResultFromQuery($reset);
      $query = "SELECT id_user, id_pcu FROM `user` WHERE `id_pcu` IS NOT NULL";

      $result = Database::getResultFromQuery($query);
      $result = $result->fetchAll(PDO::FETCH_ASSOC);

      foreach ($result as $key => $value) {
         $querySync = "UPDATE `computer` SET `id_userp` = '" . $value['id_user'] . "' WHERE `id_pc` = '" . $value['id_pcu'] . "'";
         $result = Database::getResultFromQuery($querySync);

      }

      return;

   }

}