<?php
	//Arquivo de conexão com a base de dados.
	include('../settings/connection.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <title>Cadastro de Capitão</title>
    <link href="../estilos/bootstrap.css" rel="stylesheet">
</head>
<body>
    <center>
	<?php
        //Recuperação das informações inseridas nos campos do formulário.
        $nome = strip_tags(trim($_POST['nome']));
        $login = strip_tags(trim($_POST['login']));
        $senha = strip_tags(trim($_POST['senha']));
        $ra = strip_tags(trim($_POST['ra']));
        $email = strip_tags(trim($_POST['email']));
        $posicao = strip_tags(trim($_POST['posicao']));
        $situacao = 1;
        $tipo = "Capitão";
    
        //Consulta RA membros.
        $raMembros = "SELECT COUNT(*) FROM membros WHERE ra = $ra;";
        $consultaMembros = $conn -> query($raMembros);
        $exibeMembros = $consultaMembros -> fetch(PDO::FETCH_ASSOC);
        
        //Consulta RA usuário.
        $raUsuario = "SELECT COUNT(*) FROM usuario WHERE ra = $ra;";
        $consultaUsuario = $conn -> query($raUsuario);
        $exibeUsuario = $consultaUsuario -> fetch(PDO::FETCH_ASSOC);
        
        //Consulta E-mail usuário.
        $emailUsuario = "SELECT COUNT(*) FROM usuario WHERE email = '$email';";
        $consultaEmail = $conn -> query($emailUsuario);
        $exibeEmail = $consultaEmail -> fetch(PDO::FETCH_ASSOC);
		
		//Consulta Login.
        $loginUsuario = "SELECT COUNT(*) FROM usuario WHERE login = '$login';";
        $consultaLogin = $conn -> query($loginUsuario);
        $exibeLogin = $consultaLogin -> fetch(PDO::FETCH_ASSOC);
		
		//Verifica se o Login inserido já existe.
		if($exibeLogin["COUNT(*)"] > 0){
		?>
            <div class="alert alert-danger" role="alert">O Login informado já consta no sistema!</div>
            <meta HTTP-EQUIV='refresh' CONTENT='3;URL=cadastro.php'>
        <?php
		}else{
			//Verifica se existe o RA informado na tabela de membros.
			if($exibeMembros["COUNT(*)"] > 0){
			?>
				<div class="alert alert-danger" role="alert">O RA informado já consta no sistema!</div>
				<meta HTTP-EQUIV='refresh' CONTENT='3;URL=cadastro.php'>
			<?php
			}else{
				//Verifica se existe o RA informado na tabela de usuário.
				if($exibeUsuario["COUNT(*)"] > 0){
				?>
					<div class="alert alert-danger" role="alert">O RA informado já consta no sistema!</div>
					<meta HTTP-EQUIV='refresh' CONTENT='3;URL=cadastro.php'>
				<?php
				}else{
					
					//Verifica se existe o Email informado na tabela de usuário.
					if($exibeEmail["COUNT(*)"] > 0){
					?>
						<div class="alert alert-danger" role="alert">O E-mail informado já consta no sistema!</div>
						<meta HTTP-EQUIV='refresh' CONTENT='3;URL=cadastro.php'>
					<?php
					}else{
						
						//Instrução SQL de inserção dos dados.
						$sqlInsere = "INSERT INTO usuario (NOME, LOGIN, SENHA, TIPO, RA, POSICAO, EMAIL, SITUACAO)";
						$sqlInsere .= "VALUES (:nome, :login, :senha, :tipo, :ra, :posicao, :email, :situacao)";
									  
						//Metódo responsável por fazer a inserção a partir do PDO.
						try{
							$query = $conn -> prepare($sqlInsere);
							$query -> bindValue(':nome', $nome, PDO::PARAM_STR);
							$query -> bindValue(':login', $login, PDO::PARAM_STR);
							$query -> bindValue(':senha', md5($senha), PDO::PARAM_STR);
							$query -> bindValue(':tipo', $tipo, PDO::PARAM_STR);
							$query -> bindValue(':situacao', $situacao, PDO::PARAM_STR);
							$query -> bindValue(':ra', $ra, PDO::PARAM_STR);
							$query -> bindValue(':posicao', $posicao, PDO::PARAM_STR);
							$query -> bindValue(':email', $email, PDO::PARAM_STR);
							$query -> execute();
						?>
							<div class="alert alert-success" role="alert">Informações cadastradas com sucesso!</div>
							<meta HTTP-EQUIV='refresh' CONTENT='1;URL=../login.php'>
						<?php
						}catch(PDOException $erroCadastro){
						?>
							<div class="alert alert-danger" role="alert">Houve erro ao cadastrar as informações!</div>
							<meta HTTP-EQUIV='refresh' CONTENT='3;URL=cadastro.php'>
						<?php
						}
					}
				} 
			}
		}
    ?>
  </center>
</body>
</html>
		
	
