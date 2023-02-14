<?php 
class GenerateCode{
    public static function createStringCode($valueDb){
        // $qntCpnt = Components::getQtdCpnt('tipo',$valueDb['tipo']) +1;
        // $qntCpnt = Components::getQtdCpnt('tipo',$valueDb['tipo']);
           // $CpntLength = ceil(log10($qntCpnt));
        
           switch ($valueDb['tipo']) {
              case 'monitor':
                 $codeStart = '01.02';
              break;
              case 'mouse':
                 $codeStart = '01.03';
              break;
              case 'teclado':
                 $codeStart = '01.04';
              break;
              case 'suportenot':
                 $codeStart = '01.05';
              break;
              case 'outro':
                 $codeStart = '01.06';
              break;
              }
                          
              $codigoArr = Components::getCpnt('codigo', $codeStart);
  
              $codeArr = [];
              $codeEnd = null;
           foreach ($codigoArr as $key => $value) {
              $code = substr($value['codigo'], 6);
              $code = intval($code);
              array_push($codeArr,$code);
           }
           $codeEnd = GenerateCode::retunrNumberAvailable($codeArr);
           $CpntLength = ceil(log10(($codeEnd) +1) );
  
           switch ($codeEnd) {
              case $CpntLength == 1:
                    $codeMaq = '.000';
                    break;
                 case $CpntLength == 2:
                       $codeMaq = '.00';
                       break;
              case $CpntLength == 3:
                 $codeMaq = '.0';
                 break;
              case $CpntLength == 4:
                    $codeMaq = '.';
                    break;
              }
           $codigo = $codeStart . $codeMaq . $codeEnd;
  
        return $codigo;
     }
  
     public static function retunrNumberAvailable($arrNumber){
        for ($i=0; $i < 9999; $i++) { 
           if((!in_array($i, $arrNumber)) && $i > 0){
              return $i;
           }
        }
     }
}