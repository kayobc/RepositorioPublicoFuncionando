<?php

function AbreCon() {

 $host = "terraform-20200925161409900700000001.cozoaditqsgx.us-east-1.rds.amazonaws.com";
 $user = "root";
 $senha = "root12345678";
 $bd = "Demo_DB";

 $conn = new mysqli($host, $user, $senha, $bd) or die("Falha ao conectar BD");

 return $conn;

 }

function FechaCon($conn) {

 $conn -> close();

 }

?>
