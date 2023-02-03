
function insertCheckRadio(data){
   if(data != '' && data != 0){
      const inputChecked = document.querySelector('input#'+data)
      inputChecked.setAttribute('checked','')
   }
}

function insertCheckCheckbox(datas){
   datas = datas.split(',')
   datas.forEach(data =>{
      if(data != 0){
         const inputChecked = document.querySelector('input#'+data)
         inputChecked.setAttribute('checked','')
      }
   })
   return
}
function getLastDateClean(values){
   const value = values.split(',')
   
   return (getDate(value[0]));
}
function getLastTypeClean(values){
   const value = values.split(',')
   
   return insertCheckCheckbox(getType(value[0]));
}


function getAllDateClean(values){
   const arr = values.split(',')
   if(arr == '') return
   arr.forEach(value => {
      const date = new Date(getDate(value))
      data = `
      <tr>
         <td>${date.toLocaleDateString('pt-BR', {timeZone: 'UTC'})}</td>
         <td>${FormatTypeClean(value)}</td>
      </tr>
      `
      document.querySelector('#tbodyHisotrico').innerHTML += data
   })
}
function FormatTypeClean(type){
   const arr = getType(type).split(',')
   let tipo = ''
   arr.forEach(value =>{
      if(value == 0) return

      switch (value) {
         case 'pastater':
            tipo += 'Pasta Termica, '
            break;
         case 'culer':
            tipo += 'Culer, '
            break
         case 'memorialimp':
            tipo += 'Memória, '
            break
         case 'carcaca':
            tipo += 'Carcaça, '
            break
      }
   })
   tipo = tipo.trim();
   tipo = tipo.substring(0, tipo.length -1)
   if (tipo == '') {
      tipo = 'Sem Dados'
   }
   
   return tipo
}

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
       <div class="row checkbox">
          
          <div>
             <label for="ultlimpeza">Última Limpeza</label>
             <input type="date" id="ultlimpeza" name="ultlimpeza">
         </div>
         <div id="tipolimpeza">
               <label for="tipolimpeza">Tipo de Limpeza</label>
                  <div>
                     <div>
                        <input type="checkbox" id="pastater" name="pastater" >
                        <label for="pastater">Pasta Térmica</label>
                     </div>
                     <div>
                        <input type="checkbox" id="culer" name="culer" >
                        <label for="culer">Culer</label>
                     </div>
                     <div>
                        <input type="checkbox" id="memorialimp" name="memorialimp" >
                        <label for="memorialimp">Memória</label>
                     </div>
                     <div>
                        <input type="checkbox" id="carcaca" name="carcaca" >
                        <label for="carcaca">Carcaça</label>
                     </div>
                  </div>
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
   //  console.log(data);
    getLastDateClean(data.historico);
      
    const contentEditForm = `
    <div class="header">
       <i class="fa-solid fa-computer"></i>
       <div>
          <div class="title">Ver Computador</div>
          <div class="subtitle">Visualize as informações dos computadores</div>
       </div>
    </div>
    <form id="formeditcomputer" action="index.php?page=manage&r=computer" method="post">
       <input type="hidden" name="id" value="">
       <input type="hidden" name="historico" value="${data.historico}">
       <div class="row radio">
         <div>
            <span>Tipo</span>
            <div>
               <input type="radio" id="notebook" name="typepc" value="notebook" disabled>
               <label for="notebook">Notebook</label>
               <input type="radio" id="desktop" name="typepc" value="desktop" disabled>
               <label for="desktop">Desktop</label>
            </div>
         </div>
         <div> 
            <span>Propriedade</span>
            <div>
               <input type="radio" id="webfoco" name="propriedade" value="webfoco" disabled>
               <label for="webfoco">Webfoco</label>
               <input type="radio" id="proprio" name="propriedade" value="proprio" disabled>
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
                placeholder="Marca do computador" value="${data.marca}"  readonly class="input-disable">
          </div>
       </div>
       <div class="row">
          <div>
             <label for="modelo">Modelo</label>
             <input required type="text" id="modelo" name="modelo" value="${data.modelo}" readonly class="input-disable"
                placeholder="Modelo do computador" >
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
             <input required type="text" id="hd" name="hd" placeholder="240Gb SSD" value="${data.hd}" readonly class="input-disable">
          </div>
          <div>
             <label for="memoria">Memória</label>
             <input required type="text" id="memoria" name="memoria" placeholder="8Gb DDR3" value="${data.memoria}" readonly class="input-disable">
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
       <div class="row checkbox">
          
          <div>
             <label for="ultlimpeza">Última Limpeza</label>
             <input type="date" id="ultlimpeza" name="ultlimpeza" value="${getLastDateClean(data.historico)}" disabled class="input-disable">
         </div>
         <div id="tipolimpeza">
               <label for="tipolimpeza">Tipo de Limpeza</label>
                  <div>
                     <div>
                        <input type="checkbox" id="pastater" name="pastater" disabled>
                        <label for="pastater">Pasta Térmica</label>
                     </div>
                     <div>
                        <input type="checkbox" id="culer" name="culer" disabled>
                        <label for="culer">Culer</label>
                     </div>
                     <div>
                        <input type="checkbox" id="memorialimp" name="memorialimp" disabled>
                        <label for="memorialimp">Memória</label>
                     </div>
                     <div>
                        <input type="checkbox" id="carcaca" name="carcaca" disabled>
                        <label for="carcaca">Carcaça</label>
                     </div>
                  </div>
          </div>
       </div>
       <div class="row">
            <label>
               <a href="#" id="historicoLimp" style="text-decoration-line: underline;">Histórico de Limpeza</a>
            </label>
       </div>
       <div class="row row-button">
          <a class="btn btn-green" id="editBtn">Editar</a>
          <a class="btn btn-secondary" id="formCancel">Cancelar</a>
       </div>
    </form>
    `;
    
    createContainer(contentEditForm);

    document.querySelector('a#historicoLimp').addEventListener('click', ()=> {
      const historicoLimp = `
    <div class="header">
       <i class="fa-solid fa-computer"></i>
       <div>
          <div class="title">Histórico de Limpeza</div>
          <div class="subtitle">Visualize o histórico de limpeza dos computadores</div>
       </div>
    </div>
    <form id="formeditcomputer" action="index.php?page=manage&r=computer" method="post">
       <input type="hidden" name="id" value="">
        <div class="row">
            <table>
               <thead>
                  <tr>
                     <th>Data</th>
                     <th>Tipo</th>
                  </tr>
               </thead>
               <tbody id="tbodyHisotrico">
               
               </tbody>
            </table>
        </div>
       <div class="row row-button">
          <a class="btn btn-secondary" id="historicoLimpCancel">Cancelar</a>
       </div>
    </form>
    `;
      createContainer(historicoLimp,'historicoLimpBack', 'historicoLimpContainer');
      getAllDateClean(data.historico);
    });

    insertCheckRadio(data.propriedade)
    insertCheckRadio(data.type)

   getLastTypeClean(data.historico);

    const editBtn = document.querySelector('#editBtn')
      editBtn.addEventListener('click', () =>{
      const rowBtn = document.querySelector('.row-button')
      rowBtn.removeChild(editBtn)
      
      const salvarBtn = document.createElement('button')
      salvarBtn.className = 'btn btn-primary';
      salvarBtn.textContent = 'Salvar';

      rowBtn.insertAdjacentElement('afterbegin',salvarBtn);

    
      const elementsReadonly = document.querySelectorAll('[readonly]')
      const elementsDisabled = document.querySelectorAll('[disabled]')

      elementsDisabled.forEach(element =>{
         element.removeAttribute('disabled')
         element.classList.toggle('input-disable')
      })
      elementsReadonly.forEach(element =>{
         element.removeAttribute('readonly')
         element.classList.toggle('input-disable')
      })

    });

    

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
    <div class="row">
      <span class="danger">ATENÇÃO
      <p>
         Deseja APAGAR os dados desta maquina?
      </p>
      </span>
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
    insertCheckRadio(data.propriedade)
    insertCheckRadio(data.type)
    }
    
   