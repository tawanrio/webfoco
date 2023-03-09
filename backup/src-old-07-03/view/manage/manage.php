<main class="manage" id="c">
   <div class="submenu">
      <div class="title">
      <i class="fa-sharp fa-solid fa-hammer"></i>
         <span>Gerenciar</span>
      </div>
      <nav>
         <ul>
            <li><a href="index.php?page=manage&r=user" class=" <?php echo (isset($_GET['r']) && $_GET['r'] === 'user') || !isset($_GET['r']) ? 'active ' : ''; ?>">Colaboradores</a></li>
            <li><a href="index.php?page=manage&r=computer" class=" <?php echo (isset($_GET['r']) && $_GET['r'] === 'computer')  ? 'active ' : ''; ?>">Computadores</a></li>
            <li><a href="index.php?page=manage&r=components" class="<?php echo (isset($_GET['r']) && $_GET['r'] === 'components') ? 'active ' : ''; ?>">Componentes</a></li>
            <li><a href="index.php?page=manage&r=reports" class="disabled <?php echo (isset($_GET['r']) && $_GET['r'] === 'reports') ? 'active ' : ''; ?>">Relatórios</a></li>
         </ul>
      </nav>
   </div>
   <div class="down">
      <div class="container" >
         <?php 
            $route = (isset($_GET['r']) ? $_GET['r'] : 'user');

            loadRouteReports($route, $arr);
         ?>
      </div>
   </div>
</main>