<?php
	//Chama para os arquivos de configurações do sistema.
	include('../../settings/connection.php');
	include("../../settings/restricted.php");
	
	//Recuperação das informações inseridas nos campos do formulário.
	$codigo = strip_tags(trim($_POST['campo']));
	$situacao = '1';
	
	//Instrução SQL de inserção dos dados.
	$sqlAtualiza = "UPDATE equipe SET situacao = :situacao WHERE codigoEquipe = $codigo;";
				  
	//Metódo responsável por fazer a inserção a partir do PDO.
	try{
		$query = $conn -> prepare($sqlAtualiza);
		$query -> bindValue(':situacao', $situacao, PDO::PARAM_STR);
		$query -> execute();
	}catch(PDOException $erroCadastro){
		$mensagem = "Houve erro ao cadastrar as informações!";
		$classeAlert = "alert alert-danger";
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <title>Validação de Equipes</title>
    <link href="../../estilos/bootstrap.css" rel="stylesheet">
    <link href="../../estilos/principal.css" rel="stylesheet">
</head>
<body>
	<center>
    	<div class="<?php echo($classeAlert); ?>" role="alert"><?php echo($mensagem); ?></div>
    </center>
</body>
</html>
<?php echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=listaEquipes.php'>"; ?>
