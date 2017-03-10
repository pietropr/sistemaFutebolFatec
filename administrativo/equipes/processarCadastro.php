<?php
	//Chamada para os arquivos de configuração do sistema.
	include('../../settings/connection.php');
	include("../../settings/restricted.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <title>Cadastro de Equipe</title>
    <link href="../../estilos/bootstrap.css" rel="stylesheet">
</head>
<body>
	<center>
	<?php	
        //Recuperação das informações inseridas nos campos do formulário.
        $nome = strip_tags(trim($_POST['nome']));
        $curso = strip_tags(trim($_POST['curso']));
        $periodo = strip_tags(trim($_POST['periodo']));
        $ciclo = strip_tags(trim($_POST['ciclo']));
        $capitao = strip_tags(trim($_POST['capitao']));
        $modalidade = strip_tags(trim($_POST['modalidade']));
        $situacao = 0;
        $foto = $_FILES['foto'];
    
    
        //Consulta nome.
        $nomeEquipe = "SELECT COUNT(*) FROM equipe WHERE nome = '$nome';";
        $consultaEquipe = $conn -> query($nomeEquipe);
        $exibeEquipe = $consultaEquipe -> fetch(PDO::FETCH_ASSOC);
    
        //Verifica se o nome da equipe já está cadastrado.
        if ($exibeEquipe["COUNT(*)"] > 0) {
        ?>
            <div class="alert alert-danger" role="alert">O nome informado já consta no sistema!</div>
            <meta HTTP-EQUIV='refresh' CONTENT='3;URL=../equipes/cadastro.php'>
        <?php
        }else {
            //Definindo timezone padrão.
            date_default_timezone_set("Brazil/East"); 
         
            //Pegando extensão do arquivo.
            $ext = strtolower(substr($_FILES['foto']['name'],-4));
            
            //Definindo um novo nome para o arquivo. 
            $novoNome = date("YmdHis") . $ext; 
            
            //Diretório para uploads.
            $dir = '../../equipe/images/'; 
         
            //Fazer upload do arquivo.
            move_uploaded_file($_FILES['foto']['tmp_name'], $dir.$novoNome); 
            
            //Instrução SQL de inserção dos dados.
            $sqlInsere = "INSERT INTO EQUIPE(nome, curso, periodo, codigoUsuario, modalidade, ciclo, foto, situacao)";
            $sqlInsere .= "VALUES (:nome, :curso, :periodo, :capitao, :modalidade, :ciclo, '$novoNome', :situacao)";
                          
            //Metódo responsável por fazer a inserção a partir do PDO.
            try{
                $query = $conn -> prepare($sqlInsere);
                $query -> bindValue(':nome', $nome, PDO::PARAM_STR);
                $query -> bindValue(':curso', $curso, PDO::PARAM_STR);
                $query -> bindValue(':periodo', $periodo, PDO::PARAM_STR);
                $query -> bindValue(':capitao', $capitao, PDO::PARAM_STR);
                $query -> bindValue(':modalidade', $modalidade, PDO::PARAM_STR);
                $query -> bindValue(':ciclo', $ciclo, PDO::PARAM_STR);
                $query -> bindValue(':situacao', $situacao, PDO::PARAM_STR);
                $query -> execute();
            ?>
                <div class="alert alert-success" role="alert">Informações cadastradas com sucesso!</div>
                <meta HTTP-EQUIV='refresh' CONTENT='1;URL=../membros/cadastro.php'>
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
