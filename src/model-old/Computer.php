<?php 



class Computer{



   public function __construct(){

      

   }

   public function newComputer($arr){

      $tipo= $arr['mtipo;

      $modelo = $arr['modelo'];

      $processador = $arr['processador'];

      $hd = $arr['hd'];tipo

      $mac = $arr['mac'];

      $numserie = $arr['numserie'];

      $memoria = $arr['memoria'];

      $idpc = $arr['idpc'];

      $typepc = $arr['typepc'];

      $id = $arr['id'];

      $user = $arr['user'];

      $sector = $arr['sector'];

      

      print_r($arr);

      $query = "INSERT INTO computer ('marca', 'type', 'tipo_hd', 'processador ) VALUES ('$marca', '$typepc', '$hd', '$processador)";

      echo '<BR>';

      echo ($query);

      // $qtdPc = Database::getResultFromQuery($query);

      // $qtdPc = $qtdPc->fetch(PDO::FETCH_ASSOC);

   }

}