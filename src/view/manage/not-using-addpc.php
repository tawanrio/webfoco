
<div class="content">
   <div id="containerAdd">
   <div class="header">
   <i class="fa-solid fa-computer"></i>
   <div>
      <div class="title">Cadastrar Computador</div>
      <div class="subtitle">Crie ou atualize os computadores</div>
   </div>
</div>
   <form action="#" method="post">
        <input type="hidden" name="id" value="">
        <div class="row">
            <div class="typepc">
                <label for="notbook">Notbook</label>
                <input type="radio" name="typepc" id="notbook" checked>
            
                <label for="desktop">Desktop</label>
                <input type="radio" name="typepc" id="desktop">
            </div>
        </div>
        <div class="row">
            <div>
                <label for="idpc">Identificação</label>
                <input type="text" id="idpc" name="idpc"  value="3">
            </div>
            <div >
                <label for="marca">Marca</label>
                <input type="text" id="marca" name="marca"
                 placeholder="Marca do computador">
            </div>
        </div>

        <div class="row">
            <div>
                <label for="modelo">Modelo</label>
                <input type="text" id="modelo" name="modelo" value=""
                placeholder="Modelo do computador">
            </div>
            <div>
                <label for="processador">Processador</label>
                <input type="text" id="processador" name="processador" value=""
                placeholder="Intel i5 / AMD Ryzen 5 ">
            </div>
        </div>
        <div class="row">
            <div>
                <label for="hd">HD</label>
                <input type="text" id="hd" name="hd" placeholder="240Gb SSD">
            </div>
            <div>
                <label for="memoria">Memória</label>
                <input type="text" id="memoria" name="memoria" placeholder="8Gb DDR3">
            </div>
        </div>
        
        <div class="row">
            <div>
                <label for="numserie">N/S</label>
                <input type="text" id="numserie" name="numserie" placeholder="Numero de série do computador">
            </div>
            <div>
                <label for="mac">Mac</label>
                <input type="text" id="mac" name="mac" placeholder="Código MAC do computador">
            </div>
        </div>
        <div class="row">
            <div>
                <label for="sector">Setor</label>
                <select>
                    <option value="">Setor em que o usuário atua</option>
                    <option value="notbook">TI/Dev</option>
                    <option value="desktop">BI</option>
                    <option value="desktop">Marketing</option>
                </select>
            </div>
            <div >
                <label for="user">Usuário</label>
                <select>
                    <option value="">nome do usuário</option>
                    <option value="notbook">Fulano</option>
                    <option value="desktop">Ciclano</option>
                </select>
            </div>
        </div>
       
        <div class="row row-button">
           <button class="btn btn-primary">Salvar</button>
           <a class="btn btn-secondary">Cancelar</a>
         </div>
    </form>
   </div>
</div>