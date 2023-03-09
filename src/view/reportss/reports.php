<main class="reports">
   <div class="submenu">
      <div class="title">
         <i class="fa-solid fa-chart-line"></i>
         <span>Relatórios</span>
      </div>
      <nav>
         <ul>
            <li><a href="index.php?p=reports&r=pc" class="<?php echo (isset($_GET['r']) && $_GET['r'] === 'pc') || !isset($_GET['r']) ? 'active ' : ''; ?>">Computadores</a></li>
            <li><a href="index.php?p=reports&r=user" class="disabled <?php echo (isset($_GET['r']) && $_GET['r'] === 'user') ? 'active ' : ''; ?>">Usuários</a></li>
            <li><a href="index.php?p=reports&r=components" class="disabled <?php echo (isset($_GET['r']) && $_GET['r'] === 'components') ? 'active ' : ''; ?>">Componentes</a></li>
         </ul>
      </nav>
   </div>
   <div class="down">
      <div class="container">
         <?php 
         $route = 'reports/' . (isset($_GET['r']) ? $_GET['r'] : 'pc');
         loadRouteReports($route, $arr);
         ?>
   </div>
   
</div>
</main>