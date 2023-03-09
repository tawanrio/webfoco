<?php

class HistoricoMaq{
    public function __construct(){

    }

    public static function checkExistHistoric($arr){
        try{
            if(!($arr['idpcu'] == 'null' || $arr['idpcu'] == '')){
                $computer = Computer::getOnePc('id_pc',$arr['idpcu']);

                $user = User::getIdUser($arr['id']);
                
                $dateNow = date('Y-m-d');
                $historicoMaq = $dateNow .'/ID: ' . $computer['id_pc'] . '_' . $computer['marca'] . '_' . $computer['processador'] . '_' . $computer['memoria'];
                
                
                if(isset($arr['id'])){
                    if($user['historicoMaq'] != ''){
                        $historicoMaq .= ',' . $user['historicoMaq'];
                    }
                }

                
                return $historicoMaq;
            }
            
        }catch(Exception $error){
            ?><script>
            msgStatus('<?='danger'?>', '<?='Desculpe algo inesperado aconteceu! - Erro: ' . $error->getMessage() ?>');
         </script><?php 
        }
    }
}