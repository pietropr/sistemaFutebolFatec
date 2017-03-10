<?php
	//Chamada para os arquivos de configurações do sistema.
	include("../../settings/connection.php");
	include("../../settings/restricted.php");
	
	//Atribui o login do usuário a partir de uma variável de sessão.
	$usuario = $_SESSION['usuarioSession'];
	
	//Instrução para busca do código do usuário.
	$instrucaoUsuario = "SELECT codigoUsuario FROM usuario WHERE login = '$usuario';";
	$consultaUsuario = $conn -> query($instrucaoUsuario);
	
	//Atribuição do código de usuário a uma váriavel.
	$exibeCodigo = $consultaUsuario -> fetch(PDO::FETCH_ASSOC);
	$codigo = $exibeCodigo['codigoUsuario'];
	
	//Instrução para busca das equipes direto no banco de dados.
	$instrucaoEquipe = "SELECT codigoEquipe, nome FROM equipe WHERE codigoUsuario = $codigo;";
	$consultaEquipe = $conn -> query($instrucaoEquipe);
	
	//Retorna o código da equipe para consulta.
	$equipe = $consultaEquipe -> fetch(PDO::FETCH_ASSOC);
	$codigoEquipe = $equipe['codigoEquipe'];
	
	//Instrução para busca dos membros direto no banco de dados.
	$instrucaoMembros = "SELECT COUNT(*) FROM membros WHERE codigoEquipe = $codigoEquipe;";
	$consultaMembros = $conn -> query($instrucaoMembros);
	
	//Retorna a quantidade de membros para consulta.
	$membros = $consultaMembros -> fetch(PDO::FETCH_ASSOC);
	$quantidadeMembros = $membros['COUNT(*)'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<title>Verificação de Membros</title>
	<link href="../../estilos/bootstrap.css" rel="stylesheet">
    <link href="../../estilos/principal.css" rel="stylesheet">
</head>
<body>
	<center>
	<?php
		//Verifica a quantidade de membros cadastrados na equipe.
		if($quantidadeMembros + 1 < 5){
		?>
        	<div class="alert alert-warning" role="alert">Você deve inserir no mínimo 5 membros na equipe!</div>
            <meta HTTP-EQUIV='refresh' CONTENT='3;URL=cadastro.php'>
        <?php
		}else{
		?>
			<meta HTTP-EQUIV='refresh' CONTENT='0;URL=../menu.php'>
		<?php
		}
	?>
    </center>
</body>
</html>