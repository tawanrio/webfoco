<div class="header">
   <i class="fa-solid fa-computer"></i>
   <div>
      <div class="title">Computadores</div>
      <div class="subtitle">Consulte, adicione, altere ou exclua um computador</div>
   </div>
</div>
<div class="content">
   <div class="status">
      <div class="card blue">
         <i class="fa-solid fa-chart-line"></i>

         <h3>Qtd de Computadores</h3>
         <h2><?= isset($arr['info']['qtdTotalPc']) ? $arr['info']['qtdTotalPc'] : 'Erro'; ?></h2>
      </div>
      <div class="card orange">
         <i class="fa-solid fa-laptop-code"></i>
         <h3>Em uso</h3>
         <h2><?= isset($arr['info']['using']) ? $arr['info']['using'] : 'Erro'; ?></h2>
      </div>
      <div class="card green">
         <i class="fa-solid fa-check"></i>
         <h3>Disponíveis</h3>
         <h2><?= isset($arr['info']['available']) ? $arr['info']['available'] : 'Erro'; ?></h2>
      </div>

   </div>

   <!-- <select name="propriedade" id="propriedade">
      <option value="proprio">Próprio</option>
      <option value="webfoco">Webfoco</option>
   </select> -->
   <br>
   <h2 for="filter">Filtrar Busca</h2>
   <form  method="get">
      <input type="hidden" name="page" value="manage">
      <input type="hidden" name="r" value="computer">
      <select name="filter" id="filter">
         <option value="name">Nome do Colaborador</option>
         <option value="id_pc">Nº do Computador</option>
         <option value="numserie">Numero de Série</option>
         <option value="marca">Marca do Computador</option>
         <option value="processador">Processador</option>
      </select>
      <input type="text" id="search" name="search" placeholder="Digite aqui...">
      <button class="btnSearch"><i class="fa-solid fa-magnifying-glass"></i></button>
   </form>
   <div class="table" id="tablePc">

      <div class="header">
         <div class="desc">
            <div class="title">Lista de computadores</div>
            <div class="subtitle">Lista dos computadores da empresa</div>
         </div>
         <a href="#" class="btnaddnew" id="addnewcomputer">Novo Computador</a>
      </div>
      <table>
         <thead>
            <tr>
               <th>Nº</th>
               <th>ID</th>
               <!-- <th>Tipo</th> -->
               <th>Marca</th>
               <th>Modelo</th>
               <th>Processador</th>
               <th>Memória</th>
               <th>Usuário</th>
               <th>Propriedade</th>
               <th>Limpeza</th>
               <!-- <th>HD</th> -->
               <!--<th>N/S</th>-->
               <!-- <th>Mac</th> -->
               <th id="edit">Ver</th>
               <th id="delet">Deletar</th>

            </tr>

         </thead>
         <tbody>
            <?php
            $list = ($arr['info']['np'] - 1) * $arr['info']['limit'];
            foreach ($arr as $computer => $value) :
               if ($computer !== 'info') :
                  $list = $list + 1;
                  $info = '{';
                  foreach ($value as $key => $data) {
                     $info .= "'" . trim($key) . "':'" . trim($data) . "', ";
                  }
                  $info = rtrim($info, ', ');
                  $info .= '}';

                  
                  $lastDateClean = HistoricoLimp::getLastDateClean($value['historico']);
                  
                  // Captura intervalo de dias da ultima limpeza
                  $dateLastClean = new DateTime($lastDateClean);
                  $dateNow = new DateTime();
                  $dateInterval = $dateLastClean->diff($dateNow)->days;


               

                  // Formata a Data
                  $dateFormated = empty(!$lastDateClean) ?  date_format(date_create($lastDateClean), 'd/m/y') : 'Sem Dados';
            ?>
                  <tr <?php if($dateInterval > 180){echo "style='background-color:pink'";} ?>>
                     <th><?= $list ?></th>
                     <td><?php echo $value['id_pc'] ? $value['id_pc'] : '0' ?></td>
                     <!--<td><?= $value['type'] ?></td> -->
                     <td><?php echo ucfirst($value['marca'] ? $value['marca'] : 'Sem Dados') ?></td>
                     <td><?php echo $value['modelo'] ? $value['modelo'] : 'Sem Dados' ?></td>
                     <td><?php echo $value['processador'] ? $value['processador'] : 'Sem Dados' ?></td>
                     <td><?php echo $value['memoria'] ? $value['memoria'] : 'Sem Dados' ?></td>
                     <td><?php echo ucfirst($value['name'] ? $value['name'] : 'Sem usuário') ?></td>
                     <td><?php echo ucfirst($value['propriedade'] ? $value['propriedade'] : 'Sem Dados') ?></td>
                     <td><?php echo $dateFormated ?></td>
                     <!-- <td><?php echo $value['hd'] ? $value['hd'] : 'Sem Dados' ?></td> -->
                     <!--<td><?php echo $value['numserie'] ? $value['numserie'] : 'Sem Dados' ?></td>-->
                     <!-- <td><?php echo $value['mac'] ? $value['mac'] : 'Sem Dados' ?></td> -->
                     <td id="edit">
                        <a href="#" onclick="editPc(`<?php echo $info ?>`)" class="attention btnEdit circle" title="Ver">
                           <i class="fa-solid fa-eye"></i>
                        </a>
                     </td>
                     <td id="delet">
                        <a href="#" onclick="deletePc(`<?php echo $info ?>`)" class="danger btnEdit circle" title="Deletar">
                           <i class="fa-solid fa-trash"></i>
                        </a>
                     </td>
                  </tr>
               <?php endif; ?>
            <?php endforeach; ?>
         </tbody>
      </table>
   </div>
   <div id="pgn">
      <?php

      if($arr['info']['search'] != 1 && $arr['info']['filter']){
         $filter = '&filter=' . $arr['info']['filter'];
         $filter .= '&search=' . $arr['info']['search'];
      }

      $totpg = $arr['info']['totpg'];
      if ($totpg > 1) :
         $np = $arr['info']['np'];
         $proximo = $np + 1;
         $anterior = $np - 1;
      ?>
         <a href="index.php?page=manage&r=computer<?=isset($filter) ? $filter : '';?>&np=<?= $anterior ?>#pgn" id="left" class="<?= $np > 1 ? '' : 'disabled' ?>">
            < Anterior</a>

               <a href="index.php?page=manage&r=computer<?=isset($filter) ? $filter : '';?>&np=<?= $np - 1 ?>#pgn" class="pgnum <?php echo ($np == 1) ? 'invisible' : '' ?>"><?= $np - 1 ?></a>
               <a href="index.php?page=manage&r=computer<?=isset($filter) ? $filter : '';?>&np=<?= $np ?>#pgn" class="pgnum active"><?= $np ?></a>
               <a href="index.php?page=manage&r=computer<?=isset($filter) ? $filter : '';?>&np=<?= $np + 1 ?>#pgn" class="pgnum <?php echo ($np + 1 > $totpg) ? 'invisible' : '' ?>"><?= $np + 1 ?></a>
               <a href="index.php?page=manage&r=computer<?=isset($filter) ? $filter : '';?>&np=<?= $proximo ?>#pgn" id="right" class="<?= ($totpg == $np) ? 'disabled' : '' ?>"> Próximo ></a>
            <?php endif; ?>
   </div>
</div>
<script src="./assets/js/service/Computer.js"></script>