<?php
	//Chamada para os arquivos de configurações do sistema.
	include("../../settings/connection.php");
	include("../../settings/restricted.php");
	
	//Atribui o login do usuário a partir de uma variável de sessão.
	$usuario = $_SESSION['usuarioSession'];
	
	//Instrução para busca do código do usuário.
	$instrucaoUsuario = "SELECT codigoUsuario FROM usuario WHERE login = '$usuario';";
	$consultaUsuario = $conn -> query($instrucaoUsuario);
	$exibeCodigo = $consultaUsuario -> fetch(PDO::FETCH_ASSOC);
	
	//Atribuição do código de usuário a uma váriavel.
	$codigo = $exibeCodigo['codigoUsuario'];
	
	//Instrução para busca das equipes direto no banco de dados.
	$instrucao = "SELECT codigoEquipe, nome FROM equipe WHERE codigoUsuario = $codigo;";
	$consultaEquipe = $conn -> query($instrucao);
	
	//Retorna o código da equipe para consulta.
	$equipe = $consultaEquipe -> fetch(PDO::FETCH_ASSOC);
	$codigo = $equipe['codigoEquipe'];
    $nEquipe = $equipe['codigoEquipe'];
	
	//Instrução para consulta de membros pertencetes a equipe.
	$consultaMembros = "SELECT COUNT(*) FROM membros WHERE codigoEquipe = $codigo;";
	$membros = $conn -> query($consultaMembros);
	
	//Retorna a quantidade de membros da equipe.
	$quantidadeMembros = $membros -> fetch(PDO::FETCH_ASSOC);
	$quantidade = $quantidadeMembros['COUNT(*)'];
	
	//Calcula a quantidade de membros cadastrados juntamento com o capitão da equipe.
	$numeroMembros = $quantidade + 1;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <title>Cadastro de Membros</title>
    <link href="../../estilos/bootstrap.css" rel="stylesheet">
    <link href="../../estilos/principal.css" rel="stylesheet">
    
</head>
<body class="cad-membros">
	<center>
    	<!-- Inicio Modal Cofirmação Membro -->
        <div class="modal fade" id="cadastro" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modalLabel">Cadastro de Membro</h4>
              </div>
              <div class="modal-body">
                <label>Deseja realmente salvar este membro?</label>
               	<hr>
                <p style="color: #8e1511;">
                	<strong>Lembre-se:</strong> Verifique se os dados estão corretos. Uma vez salvos a alteração não
                    poderá ser feita.
                </p>
              </div>
              <div class="modal-footer">
                <a href="javascript: submitForm()" class="btn btn-success btn-xs">Sim</a>
                <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Não</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Fim Modal Confirmação Membro -->
        <!-- Inicio Modal Finalização -->
        <div class="modal fade" id="finalizar" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modalLabel">Finalizar Cadastro?</h4>
              </div>
              <div class="modal-body">
                <label>Deseja realmente finalizar o cadastro de membros?</label>
               	<hr>
                <p style="color: #8e1511;">
                	<strong>Lembre-se:</strong> Verifique se os dados estão corretos. Uma vez salvos a alteração não
                    poderá ser feita.
                </p>
              </div>
              <div class="modal-footer">
                <a href="verificaMembros.php" class="btn btn-success btn-xs">Sim</a>
                <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Não</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Fim Modal Finalização -->
    	<?php
			//Verifica a quantidade de membros cadastrados.
			if($quantidade < 9){
		?>
    	<div class="alert-required alert alert-info" role="alert" style="margin-top: -10px; margin-bottom: -20px;">
        	Campos marcados com * são obrigatórios!
        </div>
        <div class="form-box panel panel-default">
            <div class="form-titulo panel-heading">
                <h3 class="panel-title">Cadastro de Membros</h3>
            </div>
            <div class="form-body panel-body">
            	<form enctype="multipart/form-data" method="post" id="cadMembro" name="cadMembro" 
                	  action="processarCadastro.php">
                	<div class="form-fields-left">
                        <label>
                            <p>*Nome completo:</p>
                            <input type="text" class="form-control" name="nome" maxlength="200">
                        </label>
                        <label>
                            <p>*R.A:</p>
                         	<input type="text" class="form-control" name="ra" maxlength="13">
                        </label>
                    </div>
                    <div class="form-fields-right">
                    	 <label>
                            <p>*Posição do jogador:</p>
                            <select name="posicao" class="form-control">
                            	<option value="">Selecione a posição...</option>
                                <option value="Marcador">Marcador</option>
                                <option value="Passador">Passador</option>
                                <option value="Armador">Armador</option>
                                <option value="Finalizador">Finalizador</option>
                                <option value="Goleiro">Goleiro</option>
                                <option value="Fixo">Fixo</option>
                                <option value="Ala Direito<">Ala Direito</option>
                                <option value="Ala Esquerdo">Ala Esquerdo</option>
                                <option value="Pivô">Pivô</option>
                            </select>
                        </label>
                        <label>
                            <p>*Equipe:</p>
                            <select name="equipe" class="form-control">
                                <option value="<?php echo($equipe['codigoEquipe']); ?>">
                                    <?php echo($equipe['nome']); ?>
                                </option>
                            </select>
                        </label>
                    </div>
                    <div class="form-button btn-group" role="group" aria-label="...">
                        <a class="button-salvar btn btn-default" data-toggle="modal" 
                           data-target="#cadastro">Inserir Membro</a>
                       	<a class="button-cancelar btn btn-default" data-toggle="modal" 
                           data-target="#finalizar">Finalizar Cadastro</a>
                    </div>
                </form>
            </div>
            <?php
				}else{
			?>
            <div class="alert-danger alert alert-info" role="alert">
                <p>
                	O número máximo de Membros foi atingido!
                    <a href="../menu.php">Clique aqui</a> para voltar ao menu.
                </p>
            </div>
        </div>
        <?php
			}
		?>
        <hr style="margin-top: -5px; margin-bottom: 5px;">
        <div class="titulo-pagina">
            <h3>Membros da Equipe <?php echo($equipe['nome']); ?></h3>
        </div>
        <div class="tabela">
            <table border="1" class="table">
                <thead>
                    <tr>
                    	<th>Identificação</th>
                        <th>Nome</th>
                        <th>RA</th>
                        <th>Posição</th>
                    </tr>
                </thead>
               	 	<?php
						//Instruções de busca dos membros.
						$instrucao = "SELECT * FROM membros WHERE codigoEquipe = $nEquipe;";
						$instrucaoCap = "SELECT usuario.nome as nomeMembro, usuario.ra as ra, usuario.posicao as posicao 
										 FROM usuario, equipe 
										 WHERE equipe.codigoUsuario = usuario.codigoUsuario 
										 AND equipe.codigoEquipe = $nEquipe;";
										 
						//Atribuição dos resultados da busca em uma matriz.
						$exibeMembros = $conn -> query($instrucao);
						$exibeCapitao = $conn -> query($instrucaoCap);
						
						//Roda um laço de repetição exibindo o capitão.
						while($mostraCap = $exibeCapitao -> fetch(PDO::FETCH_ASSOC)){ 
							$quantidade = 1;
						?>
                    <tr>
                    	<td><?php echo($quantidade); ?></td>
                        <td><?php echo($mostraCap['nomeMembro']);?></td>
                        <td><?php echo($mostraCap['ra']);?></td>
                        <td><?php echo($mostraCap['posicao']);?></td>
                    </tr>
                    <?php 
						}
							
						//Roda um laço de repetição exibindo os membros.
						while($mostraMembros = $exibeMembros -> fetch(PDO::FETCH_ASSOC)){
							$quantidade = $quantidade + 1;
                	?>
                <tbody>
                    <tr>
                    	<td><?php echo($quantidade); ?></td>
                        <td><?php echo($mostraMembros['nome']);?></td>
                        <td><?php echo($mostraMembros['ra']);?></td>
                        <td><?php echo($mostraMembros['posicao']);?></td>
                    </tr>
                </tbody>
					<?php
                    	}
                    ?>
            </table>
        </div>
    </center>
    <script src="../../javaScript/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="../../javaScript/bootstrap.js" type="text/javascript" charset="utf-8"></script>
    <script src="../../javaScript/jquery-validation-1.15.0/dist/jquery.validate.js" type="text/javascript"
	        charset="utf-8"></script>
    <script type="text/javascript">
		function submitForm(){
       		document.cadMembro.submit();
    	}
		
        $().ready(function() {
            $("#cadMembro").validate({
                rules: {
                    nome: "required",
                    ra: {
                        minlength: 13,
                        maxlength: 13,
                        required: true
                    },
                    posicao: "required"
                },
                messages: {
                    nome: "Este campo é obrigatório!",
                    ra: {
                        minlength: "RA inválido!",
                        maxlength: "RA inválido!",
                        required: "Este campo é obrigatório!"
                    },
                    posicao: "Este campo é obrigatório!"
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( "input" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( "input" ).addClass( "has-success" ).removeClass( "has-error" );
                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
            })
        })
     </script>
</body>
</html>
