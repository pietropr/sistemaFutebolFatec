<?php 
	//Instrução para busca do código do usuário.
	$instrucaoUsuario = "SELECT codigoUsuario FROM usuario WHERE login = '$usuario';";
	$consultaUsuario = $conn -> query($instrucaoUsuario);
	$exibeCodigo = $consultaUsuario -> fetch(PDO::FETCH_ASSOC);
	
	//Atribuição do código de usuário a uma váriavel.
	$codigo = $exibeCodigo['codigoUsuario'];
	
	//Instrução para busca das equipes direto no banco de dados.
	$situacao = "SELECT situacao FROM equipe WHERE codigoUsuario = $codigo;";
	$situacaoEquipe = $conn -> query($situacao);
	
	//Retorna a consulta da instrução sobre as equipes.
	$retornaSituacao = $situacaoEquipe -> fetch(PDO::FETCH_ASSOC);
	$resultadoSituacao = $retornaSituacao['situacao'];
	
	//Instrução para busca das equipes direto no banco de dados.
	$instrucao = "SELECT COUNT(*) FROM equipe WHERE codigoUsuario = $codigo;";
	$consultaEquipe = $conn -> query($instrucao);
	
	//Retorna a consulta da instrução sobre as equipes.
	$equipe = $consultaEquipe -> fetch(PDO::FETCH_ASSOC);
	$quantidadeEquipe = $equipe['COUNT(*)'];
?>
<body class="menu-body">
	<center>
    <!-- Inicio Modal Instruções -->
    <div class="modal fade" id="instrucoes" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modalLabel">Instruções para cadastro de informações</h4>
                </div>
            <div class="modal-body">
                <p style="color: #8e1511;"><strong>Atenção:</strong> Siga estas instruções para cadastrar sua equipe
                e membros no torneio.
                </p>
            <div align="left">
            	<p><strong>1º </strong>Sua equipe deve possuir no mínimo 5 e no máximo 10 membros para ser aceita.</p>
                <p>
                	<strong>2º </strong>Certifique-se de estar com o RA dos membros da equipes em mãos para cadastra-los
                	no sistema. 
                </p>
                <p>
                	<strong>3º </strong>Caso sua equipe esteja fora de nossos parâmetros você receberá um E-mail da
                    organização do evento. 
                </p>
                <p>
                	<strong>4º </strong>Preencha os dados com atenção, pois estes só poderão ser alterados a partir
                    de solicitação a organização do evento por E-mail. 
                </p>
            </div>
            <p>Caso estes parâmetros não sejam atendidos, o cadastro não será validado pela organização.</p>
            </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-success btn-xs" data-dismiss="modal">Continuar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Fim Modal Instruções -->
    <!-- Inicio Modal Contato -->
    <div class="modal fade" id="contato" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="modalLabel">Contato</h4>
          </div>
          <div class="modal-body">
            <p style="color: #8e1511;"><strong>Atenção:</strong> Para entrar em contato a respeito do sistema ou para
            obter alguma informação do torneio envie um e-mail para <strong>contato@rsgt.com.br</strong> com assunto 
            "Dúvida".
            </p>
            <hr>
            <p style="color: #8e1511;">
                A sua dúvida será respondida em até 48 horas. Pedimos a sua compreensão.
                <br/>
                Os e-mails que estiverem fora do padrão estipulado serão ignorados.
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- Fim Modal Contato -->
    	<menu>
            <nav class="nav-menu navbar navbar-default navbar-fixed-top">
            	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                	<ul class="nav navbar-nav">
                    	<?php 
							if($resultadoSituacao == 0){
								if($quantidadeEquipe > 0){
									$opcaoMenu = "Membros da Equipe"; 
						?>
                            <li><a href="membros/cadastro.php">Cadastrar Membros</a></li>
                            <?php 
								}else{
									$opcaoMenu = "Equipe" 
							?>
                            <li><a href="equipes/cadastro.php">Cadastrar Equipe</a></li>
                        <?php 
								}
							}
						?>
                    	<li>
                        	<a style="cursor: pointer;" data-toggle="modal" data-target="#contato">
                        	Entrar em contato
                            </a>
                       	</li>
                    </ul>
                    <ul class="ul-right nav navbar-nav navbar-right">
                    	<li><a href="../settings/exit.php">Sair</a></li>
                    </ul>
                </div>
            </nav>
        </menu>
        <div class="box-usuario">
        	<?php 
				if($resultadoSituacao == 1){
				?>
                <div class="alert alert-success" role="alert">
                	<p>Sua equipe já foi avaliada pela organização e está ATIVA no torneio!</p>
                </div>
                <?php	
				}
			?>
            <h3>I Torneio de Futebol da Faculdade de Tecnologia de Botucatu</h3>
        	<h4>Seja Bem-Vindo Capitão</h4>
            <h4 style="color: #8e1511;">
            	Utilize o menu acima para cadastrar 
				<strong><?php echo($opcaoMenu);?></strong>
            </h4>
        </div>
        <div class="imagem">
        	<img src="../images/prototype-shield-for-kim.png" width="400px" height="200px"/>
        </div>
        <footer>
        	<p>I Torneio de Futsal da Faculdade de Tecnologia de Botucatu</p>
            <p>Sistema de Controle - Desenvolvido pela Equipe RSGT - Julho de 2016</p>
        </footer>
    </center>
</body>
