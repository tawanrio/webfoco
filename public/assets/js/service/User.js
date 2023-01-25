function checkPassWord(){
    let confirmsenha = document.querySelector('input#confirmsenha'),
     msgerrorpass = document.querySelector('span#msgerrorpass'),
     senha = document.querySelector('input#senha'),
     btnsalvar = document.querySelector('form#formnewuser button')
     
    
    if (confirmsenha.value == '') return 

    if (!(senha.value === confirmsenha.value) && (msgerrorpass.classList.contains('hiden'))) {
            confirmsenha.classList.toggle('incorrect-pass')
            senha.classList.toggle('incorrect-pass')
            msgerrorpass.classList.toggle('hiden')
            btnsalvar.classList.toggle('disabled')
            
            
            return
        }
        if ((senha.value === confirmsenha.value) && !msgerrorpass.classList.contains('hiden')) {
            confirmsenha.classList.toggle('incorrect-pass')
            senha.classList.toggle('incorrect-pass')
            msgerrorpass.classList.toggle('hiden')
            btnsalvar.classList.toggle('disabled')
    }
}

function addNewUser(pcAvailable){
   pcAvailable = pcAvailable.replaceAll(`'`, `"`)
   const available = JSON.parse(pcAvailable);

   let iteration = Object.values(available);
   
   let list = []
   for (let i = 2; i < iteration.length; i++) {
      let texto = "<option value='"+available[i]['id_pc']+"'>"
      texto += 'ID: ' + available[i]['id_pc'];
      texto += ' - ' + available[i]['marca']
      texto += ' - ' + available[i]['processador']
      texto += ' - ' + available[i]['memoria']
      texto += '</option>'

      list.push(texto);
   }
   
 

   const contentCreateUser = `
<div class="header">
<i class="fa-solid fa-user"></i>  <div>
     <div class="title">Cadastrar Colaborador</div>
     <div class="subtitle">Adicione os dados dos novos Colaboradores</div>
  </div>
</div>
  <form id="formnewuser" action="index.php?page=manage&r=user" method="post">
       <input type="hidden" name="id" value="">
       <div class="row">
           <div class="time">
            <label for="time">Escolha o seu time</label>
            <select name="time" id="time">
               <option value="bi">B.I</option>
               <option value="comercial">Comercial</option>
               <option value="criacao">Criação</option>
               <option value="cs">CS</option>
               <option value="dev">Desenvolvimento</option>
               <option value="financeiro">Financeiro</option>
               <option value="inboud">Inbound</option>
               <option value="marketing">Marketing</option>
               <option value="midia">Mídia</option>
               <option value="redacao">Redação</option>
               <option value="rh">RH</option>
               <option value="SEO">SEO</option>
               <option value="social">Social</option>
            </select>
           </div>
       </div>
       <div class="row">
       <div >
         <label for="nome">Nome</label>
         <input required type="text" id="nome" name="nome"  maxlength="15"
         placeholder="Nome do colaborador">
         </div>
         <div>
            <label for="sobrenome">Sobrenome</label>
            <input required type="text" id="sobrenome" name="sobrenome" value=""  maxlength="25"
            placeholder="Sobrenome do colaborador">
         </div>
       </div>
       
       <div class="row">
         <div>
            <label for="cpf">CPF</label>
            <input required type="tel" id="cpf"   maxlength="11"  minlength="11" name="cpf" placeholder="Numero CPF">
         </div>
           <div>
               <label for="email">Email</label>
               <input required type="text" id="email" name="email" value=""  maxlength="30"
               placeholder="fulano@webfoco.com">
           </div>
       </div>
       <div class="row">
           <div>
               <label for="senha">Senha</label>
               <input  type="password" id="senha" name="senha" placeholder="Senha" minlength="3"  maxlength="25">
           </div>
           <div>
               <label for="confirmsenha">Confirmar Senha</label>
               <input  type="password" id="confirmsenha" name="confirmsenha" placeholder="Confirme sua Senha"  maxlength="25">
           </div>
       </div>
       <div class="row">
           <div>
           <span id="msgerrorpass" class="hiden pass-error">* As senhas não coincidem, tente novamente</span>
           </div>
       </div>
       
       <div class="row">
           
         <div>
            <label for="telpessoal">Telefone Pessoal</label>
            <input required type="tel" id="telpessoal"   maxlength="9"  minlength="8" name="telpessoal" placeholder="Numero do telefone pessoal">
        </div>
           <div>
               <label for="telempresarial">Telefone empresarial</label>
               <input type="text" id="telempresarial" name="telempresarial" maxlength="9"  minlength="8" placeholder="Numero do telefone empresarial">
           </div>
       </div>
       <div class="row">
       <div>
            <label for="idpcu">Computador</label>
            <select name="idpcu" id="idpcu">
               <option value="name">Atribua um Computador a este Colaborador</option>
                <option value="null">Sem Computador</option>
                <option value="999">Computador Próprio</option>
               ${setTimeout(() => {
                  list.forEach(computador => {
                  let select = document.querySelector('#idpcu')
                  select.innerHTML += computador
               })
               }, 10)
            }
            </select>
         </div>
        <div id="radio">
                <div>
                <label for="isadmin">Administrador</label>
                    <input type="checkbox" name="isadmin" id="isadmin" value="1">
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
   createContainer(contentCreateUser);


   document.querySelector('input#senha').addEventListener('input', function(e){
       checkPassWord()
   })

    document.querySelector('input#confirmsenha').addEventListener('input', function(){
      checkPassWord()
    })
}

function editUser(iduser, listAllComputer){
  iduser = iduser.replaceAll(`'`, `"`)
  const data = JSON.parse(iduser);

  listAllComputer = listAllComputer.replaceAll(`'`, `"`)
  const allComputer = JSON.parse(listAllComputer);
  
  
  
  let iteration = Object.values(allComputer);
  console.log(data.CPF);
   
   let list = []
   for (let i = 1; i < iteration.length; i++) {
    if(iteration[i]['name'] == '' || data['id_pc'] == iteration[i]['id_pc']){
        let texto = "<option value='" + iteration[i]['id_pc'] + "' "
        if(data['id_pc'] == iteration[i]['id_pc']){
            texto += 'selected'
        }
        texto += ">"
        texto += 'ID: ' + iteration[i]['id_pc'];
        texto += ' - ' + iteration[i]['marca']
        texto += ' - ' + iteration[i]['processador']
        texto += ' - ' + iteration[i]['memoria']
        if(data['id_pc'] == iteration[i]['id_pc']){
        texto += ' - ' + iteration[i]['name']
        }
        texto += '</option>'
        
        list.push(texto);
    }
   }
   
   let time = [
      "bi",
      "comercial",
      "criacao",
      "cs",
      "dev",
      "financeiro",
      "inboud",
      "marketing",
      "mídia",
      "redacao",
      "rh",
      "SEO",
      "social"
  ]

   const contentEditForm = `
   <div class="header">
   <i class="fa-solid fa-user"></i>  <div>
        <div class="title">Editar Colaborador</div>
        <div class="subtitle">Altere os dados dos seus Colaboradores</div>
     </div>
   </div>
     <form id="formnewuser" action="index.php?page=manage&r=user" method="post">
          <input type="hidden" name="id" value="${data.id_user}">
          <div class="row">
              <div class="time">
               <label for="time">Escolha o seu time</label>
               <select name="time" id="time">
                      ${
                        setTimeout(() => {
                           
                          time.forEach(area => {
                              let texto = "<option value='" + area + "'" 
                              if(data.time.toLowerCase() == area.toLowerCase()){
                                  texto += ' selected'
                              }
                              texto += ">"
                              area = area.replaceAll('cao', 'ção')
                              area = area.replaceAll('midia', 'mídia')
                              area = area.replaceAll('dev', 'desenvolvimento')
                              area = area.replaceAll('bi', 'B.I')
                              texto += area[0].toUpperCase() + area.substring(1);
                              texto += '</option>'

                              document.querySelector('select#time').innerHTML += texto
                          });

                        }, 50)
                      }
               </select>
              </div>
          </div>
          <div class="row">
          <div >
            <label for="nome">Nome</label>
            <input required type="text" id="nome" name="nome"  maxlength="15"
            placeholder="Nome do colaborador" value="${data.name}">
            </div>
            <div>
               <label for="sobrenome">Sobrenome</label>
               <input required type="text" id="sobrenome" name="sobrenome" value="${data.sobrenome}"  maxlength="15"
               placeholder="Sobrenome do colaborador">
            </div>
          </div>
          
          <div class="row">
          <div>
          <label for="cpf">CPF</label>
          <input required type="tel" id="cpf"   maxlength="11"  minlength="11" name="cpf" placeholder="Numero CPF" value="${data.CPF}">
       </div>
              <div>
                  <label for="email">Email</label>
                  <input required type="text" id="email" name="email" value="${data.email}"  maxlength="30"
                  placeholder="fulano@webfoco.com" >
              </div>
          </div>
          <div class="row">
              <div>
                  <label for="senha">Senha</label>
                  <input  id="senha" type="password" id="senha" name="senha" value="${data.password}"
                   placeholder="Senha"  maxlength="25">
              </div>
              <div>
                  <label for="confirmsenha">Confirmar Senha</label>
                  <input  id="confirmsenha" type="password" id="confirmsenha" value="${data.password}"
                   name="confirmsenha" placeholder="Confirme sua Senha"  maxlength="25">
              </div>
          </div>
          <div class="row">
           <div>
            <span id="msgerrorpass" class="hiden pass-error">* As senhas não coincidem, tente novamente</span>
           </div>
        </div>
          
          <div class="row">
            
          <div>
          <label for="telpessoal">Telefone Pessoal</label>
          <input required type="tel" id="telpessoal"   maxlength="9"  minlength="8" name="telpessoal" placeholder="Numero do telefone pessoal"  value="${data.telPessoal}">
          
          </div>
          <div>
          <label for="telempresarial">Telefone empresarial</label>
          <input type="tel" id="telempresarial" minlength="8" maxlength="9" name="telempresarial" placeholder="Numero do telefone empresarial" value="${data.telEmpresarial}">
          </div>
          </div>
        <div class="row">
        <div>
         <label for="idpcu">Computador</label>
         <select name="idpcu" id="idpcu">
            <option value="">Atribua um Computador a este Colaborador</option>
            <option value="null">Sem Computador</option>
            <option value="999">Computador Próprio</option>
            ${setTimeout(() => {
               list.forEach(computador => {
               let select = document.querySelector('#idpcu')
               select.innerHTML += computador
            }) 
            }, 10)
         }
         </select>
      </div>
        <div id="radio">
                <div>
                <label for="isadmin">Administrador</label>
                    <input type="checkbox" name="isadmin" id="isadmin" value="1">
                </div>
            </div>
        </div>
         
          <div class="row row-button">
             <button class="btn btn-primary">Salvar</button>
             <a class="btn btn-secondary" id="formCancel">Cancelar</a>
           </div>
      </form>
      `;

   createContainer(contentEditForm);

   document.querySelector('input#senha').addEventListener('input', function(e){
    checkPassWord()
})

 document.querySelector('input#confirmsenha').addEventListener('input', function(){
   checkPassWord()
 })
}

function deleteUser(iduser, listAllComputer){
    iduser = iduser.replaceAll(`'`, `"`)
  const data = JSON.parse(iduser);

  listAllComputer = listAllComputer.replaceAll(`'`, `"`)
  const allComputer = JSON.parse(listAllComputer);
  
  
  
  let iteration = Object.values(allComputer);
  console.log(data.CPF);
   
   let list = []
   for (let i = 1; i < iteration.length; i++) {
    if(iteration[i]['name'] == '' || data['id_pc'] == iteration[i]['id_pc']){
        let texto = "<option value='" + iteration[i]['id_pc'] + "' "
        if(data['id_pc'] == iteration[i]['id_pc']){
            texto += 'selected'
        }
        texto += ">"
        texto += 'ID: ' + iteration[i]['id_pc'];
        texto += ' - ' + iteration[i]['marca']
        texto += ' - ' + iteration[i]['processador']
        texto += ' - ' + iteration[i]['memoria']
        if(data['id_pc'] == iteration[i]['id_pc']){
        texto += ' - ' + iteration[i]['name']
        }
        texto += '</option>'
        
        list.push(texto);
    }
   }
   
   let time = [
      "bi",
      "comercial",
      "criacao",
      "cs",
      "dev",
      "financeiro",
      "inboud",
      "marketing",
      "mídia",
      "redacao",
      "rh",
      "SEO",
      "social"
  ]

   const contentDeleteForm = `
   <div class="header">
   <i class="fa-solid fa-user"></i>  <div>
        <div class="title">Deletar Colaborador</div>
        <div class="subtitle">Apague os dados dos seus Colaboradores</div>
     </div>
   </div>
     <form id="formnewuser" action="index.php?page=manage&r=user" method="post">
          <input type="hidden" name="id" value="${data.id_user}">
          <div class="row">
              <div class="time">
               <label for="time">Escolha o seu time</label>
               <select name="time" id="time" disabled>
                      ${
                        setTimeout(() => {
                           
                          time.forEach(area => {
                              let texto = "<option value='" + area + "'" 
                              if(data.time.toLowerCase() == area.toLowerCase()){
                                  texto += ' selected'
                              }
                              texto += ">"
                              area = area.replaceAll('cao', 'ção')
                              area = area.replaceAll('midia', 'mídia')
                              area = area.replaceAll('dev', 'desenvolvimento')
                              area = area.replaceAll('bi', 'B.I')
                              texto += area[0].toUpperCase() + area.substring(1);
                              texto += '</option>'

                              document.querySelector('select#time').innerHTML += texto
                          });

                        }, 50)
                      }
               </select>
              </div>
          </div>
          <div class="row">
          <div >
            <label for="nome">Nome</label>
            <input required type="text" id="nome" name="nome"  maxlength="15"  readonly class="input-disable" 
            placeholder="Nome do colaborador" value="${data.name}">
            </div>
            <div>
               <label for="sobrenome">Sobrenome</label>
               <input required type="text" id="sobrenome" name="sobrenome" value="${data.sobrenome}"  maxlength="15"  readonly class="input-disable" 
               placeholder="Sobrenome do colaborador">
            </div>
          </div>
          
          <div class="row">
          <div>
          <label for="cpf">CPF</label>
          <input required type="tel" id="cpf"   maxlength="11"  minlength="11" name="cpf" placeholder="Numero CPF" value="${data.CPF}"  readonly class="input-disable" >
       </div>
              <div>
                  <label for="email">Email</label>
                  <input required type="text" id="email" name="email" value="${data.email}"  maxlength="30"  readonly class="input-disable" 
                  placeholder="fulano@webfoco.com" >
              </div>
          </div>
          <div class="row">
              <div>
                  <label for="senha">Senha</label>
                  <input required id="senha" type="password" id="senha" name="senha" value="${data.password}"  readonly class="input-disable" 
                   placeholder="Senha"  maxlength="25">
              </div>
              <div>
                  <label for="confirmsenha">Confirmar Senha</label>
                  <input required id="confirmsenha" type="password" id="confirmsenha" value="${data.password}"  readonly class="input-disable" 
                   name="confirmsenha" placeholder="Confirme sua Senha"  maxlength="25">
              </div>
          </div>
          <div class="row">
           <div>
            <span id="msgerrorpass" class="hiden pass-error">* As senhas não coincidem, tente novamente</span>
           </div>
        </div>
          
          <div class="row">
            
          <div>
          <label for="telpessoal">Telefone Pessoal</label>
          <input required type="tel" id="telpessoal"  readonly class="input-disable"   maxlength="9"  minlength="8" name="telpessoal" placeholder="Numero do telefone pessoal"  value="${data.telPessoal}">
          
          </div>
          <div>
          <label for="telempresarial">Telefone empresarial</label>
          <input type="tel" id="telempresarial"  readonly class="input-disable"  minlength="8" maxlength="9" name="telempresarial" placeholder="Numero do telefone empresarial" value="${data.telEmpresarial}">
          </div>
          </div>
        <div class="row">
        <div>
         <label for="idpcu">Computador</label>
         <select name="idpcu" id="idpcu" disabled>
            <option value="null">Atribua um Computador a este Colaborador</option>
            <option value="0">Maquina Pessoal</option>
            ${setTimeout(() => {
               list.forEach(computador => {
               let select = document.querySelector('#idpcu')
               select.innerHTML += computador
            }) 
            }, 10)
         }
         </select>
      </div>
        <div id="radio">
                <div>
                <label for="isadmin">Administrador</label>
                    <input type="checkbox" name="isadmin" id="isadmin" value="1" disabled>
                </div>
            </div>
        </div>
         
          <div class="row row-button">
             <a href="index.php?page=manage&r=user&id=${data.id_user}&cpf=${data.CPF}"  class="btn btn-danger"> Apagar </a>
             <a class="btn btn-secondary" id="formCancel">Cancelar</a>
           </div>
      </form>
      `;
   createContainer(contentDeleteForm);

}