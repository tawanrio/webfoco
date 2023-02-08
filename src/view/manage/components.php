<div class="header">
   <i class="fa-solid fa-keyboard"></i>
   <div>
      <div class="title">Componentes</div>
      <div class="subtitle">Consulte, adicione, altere ou exclua um componente</div>
   </div>
</div>
<div class="content">
   <div class="status">
      <div class="card blue">
         <i class="fa-solid fa-chart-line"></i>
         <h3>Monitor</h3>
         <h2><?= isset($arr['info']['qtdTotalPc']) ? $arr['info']['qtdTotalPc'] : 'Erro'; ?></h2>
      </div>
      <div class="card orange">
         <i class="fa-solid fa-laptop-code"></i>
         <h3>Mouse</h3>
         <h2><?= isset($arr['info']['using']) ? $arr['info']['using'] : 'Erro'; ?></h2>
      </div>
      <div class="card green">
         <i class="fa-solid fa-check"></i>
         <h3>Teclado</h3>
         <h2><?= isset($arr['info']['available']) ? $arr['info']['available'] : 'Erro'; ?></h2>
      </div>
      <div class="card blue">
         <i class="fa-solid fa-chart-line"></i>
         <h3>Suporte Notebook</h3>
         <h2><?= isset($arr['info']['qtdTotalPc']) ? $arr['info']['qtdTotalPc'] : 'Erro'; ?></h2>
      </div>
      <div class="card green">
         <i class="fa-solid fa-check"></i>
         <h3>Outros</h3>
         <h2><?= isset($arr['info']['available']) ? $arr['info']['available'] : 'Erro'; ?></h2>
      </div>

      <!-- <div class="card maintenance">
            <i class="fa-solid fa-check"></i>
            <h3>Em Manutenção</h3>
            <h2><?= isset($arr['info']['available']) ? $arr['info']['available'] : 'Erro'; ?></h2>
         </div> -->
   </div>

   <br>
   <h2 for="filter">Filtrar Busca</h2>
   <form action="index.php?page=manage&r=components" method="post">
      <select name="filter" id="filter">
         <option value="name">Nome do Colaborador</option>
         <option value="id_pc">Nº do Pc</option>
         <option value="numserie">Numero de Série</option>
         <option value="marca">Marca do Pc</option>
         <option value="processador">Processador</option>
      </select>
      <input type="text" id="search" name="search" placeholder="Digite aqui...">
      <button class="btnSearch"><i class="fa-solid fa-magnifying-glass"></i></button>
   </form>
   <div class="table" id="tablePc">

      <div class="header">
         <div class="desc">
            <div class="title">Lista de componentes</div>
            <div class="subtitle">Lista dos componentes da empresa</div>
         </div>
         <a href="#" class="btnaddnew" id="addnewcomponents">Novo Componente</a>
      </div>
      <table>
         <thead>
            <tr>
               <th>Nº</th>
               <th>ID</th>
               <th>Tipo</th>
               <th>Marca</th>
               <th>N/S</th>
               <th>Codigo</th>
               <th id="edit">Ver</th>
               <th id="delet">Deletar</th>
               <!-- <th>Nome</th> -->
               <!-- <th>Processador</th> -->
               <!-- <th>Memória</th> -->
               <!-- <th>Usuário</th> -->
               <!-- <th>Propriedade</th> -->
               <!-- <th>Limpeza</th> -->
               <!-- <th>HD</th> -->

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

                  
                  // $lastDateClean = HistoricoLimp::getLastDateClean($value['historico']);
                  
                  // Captura intervalo de dias da ultima limpeza
                  // $dateLastClean = new DateTime($lastDateClean);
                  // $dateNow = new DateTime();
                  // $dateInterval = $dateLastClean->diff($dateNow)->days;


               

                  // Formata a Data
                  // $dateFormated = empty(!$lastDateClean) ?  date_format(date_create($lastDateClean), 'd/m/y') : 'Sem Dados';
            ?>
                  <!-- <tr <?php if($dateInterval > 180){echo "style='background-color:pink'";} ?>> -->
                  <tr >
                     <th><?= $list ?></th>
                     <td><?php echo $value['id_cpnt'] ? $value['id_cpnt'] : '0' ?></td>
                     <td><?php echo ucfirst($value['tipo'] ? $value['tipo'] : 'Sem Dados') ?></td>
                     <td><?php echo ucfirst($value['marca'] ? $value['marca'] : 'Sem Dados') ?></td>
                     <td><?php echo $value['numserie'] ? $value['numserie'] : 'Sem Dados' ?></td>
                     <td><?php echo $value['codigo'] ? $value['codigo'] : 'Sem Dados' ?></td>
                     <td id="edit">
                        <a href="#" onclick="editCpnt(`<?php echo $info ?>`)" class="attention btnEdit circle" title="Ver">
                           <i class="fa-solid fa-eye"></i>
                        </a>
                     </td>
                     <td id="delet">
                        <a href="#" onclick="deleteCpnt(`<?php echo $info ?>`)" class="danger btnEdit circle" title="Deletar">
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
      $totpg = $arr['info']['totpg'];
      if ($totpg > 1) :
         $np = $arr['info']['np'];
         $proximo = $np + 1;
         $anterior = $np - 1;
      ?>
         <a href="index.php?page=manage&r=computer&np=<?= $anterior ?>#pgn" id="left" class="<?= $np > 1 ? '' : 'disabled' ?>">
            < Anterior</a>

               <a href="index.php?page=manage&r=computer&np=<?= $np - 1 ?>#pgn" class="pgnum <?php echo ($np == 1) ? 'invisible' : '' ?>"><?= $np - 1 ?></a>
               <a href="index.php?page=manage&r=computer&np=<?= $np ?>#pgn" class="pgnum active"><?= $np ?></a>
               <a href="index.php?page=manage&r=computer&np=<?= $np + 1 ?>#pgn" class="pgnum <?php echo ($np + 1 > $totpg) ? 'invisible' : '' ?>"><?= $np + 1 ?></a>
               <a href="index.php?page=manage&r=computer&np=<?= $proximo ?>#pgn" id="right" class="<?= ($totpg == $np) ? 'disabled' : '' ?>"> Próximo ></a>
            <?php endif; ?>
   </div>
</div>
<script src="./assets/js/service/Components.js"></script>