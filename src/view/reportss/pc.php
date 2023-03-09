   <div class="header">
      <i class="fa-solid fa-computer"></i>
      <div>
         <div class="title">Computadores</div>
         <div class="subtitle">Consulte os registro de todos os computadores</div>
      </div>
   </div>
   <div class="content">
      <div class="status">
         <div class="card qtd">
            <i class="fa-solid fa-laptop"></i>
            
            <h3>Qtd de Computadores</h3>
            <h2><?= isset($arr['info']['qtdPc']) ? $arr['info']['qtdPc'] : 'Erro'; ?></h2>
         </div>
         <div class="card using">
            <i class="fa-solid fa-laptop-code"></i>
            <h3>Em uso</h3>
            <h2><?= isset($arr['info']['using']) ? $arr['info']['using'] : 'Erro'; ?></h2>
         </div>
         <div class="card available">
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
      <div class="table">
         <div class="desc">
            <div class="title">Lista de computadores</div>
            <div class="subtitle">Relação de todos os computadores da empresa - Obs. futuramente será lista de chamado</div>
         </div>
         <table>
            <thead>
               <tr>
                  <th>Nº Pc</th>
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
            $np = $arr['info']['np'];
            $totpg = $arr['info']['totpg'];
            $proximo = $np + 1;
            $anterior = $np - 1;
         ?>
         <a href="index.php?p=reports&r=pc&np=<?= $anterior ?>#pgn" id="left" class="<?= $np > 1 ? '' : 'disabled' ?>">< Anterior</a>

         <a href="index.php?p=reports&r=pc&np=<?= $np -1 ?>#pgn" class="pgnum <?php echo ($np == 1) ? 'invisible' : '' ?>"><?= $np -1 ?></a>
         <a href="index.php?p=reports&r=pc&np=<?= $np ?>#pgn" class="pgnum active"><?= $np ?></a>
         <a href="index.php?p=reports&r=pc&np=<?= $np +1 ?>#pgn" class="pgnum <?php echo ($np + 1 > $totpg) ? 'invisible' : '' ?>"><?= $np +1 ?></a>
               
         <a href="index.php?p=reports&r=pc&np=<?= $proximo ?>#pgn" id="right" class="<?= ($totpg == $np) ? 'disabled' : '' ?>"> Próximo ></a>
      </div>
   </div>
