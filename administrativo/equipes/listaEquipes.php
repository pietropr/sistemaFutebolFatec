<?php
	//Chama para os arquivos de configurações do sistema.
	include('../../settings/connection.php');
	include("../../settings/restricted.php");
	
	//Instrução para busca das informações da equipe direto no banco de dados.
    $instrucao = "SELECT equipe.codigoEquipe,
				  		 equipe.nome as nomeEquipe,
				  		 equipe.modalidade as modalidade,
				  		 usuario.nome as nomeCapitao
				  FROM equipe, usuario
				  WHERE usuario.codigoUsuario = equipe.codigoUsuario
				  AND equipe.situacao = 0;";
    
    //Atribui a instrução a um objeto de consulta SQL.
    $consultaEquipe = $conn -> query($instrucao);
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
        <!-- Inicio Modal -->
        <div class="modal fade" id="valida-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modalLabel">Validação de Equipe</h4>
              </div>
              <div class="modal-body">
                <form id="modalExemplo" method="post" action="processarValida.php">
                    <label>Deseja realmente ativar está equipe?</label>
                    <input type="hidden" name="campo" id="campo">
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-xs">Sim</button>
                <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Não</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Fim Modal -->
        <div class="titulo-pagina">
        	<h3>Validação de Equipes</h3>
        </div>
    	<div class="tabela">
            <table border="1" class="table">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nome</th>
                        <th>Modalidade</th>
                        <th>Capitão</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <?php
                    //Roda um laço de repetição exibindo os resultados em uma matriz.
                    while($exibe = $consultaEquipe -> fetch(PDO::FETCH_ASSOC)){
                ?>
                <tbody>
                    <tr>
                        <td><?php echo($exibe['codigoEquipe']);?></td>
                        <td><?php echo($exibe['nomeEquipe']);?></td>
                        <td><?php echo($exibe['modalidade']);?></td>
                        <td><?php echo($exibe['nomeCapitao']);?></td>
                        <td>
                        	<a class="btn btn-warning btn-xs" 
                               href="singleEquipe.php?codigo=<?php echo($exibe['codigoEquipe']);?>">
                                <span class="glyphicon glyphicon-plus"></span>
                                Mais Informações
                            </a>
                            <a class="btn btn-success btn-xs" href="#"
                               data-toggle="modal" data-target="#valida-modal"
                               onclick="codigoModal('<?php echo($exibe['codigoEquipe']); ?>')">
                                <span class="glyphicon glyphicon-thumbs-up"></span>
                                Ativar
                            </a>
                        </td>
                    </tr>
                </tbody>
                <?php
                    }
                ?>
            </table>
        </div>
        <div class="link">
        	<a href="../menu.php">
            	<span class="glyphicon glyphicon-arrow-left"></span>
            	Voltar para o menu
            </a>
        </div>
    </center>
	<script src="../../javaScript/jquery-1.11.3.min.js"></script>
	<script src="../../javaScript/bootstrap.js"></script>
    
    <!-- Função responsável pela passagem do paramêtro para o Modal -->
    <script>
		function codigoModal(valor) {
			document.getElementById('campo').value = valor;
		}
	</script>
</body>
</html>