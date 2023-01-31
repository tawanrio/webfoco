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

      <!-- <div class="card maintenance">
            <i class="fa-solid fa-check"></i>
            <h3>Em Manutenção</h3>
            <h2><?= isset($arr['info']['available']) ? $arr['info']['available'] : 'Erro'; ?></h2>
         </div> -->
   </div>

   <!-- <select name="propriedade" id="propriedade">
      <option value="proprio">Próprio</option>
      <option value="webfoco">Webfoco</option>
   </select> -->
   <br>
   <h2 for="filter">Filtrar Busca</h2>
   <form action="index.php?page=manage&r=computer" method="post">
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
               <th>Usuário</th>
               <th>Propriedade</th>
               <th>Processador</th>
               <th>Memória</th>
               <th>HD</th>
               <th>Marca</th>
               <th>Modelo</th>
               <!--<th>N/S</th>-->
               <th>Mac</th>
               <th id="edit">Editar</th>
               <th id="delet">Deletar</th>

            </tr>

         </thead>
         <tbody>
            <?php
            $list = ($arr['info']['np'] - 1) * $arr['info']['limit'];
            foreach ($arr as $computer => $value) :
               if ($computer !== 'info' && $value['id_pc'] != '999') :
                  $list = $list + 1;
                  $info = '{';
                  foreach ($value as $key => $data) {
                     $info .= "'" . trim($key) . "':'" . trim($data) . "', ";
                  }
                  $info = rtrim($info, ', ');
                  $info .= '}';
                  // print_r($value);
            ?>
                  <tr>
                     <th><?= $list ?></th>
                     <td><?php echo $value['id_pc'] ? $value['id_pc'] : '0' ?></td>
                     <!--<td><?= $value['type'] ?></td> -->
                     <td><?php echo ucfirst($value['name'] ? $value['name'] : 'Sem usuário') ?></td>
                     <td><?php echo ucfirst($value['propriedade'] ? $value['propriedade'] : 'Sem Dados') ?></td>
                     <td><?php echo $value['processador'] ? $value['processador'] : 'Sem Dados' ?></td>
                     <td><?php echo $value['memoria'] ? $value['memoria'] : 'Sem Dados' ?></td>
                     <td><?php echo $value['hd'] ? $value['hd'] : 'Sem Dados' ?></td>
                     <td><?php echo ucfirst($value['marca'] ? $value['marca'] : 'Sem Dados') ?></td>
                     <td><?php echo $value['modelo'] ? $value['modelo'] : 'Sem Dados' ?></td>
                     <!--<td><?php echo $value['numserie'] ? $value['numserie'] : 'Sem Dados' ?></td>-->
                     <td><?php echo $value['mac'] ? $value['mac'] : 'Sem Dados' ?></td>
                     <td id="edit">
                        <a href="#" onclick="editPc(`<?php echo $info ?>`)" class="attention btnEdit circle" title="Editar">
                           <i class="fa-solid fa-pen"></i>
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