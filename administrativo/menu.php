<?php
	//Chamada para os arquivos de configurações do sistema.
	include("../settings/connection.php");
	include("../settings/restricted.php");
	
	//Recupera o tipo de usuário atráves de uma variável de sessão.
	$tipoUsuario = $_SESSION['usuarioTipo'];
	$usuario = $_SESSION['usuarioSession'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<title>Menu</title>
    <link href="../estilos/bootstrap.css" rel="stylesheet">
    <link href="../estilos/principal.css" rel="stylesheet">
</head>
<?php
	//Seleciona o menu conforme o tipo de usuário (Capitão ou Administrador).
	if($tipoUsuario == "Administrador"){
		include("body/administrador.php");
	}else{
		include("body/capitao.php");
	} 
?>
	<script src="../javaScript/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="../javaScript/bootstrap.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
		$().ready(function(){
    		$('#instrucoes').modal('show');
		})
    </script>
</html>