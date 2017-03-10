<?php
	//Chamada para os arquivos de configurações do sistema.
	include('../../settings/connection.php');
	include("../../settings/restricted.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <title>Cadastrar Administrador</title>
    <link href="../../estilos/bootstrap.css" rel="stylesheet">
</head>
<body>
	<center>
	<?php
        //Recuperação das informações inseridas nos campos do formulário.
        $nome = strip_tags(trim($_POST['nome']));
        $login = strip_tags(trim($_POST['login']));
        $senha = strip_tags(trim($_POST['senha']));
        $situacao = 1;
        $tipo = "Administrador";
        
        //Consulta Login.
        $loginUsuario = "SELECT COUNT(*) FROM usuario WHERE login = '$login';";
        $consultaLogin = $conn -> query($loginUsuario);
        $exibeLogin = $consultaLogin -> fetch(PDO::FETCH_ASSOC);
        
        //Verifica se existe usuário cadastrado com o mesmo Login.
        if($exibeLogin["COUNT(*)"] > 0){
        ?>
            <div class="alert alert-danger" role="alert">O Login inserido já está cadastrado no sistema!</div>
            <meta HTTP-EQUIV='refresh' CONTENT='3;URL=cadastro.php'>
        <?php
        }else{
            //Instrução SQL de inserção dos dados.
            $sqlInsere = "INSERT INTO USUARIO(NOME, LOGIN, SENHA, TIPO, SITUACAO)";
            $sqlInsere .= "VALUES (:nome, :login, :senha, :tipo, :situacao)";
                          
            //Metódo responsável por fazer a inserção a partir do PDO.
            try{
                $query = $conn -> prepare($sqlInsere);
                $query -> bindValue(':nome', $nome, PDO::PARAM_STR);
                $query -> bindValue(':login', $login, PDO::PARAM_STR);
                $query -> bindValue(':senha', md5($senha), PDO::PARAM_STR);
                $query -> bindValue(':tipo', $tipo, PDO::PARAM_STR);
                $query -> bindValue(':situacao', $situacao, PDO::PARAM_STR);
                $query -> execute();
            ?>
                <div class="alert alert-success" role="alert">Informações cadastradas com sucesso!</div>
                <meta HTTP-EQUIV='refresh' CONTENT='1;URL=../menu.php'>
            <?php
            }catch(PDOException $erroCadastro){
            ?>
                <div class="alert alert-danger" role="alert">Houve erro ao cadastrar as informações!</div>
                <meta HTTP-EQUIV='refresh' CONTENT='3;URL=cadastro.php'>
            <?php
            }
        }
    ?>
	</center>
</body>
</html>
