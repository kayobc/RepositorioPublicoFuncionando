<?php

include 'Demo_bd_connnection.php';

$conexaobd = AbreCon();
$user = $_POST['text_login'];
$senha = hash("sha256", $_POST['text_senha']);

if ($conexaobd -> connect_error) {
  die("Falha na conexao com o banco de dados:" .$conexaobd -> connect_error);
}

$verifica = mysqli_query($conexaobd, "SELECT * FROM usuario WHERE usuario = '$user' AND senha = '$senha'");

if (mysqli_num_rows($verifica)<=0){
  echo "NOK";
  }
else {
	   echo "OK";
      }


FechaCon($conexaobd);

?>
