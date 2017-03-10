<?php
	//Chamada para os arquivos de configurações do sistema.
	include('../../settings/connection.php');
	include("../../settings/restricted.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <title>Cadastro de Membros</title>
    <link href="../../estilos/bootstrap.css" rel="stylesheet">
</head>
<body>
	<center>
	<?php
        //Recuperação das informações inseridas nos campos do formulário.
        $nome = strip_tags(trim($_POST['nome']));
        $ra = strip_tags(trim($_POST['ra']));
        $posicao = strip_tags(trim($_POST['posicao']));
        $equipe = strip_tags(trim($_POST['equipe']));
        $situacao = 1;
        
        //Busca pelo RA informado na base de dados.
        $verificaRa = "SELECT COUNT(*) FROM membros WHERE ra = '$ra';";
        $executaRa = $conn -> query($verificaRa);
        $exibeMembros = $executaRa -> fetch(PDO::FETCH_ASSOC);
    
        //Verifica se já existe membro cadastrado com o mesmo RA.
        if ($exibeMembros["COUNT(*)"] > 0){
        ?>
            <div class="alert alert-danger" role="alert">O RA informado já consta no sistema!</div>
            <meta HTTP-EQUIV='refresh' CONTENT='3;URL=cadastro.php'>
        <?php
        } else {
                    
            //Instrução SQL de inserção dos dados.
            $sqlInsere = "INSERT INTO MEMBROS(NOME, RA, POSICAO, CODIGOEQUIPE, SITUACAO)";
            $sqlInsere .= "VALUES (:nome, :ra, :posicao, :equipe, :situacao)";		
                          
            //Metódo responsável por fazer a inserção a partir do PDO.
            try{
                $query = $conn -> prepare($sqlInsere);
                $query -> bindValue(':nome', $nome, PDO::PARAM_STR);
                $query -> bindValue(':ra', $ra, PDO::PARAM_STR);
                $query -> bindValue(':posicao', $posicao, PDO::PARAM_STR);
                $query -> bindValue(':equipe', $equipe, PDO::PARAM_STR);
                $query -> bindValue(':situacao', $situacao, PDO::PARAM_STR);
                $query -> execute();
            ?>
                <meta HTTP-EQUIV='refresh' CONTENT='0;URL=cadastro.php'>
            <?php
            }catch(PDOException $erroCadastro){
            ?>
                <div class="alert alert-danger" role="alert">Houve erro ao cadastrar as informações!</div>
                <meta HTTP-EQUIV='refresh' CONTENT='3;URL=../menu.php'>
            <?php
            }
        }
    ?>
    </center>
</body>
</html>

