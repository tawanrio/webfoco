<?php 
loadModel('Computer');
loadModel('User');
loadModel('Components');
loadModel('HistoricoLimp');

$arr = [
   'marca' => 'Generics',
   'modelo' => 'bonito',
   'processador' => 'AMD Testing',
   'propriedade' => 'proprio',
   'hd' => '0Bits',
   'mac' => '11-01-19-96',
   'numserie' => '459957',
   'memoria' => '20G-NVME',
   'idpc' => '99999',
   'typepc' => 'desktop',
   'ultlimpeza' => '2023-02-01',
   'pastater' => 'pastater',
   'culer' => 'culer',
   'memorialimp' => 'memorialimp' ,
   'carcaca' => 'carcaca',
   // 'historico' => '9999-12-12/0_0_0_0'
];


// COMPUTER
// Teste 1 - Criando

try {
   Computer::newComputer($arr);
   
   $message['computer']['create'] = [ 
      "msg" => "Sucesso!",
      'idpc' => Computer::getTesting()['id_pc'],
      'marca' => Computer::getTesting()['marca'],
      "tipo" => Computer::getTesting()['type']
   ];
   
} catch (\Exception $erro) {
   $message['computer']['create']['msg'] = "Falha! : " . $erro->getMessage();
   
}

// Teste 2 - Editando

$arr['idpc'] = Computer::getTesting()['id_pc'];
$arr['historico'] = '9999-12-12/0_0_0_0';
$arr['typepc'] = 'notebook';
$arr['marca'] = 'Original';

try {
   Computer::editComputer($arr);

   $message['computer']['edit'] = [ 
      "msg" => "Sucesso!",
      'idpc' => Computer::getTesting()['id_pc'],
      'marca' => Computer::getTesting()['marca'],
      "tipo" => Computer::getTesting()['type']
   ];
   
} catch (\Exception $erro) {
   $message['computer']['edit'] = "Falha! : " . $erro->getMessage();
}

// Teste 3 - Deletando

try {
   $idpc = Computer::getTesting()['id_pc'];
   Computer::deleteComputer($idpc);
   
   $message['computer']['delete'] = [ 
      "msg" => "Sucesso!",
      'idpc' => Computer::getTesting()['id_pc'],
      'marca' => Computer::getTesting()['marca'],
      "tipo" => Computer::getTesting()['type']
   ];
   
} catch (\Exception $erro) {
   $message['computer']['edit'] = "Falha! : " . $erro->getMessage();
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Testing System</title>
   <style>
      body{
         display: flex;
         background-color: #eee;
         justify-content: center;
      }
      body > div{
         text-align: center;
         margin: 10px;
         border: solid black 1px;
         padding: 20px 30px;
         height: 500px;
         /* width: 300px; */
      }
      body > div > div{
         text-align: left;
      }
   </style>
</head>
<body>
   <table>
      <div>
         <span>Computer</span>
         <div>
            <span>Teste 1 - Criando Computador</span>
            <div><?= $message['computer']['create']['msg'] ?></div>
            <div><?= 'ID: ' . $message['computer']['create']['idpc'] ?></div>
            <div><?= 'Marca: ' . $message['computer']['create']['marca'] ?></div>
            <div><?= 'Tipo: ' . $message['computer']['create']['tipo'] ?></div>
            <br>
         </div>
         <div>
            <span>Teste 2 - Editando Computador</span>
            <div><?= $message['computer']['edit']['msg'] ?></div>
            <div><?= 'ID: ' . $message['computer']['create']['idpc'] ?></div>
            <div><?= 'Marca: ' . $message['computer']['edit']['marca'] ?></div>
            <div><?= 'Tipo: ' . $message['computer']['edit']['tipo'] ?></div>
            <br>
         </div>
         <div>
            <span>Teste 3 - Deletando Computador</span>
            <div><?= $message['computer']['delete']['msg'] ?></div>
            <div><?= 'ID: ' . $message['computer']['create']['idpc'] ?></div>
            <div><?= 'Marca: ' . $message['computer']['delete']['marca'] ?></div>
            <div><?= 'Tipo: ' . $message['computer']['delete']['tipo'] ?></div>
            <br>
         </div>
      </div>
      <br>
      <div>
         <span>User</span>
         <div>
         </div>
      </div>
      <br>
      <div>
         <span>Component</span>
         <div>
            <span>Teste 1</span>
            <div></div>
         </div>
      </div>
      
   </table>
</body>
</html>