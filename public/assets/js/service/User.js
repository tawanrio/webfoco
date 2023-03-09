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



function getAllHistoricMaq(values){

  const arr = values.split(',')

  if(arr == '') return

  arr.forEach(value => {

    descricao = getType(value);

    descricao = descricao.replaceAll(',', ' - ');

     const date = new Date(getDate(value))



     data = `

     <tr>

      <td>${date.toLocaleDateString('pt-BR', {timeZone: 'UTC'})}</td>

        <td>${descricao}</td>

     </tr>

     `

     document.querySelector('#tbodyHisotrico').innerHTML += data

  })

}



function addNewUser(pcAvailable){

   pcAvailable = pcAvailable.replaceAll(`'`, `"`)

   const available = JSON.parse(pcAvailable);

console.log(available);

   let iteration = Object.values(available);

   let list = []



   for (let i = 2; i < iteration.length; i++) {

      let texto = "<option value='" + available[i]['id_pc']+"'>"

      texto += available[i]['codigo'];

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

     <form id="formnewuser" action="index.php${window.location.search}" method="post">

      <input type="hidden" name="form" value="create">

          <input type="hidden" name="id">

          <div class="row">

              

          </div>

          <div class="row">

          <div >

            <label for="nome">Nome</label>

            <input required type="text" id="nome" name="nome"  maxlength="15"

            placeholder="Nome do colaborador">

            </div>

            <div>

               <label for="sobrenome">Sobrenome</label>

               <input required type="text" id="sobrenome" name="sobrenome"   maxlength="20"

               placeholder="Sobrenome do colaborador">

            </div>

          </div>

          <div class="row">

          <div>

          <label for="cpf">CPF</label>

          <input  type="tel" id="cpf"  maxlength="11"  minlength="11" name="cpf" placeholder="Numero CPF">

       </div>

              <div>

                  <label for="email">Email</label>

                  <input  type="text" id="email" name="email"  maxlength="30"

                  placeholder="fulano@webfoco.com" >

              </div>

          </div>

          <div class="row">

              <div>

                  <label for="senha">Senha</label>

                  <input  id="senha" type="password" id="senha" name="senha

                   placeholder="Senha"  maxlength="25">

              </div>

              <div>

                  <label for="confirmsenha">Confirmar Senha</label>

                  <input  id="confirmsenha" type="password" id="confirmsenha"

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

          <input  type="tel" id="telpessoal"  maxlength="9"  minlength="8" name="telpessoal" placeholder="Numero do telefone pessoal" >

          </div>

          <div>

          <label for="telempresarial">Telefone Corporativo</label>

          <input type="tel" id="telempresarial" minlength="8" maxlength="9" name="telempresarial" placeholder="Numero do telefone corporativo">

          </div>

          </div>

        <div class="row">

        <div class="time">

        <label for="time">Time</label>

        <select name="time" id="time">

           <option value="bi">B.I</option>

           <option value="comercial">Comercial</option>

           <option value="criacao">Criação</option>

           <option value="cs">CS</option>

           <option value="dev">Desenvolvimento</option>

           <option value="dir">Diretor(a)</option>

           <option value="financeiro">Financeiro</option>

           <option value="inboud">Inbound</option>

           <option value="marketing">Marketing</option>

           <option value="midia">Mídia</option>

           <option value="redacao">Redação</option>

           <option value="rh">RH</option> 

           <option value="SEO">SEO</option>

           <option value="se">Secretaria</option>

           <option value="social">Social</option>

        </select>

       </div>

        <div>

         <label for="idpcu">Computador</label>

         <select name="idpcu" id="idpcu">

            <option value="">Atribua um Computador a este Colaborador</option>

            <option value="null">Sem Computador</option>

            ${setTimeout(() => {

               list.forEach(computador => {

               let select = document.querySelector('#idpcu')

               select.innerHTML += computador

            }) 

            }, 10)

         }

         </select>

      </div>

      

    </div>

    

    <div class="row">

      <div id="radio">

          <label for="isadmin">Administrador</label>

          <input type="checkbox" name="isadmin" id="isadmin" value="1">

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



  // console.log(data.CPF);



   let list = []

   for (let i = 0; i < iteration.length; i++) {

    if(iteration[i]['name'] == '' || data['id_pc'] == iteration[i]['id_pc']){

        let texto = "<option value='" + iteration[i]['id_pc'] + "' "

        if(data['id_pc'] == iteration[i]['id_pc']){

            texto += 'selected'

        }

        texto += ">"

        texto +=  iteration[i]['codigo'];

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

      "dir",

      "financeiro",

      "inboud",

      "marketing",

      "mídia",

      "redacao",

      "rh",

      "SEO",

      "se",

      "social"

  ]


   const contentEditForm = `

   <div class="header">

   <i class="fa-solid fa-user"></i>  <div>

        <div class="title">Editar Colaborador</div>

        <div class="subtitle">Altere os dados dos seus Colaboradores</div>

     </div>

   </div>

     <form id="formnewuser" action="index.php${window.location.search}" method="post">

      <input type="hidden" name="form" value="edit">

          <input type="hidden" name="id" value="${data.id_user}">

          <div class="row">

              

          </div>

          <div class="row">

          <div >

            <label for="nome">Nome</label>

            <input  type="text" id="nome" name="nome"  maxlength="15" disabled class="input-disable"

            placeholder="Nome do colaborador" value="${data.name}">

            </div>

            <div>

               <label for="sobrenome">Sobrenome</label>

               <input  type="text" id="sobrenome" name="sobrenome" value="${data.sobrenome}"  maxlength="20" disabled class="input-disable"

               placeholder="Sobrenome do colaborador">

            </div>

          </div>

          <div class="row">

          <div>

          <label for="cpf">CPF</label>

          <input  type="tel" id="cpf" disabled class="input-disable"  maxlength="11"  minlength="11" name="cpf" placeholder="Numero CPF" value="${data.CPF}">

       </div>

              <div>

                  <label for="email">Email</label>

                  <input required type="text" id="email" name="email" value="${data.email}"  maxlength="30" disabled class="input-disable"

                  placeholder="fulano@webfoco.com" >

              </div>

          </div>

          <div class="row">

              <div>

                  <label for="senha">Senha</label>

                  <input  id="senha" type="password" id="senha" name="senha" value="${data.password}" disabled class="input-disable"

                   placeholder="Senha"  maxlength="25">

              </div>

              <div>

                  <label for="confirmsenha">Confirmar Senha</label>

                  <input  id="confirmsenha" type="password" id="confirmsenha" value="${data.password}" disabled class="input-disable"

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

          <input type="tel" id="telpessoal" disabled class="input-disable"  maxlength="9"  minlength="8" name="telpessoal" placeholder="Numero do telefone pessoal"  value="${data.telPessoal}">

          </div>

          <div>

          <label for="telempresarial">Telefone Corporativo</label>

          <input type="tel" id="telempresarial" minlength="8" disabled class="input-disable" maxlength="9" name="telempresarial" placeholder="Numero do telefone corporativo" value="${data.telEmpresarial}">

          </div>

          </div>

        <div class="row">

          <div class="time">

                <label for="time">Time</label>

                <select name="time" id="timeArea" disabled class="input-disable">

                        ${

                          setTimeout(() => {
                           console.log(time);
                            time.forEach(area => {

                                let texto = "<option value='" + area + "'" 

                                if(data.time.toLowerCase() == area.toLowerCase()){

                                    texto += ' selected'

                                }

                                texto += ">"

                                area = area.replaceAll('cao', 'ção')

                                area = area.replaceAll('midia', 'mídia')

                                area = area.replaceAll('se', 'Secretaria')
                                
                                area = area.replaceAll('dev', 'desenvolvimento')

                                area = area.replaceAll('dir', 'Diretor(a)')


                                area = area.replaceAll('bi', 'B.I')

                                texto += area[0].toUpperCase() + area.substring(1);

                                texto += '</option>'

                                document.querySelector('select#timeArea').innerHTML += texto

                              //   console.log( document.querySelector('select#timeArea'));

                            });



                          }, 50)

                        }

               </select>

              </div>

        

        <div>

         <label for="idpcu">Computador</label>

         <select name="idpcu" id="idpcu" disabled class="input-disable">

            <option value="">Atribua um Computador a este Colaborador</option>

            <option value="null">Sem Computador</option>

            ${setTimeout(() => {

               list.forEach(computador => {

               let select = document.querySelector('#idpcu')

               select.innerHTML += computador

            }) 

            }, 10)

         }

         </select>

      </div>

      

    </div>

    

    <div class="row">

      <div id="radio">

          <label for="isadmin">Administrador</label>

          <input type="checkbox" disabled class="input-disable" name="isadmin" id="isadmin" value="1">

      </div>

      <div>

      

          <label>

            <a href="#" id="historicoMaq" style="text-decoration-line: underline;">Histórico de Maquinas</a>

          </label>

      </div>

      </div>



          <div class="row row-button">

             <a class="btn btn-green" id="editBtn">Editar</a>

             <a class="btn btn-secondary"  id="formCancel">Cancelar</a>

           </div>

      </form>



      `;

   createContainer(contentEditForm);



   document.querySelector('a#historicoMaq').addEventListener('click', ()=> {

    const historicoMaq = `

  <div class="header">

     <i class="fa-solid fa-computer"></i>

     <div>

        <div class="title">Histórico de Maquinas</div>

        <div class="subtitle">Visualize o histórico de maquinas dos colaboradoes</div>

     </div>

  </div>

  <form id="formeditcomputer" action="index.php?page=manage&route=user" method="post">

     <input type="hidden" name="id" value="">

      <div class="row">

          <table>

             <thead>

                <tr>

                  <th>Data</th>

                  <th>Maquina</th>

                </tr>

             </thead>

             <tbody id="tbodyHisotrico">

             

             </tbody>

          </table>

      </div>

     <div class="row row-button">

        <a class="btn btn-secondary" id="historicoMaqCancel">Cancelar</a>

     </div>

  </form>

  `;

    createContainer(historicoMaq,'historicoMaqBack', 'historicoMaqContainer');

    getAllHistoricMaq(data.historicoMaq);

  });

  

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

     <form id="formnewuser" action="index.php${window.location.search}" method="post">

          <input type="hidden" name="id" value="${data.id_user}">

          <div class="row">

            <span class="danger">ATENÇÃO

              <p>

                Deseja APAGAR os dados desta maquina?

              </p>

            </span>

          </div>

          

          <div class="row">

          <div >

            <label for="nome">Nome</label>

            <input required type="text" id="nome" name="nome"  maxlength="15"  readonly class="input-disable" 

            placeholder="Nome do colaborador" value="${data.name}">

            </div>

            <div>

               <label for="sobrenome">Sobrenome</label>

               <input required type="text" id="sobrenome" name="sobrenome" value="${data.sobrenome}"   maxlength="20"  readonly class="input-disable" 

               placeholder="Sobrenome do colaborador">

            </div>

          </div>

      

          <div class="row">

          <div>

          <label for="cpf">CPF</label>

          <input type="tel" id="cpf"   maxlength="11"  minlength="11" name="cpf" placeholder="Numero CPF" value="${data.CPF}"  readonly class="input-disable" >

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

                  <input id="senha" type="password" id="senha" name="senha" value="${data.password}"  readonly class="input-disable" 

                   placeholder="Senha"  maxlength="25">

              </div>

              <div>

                  <label for="confirmsenha">Confirmar Senha</label>

                  <input id="confirmsenha" type="password" id="confirmsenha" value="${data.password}"  readonly class="input-disable" 

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

          <input type="text" id="telpessoal"  readonly class="input-disable"   maxlength="9"  minlength="8" name="telpessoal" placeholder="Numero do telefone pessoal"  value="${data.telPessoal}">

          

          </div>

          <div>

          <label for="telempresarial">Telefone Corporativo</label>

          <input type="text" id="telempresarial"  readonly class="input-disable"  minlength="8" maxlength="9" name="telempresarial" placeholder="Numero do telefone corporativo" value="${data.telEmpresarial}">

          </div>

          </div>

          <div class="row">

          <div class="time">

                <label for="time">Time</label>

                <select name="time" id="time" disabled class="input-disable">

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

        

        <div>

         <label for="idpcu">Computador</label>

         <select name="idpcu" id="idpcu" disabled class="input-disable">

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

      

    </div>

    

          <div class="row row-button">

             <a href="index.php?page=manage&route=user&idDelete=${data.id_user}"  class="btn btn-danger"> Apagar </a>

             <a class="btn btn-secondary" id="formCancel">Cancelar</a>

           </div>

      </form>



      `;



   createContainer(contentDeleteForm);



}