<div class="header">
   <i class="fa-solid fa-users"></i>
   <div>
      <div class="title">Colaboradores</div>
      <div class="subtitle">Consulte, adicione, altere ou exclua um Colaborador</div>
   </div>
</div>
<div class="content" >
      <div class="status">

         <div class="card green">
         <i class="fa-solid fa-users"></i>
            <h3>Quantidade de Colaboradores</h3>
            <h2><?= isset($arr['info']['qtdTotalUser']) ? $arr['info']['qtdTotalUser'] : 'Erro'; ?></h2>
         </div>
         <!-- <div class="card red">
            <i class="fa-solid fa-check"></i>
            <h3>Em Férias</h3>
            <h2><?= isset($arr['info']['available']) ? $arr['info']['available'] : 'Erro'; ?></h2>
         </div> -->
      </div>
      <br>
      <h2 for="filter">Filtrar Busca</h2>         
   <form action="index.php?page=manage&r=user" method="post">
      <select name="filter" id="filter">
         <option value="name">Nome do Colaborador</option>
      </select>
      <input type="text" id="search" name="search" placeholder="Digite aqui...">
      <button class="btnSearch"><i class="fa-solid fa-magnifying-glass"></i></button>
   </form>
   <div class="table" id="tablePc">
      <div class="header">
         <div class="desc">
            <div class="title">Lista de Colaboradores</div>
            <div class="subtitle">Lista dos colaboradores da empresa</div>
         </div>
         <?php
            $count = 0;
            $listPcAvailable = '{';
               foreach($arr['info']['pcAvailable'] as $pcavailable => $data){
                  $count = $count + 1;
                  $listPcAvailable .= "'". $count ."':{";
                  foreach($data as $key => $value){
                     $listPcAvailable .= "'" .$key ."':'".$value . "',";
                  }
                  $listPcAvailable = rtrim($listPcAvailable, ',');
                  $listPcAvailable .= "},";
               }
               $listPcAvailable = rtrim($listPcAvailable, ',');
               $listPcAvailable .= '}';


               $listAllComputer = '{';
                  foreach($arr['info']['allComputer'] as $allComputer => $data){
                     $count = $count + 1;
                     $listAllComputer .= "'". $count ."':{";
                     foreach($data as $key => $value){
                        $listAllComputer .= "'" .$key ."':'".$value . "',";
                     }
                     $listAllComputer = rtrim($listAllComputer, ',');
                     $listAllComputer .= "},";
                  }
                  $listAllComputer = rtrim($listAllComputer, ',');
                  $listAllComputer .= '}';


          ?>
         <a href="#" onclick="addNewUser(`<?= $listPcAvailable ?>`)" class="btnaddnew" id="addnewuser">Novo Colaborador</a>
      </div>
      <table>
         <thead>
            <tr>
               <th>Nº</th>
               <th>ID</th>
               <th>Time</th>
               <th>Nome</th>
               <!-- <th>Sobrenome</th> -->
               <!-- <th>ID do PC</th> -->
               <th>Marca</th>
               <th>Processador</th>
               <th>Memória</th>
               <th id="email">Email</th>
               <th>Tel. Pessoal</th>
               <!-- <th>Tel. Empresarial</th> -->
               <th id="edit">Ver</th>
               <th id="delet">Deletar</th>
            </tr>
         </thead>
         <tbody>
         <?php 
            $list = ($arr['info']['np'] - 1) * $arr['info']['limit'];
            foreach ($arr as $user => $value) :
               if($user !== 'info'):
                  $list = $list + 1;
                  $info = '{';
                  foreach ($value as $key => $data) {
                     $info .= "'" .trim($key) . "':'" . trim($data) . "', ";

                  }
                  $info = rtrim($info, ', ');
                  $info .= '}';

               ?>
                  <tr>
                     <th><?= $list ?></th>
                     <td><?php echo 'IDColab' . $value['id_user'] ? $value['id_user'] : 'Sem Dados' ?></td>
                     <td><?php echo strtoupper($value['time'] ? $value['time'] : 'Sem Dados') ?></td>
                     <td><?php echo ucfirst($value['name'] ? $value['name'] : 'Sem Dados') ?></td>
                     <!-- <td><?php echo $value['sobrenome'] ? $value['sobrenome'] : 'Sem Dados' ?></td> -->
                     <!-- <td><?php echo $value['id_pc'] ? $value['id_pc'] : 'Sem Dados' ?></td> -->
                     <td><?php echo ucfirst($value['marca'] ? $value['marca'] : 'Sem Dados') ?></td>
                     <td><?php echo $value['processador'] ? $value['processador'] : 'Sem Dados' ?></td>
                     <td><?php echo $value['memoria'] ? $value['memoria'] : 'Sem Dados' ?></td>
                     <td id="email"><?php echo $value['email'] ? $value['email'] : 'Sem Dados' ?></td>
                     <td><?php echo $value['telPessoal'] ? $value['telPessoal'] : 'Sem Dados' ?></td>
                     <!-- <td><?php echo $value['telEmpresarial'] ? $value['telEmpresarial'] : 'Sem Dados' ?></td> -->
                     <td id="edit">
                        <a href="#" onclick="editUser(`<?= $info ?>`,`<?= $listAllComputer ?> `)" class="attention btnEdit circle" title="Ver">
                           <i class="fa-solid fa-eye"></i>
                        </a>
                     </td>

                     <td id="delet">
                        <a href="#" onclick="deleteUser(`<?= $info ?>`,`<?= $listAllComputer ?>`)"  class="danger btnEdit circle" title="Deletar">
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
        if($totpg > 1):
           $np = $arr['info']['np'];
           $proximo = $np + 1;
           $anterior = $np - 1;
            ?>
            <a href="index.php?p=manage&r=user&np=<?= $anterior ?>#pgn" id="left" class="<?= $np > 1 ? '' : 'disabled' ?>">< Anterior</a>

            <a href="index.php?p=manage&r=user&np=<?= $np -1 ?>#pgn" class="pgnum <?php echo ($np == 1) ? 'invisible' : '' ?>"><?= $np -1 ?></a>
            <a href="index.php?p=manage&r=user&np=<?= $np ?>#pgn" class="pgnum active"><?= $np ?></a>
            <a href="index.php?p=manage&r=user&np=<?= $np +1 ?>#pgn" class="pgnum <?php echo ($np + 1 > $totpg) ? 'invisible' : '' ?>"><?= $np +1 ?></a>
    

            <a href="index.php?p=manage&r=user&np=<?= $proximo ?>#pgn" id="right" class="<?= ($totpg == $np) ? 'disabled' : '' ?>"> Próximo ></a>
         <?php endif; ?>
   </div>
</div>