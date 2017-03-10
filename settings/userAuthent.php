<?php 
	//Chamada para os arquivos de configurações do sistema.
	include("connection.php");
	echo("<link href='../estilos/bootstrap.css' rel='stylesheet'>");
	
	//Inicia a sessão.
	ob_start();
    session_start();
	
	//Recupera o login e senha inseridos na tela de autenticação.
	$login = $_POST["login"];
	$senha = md5($_POST["senha"]);
	
	//Instrução de busca do login.
	$instrucao = "SELECT LOGIN FROM USUARIO
				  WHERE LOGIN = '$login';";
	
	//Atribui a instrução a um objeto de consulta SQL.
	$queryLogin = $conn -> query($instrucao);
	$loginBanco = $queryLogin -> fetch(PDO::FETCH_ASSOC);

	//Caso o login inserido exista, faz a busca pela senha.
	if($loginBanco){
		
		//Instrução de busca da senha.
		$instrucao = "SELECT SENHA FROM USUARIO
					  WHERE LOGIN = '$login';";
		
		//Atribui a instrução a um objeto de consulta SQL.
		$querySenha = $conn -> query($instrucao);
		$senhaBanco = $querySenha -> fetch(PDO::FETCH_ASSOC);
		
		//Caso o login inserido exista, faz a busca pela senha e compara os campos.
		if($senhaBanco){
			
			//Compara as informações.
			if($login == $loginBanco["LOGIN"] and $senha == $senhaBanco["SENHA"]){
				
				//Instrução de busca do tipo de usuário.
				$instrucao = "SELECT TIPO FROM USUARIO
					  		  WHERE LOGIN = '$login';";
				
				//Atribui a instrução a um objeto de consulta SQL.
				$queryTipo = $conn -> query($instrucao);
				$tipoUsuario = $queryTipo -> fetch(PDO::FETCH_ASSOC);
				
				//Atribuir duas váriaveis de sessão, com o login e o tipo de usuário.
				$_SESSION['usuarioTipo'] = $tipoUsuario["TIPO"];
				$_SESSION['usuarioSession'] = $login;
                        
                header("Location: ../administrativo/menu.php");
			}else{
				?>
                <center>
					<div class='alert alert-danger' role='alert'>Os dados informados não conferem!</div>
                    <meta HTTP-EQUIV='refresh' CONTENT='2;URL=../login.php'>
				<center>
                <?php
				}
		}else{
			?>
            <center>
                <div class='alert alert-danger' role='alert'>Os dados informados estão incorretos!</div>
                <meta HTTP-EQUIV='refresh' CONTENT='2;URL=../login.php'>
            <center>
            <?php
		}
	}else{
		?>
        <center>
            <div class='alert alert-danger' role='alert'>Os dados informados estão incorretos!</div>
            <meta HTTP-EQUIV='refresh' CONTENT='2;URL=../login.php'>
        <center>
        <?php
	}
?>
