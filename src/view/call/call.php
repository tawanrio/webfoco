<main class="call">
   <div class="submenu">
      <span>Abrir Chamado</span>
      <nav>
         <ul>
            <li><a href="index.php?p=call&r=pc" class="<?php echo (isset($_GET['r']) && $_GET['r'] === 'pc') || !isset($_GET['r']) ? 'active ' : ''; ?>">Computadores</a></li>
            <li><a href="index.php?p=call&r=user" class="disabled <?php echo (isset($_GET['r']) && $_GET['r'] === 'user') ? 'active ' : ''; ?>">Usuários</a></li>
            <li><a href="index.php?p=call&r=components" class="disabled <?php echo (isset($_GET['r']) && $_GET['r'] === 'components') ? 'active ' : ''; ?>">Componentes</a></li>
         </ul>
      </nav>
   </div>
   <div class="down">
      <div class="container">
         teste
         <?php 
            // $route = 'call/' . (isset($_GET['r']) ? $_GET['r'] : 'pc');

            // loadRouteReports($route);
         ?>
      </div>
   </div>
</main>