
function insertCheckRadio(data){
    if(data != '' && data != 0){
       const inputChecked = document.querySelector('input#'+data)
       inputChecked.removeAttribute('disabled')
       inputChecked.classList.toggle('input-disable')
       inputChecked.setAttribute('checked','')
    }
 }
 
//  function insertCheckCheckbox(datas){
//     datas = datas.split(',')
//     datas.forEach(data =>{
//        if(data != 0){
//           const inputChecked = document.querySelector('input#'+data)
//           inputChecked.setAttribute('checked','')
//        }
//     })
//     return
//  }
//  function getLastDateClean(values){
//     const value = values.split(',')
    
//     return (getDate(value[0]));
//  }
//  function getLastTypeClean(values){
//     const value = values.split(',')
    
//     return insertCheckCheckbox(getType(value[0]));
//  }
 
 
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
 
 document.querySelector('#addnewcomponents').addEventListener('click', () =>{
     const contentCreateForm = `
     <div class="header">
        <i class="fa-solid fa-microchip"></i>
        <div>
           <div class="title">Cadastrar Componente</div>
           <div class="subtitle">Cadastre seus componentes</div>
        </div>
     </div>
     <form id="formnewcomponents" action="index.php?page=manage&r=components" method="post">
     <input type="hidden" name="form" value="create">
        <div class="row radio">
          <div>
             <span>Tipo</span>
             <div>
                <input type="radio" id="monitor" name="tipo" value="monitor" checked>
                <label for="monitor">Monitor</label>

                <input type="radio" id="mouse" name="tipo" value="mouse">
                <label for="mouse">Mouse</label>

                <input type="radio" id="teclado" name="tipo" value="teclado">
                <label for="teclado">Teclado</label>
                
                <input type="radio" id="suportenot" name="tipo" value="suportenot">
                <label for="suportenot">Suporte Notebook</label>
                

                <input type="radio" id="outro" name="tipo" value="outro">
                <label for="outro">Outro</label>
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
                 placeholder="Marca do componente">
           </div>
        </div>
        <div class="row">
        <div>
           <label for="modelo">Modelo</label>
           <input  type="text" id="modelo" name="modelo"
              placeholder="Modelo do componente">
        </div>
           <div>
              <label for="tamanho">Tamanho</label>
              <input  type="text" id="tamanho" name="tamanho" 
              placeholder="Tamanho do componente">
           </div>
        </div>
        <div class="row">
            <div>
                <label for="numserie">N/S</label>
                <input  type="text" id="numserie" name="numserie" placeholder="Numero de série do componente">
            </div>
            <div>
            </div>
        </div>
        <div class="row row-button">
           <button class="btn btn-primary">Salvar</button>
           <a class="btn btn-secondary" id="formCancel">Cancelar</a>
        </div>
     </form>
     `;
     createContainer(contentCreateForm);

     const inputCodigo = document.getElementById('codigo')
     inputCodigo.addEventListener('input', (e) =>{
        if(e.target.value.length == 3 || e.target.value.length == 6){
            const lastCaracter = e.target.value[e.target.value.length-1] ;
            const word = e.target.value.substring(0,e.target.value.length-1)
            if(lastCaracter != '.'){
                e.target.value = word + '.' + lastCaracter;
            }
        }
     })
     })
 
     
     function editCpnt(idpc){
     idpc = idpc.replaceAll(`'`, `"`)
     const data = JSON.parse(idpc);
     console.log(data);
    //  getLastDateClean(data.historico);
       
     const contentEditForm = `
     <div class="header">
        <i class="fa-solid fa-computer"></i>
        <div>
           <div class="title">Ver Computador</div>
           <div class="subtitle">Visualize as informações dos computadores</div>
        </div>
     </div>
     <form id="formeditcomponents" action="index.php?page=manage&r=components" method="post">
     <input type="hidden" name="form" value="edit">
        <div class="row radio">
        <div>
           <span>Tipo</span>
           <div>
              <input type="radio" id="monitor" name="tipo" value="monitor" checked disabled>
              <label for="monitor">Monitor</label>

              <input type="radio" id="mouse" name="tipo" value="mouse" disabled>
              <label for="mouse">Mouse</label>

              <input type="radio" id="teclado" name="tipo" value="teclado" disabled>
              <label for="teclado">Teclado</label>
              
              <input type="radio" id="suportenot" name="tipo" value="suportenot" disabled>
              <label for="suportenot">Suporte Notebook</label>
              

              <input type="radio" id="outro" name="tipo" value="outro" disabled>
              <label for="outro">Outro</label>
           </div>
        </div>
     </div>
      <div class="row">
         <div>
            <label for="idcpnt">Identificação</label>
            <input required type="text" id="idcpnt" name="idcpnt"  value="${data.id_cpnt}" readonly class="input-disable"  >
         </div>
         <div >
            <label for="marca">Marca</label>
            <input required type="text" id="marca" name="marca" readonly class="input-disable" value="${data.marca}"
               placeholder="Marca do componente">
         </div>
      </div>
      <div class="row">
      <div>
         <label for="modelo">Modelo</label>
         <input  type="text" id="modelo" name="modelo" readonly class="input-disable" value="${data.modelo}"
            placeholder="Modelo do componente">
      </div>
         <div>
            <label for="tamanho">Tamanho</label>
            <input  type="text" id="tamanho" name="tamanho"  readonly class="input-disable" value="${data.tamanho}"
            placeholder="Tamanho do componente">
         </div>
      </div>
      <div class="row">
      <div>
      <label for="numserie">N/S</label>
      <input  type="text" id="numserie" name="numserie" readonly class="input-disable" value="${data.numserie}"
      placeholder="Numero de série do componente">
      </div>
      <div>
         <label for="codigo">Código</label>
         <input required type="text" id="codigo" name="codigo" maxlength="10" readonly class="input-disable" value="${data.codigo}"
            pattern="[0-9]{2}.[0-9]{2}.[0-9]{4}" placeholder="00.00.0000">
      </div>
      </div>
        <div class="row row-button">
           <a class="btn btn-green" id="editBtn">Editar</a>
           <a class="btn btn-secondary" id="formCancel">Cancelar</a>
        </div>
     </form>
     `;
     createContainer(contentEditForm);
     insertCheckRadio(data.tipo)

    //  const inputCodigo = document.getElementById('codigo')
    //  inputCodigo.addEventListener('input', (e) =>{
    //     if(e.target.value.length == 3 || e.target.value.length == 6){
    //         const lastCaracter = e.target.value[e.target.value.length-1] ;
    //         const word = e.target.value.substring(0,e.target.value.length-1)
    //         if(lastCaracter != '.'){
    //             e.target.value = word + '.' + lastCaracter;
    //         }
    //     }


    //  })
 
 
     const editBtn = document.querySelector('#editBtn')
       editBtn.addEventListener('click', () =>{
       const rowBtn = document.querySelector('.row-button')
       rowBtn.removeChild(editBtn)
       
       const salvarBtn = document.createElement('button')
       salvarBtn.className = 'btn btn-primary';
       salvarBtn.textContent = 'Salvar';
 
       rowBtn.insertAdjacentElement('afterbegin',salvarBtn);
 
     
       const elementsReadonly = document.querySelectorAll('[readonly]')
    //    const elementsDisabled = document.querySelectorAll('[disabled]')
 
    //    elementsDisabled.forEach(element =>{
    //     //   element.removeAttribute('disabled')
    //     //   element.classList.toggle('input-disable')
    //    })

       elementsReadonly.forEach(element =>{
        if(element.name != 'idcpnt' && element.name != 'codigo'){
          element.removeAttribute('readonly')
          element.classList.toggle('input-disable')
        }
       })
 
     });
 
     
 
     }
     function deleteCpnt(idpc){
     idpc = idpc.replaceAll(`'`, `"`)
     const data = JSON.parse(idpc);
     console.log(data);
     const contentDeleteForm = `
     <div class="header">
        <i class="fa-solid fa-computer"></i>
        <div>
           <div class="title">Ver Computador</div>
           <div class="subtitle">Visualize as informações dos computadores</div>
        </div>
     </div>
     <form id="formeditcomponents" action="index.php?page=manage&r=components" method="post">
        <input type="hidden" name="idcpnt" value="">
        <div class="row">
        <span class="danger">ATENÇÃO
        <p>
            Deseja APAGAR os dados deste componente?
        </p>
        </span>
        </div>
        <div class="row radio">
        <div>
           <span>Tipo</span>
           <div>
              <input type="radio" id="monitor" name="tipo" value="monitor" checked disabled>
              <label for="monitor">Monitor</label>

              <input type="radio" id="mouse" name="tipo" value="mouse" disabled>
              <label for="mouse">Mouse</label>

              <input type="radio" id="teclado" name="tipo" value="teclado" disabled>
              <label for="teclado">Teclado</label>
              
              <input type="radio" id="suportenot" name="tipo" value="suportenot" disabled>
              <label for="suportenot">Suporte Notebook</label>
              

              <input type="radio" id="outro" name="tipo" value="outro" disabled>
              <label for="outro">Outro</label>
           </div>
        </div>
     </div>
      <div class="row">
         <div>
            <label for="idpc">Identificação</label>
            <input required type="text" id="idpc" name="idpc"  value="${data.id_cpnt}" readonly class="input-disable"  >
         </div>
         <div >
            <label for="marca">Marca</label>
            <input required type="text" id="marca" name="marca" readonly class="input-disable" value="${data.marca}"
               placeholder="Marca do componente">
         </div>
      </div>
      <div class="row">
      <div>
         <label for="modelo">Modelo</label>
         <input required type="text" id="modelo" name="modelo" readonly class="input-disable" value="${data.modelo}"
            placeholder="Modelo do componente">
      </div>
         <div>
            <label for="tamanho">Tamanho</label>
            <input required type="text" id="tamanho" name="tamanho"  readonly class="input-disable" value="${data.tamanho}"
            placeholder="Tamanho do componente">
         </div>
      </div>
      <div class="row">
      <div>
      <label for="numserie">N/S</label>
      <input required type="text" id="numserie" name="numserie" readonly class="input-disable" value="${data.numserie}"
      placeholder="Numero de série do componente">
      </div>
      <div>
         <label for="codigo">Código</label>
         <input required type="text" id="codigo" name="codigo" maxlength="10" readonly class="input-disable" value="${data.codigo}"
            pattern="[0-9]{2}.[0-9]{2}.[0-9]{4}" placeholder="00.00.0000">
      </div>
      </div>
        <div class="row row-button">
            <a href="index.php?page=manage&r=components&codigo=${data.codigo}&id=${data.id_cpnt}"  class="btn btn-danger"> Apagar </a>
            <a class="btn btn-secondary" id="formCancel">Cancelar</a>
        </div>
     </form>
     `;
     createContainer(contentDeleteForm);
     insertCheckRadio(data.tipo)
     }
     
    