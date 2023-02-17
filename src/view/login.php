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

<?php 
$contentUser = "
ALEX PINHOL DA SILVA,
alex.pinhol@webfoco.com-LEONARDO RIBEIRO MUNHOZ,
leonardo.munhoz@webfoco.com-BEATRICE TELES DE CASTRO,
beatrice.castro@webfoco.com-WALLACE RIO DE SOUZA,
wallace@webfoco.com-TALITA SALES CASTANHARO,
talita.sales@webfoco.com-AGNES LOURENZO HEHN,
agnes.lourenzo@webfoco.com-CARLA SUZANO AFONSO,
carla@webfoco.com-WESLEY FERREIRA COELHO,
wesley.ferreira@webfoco.com-MOISÉS GIMENEZ PRETTI,
moises@webfoco.com-ISABELA PINHOL DA SILVA,
isabela@webfoco.com-BARBARA BIANCA MATHIAS,
barbara.mathias@webfoco.com-PALOMA MORENO MONTENEGRO,
paloma.montenegro@webfoco.com-GUILHERME CASTILHO PINTO,
guilherme.castilho@webfoco.com-BRUNA YUKARI AIABE,
bruna.aiabe@webfoco.com-ALEXANDRE SANTOS SILVA,
alexandre.santos@webfoco.com-LUANE GABRIELA ROCHA REIS,
luane.reis@webfoco.com-INGRID SILVA OSTI,
ingrid.osti@webfoco.com-PRISCILLA DE SOUZA LIMA OLIVEIRA,
priscilla.lima@webfoco.com-VICTORIA CAROLLINY MARTINS TENORIO,
victoria.tenorio@webfoco.com-GABRIELLY DE SOUZA,
gabrielly.souza@webfoco.com-KARINA GOMES DA SILVA,
karina.gomes@webfoco.com-MATHEUS CHAUBET CORDEIRO,
matheus.chaubet@webfoco.com-RITA DE CASSIA PASSOS FERREIRA,
rita.passos@webfoco.com-DANIEL VALENCIANO GIMENES,
daniel.gimenes@webfoco.com-LETÍCIA DIAS COSTA,
leticia.costa@webfoco.com-CAIO MORADEI FRADE,
caio.frade@webfoco.com-RODRIGO OLIVEIRA ARAUJO,
rodrigo.araujo@webfoco.com-LUCAS VERONEZE TOLA,
lucas.veroneze@webfoco.com-RENATA FIDELIS DE CARVALHO RISSARDI,
renata.fidelis@webfoco.com-GIOVANNA ZAGHIS MATTOS,
giovanna.mattos@webfoco.com-KARINA GOMES DE OLIVEIRA,
karina.oliveira@webfoco.com-BEATRIZ STROZZI LOPES,
beatriz.strozzi@webfoco.com-GABRIEL D'AVOLA BRITES,
gabriel.brites@webfoco.com-NICOLE MARTINS SILVA SOARES MAIA,
nicole.martins@webfoco.com-SUZANA RODRIGUES DEZENA,
suzana.rodrigues@webfoco.com-BEATRIZ NOTABILE NUNES,
beatriz.nunes@webfoco.com-IGOR MARCELO ZACARIAS OLIVEIRA,
igor.oliveira@webfoco.com-WILLIAN GOUVEIA FERREIRA,
willian.gouveia@webfoco.com-LEONARDO ROCHA DE CASTRO,
leonardo.rocha@webfoco.com-EVELEN GIOVANA SILVA DE JESUS,
evelen.giovana@webfoco.com-CESAR AUGUSTO SCHIAVETTI DE TOLEDO PIZA,
cesar.piza@webfoco.com-ANA CAROLINA DOS SANTOS BATISTA,
ana.carolina@webfoco.com-BRUNO MARQUESINI SILVA,
bruno.marquesini@webfoco.com-ISABELY AQUINO TEIXEIRA,
isabely.aquino@webfoco.com-PAULO LUCAS LIMA DE OLIVEIRA,
paulo.oliveira@webfoco.com-LEONARDO DE SOUZA,
leonardo.souza@webfoco.com-LEONARDO SANTANA NOGUEIRA,
leonardo.santana@webfoco.com-DANIELA SALVIANO,
daniela.salviano@webfoco.com-DIEGO SILVA CARDOSO,
diego.cardoso@webfoco.com-RITA DE CÁSSIA RIBEIRO LEANDRO,
rita.ribeiro@webfoco.com-BEATRIZ MITTERMAYER,
beatriz.mittermayer@webfoco.com-ANDRÉ D'AVOLA BRITES,
andre.brites@webfoco.com-MARIA LUIZA GRADIN,
luiza.gradin@webfoco.com-LEONARDO RODRIGUES,
leonardo.rodrigues@webfoco.com-DAYRA DANIELLI DA SILVA,
dayra.silva@webfoco.com-VITÓRIA LINO DO NASCIMENTO LOPES,
vitoria.nascimento@webfoco.com-ALANA OLIVEIRA VERAS,
alana.oliveira@webfoco.com-ISANI CRISTINA NICÁCIO SILVA,
cristina.silva@webfoco.com-ANA FLÁVIA MARTINS SENA,
ana.flavia@webfoco.com-RAFAEL ALMEIDA DOS REIS,
rafael.reis@webfoco.com-DANILO KAUAN DA SILVA,
danilo.kauan@webfoco.com-DAYSE FERREIRA DE OLIVEIRA-dayse.ferreira@webfoco.com-TAWAN RIO DE SOUZA,
tawan.rio@webfoco.com-LUANA FERREIRA DE PAULA,
luana.ferreira@webfoco.com-STEPHANIE VICTORINO SERAFINI,
stephanie.victorino@webfoco.com-RODRIGO LUIZ SZILAGY PENTEADO,
rodrigo.szilagy@webfoco.com-JULIA GANDIN FERREIRA,
julia.gandin@webfoco.com-DAYANI ROSA DOS SANTOS,
dayani.rosa@webfoco.com-DEBORA VICENTE SANTOS,
debora.vicente@webfoco.com-EDUARDO GOMES DOS SANTOS,
eduardo.gomes@webfoco.com-CAROLINE DE OLIVEIRA LABIS BARROS,
caroline.labis@webfoco.com-LUANA DARDES PAULIN,
luana.paulin@webfoco.com-VANESSA GERALDA DA SILVA,
vanessa.geralda@webfoco.com-ULISSES MARINI DE OLIVEIRA,
ulisses.marini@webfoco.com-LUCAS MARTINS NUNES,
lucas.nunes@webfoco.com-BARBARA ZAMPOLI DE OLIVEIRA,
barbara.zampoli@webfoco.com-Table>
";


