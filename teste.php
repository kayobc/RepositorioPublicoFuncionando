<?php

$host = "internal-elb-middle-736860084.us-east-1.elb.amazonaws.com";
$user = $_POST['text_login'];
$senha = hash("sha256", $_POST['text_senha']);
$post_data = 'text_login='.$user.'&text_senha='.$senha;

if (empty($_POST['text_login']) || empty($_POST['text_senha'])) {

  echo "<script>window.location.href='index.html';</script>";

}

$midlleconn = fsockopen($host, 80, $errno, $errstr, 60);

if (!$midlleconn) {
    echo "$errstr ($errno)<br />\n";
}

else {
    $out = "POST /Demo_valida_login.php HTTP/1.1\r\n";
    $out .= "Host: internal-elb-middle-736860084.us-east-1.elb.amazonaws.com\r\n";
    $out .= "Content-Type: application/x-www-form-urlencoded\r\n";
    $out .= "Content-Length: ".strlen($post_data)."\r\n";
    $out .= "Connection: Close\r\n\r\n";
    $out .= $post_data . "\r\n\r\n";
    fwrite($midlleconn, $out);

    while (!feof($midlleconn)) {
       $server_response .= fgets($midlleconn, 4096);
    }

    $valida = strrchr($server_response,'/');

    fclose($midlleconn);
}

if ($valida == "/OK"){
  echo '<script>alert("Bem vindo(a) '.$user.'"); window.location.href="Demo_success.html"; </script>';
}

else {
  echo '<script>alert("Jamais acessarás com usuário/senha incorretos, peça desculpas e tente novamente."); window.location.href="index.html"; </s$
}

?>
