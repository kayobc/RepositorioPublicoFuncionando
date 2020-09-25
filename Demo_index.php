
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
            
	function ChamadaMiddleware(){
		
	var login = document.getElementById('login').value;
    var senha = document.getElementById('senha').value;
	
	if (login == "" || senha == "") {
		
		alert("Usuario e senha são obrigatorios");
		return;
		
	}
	
	var params = 'text_login='+login+'&text_senha='+senha;
	params = params.replace(/[^\x00-\x7F]/g, "");
	
	 var httpconn = new XMLHttpRequest();
	 
	 httpconn.open("POST", "http://10.0.3.45/Demo_valida_login.php");
	 httpconn.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	 
	 httpconn.onprogress = function () {
       console.log(httpconn.readyState);
     };

     httpconn.onload = function () {
      console.log(httpconn.readyState);
     };
	 
	 httpconn.send(params);
	 
	 httpconn.onreadystatechange = function() {
      if (httpconn.readyState == XMLHttpRequest.DONE) {
          var resposta = httpconn.responseText;
		    if (resposta == "OK"){
				
				alert("Bem vindo "+login);
				window.location="Demo_success.html";
				
			}
			
			else{
				
				alert("Jamais acessarás com usuário/senha incorretos, peça desculpas e tente novamente.");
			
			}
			
          }
      }
			
	
	}		
	
</script>



<html>

<head>

<title> Demo cloud AWS </title>

<style>

body {

  background-image: url("movealong.jpg");

  background-repeat: no-repeat;

  background-size: cover;

  background-size: 100% 100%;

}

 
label {

  color: red;
 
}

input {

  position: absolute;
  left: 110px;
  margin-top: 10px;
  color: red;

}

#botao{

  font-weight: bolder;
  width: 175px;
  height: 30px;
  position: absolute;
  left: 110px;

}

</style>

</head>

<body>

<div>

<br><br><br><br><br><br><br><br><br>

  <h1>

  <label for="label_login">Login:</label> <input type="text" id="login" name="text_login"></input>
  
  <br>

  <label for="label_senha">Senha:</label> <input type="password" id="senha" name="text_senha"></input>

  </h1>

  <button id="botao" name="botao_entrar" type="button" onclick="ChamadaMiddleware()">Entrar</button>
  
</div>

<body>

</html>
