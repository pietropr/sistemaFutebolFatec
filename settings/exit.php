<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<title>Saída do Sistema</title>
</head>
<body>
	<?php
		//Destrói a sessão e limpa a variável.
		session_destroy();
		ob_start();
		session_start();   
		unset($_SESSION['usuarioSession']);
		unset($_SESSION['usuarioTipo']);
		 
		//Redireciona para a página de autenticação de usuário.
		header("Location: ../index.php");
	?>
</body>
</html>
