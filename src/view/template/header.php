<?php if(!isset($_SESSION)){
   session_start();
}; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
   <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
   <title>Webfoco + pippie | Gerenciar</title>
   <!-- CSS -->
   <link rel="stylesheet" href="./assets/css/styles.css">
   <!-- Font Oswald and Montserrat -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;0,800;1,100&family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
   <header>
      <div class="left">
         <img src="./assets/img/logo-webfoco.png" alt="webfoco">
         <span></span>
      </div>
      <?php 
          if(count($_SESSION) > 0):; ?>
            <div class="right">
            <nav>
               <ul>
                  <li><a href="index.php?page=manage" class="<?php echo (isset($_GET['page']) && ($_GET['page'] === 'manage' || $_GET['page'] === 'logout' )) || !isset($_GET['p']) ? 'active ' : ''; ?>">Gerenciar</a></li>
                  <!-- <li><a href="index.php?p=manage" class="<?php echo (isset($_GET['page']) && $_GET['page'] === 'manage') ? 'active' : ''; ?>">Geranciar</a></li> -->
                  <!-- <li><a href="index.php?page=call" class="disabled <?php if(isset($_GET['page'])) { echo ($_GET['page'] === 'call') ? 'active' : ''; }?>">Abrir Chamado</a></li> -->
                  <li><a href="index.php?page=logout">Sair</a></li>
               </ul>
            </nav>
            </div>
         <?php endif; ?>
   </header>
   