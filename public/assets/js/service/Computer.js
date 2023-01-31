document.querySelector('#addnewcomputer').addEventListener('click', () =>{
    const contentCreateForm = `
    <div class="header">
       <i class="fa-solid fa-computer"></i>
       <div>
          <div class="title">Cadastrar Computador</div>
          <div class="subtitle">Cadastre seus computadores</div>
       </div>
    </div>
    <form id="formnewcomputer" action="index.php?page=manage&r=computer" method="post">
       <input type="hidden" name="id" value="">
       <div class="row radio">
         <div>
            <span>Tipo</span>
            <div>
               <input type="radio" id="notebook" name="typepc" value="notebook" checked>
               <label for="notebook">Notebook</label>
               <input type="radio" id="desktop" name="typepc" value="desktop">
               <label for="desktop">Desktop</label>
            </div>
         </div>
         <div> 
            <span>Propriedade</span>
            <div>
               <input type="radio" id="webfoco" name="propriedade" value="webfoco" checked>
               <label for="webfoco">Webfoco</label>
               <input type="radio" id="proprio" name="propriedade" value="proprio">
               <label for="proprio">Próprio</label>
            </div>
         </div>
      </div>
       <div class="row">
          <div>
             <label for="idpc">Identificação</label>
             <input required type="text" id="idpc" name="idpc"  value="??" readonly class="input-disable"  >
          </div>
          <div >
             <label for="marca">Marca</label>
             <input required type="text" id="marca" name="marca"
                placeholder="Marca do computador">
          </div>
       </div>
       <div class="row">
          <div>
             <label for="modelo">Modelo</label>
             <input required type="text" id="modelo" name="modelo" value=""
                placeholder="Modelo do computador">
          </div>
          <div>
             <label for="processador">Processador</label>
             <input required type="text" id="processador" name="processador" value=""
                placeholder="Intel i5 / AMD Ryzen 5 ">
          </div>
       </div>
       <div class="row">
          <div>
             <label for="hd">HD</label>
             <input required type="text" id="hd" name="hd" placeholder="240Gb SSD">
          </div>
          <div>
             <label for="memoria">Memória</label>
             <input required type="text" id="memoria" name="memoria" placeholder="8Gb DDR3">
          </div>
       </div>
       <div class="row">
          <div>
             <label for="numserie">N/S</label>
             <input required type="text" id="numserie" name="numserie" placeholder="Numero de série do computador">
          </div>
          <div>
             <label for="mac">Mac</label>
             <input required type="text" id="mac" name="mac" placeholder="Código MAC do computador">
          </div>
       </div>
       <div class="row row-button">
          <button class="btn btn-primary">Salvar</button>
          <a class="btn btn-secondary" id="formCancel">Cancelar</a>
       </div>
    </form>
    `;
    createContainer(contentCreateForm);
    })
    function editPc(idpc){
    idpc = idpc.replaceAll(`'`, `"`)
    const data = JSON.parse(idpc);
       console.log(data);
    const contentEditForm = `
    <div class="header">
       <i class="fa-solid fa-computer"></i>
       <div>
          <div class="title">Editar Computador</div>
          <div class="subtitle">Edite ou atualize os computadores</div>
       </div>
    </div>
    <form id="formeditcomputer" action="index.php?page=manage&r=computer" method="post">
       <input type="hidden" name="id" value="">
       <div class="row radio">
         <div>
            <span>Tipo</span>
            <div>
               <input type="radio" id="notebook" name="typepc" value="notebook" checked>
               <label for="notebook">Notebook</label>
               <input type="radio" id="desktop" name="typepc" value="desktop">
               <label for="desktop">Desktop</label>
            </div>
         </div>
         <div> 
            <span>Propriedade</span>
            <div>
               <input type="radio" id="webfoco" name="propriedade" value="webfoco" checked>
               <label for="webfoco">Webfoco</label>
               <input type="radio" id="proprio" name="propriedade" value="proprio">
               <label for="proprio">Próprio</label>
            </div>
         </div>
      </div>
       <div class="row">
          <div>
             <label for="idpc">Identificação</label>
             <input required type="text" id="idpc" name="idpc"  value="wbp${data.id_pc}" readonly class="input-disable" >
          </div>
          <div >
             <label for="marca">Marca</label>
             <input required type="text" id="marca" name="marca"
                placeholder="Marca do computador" value="${data.marca}" >
          </div>
       </div>
       <div class="row">
          <div>
             <label for="modelo">Modelo</label>
             <input required type="text" id="modelo" name="modelo" value="${data.modelo}"
                placeholder="Modelo do computador" >
          </div>
          <div>
             <label for="processador">Processador</label>
             <input required type="text" id="processador" name="processador" value="${data.processador}"
                placeholder="Intel i5 / AMD Ryzen 5 ">
          </div>
       </div>
       <div class="row">
          <div>
             <label for="hd">HD</label>
             <input required type="text" id="hd" name="hd" placeholder="240Gb SSD" value="${data.hd}">
          </div>
          <div>
             <label for="memoria">Memória</label>
             <input required type="text" id="memoria" name="memoria" placeholder="8Gb DDR3" value="${data.memoria}">
          </div>
       </div>
       <div class="row">
          <div>
             <label for="numserie">N/S</label>
             <input required type="text" id="numserie" name="numserie" placeholder="Numero de série do computador" value="${data.numserie}" readonly class="input-disable" >
          </div>
          <div>
             <label for="mac">Mac</label>
             <input required type="text" id="mac" name="mac" placeholder="Código MAC do computador" value="${data.mac}" readonly class="input-disable" >
          </div>
       </div>
       <div class="row row-button">
          <button class="btn btn-primary">Salvar</button>
          <a class="btn btn-secondary" id="formCancel">Cancelar</a>
       </div>
    </form>
    `;
    createContainer(contentEditForm);
    }
    function deletePc(idpc){
    idpc = idpc.replaceAll(`'`, `"`)
    const data = JSON.parse(idpc);
    const contentDeleteForm = `
    <div class="header">
       <i class="fa-solid fa-computer"></i>
       <div>
          <div class="title">Deletar Computador</div>
          <div class="subtitle">Apague seus computadores</div>
       </div>
    </div>
    <form >
    <div class="row radio">
    <div>
       <span>Tipo</span>
       <div>
          <input type="radio" id="notebook" name="typepc" value="notebook" checked>
          <label for="notebook">Notebook</label>
          <input type="radio" id="desktop" name="typepc" value="desktop">
          <label for="desktop">Desktop</label>
       </div>
    </div>
    <div> 
       <span>Propriedade</span>
       <div>
          <input type="radio" id="webfoco" name="propriedade" value="webfoco" checked>
          <label for="webfoco">Webfoco</label>
          <input type="radio" id="proprio" name="propriedade" value="proprio">
          <label for="proprio">Próprio</label>
       </div>
    </div>
 </div>
       <div class="row">
          <div>
             <label for="idpc">Identificação</label>
             <input required type="text" id="idpc" name="idpc"  value="wbp${data.id_pc}" readonly class="input-disable" >
          </div>
          <div >
             <label for="marca">Marca</label>
             <input required type="text" id="marca" name="marca"
                placeholder="Marca do computador" value="${data.marca}" readonly class="input-disable" >
          </div>
       </div>
       <div class="row">
          <div>
             <label for="modelo">Modelo</label>
             <input required type="text" id="modelo" name="modelo" value="${data.modelo}" readonly class="input-disable" 
                placeholder="Modelo do computador">
          </div>
          <div>
             <label for="processador">Processador</label>
             <input required type="text" id="processador" name="processador" value="${data.processador}" readonly class="input-disable" 
                placeholder="Intel i5 / AMD Ryzen 5 ">
          </div>
       </div>
       <div class="row">
          <div>
             <label for="hd">HD</label>
             <input required type="text" id="hd" name="hd" placeholder="240Gb SSD" value="${data.hd}" readonly class="input-disable" > 
          </div>
          <div>
             <label for="memoria">Memória</label>
             <input required type="text" id="memoria" name="memoria" placeholder="8Gb DDR3" value="${data.memoria}" readonly class="input-disable" >
          </div>
       </div>
       <div class="row">
          <div>
             <label for="numserie">N/S</label> 
             <input required type="text" id="numserie" name="numserie" placeholder="Numero de série do computador" value="${data.numserie}" readonly class="input-disable" >
          </div>
          <div>
             <label for="mac">Mac</label>
             <input required type="text" id="mac" name="mac" placeholder="Código MAC do computador" value="${data.mac}" readonly class="input-disable" >
          </div>
       </div>
       <div class="row row-button">
          <a href="index.php?page=manage&r=computer&id=${data.id_pc}&mac=${data.mac}"  class="btn btn-danger"> Apagar </a>
          <a class="btn btn-secondary" id="formCancel">Cancelar</a>
       </div>
    </form>
    `;
    createContainer(contentDeleteForm);
    }