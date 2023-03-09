<main class="login">


   <div class="login">


      <div class="header">


         <h1>Entrar</h1>


         <p>Faça o login para utilizar o sistema</p>


         <?php if(isset($arr->errors)):; ?>


         <span class="danger"><?= $arr->errors ?></span> 


         <?php endif; ?>


      </div>


      <form action="#" method="post" id="formLogin">


         <div>


            <label for="email">Email:</label>


            <input type="email" name="email" id="email" placeholder="Email do usuário" >


            


            <label for="pass">Senha:</label>


            <input type="text" name="pass" id="pass" placeholder="Insira sua senha" >


         </div>


         <button class="btn">Entrar</button>


      </form>


   </div>


</main>

