<?php

$host = "internal-elb-middle-736860084.us-east-1.elb.amazonaws.com";
$user = $_POST['text_login'];
$senha = hash("sha256", $_POST['text_senha']);
$content = http_build_query("text_login=".$user."&text_senha=".$senha);

$midlleconn = fsockopen($host, 80, $errno, $errstr, 60);

if (!$midlleconn) {
    echo "$errstr ($errno)<br />\n";
}

else {
    $out = "POST /Demo_valida_login.php HTTP/1.1\r\n";
    $out .= "Host: internal-elb-middle-736860084.us-east-1.elb.amazonaws.com\r\n";
    $out .= "Content-Type: application/x-www-form-urlencoded\r\n";
    $out .= "Content-Length: ".strlen($content)."\r\n");
    $out .= "Connection: Close\r\n\r\n";
    fwrite($midlleconn, $out);
    while (!feof($midlleconn)) {
        echo fgets($midlleconn);
    }
    $server_response = fgets($midlleconn, 26);
    fclose($midlleconn);
}

if ($server_response == "NOK"){
  echo '<script>alert("Bem vindo(a)'.$user.'"); window.location.href="Demo_success.html"; </script>';
}

?>