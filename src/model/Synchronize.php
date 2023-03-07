<?php 







class Synchronize{



   public static function synchronizeDB(){



      $resetComputer = "UPDATE `computer` SET `id_userp`= NULL , `status` = 'disponivel' WHERE 1";
      $resetUser = "UPDATE `user` SET `statusUser` = 'disponivel' WHERE 1";

      Database::getResultFromQuery($resetComputer);
      Database::getResultFromQuery($resetUser);

      $query = "SELECT id_user, id_pcu FROM `user` WHERE `id_pcu` IS NOT NULL AND `id_pcu` > 0";



      $result = Database::getResultFromQuery($query);

      $result = $result->fetchAll(PDO::FETCH_ASSOC);



      foreach ($result as $key => $value) {

         $querySync = "UPDATE `computer` SET `id_userp` = '" . $value['id_user'] . "', `status` = 'usando' WHERE `id_pc` = '" . $value['id_pcu'] . "'";
         $querySyncUser = "UPDATE `user` SET `statusUser` = 'usando ' WHERE `id_user` = '" . $value['id_user'] . "' ";

         Database::getResultFromQuery($querySync);
         Database::getResultFromQuery($querySyncUser);

      }



      return;



   }



}