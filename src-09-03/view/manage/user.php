<div class="header">
   <i class="fa-solid fa-users"></i>
   <div>
      <div class="title">Colaboradores</div>
      <div class="subtitle">Consulte, adicione, altere ou exclua um colaborador</div>
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


                  // print_r($listPcAvailable);
                  // print_r($arr['info']['pcAvailable']);
                  // print_r($arr['info']['search']);
          ?>   


           <div id="filtrosCheckBox">
            <div>
               <input class="filtroChange" id="filtroTotal" type="radio" name="filtroTotal" <?php echo $arr['info']['arrfilter'][0] == 1 ? 'checked' : ''; ?>>
               <label for="filtroTotal">Todos</label>
            </div>
            <div>
               <div>
                  <input class="filtroChange" type="radio" name="statusUser" id="disponivel" <?php echo strpos($arr['info']['search'], 'disponivel') > -1 ? 'checked' : ''; ?>>
                  <label for="disponivel">Sem computador</label>
               </div>
               
               <div>
                  <input class="filtroChange" type="radio" name="statusUser" id="usando"<?php echo strpos($arr['info']['search'], 'usando') > -1 ? 'checked' : ''; ?>>
                  <label for="usando">Com Computador</label>
               </div>
            </div>
            <div>
               <Label>Time</Label>
            <select class="filtroChange" name="time" id="time">

               <option value="1" >Selecione</option>
               <option value="bi" <?php echo strpos($arr['info']['search'], 'bi') > -1 ? 'selected' : ''; ?>>B.I</option>
               <option value="comercial" <?php echo strpos($arr['info']['search'], 'comercial') > -1 ? 'selected' : ''; ?>>Comercial</option>
               <option value="criacao" <?php echo strpos($arr['info']['search'], 'criacao') > -1 ? 'selected' : ''; ?>>Criação</option>
               <option value="cs" <?php echo strpos($arr['info']['search'], 'cs') > -1 ? 'selected' : ''; ?>>CS</option>
               <option value="dev" <?php echo strpos($arr['info']['search'], 'dev') > -1 ? 'selected' : ''; ?>>Desenvolvimento</option>
               <option value="dir" <?php echo strpos($arr['info']['search'], 'dir') > -1 ? 'selected' : ''; ?>>Diretor(a)</option>
               <option value="inboud" <?php echo strpos($arr['info']['search'], 'inboud') > -1 ? 'selected' : ''; ?>>Inbound</option>
               <option value="marketing" <?php echo strpos($arr['info']['search'], 'marketing') > -1 ? 'selected' : ''; ?>>Marketing</option>
               <option value="midia" <?php echo strpos($arr['info']['search'], 'midia') > -1 ? 'selected' : ''; ?>>Mídia</option>
               <option value="redacao" <?php echo strpos($arr['info']['search'], 'redacao') > -1 ? 'selected' : ''; ?>>Redação</option>
               <option value="rh" <?php echo strpos($arr['info']['search'], 'rh') > -1 ? 'selected' : ''; ?>>RH</option> 
               <option value="SEO" <?php echo strpos($arr['info']['search'], 'SEO') > -1 ? 'selected' : ''; ?>>SEO</option>
               <option value="st" <?php echo strpos($arr['info']['search'], 'st') > -1 ? 'selected' : ''; ?>>Secretaria</option>
               <option value="social" <?php echo strpos($arr['info']['search'], 'social') > -1 ? 'selected' : ''; ?>>Social</option>

               </select>
            </div>

                  

               </div>

            <div id="divSearch">


               <form  method="get" class="invisible">
                  <input type="hidden" name="page" value="manage">
                  <input type="hidden" name="route" value="user">
                  <select name="filter" id="filter">
                     <option value="name">Nome</option>
                     <option value="time">Email</option>
                     <option value="telEmpresarial">Tel Corporativo</option>
                     <option value="telPessoal">Tel Pessoal</option>
                  </select>
                  <input type="text" id="search"   name="search" placeholder="Digite aqui...">
                  <button class="btnSearch" id="btnSearch"><span>Buscar</span></button>
               </form>
               
               <div id="plus"><i class="fa-solid fa-plus"></i></div>

            </div>
         <a href="#" onclick="addNewUser(`<?= $listPcAvailable ?>`)" class="btnaddnew" id="addnewuser">Novo Colaborador</a>
      </div>
      <?php 
      if($arr[0] != 'vazio'): ?>
      <table>
         <thead>
            <tr> <?php 
            if(!($arr['info']['arrfilter'][0] == 1)): ?>

         <?php 
         $infoSearch = $arr['info']['search'];
         $infoSearch = str_replace('usando','Com Computador', $infoSearch);
         $infoSearch = str_replace('disponivel','Sem Computador', $infoSearch);
         $infoSearch = str_replace('-', ', ', ($infoSearch));
         $infoSearch = ucwords($infoSearch);

         ?>

               <span class="resultSearch">Resultados de pesquisa para: <?= $infoSearch; ?> </span>
               <?php endif ?></tr>
            <tr>
               <th>Nº</th>
               <!-- <th>ID</th> -->
               <th>Time</th>
               <th>Nome</th>
               <!-- <th>Sobrenome</th> -->
               <th>Codigo</th>
               <th>Marca</th>
               <th>Processador</th>
               <!-- <th>Memória</th> -->
               <th id="email">Email</th>
               <!-- <th>Tel. Pessoal</th> -->
               <th>Tel. Corporativo</th>
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
                  
                  $value['time'] = str_replace('cao', 'ção', $value['time']);
                  $value['time'] = str_replace('midia', 'mídia', $value['time']);
                  $value['time'] = str_replace('st', 'Secretaria', $value['time']);
                  // $value['time'] = str_replace('dev', 'de', $value['time']);
                  $value['time'] = str_replace('dir', 'Diretor(a)', $value['time']);
                  $value['time'] = str_replace('bi', 'B . I', $value['time']);
                  $value['time'] = str_replace('social', 'Social Mídia', $value['time']);
                  $value['time'] = str_replace('rh', 'Recursos H.', $value['time']);
               ?>
                  <tr>
                     <th><?= $list ?></th>
                     <!-- <td><?php echo 'IDColab' . $value['id_user'] ? $value['id_user'] : 'Sem Dados' ?></td> -->
                     <td><?php echo ucwords(strtolower($value['time'] ? $value['time'] : 'Sem Dados')) ?></td>
                     <td><?php echo ucfirst($value['name'] ? $value['name'] : 'Sem Dados') ?></td>
                     <!-- <td><?php echo $value['sobrenome'] ? $value['sobrenome'] : 'Sem Dados' ?></td> -->
                     <td><?php echo $value['codigo'] ? $value['codigo'] : 'Sem Dados' ?></td>
                     <td><?php echo ucfirst($value['marca'] ? $value['marca'] : 'Sem Dados') ?></td>
                     <td><?php echo $value['processador'] ? $value['processador'] : 'Sem Dados' ?></td>
                     <!-- <td><?php echo $value['memoria'] ? $value['memoria'] : 'Sem Dados' ?></td> -->
                     <td id="email"><?php echo $value['email'] ? $value['email'] : 'Sem Dados' ?></td>
                     <!-- <td><?php echo $value['telPessoal'] ? $value['telPessoal'] : 'Sem Dados' ?></td> -->
                     <td><?php echo $value['telEmpresarial'] ? $value['telEmpresarial'] : 'Sem Dados' ?></td>
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
         <?php else:; ?>
   
         <?php $infoSearch = str_replace('disponivel','Sem Computador', $arr['info']['search']) ?>
               <?php $infoSearch = str_replace('usando','Com Computador', $arr['info']['search']) ?>
   <span class="resultSearch">Nenhum Resultado Encontrado para:  <?php print_r(str_replace('-', ', ', ($infoSearch)));  ?></span>
   <Br>

 <?php endif; ?>
      </table>
   </div>
   <div id="pgn">
      <?php 

      if($arr['info']['search'] != 1 && $arr['info']['filter']){
         $filter = '&filter=' . $arr['info']['filter'];
         $filter .= '&search=' . $arr['info']['search'];
      }

        $totpg = $arr['info']['totpg'];
        if($totpg > 1):
           $np = $arr['info']['np'];
           $proximo = $np + 1;
           $anterior = $np - 1;
            ?>
            <a href="index.php?page=manage&route=user<?=isset($filter) ? $filter : '';?>&np=<?= $anterior ?>#pgn" id="left" class="<?= $np > 1 ? '' : 'disabled' ?>">< Anterior</a>

            <a href="index.php?page=manage&route=user<?=isset($filter) ? $filter : '';?>&np=<?= $np -1 ?>#pgn" class="pgnum <?php echo ($np == 1) ? 'invisible' : '' ?>"><?= $np -1 ?></a>
            <a href="index.php?page=manage&route=user<?=isset($filter) ? $filter : '';?>&np=<?= $np ?>#pgn" class="pgnum active"><?= $np ?></a>
            <a href="index.php?page=manage&route=user<?=isset($filter) ? $filter : '';?>&np=<?= $np +1 ?>#pgn" class="pgnum <?php echo ($np + 1 > $totpg) ? 'invisible' : '' ?>"><?= $np +1 ?></a>
    

            <a href="index.php?page=manage&route=user<?=isset($filter) ? $filter : '';?>&np=<?= $proximo ?>#pgn" id="right" class="<?= ($totpg == $np) ? 'disabled' : '' ?>"> Próximo ></a>
         <?php endif; ?>
   </div>
</div>
<script src="./assets/js/service/User.js"></script>