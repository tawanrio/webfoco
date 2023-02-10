<?php 
// loadModel('Computer');
// loadModel('User');
// loadModel('Components');
// loadModel('HistoricoLimp');
// loadModel('HistoricoMaq');

// Modelo array Computador


$computer = [
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
// Teste 1 - Criando Computer

try {
   Computer::newComputer($computer);
   
   $message['computer']['create'] = [ 
      "msg" => "Sucesso!",
      'idpc' => Computer::getTesting()['id_pc'],
      'marca' => Computer::getTesting()['marca'],
      "tipo" => Computer::getTesting()['type']
   ];
   
} catch (\Exception $erro) {
   $message['computer']['create']['msg'] = "Falha! : " . $erro->getMessage();
   
}
// Criando Computer Duplicado
try {
   Computer::newComputer($computer);
   $message['duplicateComputer']['create']['msg'] = "Falha! : " . $erro->getMessage();
   
} catch (\Exception $erro) {
   $message['duplicateComputer']['create']['msg'] = "Sucesso! - Erro: " . $erro->getMessage();
   
}

// Teste 2 - Editando Computer

$computer['idpc'] = Computer::getTesting()['id_pc'];
$computer['historico'] = '9999-12-12/0_0_0_0';
$computer['typepc'] = 'notebook';
$computer['marca'] = 'Original';

try {
   Computer::editComputer($computer);

   $message['computer']['edit'] = [ 
      "msg" => "Sucesso!",
      'idpc' => Computer::getTesting()['id_pc'],
      'marca' => Computer::getTesting()['marca'],
      "tipo" => Computer::getTesting()['type']
   ];
   
} catch (\Exception $erro) {
   $message['computer']['edit']['msg'] = "Falha! : " . $erro->getMessage();
}

// Teste 3 - Deletando Computer

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
   $message['computer']['edit']['msg'] = "Falha! : " . $erro->getMessage();
}

// USER

// Modelo array User
$user = [
   // 'iduser' => '9999',
   'time' => 'dev',
   'nome' => 'Juarez',
   'sobrenome' => 'Leite',
   'cpf' => '957838',
   'senha' => 'nopass',
   'idpcu' => '58',
   'email' => 'juarez@webfoco.com',
   'telpessoal' => '44445555',
   'telempresarial' => '22223333',
   'is_admin' => 1,
   'historicoMaq' => '',
   // 'historicoMaq' => '2023-02-08/ID: 11_HP_Intel i5_8gb'
];

// Teste 1 - Criando User

try {
   User::newUser($user);

   $message['user']['create'] = [ 
      "msg" => "Sucesso!",
      'name' => User::getTesting()['name'],
      'id_user' => User::getTesting()['id_user'],
      "sobrenome" => User::getTesting()['sobrenome']
   ];
   
} catch (\Exception $erro) {
   $message['user']['create']['msg'] = "Falha! : " . $erro->getMessage();
   
   // Criando  User Duplicado
}
try {
   User::newUser($user);

} catch (\Exception $erro) {
   $message['duplicateUser']['create']['msg'] = "Sucesso! - Erro: " . $erro->getMessage();
   
}

// Teste 2 - Editando User

$user['id'] = User::getTesting()['id_user'];
$user['historicoMaq'] = '2023-02-08/ID: 11_HP_Intel i5_8gb';
$user['sobrenome'] = 'Viera';
$user['nome'] = 'Creuza';

try {
   User::editUser($user);

   $message['user']['edit'] = [ 
      "msg" => "Sucesso!",
      'name' => User::getTesting()['name'],
      'id_user' => User::getTesting()['id_user'],
      "sobrenome" => User::getTesting()['sobrenome']
   ];
   
} catch (\Exception $erro) {
   $message['user']['edit']['msg'] = "Falha! : " . $erro->getMessage();
}

// Teste 3 - Deletando User

try {
   $iduser = User::getTesting()['id_user'];
   $cpfuser = User::getTesting()['cpf'];

   User::deleteUser($iduser, $cpfuser);
   
   $message['user']['delete'] = [ 
      "msg" => "Sucesso!",
      'name' => User::getTesting()['name'],
      'id_user' => User::getTesting()['id_user'],
      "sobrenome" => User::getTesting()['sobrenome']
   ];
   
} catch (\Exception $erro) {
   $message['user']['delete']['msg'] = "Falha! : " . $erro->getMessage();
}


// COMPONENT

// Modelo array component
$component = [
   // 'iduser' => '9999',
   'numserie' => '83807',
   'marca' => 'WebPippe',
   'tipo' => 'monitor',
   'codigo' => '01.07.0010',
   'senha' => 'nopass',
   'idpcu' => '58',
   'modelo' => 'Pequeno',
   'tamanho' => '15',
   'id_userp' => '4',
];

// Teste 1 - Criando component

try {
   Components::newComponents($component);
   

   $message['components']['create'] = [ 
      "msg" => "Sucesso!",
      'marca' => Components::getTesting()['marca'],
      'id_cpnt' => Components::getTesting()['id_cpnt'],
      "modelo" => Components::getTesting()['modelo'],
      "codigo" => Components::getTesting()['codigo']
   ];
   
} catch (\Exception $erro) {
   $message['components']['create']['msg'] = "Falha! : " . $erro->getMessage();
   
}

// // Teste 2 - Editando component

$component['idcpnt'] = Components::getTesting()['id_cpnt'];
$component['historicoMaq'] = '2023-02-08/ID: 11_HP_Intel i5_8gb';
$component['modelo'] = 'Grande';
$component['marca'] = 'MaisFoco';

try {
   Components::editComponents($component);

   $message['components']['edit'] = [ 
      "msg" => "Sucesso!",
      'marca' => Components::getTesting()['marca'],
      'id_cpnt' => Components::getTesting()['id_cpnt'],
      "modelo" => Components::getTesting()['modelo'],
      "codigo" => Components::getTesting()['codigo']
   ];
   
} catch (\Exception $erro) {
   $message['components']['edit']['msg'] = "Falha! : " . $erro->getMessage();
}

// Teste 3 - Deletando component

try {
   $idcpnt = Components::getTesting()['id_cpnt'];

   Components::deleteComponents($idcpnt);
   
   $message['components']['delete'] = [ 
      "msg" => "Sucesso!",
      'marca' => Components::getTesting()['marca'],
      'id_cpnt' => Components::getTesting()['id_cpnt'],
      "modelo" => Components::getTesting()['modelo'],
      "codigo" => Components::getTesting()['codigo']
   ];
   
} catch (\Exception $erro) {
   $message['component']['delete']['msg'] = "Falha! : " . $erro->getMessage();
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
         align-items: center;
         flex-direction: row;
      }
      body > div{
         text-align: center;
         margin: 10px;
         border: solid black 1px;
         padding: 20px 50px;
         height: 500px;
      }
      body > div > div{
         text-align: left;
      }
   </style>
</head>
<body>
      <div>
         <span>Computer</span>
         <div>
            <span>Teste 1 - Criando Computador</span>
            <div><?= $message['computer']['create']['msg'] ?></div>
            <div><?= 'ID: ' . $message['computer']['create']['idpc'] ?></div>
            <div><?= 'Marca: ' . $message['computer']['create']['marca'] ?></div>
            <div><?= 'Tipo: ' . $message['computer']['create']['tipo'] ?></div>          
            <br>
            <span>Criando Computador Duplicado</span>
            <div><?= $message['duplicateComputer']['create']['msg'] ?></div>
            <br>
         </div>
         <div>
            <span>Teste 2 - Editando Computador</span>
            <div><?= $message['computer']['edit']['msg'] ?></div>
            <div><?= 'ID: ' . $message['computer']['edit']['idpc'] ?></div>
            <div><?= 'Marca: ' . $message['computer']['edit']['marca'] ?></div>
            <div><?= 'Tipo: ' . $message['computer']['edit']['tipo'] ?></div>
            <br>
         </div>
         <div>
            <span>Teste 3 - Deletando Computador</span>
            <div><?= $message['computer']['delete']['msg'] ?></div>
            <div><?= 'ID: ' . $message['computer']['delete']['idpc'] ?></div>
            <div><?= 'Marca: ' . $message['computer']['delete']['marca'] ?></div>
            <div><?= 'Tipo: ' . $message['computer']['delete']['tipo'] ?></div>
            <br>
         </div>
      </div>
      <br>
      <div>
         <span>User</span>
         <div>
            <span>Teste 1 - Criando Usuário</span>
            <div><?= $message['user']['create']['msg'] ?></div>
            <div><?= 'ID: ' . $message['user']['create']['id_user'] ?></div>
            <div><?= 'Nome: ' . $message['user']['create']['name'] ?></div>
            <div><?= 'Sobrenome: ' . $message['user']['create']['sobrenome'] ?></div>
            <br>
            <span>Criando Usuário Duplicado</span>
            <div><?= $message['duplicateUser']['create']['msg'] ?></div>
            <br>
         </div>
         <div>
            <span>Teste 2 - Editando Usuário</span>
            <div><?= $message['user']['edit']['msg'] ?></div>
            <div><?= 'ID: ' . $message['user']['edit']['id_user'] ?></div>
            <div><?= 'Nome: ' . $message['user']['edit']['name'] ?></div>
            <div><?= 'Sobrenome: ' . $message['user']['edit']['sobrenome'] ?></div>
            <br>
         </div>
         <div>
            <span>Teste 3 - Deletando Usuário</span>
            <div><?= $message['user']['delete']['msg'] ?></div>
            <div><?= 'ID: ' . $message['user']['delete']['id_user'] ?></div>
            <div><?= 'Nome: ' . $message['user']['delete']['name'] ?></div>
            <div><?= 'Sobrenome: ' . $message['user']['delete']['sobrenome'] ?></div>
            <br>
         </div>
      </div>
      <br>
      <div>
         <span>Components</span>
         <div>
            <span>Teste 1 - Criando Componente</span>
            <div><?= $message['components']['create']['msg'] ?></div>
            <div><?= 'ID: ' . $message['components']['create']['id_cpnt'] ?></div>
            <div><?= 'Marca: ' . $message['components']['create']['marca'] ?></div>
            <div><?= 'Modelo: ' . $message['components']['create']['modelo'] ?></div>
            <div><?= 'Codigo: ' . $message['components']['create']['codigo'] ?></div>
            <br>
            
         </div>
         <div>
            <span>Teste 2 - Editando Componente</span>
            <div><?= $message['components']['edit']['msg'] ?></div>
            <div><?= 'ID: ' . $message['components']['edit']['id_cpnt'] ?></div>
            <div><?= 'Marca: ' . $message['components']['edit']['marca'] ?></div>
            <div><?= 'Modelo: ' . $message['components']['edit']['modelo'] ?></div>
            <div><?= 'Codigo: ' . $message['components']['edit']['codigo'] ?></div>
            <br>
         </div>
         <div>
            <span>Teste 3 - Deletando Componente</span>
            <div><?= $message['components']['delete']['msg'] ?></div>
            <div><?= 'ID: ' . $message['components']['delete']['id_cpnt'] ?></div>
            <div><?= 'Marca: ' . $message['components']['delete']['marca'] ?></div>
            <div><?= 'Modelo: ' . $message['components']['delete']['modelo'] ?></div>
            <div><?= 'Codigo: ' . $message['components']['delete']['codigo'] ?></div>
            <br>
         </div>
      </div>
      <br>
     
      
</body>
</html>