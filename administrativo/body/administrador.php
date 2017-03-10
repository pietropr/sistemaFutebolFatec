<?php
	    //Instrução responsável por verificar a quantidade de equipes que ainda não foram avaliadas.
		$instrucaoEquipesDesativadas = "SELECT COUNT(*) FROM equipe WHERE situacao = 0;";
		
		//Executa a instrução e atribui o valor a uma variável.
		$equipesDesativadas = $conn -> query($instrucaoEquipesDesativadas);
		$exibeContagem = $equipesDesativadas -> fetch(PDO::FETCH_ASSOC);
		$contagem = $exibeContagem['COUNT(*)'];
?>
<body class="menu-body">
	<center>
    	<menu>
            <nav class="nav-menu navbar navbar-default navbar-fixed-top">
            	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                	<ul class="nav navbar-nav">
                    	<li><a href="administrador/cadastro.php">Cadastrar Administrador</a></li>
                    	<li>
                        	<a href="equipes/listaEquipes.php">
                        		Validar Equipes
                                <span><?php echo($contagem); ?></span>
                            </a>
                        </li>
                        <li><a href="regulamento/cadastro.php">Criar Regra</a></li>
                    </ul>
                    <ul class="ul-right nav navbar-nav navbar-right">
                    	<li><a href="../settings/exit.php">Sair</a></li>
                    </ul>
                </div>
            </nav>
        </menu>
        <div class="box-usuario">
        	<h3>I Torneio de Futebol da Faculdade de Tecnologia de Botucatu</h3>
            <h4>Seja Bem-Vindo Administrador</h4>
            <h4 style="color: #8e1511;">Utilize o menu acima para gerenciar o Torneio</h4>
            <h4 class="contagem-equipes">Existe(m) <?php echo($contagem); ?> equipe(s) aguardando validação</h4>
        </div>
        <div class="imagem">
        	<img src="../images/prototype-shield-for-kim.png"/>
        </div>
        <footer>
        	<p>I Torneio de Futsal da Faculdade de Tecnologia de Botucatu</p>
            <p>Sistema de Controle - Desenvolvido pela Equipe RSGT - Julho de 2016</p>
        </footer>
    </center>
</body>