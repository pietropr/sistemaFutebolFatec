<?php
	//Chamada para os arquivos de configurações do sistema.
	include("settings/connection.php");
	
	//Instrução para busca das regras direto no banco de dados.
	$instrucao = "SELECT titulo, conteudo FROM regras WHERE situacao = 1;";
	
	//Atribui a instrução a um objeto de consulta SQL.
	$consultaRegras = $conn -> query($instrucao);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <title>Regras do Torneio</title>
    <link href="estilos/bootstrap.css" rel="stylesheet">
    <link href="estilos/principal.css" rel="stylesheet">
</head>
<body>
	<center>
    	<!-- Inicio Modal -->
        <div class="modal fade" id="instrucoes" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modalLabel">Instruções</h4>
              </div>
              <div class="modal-body">
              	<p style="color: #8e1511;"><strong>Atenção:</strong> Para cadastrar sua equipe e membros, você 
                	deve primeiramente estar cadastrado em nosso sistema
                	como Capitão. Portanto, apenas o Capitão do time terá acesso ao sistema e poderá cadastrar 
                    as informações pertinentes a equipe.
                </p>
                <hr>
                <div align="left">
                    <strong>Primeiro Passo:</strong>
                    <p>Utilize este botão para cadastrar suas informações como Capitão.</p>
                    <strong>Acessar Sistema:</strong>
                    <p>Utilize este botão para acessar o sistema e cadastrar sua equipe e membros.</p>
                    <strong>Lista de Equipes Cadastradas:</strong>
                    <p>Utilize este botão para as equipes cadastradas no torneio.</p>
                </div>
              </div>
              <div class="modal-footer">
                <a type="button" class="btn btn-success btn-xs" data-dismiss="modal">Continuar</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Fim Modal -->
        <p style="color: #8e1511;">
        	Está com dificuldade para se cadastrar? 
            <a style="cursor: pointer" data-toggle="modal" data-target="#instrucoes">
            	Clique aqui
            </a> 
            para exibir as intruções do sistema.
        </p>
    	<div class="index-style">
        	<div class="regras-box">
            	<h3>I Torneio de Futebol - Faculdade de Tecnologia de Botucatu - Regras</h3>
                <hr>
            	<div class="regras">
                    <?php
                        //Roda um laço de repetição exibindo os resultados em uma matriz.
                        while($exibe = $consultaRegras -> fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <h4><?php echo($exibe["titulo"]); ?></h4>
                    <p><?php echo($exibe["conteudo"]); ?></p>
                    <?php	
                        }
                    ?>
                </div>
            	<p><a class="download-regulamento">Download do Regulamento</a></p>
            </div>
            <ul class="nav nav-pills nav-stacked">
                <li role="presentation"><a class="primeiro-acesso" href="capitao/cadastro.php">Primeiro Passo</a></li>
                <li role="presentation"><a href="login.php">Acessar Sistema</a></li>
                <li role="presentation"><a href="equipe/visualizaEquipe.php">Lista de Equipes Cadastradas</a></li>
            </ul>
        </div>
    </center>
    <script src="javaScript/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="javaScript/bootstrap.js"></script>
    <script type="text/javascript">
    	$(document).ready(function() {
   			$('#instrucoes').modal('show');
		});
    </script>
</body>
</html>
