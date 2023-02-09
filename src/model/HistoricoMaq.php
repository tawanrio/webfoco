<?php

class HistoricoMaq{
    public function __construct(){

    }

    public static function checkExistHistoric($arr){
        try{
            if(!($arr['idpcu'] == 'null' || $arr['idpcu'] == '')){
                $computer = Computer::getOnePc('id_pc',$arr['idpcu']);
                
                $dateNow = date('Y-m-d');
                $historicoMaq = $dateNow .'/ID: ' . $computer['id_pc'] . '_' . $computer['marca'] . '_' . $computer['processador'] . '_' . $computer['memoria'];
                
                if(isset($arr['iduser'])){
                    $user = User::getIdUser($arr['iduser']);
                    if($user['historicoMaq'] != ''){
                        $historicoMaq .= ',' . $user['historicoMaq'];
                    }
                }
                // $historicoMaq = $user['historicoMaq'];
                // print_r($user);
                
                return $historicoMaq;
            }
            
        }catch(Exception $error){
            ?><script>
            msgStatus('<?='danger'?>', '<?='Desculpe algo inesperado aconteceu! - Erro: ' . $error->getMessage() ?>');
         </script><?php 
        }
    }
}