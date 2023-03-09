<?php 
class Database{



   public static function conn(){



      $envpath = dirname(__FILE__) . '/env.ini';

      $env = parse_ini_file($envpath);



      try {



         $pdo = new PDO("mysql:dbname=" . $env['database'] . ";host=" . $env['host'], $env['username'], $env['password']);



      } catch (\Exception $e) {



         echo "Erro ao conectar o banco de dados: " . $e;



      }



      return $pdo;



   }







   public static function getResultFromQuery($query){



      try {

         $pdo = self::conn();

         // echo $query;
         $result = $pdo->query($query);

         return $result;

      } catch (\Exception $e) {



         throw new Exception("Erro ao executar comando no banco de dados: " . $e->getMessage());



      }



   }



      



   //    return $result;



   // }







   public static function getFormatedValue($value){



      switch($value){



         case is_numeric($value):



            return trim($value);



         case is_string($value):



            $value = trim($value);



            return "'$value'";



            break;



      }



   }















}



