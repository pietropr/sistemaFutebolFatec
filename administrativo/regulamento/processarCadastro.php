<?php
	//Chamada para os arquivos de configurações do sistema.
	include('../../settings/connection.php');
	include("../../settings/restricted.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <title>Criar Regra</title>
    <link href="../../estilos/bootstrap.css" rel="stylesheet">
</head>
<body>
	<center>
	<?php	
        //Recuperação das informações inseridas nos campos do formulário.
        $titulo = strip_tags(trim($_POST['titulo']));
        $conteudo = strip_tags(trim($_POST['conteudo']));
        $situacao = 1;
        
        //Consulta Login.
        $tituloRegra = "SELECT COUNT(*) FROM regras WHERE titulo = '$titulo';";
        $consultaRegras = $conn -> query($tituloRegra);
        $exibeRegra = $consultaRegras -> fetch(PDO::FETCH_ASSOC);
        
		//Verifica se já existe regra com o titulo inserido.
        if($exibeRegra["COUNT(*)"] > 0){
        ?>
            <div class="alert alert-danger" role="alert">O Título inserido já consta no sistema!</div>
            <meta HTTP-EQUIV='refresh' CONTENT='3;URL=cadastro.php'>
        <?php
        }else{
            //Instrução SQL de inserção dos dados.
            $sqlInsere = "INSERT INTO REGRAS(TITULO, CONTEUDO, SITUACAO)";
            $sqlInsere .= "VALUES (:titulo, :conteudo, :situacao)";
                          
            //Metódo responsável por fazer a inserção a partir do PDO.
            try{
                $query = $conn -> prepare($sqlInsere);
                $query -> bindValue(':titulo', $titulo, PDO::PARAM_STR);
                $query -> bindValue(':conteudo', $conteudo, PDO::PARAM_STR);
                $query -> bindValue(':situacao', $situacao, PDO::PARAM_STR);
                $query -> execute();
			?>
            	<div class="alert alert-success" role="alert">Informações cadastradas com sucesso!</div>
                <meta HTTP-EQUIV='refresh' CONTENT='1;URL=cadastro.php'>
            <?php
            }catch(PDOException $erroCadastro){
            ?>
                <div class="alert alert-danger" role="alert">Houve erro ao cadastrar os dados!</div>
                <meta HTTP-EQUIV='refresh' CONTENT='3;URL=cadastro.php'>
            <?php
            }
        }
    ?>
    </center>
</body>
</html>
