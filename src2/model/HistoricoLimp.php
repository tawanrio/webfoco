<?php

class HistoricoLimp{
    public function __construct(){

    }

    public static function checkExistDate($valuesDb){
        
        if(!empty($valuesDb['ultlimpeza'])) return HistoricoLimp::createNewStringHistoric($valuesDb);

        
        $arr =  explode(',' , $valuesDb['historico']);
       
        foreach($arr as $value){
            $positionSeparator = strripos($value, '/');
            $dateLastClean = substr($value, 0 ,$positionSeparator);
            
            // Se existir já existir uma data igual ele retorna ultima string do historico
            if($dateLastClean == $valuesDb['ultlimpeza']) return $valuesDb['historico'];
        }

        // se não existir ele cria uma nova string de historico
        return HistoricoLimp::createNewStringHistoric($valuesDb);
    }

    public static function createNewStringHistoric($valuesDb){

        $typeClean = HistoricoLimp::formatTypeClean($valuesDb);

        $historic = $valuesDb['ultlimpeza']. '/' . $typeClean;
        if(!empty($valuesDb['historico'])){
            $historic .= ','.$valuesDb['historico'];
        }
        
        return $historic;
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

    public static function formatTypeClean($arr){
        $typeClean = [
            'pastater' => isset($arr['pastater']) ? 'pastater' : 0,
            "culer" => isset($arr['culer']) ? 'culer' : 0,
            'memoria' => isset($arr['memorialimp']) ? 'memorialimp' : 0,
            'carcaca' => isset($arr['carcaca']) ? 'carcaca' : 0
         ];
         $typeClean = implode('_', $typeClean);
         
         return $typeClean;
    }

    public function getListHistoricClean($value){

    }
}