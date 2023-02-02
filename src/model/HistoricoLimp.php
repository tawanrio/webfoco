<?php

class HistoricoLimp{
    public function __construct(){

    }

    public static function checkExistDate($valuesDb, $newDate){
        $arr =  explode(',' , $valuesDb);

        foreach($arr as $value){
            $positionSeparator = strripos($value, '/');
            $dateLastClean = substr($value, 0 ,$positionSeparator);


            if($dateLastClean == $newDate) return false;
        }
        return true;
    }

    public static function getLastDateClean($value){
        $arr =  explode(',' , $value);
        
        $positionSeparator = strripos($arr[0], '/');
        $dateLastClean = substr($arr[0], 0 ,$positionSeparator);
        return $dateLastClean;
    }

    public static function getLastTypeClean($value){
        $arr =  explode(',' , $value);
        $positionSeparator = strripos($arr[0], '/');
        $typeLastClean = trim(substr($arr[0], $positionSeparator +1));
        return $typeLastClean;
    }

    public function getListHistoricClean($value){

    }
}