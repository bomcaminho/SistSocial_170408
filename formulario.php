<?php
header('Content-type: text/html; charset=utf-8');
define( 'MYSQL_HOST', 'mysql02.site1371575879.hospedagemdesites.ws' );
define( 'MYSQL_USER', 'site13715758791' );
define( 'MYSQL_PASSWORD', 'social102030' );
define( 'MYSQL_DB_NAME', 'site13715758791' );
$conecta = new PDO( 'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD );

//Limita o número de registros a serem mostrados por página
$limite = 4;
//Se pg não existe atribui 1 a variável pg
$pg = (isset($_GET['pg'])) ? (int)$_GET['pg'] : 1 ;
//Atribui a variável inicio o inicio de onde os registros vão ser mostrados por página, exemplo 0 à 10, 11 à 20 e assim por diante
$inicio = ($pg * $limite) - $limite;
 
//seleciona os registros do banco de dados pelo inicio e limitando pelo limite da variável limite
$sql = "SELECT * FROM tbfamilias ORDER BY id DESC LIMIT ".$inicio. ",". $limite;
 
try{
  $query = $conecta->prepare($sql);  
  $query->execute();
   
  }catch(PDOexception $error_sql){
  echo 'Erro ao retornar os Dados.'.$error_sql->getMessage();
}
?>

<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>Documento sem título</title>
<style rel="stylesheet" type="text/css">
   <!-- Regras do estilo do CSS aqui -->
   fieldset{
     width:40%;
   }
   body{
     bgcolor:blue;
     }
   h1{
    margin-left:350px;
   }
   table{
    border-collapse: collapse;
    border: 1px solid black;
    width: 1000px
   }
   .verde{
    width: 1000px;
   }
  
    
   
</style>
</head>

<body>
<div class="verde" id="primeira">
<img src="Scan0005.jpg" width="1100px" height="200px">
<form method="post" name="form1" id="form1" style="border-color: #000000 #000000 #F3EFEF;" accept-charset="UTF-8">
  <?php 
  while($linha = $query->fetch(PDO::FETCH_ASSOC)){
  echo'<p>
  <fieldset style = "width:50%">
    <label for="textfield2"><br>
    Responsável pela família: </label>
    <input name="textfield2" type="text" value="'.$linha["nomeDoResponsavel"].'" id="textfield2" size="90">
    <label for="textfield"><br>
    </label>
  </p>
  <p>
    <label for="textfield13">Número de inscrição social (INSS)</label>
    :
<input name="textfield12" type="text" id="textfield13" size="30">
    CPF
  <label for="textfield3">:</label>
    <u><input name="textfield3" type="text" value="'.$linha["cpfDoResponsavel"].'"id="textfield3" size="25"></u>
    <label for="textfield4">RG:</label>
    <input name="textfield4" type="text" value="'.$linha["rgDoResponsavel"].'" id="textfield4" size="25">
  </p>
  <p>
    <label for="textfield5">Endereço:</label>
    <input name="textfield5" value="'.$linha["ruaDaFamilia"].'" type="text" id="textfield5" size="125">
  </p>
  <p>
    <label for="textfield6">Bairro:</label>
    <input name="textfield6" value="'.$linha["bairroDaFamilia"].'" type="text" id="textfield6" size="50">
    <label for="textfield7">CEP:</label>
    <input type="text" name="textfield7" value="'.$linha["cepDaFamilia"].'" id="textfield7">
    <label for="textfield8">Cidade:</label>
    <input name="textfield8" value="'.$linha["cidadeDaFamilia"].'" type="text" id="textfield8" size="30">
  </p>
  <p>
    <label for="textfield9">Telefone:</label>
    <input name="textfield9" type="text" value="'.$linha["telResidencial"].'" id="textfield9" size="35">
    <label for="textfield10">Estado civil:</label>
    <input name="textfield10" type="text" value="'.$linha["estadoCivilDoResponsavel"].'" id="textfield10" size="25">
    <label for="1">Número de pessoas na casa:</label>
    <input name="1" type="text" id="1" size="15">
  </p>
  <table width="1111" height="85" border="1">
    <tr>
      <td rowspan="2" align="center">Faixa etária:</td>
      <td align="center">0 a 6 anos</td>
      <td align="center">7 a 16 anos</td>
      <td align="center">16 a 17 anos</td>
      <td align="center">18 a 64 anos</td>
      <td align="center">Acima de 65 anos</td>
    </tr>
    <tr>

  <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
    </tr>
  </table>
  </fieldset>
  
  <br>';
  }
 //seleciona o total de registros  
  $sql_Total = 'SELECT id FROM tbfamilias';
   
 try{
  $query_Total = $conecta->prepare($sql_Total);  
  $query_Total->execute();
   
  $query_result = $query_Total->fetchAll(PDO::FETCH_ASSOC);
   
  //conta quantos registros tem no banco de dados
  $query_count =  $query_Total->rowCount(PDO::FETCH_ASSOC);
  
 //calcula o total de paginas a serem exibidas
  $qtdPag = ceil($query_count/$limite);
   
  }catch(PDOexception $error_Total){
  echo 'Erro ao retornar os Dados. '.$error_Total->getMessage();
}
 
//Cria os links para navegação das paginas
echo ' <br><br> <a href="formulario.php?pg=1">PRIMEIRA PÁGINA</a>   ';
       if($qtdPag > 1 && $pg<= $qtdPag){
         for($i=1; $i <= $qtdPag; $i++){
              
             if($i == $pg){
                  
                 echo $i;
             }else{
           
         echo "<a href='formulario.php?pg=$i'>".$i."</a>";
           }
        }
 
       }
       echo "    <a href=\"formulario.php?pg=$qtdPag\">ÚLTIMA PÁGINA</a>  ";
  ?>
    <!--<p>
  <fieldset style = "width:50%">
    <label for="textfield2"><br>
    Responsável pela família: </label>
    <input name="textfield2" type="text" id="textfield2" size="90">
    <label for="textfield"><br>
    </label>
  </p>
  <p>
    <label for="textfield13">Número de inscrição social (INSS)</label>
    :
<input name="textfield12" type="text" id="textfield13" size="30">
    CPF
  <label for="textfield3">:</label>
    <input name="textfield3" type="text" id="textfield3" size="25">
    <label for="textfield4">RG:</label>
    <input name="textfield4" type="text" id="textfield4" size="25">
  </p>
  <p>
    <label for="textfield5">Endereço:</label>
    <input name="textfield5" type="text" id="textfield5" size="125">
  </p>
  <p>
    <label for="textfield6">Bairro:</label>
    <input name="textfield6" type="text" id="textfield6" size="50">
    <label for="textfield7">CEP:</label>
    <input type="text" name="textfield7" id="textfield7">
    <label for="textfield8">Cidade:</label>
    <input name="textfield8" type="text" id="textfield8" size="30">
  </p>
  <p>
    <label for="textfield9">Telefone:</label>
    <input name="textfield9" type="text" id="textfield9" size="35">
    <label for="textfield10">Estado civil:</label>
    <input name="textfield10" type="text" id="textfield10" size="25">
    <label for="1">Número de pessoas na casa:</label>
    <input name="1" type="text" id="1" size="15">
  </p>
  <table width="1111" height="85" border="1">
    <tr>
      <td rowspan="2" align="center">Faixa etária:</td>
      <td align="center">0 a 6 anos</td>
      <td align="center">7 a 16 anos</td>
      <td align="center">16 a 17 anos</td>
      <td align="center">18 a 64 anos</td>
      <td align="center">Acima de 65 anos</td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
    </tr>
  </table>
  </fieldset>
  <br>
  <p>
  <fieldset style = "width:50%">
    <label for="textfield2"><br>
    Responsável pela família: </label>
    <input name="textfield2" type="text" id="textfield2" size="90">
    <label for="textfield"><br>
    </label>
  </p>
  <p>
    <label for="textfield13">Número de inscrição social (INSS)</label>
    :
<input name="textfield12" type="text" id="textfield13" size="30">
    CPF
  <label for="textfield3">:</label>
    <input name="textfield3" type="text" id="textfield3" size="25">
    <label for="textfield4">RG:</label>
    <input name="textfield4" type="text" id="textfield4" size="25">
  </p>
  <p>
    <label for="textfield5">Endereço:</label>
    <input name="textfield5" type="text" id="textfield5" size="125">
  </p>
  <p>
    <label for="textfield6">Bairro:</label>
    <input name="textfield6" type="text" id="textfield6" size="50">
    <label for="textfield7">CEP:</label>
    <input type="text" name="textfield7" id="textfield7">
    <label for="textfield8">Cidade:</label>
    <input name="textfield8" type="text" id="textfield8" size="30">
  </p>
  <p>
    <label for="textfield9">Telefone:</label>
    <input name="textfield9" type="text" id="textfield9" size="35">
    <label for="textfield10">Estado civil:</label>
    <input name="textfield10" type="text" id="textfield10" size="25">
    <label for="1">Número de pessoas na casa:</label>
    <input name="1" type="text" id="1" size="15">
  </p>
  <table width="1111" height="85" border="1">
    <tr>
      <td rowspan="2" align="center">Faixa etária:</td>
      <td align="center">0 a 6 anos</td>
      <td align="center">7 a 16 anos</td>
      <td align="center">16 a 17 anos</td>
      <td align="center">18 a 64 anos</td>
      <td align="center">Acima de 65 anos</td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
    </tr>
  </table>
  </fieldset>
  <br>
  <p>
  <fieldset style = "width:50%">
    <label for="textfield2"><br>
    Responsável pela família: </label>
    <input name="textfield2" type="text" id="textfield2" size="90">
    <label for="textfield"><br>
    </label>
  </p>
  <p>
    <label for="textfield13">Número de inscrição social (INSS)</label>
    :
<input name="textfield12" type="text" id="textfield13" size="30">
    CPF
  <label for="textfield3">:</label>
    <input name="textfield3" type="text" id="textfield3" size="25">
    <label for="textfield4">RG:</label>
    <input name="textfield4" type="text" id="textfield4" size="25">
  </p>
  <p>
    <label for="textfield5">Endereço:</label>
    <input name="textfield5" type="text" id="textfield5" size="125">
  </p>
  <p>
    <label for="textfield6">Bairro:</label>
    <input name="textfield6" type="text" id="textfield6" size="50">
    <label for="textfield7">CEP:</label>
    <input type="text" name="textfield7" id="textfield7">
    <label for="textfield8">Cidade:</label>
    <input name="textfield8" type="text" id="textfield8" size="30">
  </p>
  <p>
    <label for="textfield9">Telefone:</label>
    <input name="textfield9" type="text" id="textfield9" size="35">
    <label for="textfield10">Estado civil:</label>
    <input name="textfield10" type="text" id="textfield10" size="25">
    <label for="1">Número de pessoas na casa:</label>
    <input name="1" type="text" id="1" size="15">
  </p>
  <table width="1111" height="85" border="1">
    <tr>
      <td rowspan="2" align="center">Faixa etária:</td>
      <td align="center">0 a 6 anos</td>
      <td align="center">7 a 16 anos</td>
      <td align="center">16 a 17 anos</td>
      <td align="center">18 a 64 anos</td>
      <td align="center">Acima de 65 anos</td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
    </tr>
  </table>
  </fieldset>
  <br>
</form> -->
</div>
</body>
</html>
