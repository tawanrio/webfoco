<div class="header">
   <i class="fa-solid fa-computer"></i>
   <div>
      <div class="title">Gerenciar Computadores</div>
      <div class="subtitle">Consulte, adicione, altere ou exclua os computadores</div>
   </div>
</div>
<div class="content" >

   <?php 
      if(isset($arr['info']['formpc'])){
         // print_r($arr['info']['formpc']);
         // echo $arr['info']['formpc']['marca'];
      }
   ?>
   <form action="">
      <!-- <label for="filter">Filtrar Busca</label>          -->
      <select name="filter" id="filter">
         <option value="filter" default>Escolha o filtro para busca</option>
         <option value="idpc">Nº do Pc</option>
         <option value="nameuse">Nome do usuário</option>
         <option value="sumserie">Numero de série</option>
         <option value="marca">Marca do Pc</option>
      </select>
      <input type="text" id="search" name="search" placeholder="Digite aqui...">
      <button class="btnSearch"><i class="fa-solid fa-magnifying-glass"></i></button>
   </form>
   <div class="table">
   
      <div class="header">
         <div class="desc">
            <div class="title">Lista de computadores</div>
            <div class="subtitle">Lista dos computadores da empresa</div>
         </div>
         <a href="#c" id="addnewcomputer">Novo Computador</a>
      </div>
      <table>
         <thead>
            <tr>
               <th>Identificação</th>
               <th>Tipo</th>
               <th>Usuário</th>
               <th>Processador</th>
               <th>Qnt Memória</th>
               <th>Tipo HD</th>
               <th>Marca</th>
               <th>Modelo</th>
               <th>N/S</th>
               <th>Mac</th>
            </tr>
         </thead>
         <tbody>
         <?php 
            foreach ($arr as $computer => $value) :
               if($computer !== 'info'):
               ?>
                  <tr>
                     <td><?= $value['id_pc'] ?></td>
                     <td><?= $value['type'] ?></td>
                     <td><?php echo $value['name'] ? $value['name'] : 'Sem usuário' ?></td>
                     <td><?= $value['processador'] ?></td>
                     <td><?= $value['memoria'] ?></td>
                     <td><?= $value['tipo_hd'] ?></td>
                     <td><?= $value['marca'] ?></td>
                     <td><?= $value['modelo'] ?></td>
                     <td><?= $value['numserie'] ?></td>
                     <td><?= $value['mac'] ?></td>
                  </tr>
                  <?php endif; ?>
               <?php endforeach; ?>
         </tbody>
      </table>
   </div>
   <div id="pgn">
      <?php 
         $np = isset($arr['info']['np']) ? $arr['info']['np'] : '1' ;
         $totpg = isset($arr['info']['totpg']) ? $arr['info']['totpg'] : '1';
         $proximo = $np + 1;
         $anterior = $np - 1;
      ?>
      <a href="index.php?p=manage&r=pc&np=<?= $anterior ?>#pgn" id="left" class="<?= $np > 1 ? '' : 'disabled' ?>">< Anterior</a>

      <a href="index.php?p=manage&r=pc&np=<?= $np -1 ?>#pgn" class="pgnum <?php echo ($np == 1) ? 'invisible' : '' ?>"><?= $np -1 ?></a>
      <a href="index.php?p=manage&r=pc&np=<?= $np ?>#pgn" class="pgnum active"><?= $np ?></a>
      <a href="index.php?p=manage&r=pc&np=<?= $np +1 ?>#pgn" class="pgnum <?php echo ($np + 1 > $totpg) ? 'invisible' : '' ?>"><?= $np +1 ?></a>
            
      <a href="index.php?p=manage&r=pc&np=<?= $proximo ?>#pgn" id="right" class="<?= ($totpg == $np) ? 'disabled' : '' ?>"> Próximo ></a>
   </div>
</div>

