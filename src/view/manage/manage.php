<main class="manage" id="c">

   <div class="submenu">

      <div class="title">

      <i class="fa-sharp fa-solid fa-hammer"></i>

         <span>Gerenciar</span>

      </div>

      <nav>

         <ul>

            <li><a href="index.php?page=manage&route=user" class=" <?php echo (isset($_GET['route']) && $_GET['route'] === 'user') || !isset($_GET['route']) ? 'active ' : ''; ?>">Colaboradores</a></li>

            <li><a href="index.php?page=manage&route=computer" class=" <?php echo (isset($_GET['route']) && $_GET['route'] === 'computer')  ? 'active ' : ''; ?>">Computadores</a></li>

            <li><a href="index.php?page=manage&route=components" class="<?php echo (isset($_GET['route']) && $_GET['route'] === 'components') ? 'active ' : ''; ?>">Componentes</a></li>

            <li><a href="index.php?page=manage&route=reports" class="disabled <?php echo (isset($_GET['route']) && $_GET['route'] === 'reports') ? 'active ' : ''; ?>">Relatórios</a></li>

         </ul>

      </nav>

   </div>

   <div class="down">

      <div class="container" >

         <?php 

            $route = (isset($_GET['route']) ? $_GET['route'] : 'user');

            loadRouteReports($route, $arr);

         ?>

      </div>

   </div>

</main>