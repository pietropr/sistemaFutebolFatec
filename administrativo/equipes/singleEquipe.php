<?php
    //Chamada para os arquivos de configurações do sistema.
    include("../../settings/connection.php");
	include("../../settings/restricted.php");
    
    $codigoEquipe = strip_tags(trim($_GET['codigo']));

    //Instrução para busca da equipe.
    $instrucaoEquipe = "SELECT equipe.nome as nomeEquipe,
                               equipe.curso as curso,
                               equipe.periodo as periodo,
                               equipe.modalidade as modalidade,
                               equipe.ciclo as ciclo,
                               equipe.foto
                        FROM equipe 
						WHERE codigoEquipe = $codigoEquipe;";

	//Instrução para busca dos membros da equipe.
    $instrucaoMembros = "SELECT * FROM membros WHERE membros.codigoEquipe = $codigoEquipe;";
    
    //Atribui a instrução a um objeto de consulta SQL.
    $exibeEquipe = $conn -> query($instrucaoEquipe);
    $exibeMembros = $conn -> query($instrucaoMembros);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <title>Informações Equipe</title>
    <link href="../../estilos/bootstrap.css" rel="stylesheet">
    <link href="../../estilos/principal.css" rel="stylesheet">
    <link href="../../fonts/fonts.css" rel="stylesheet">
</head>
<body class="single-equipe">
	<center>
    	<div class="container" style="max-width: 800px !important">
            <div class="row">
                <div class="col-sm-12">
                    <?php 
						while($equipe = $exibeEquipe -> fetch(PDO::FETCH_ASSOC)){
					?>
                        <header class="entry-header">
                        <div class="foto" style="background: url(../../equipe/images/<?php echo $equipe['foto'] ?>);"></div>
                            <div class="entry-title">
                                <h1 class=""><?php echo($equipe['nomeEquipe']); ?></h1>
                            </div>
                            <content class="entry-content">
                                <div class="curso">
                                    <p>
                                    	<span class="glyphicon glyphicon-education" 
                                        	  style="font-size:20px; vertical-align: bottom;" aria-hidden="true">
                                        </span> <?php echo($equipe['curso']); ?>
                                    </p>
                                </div>  
                                <div class="periodo">
                                   <p>
                                   		<span class="glyphicon glyphicon-dashboard" 
                                        	  style="font-size:20px; vertical-align: bottom;" aria-hidden="true">
                                        </span> <?php echo($equipe['periodo']); ?>
                                   </p>
                                </div>  
                                <div class="modalidade">
                                    <p>
                                    	<span class="glyphicon glyphicon-user" 
                                        	  style="font-size:20px vertical-align: bottom;" aria-hidden="true">
                                        </span> <?php echo($equipe['modalidade']); ?>
                                    </p>
                                </div>     
                                <div class="ciclo">
                                    <p>
                                        <span class="glyphicon glyphicon-calendar" style="font-size:20px vertical-align: bottom;" aria-hidden="true">
                                        </span> <?php echo ($equipe['ciclo']); ?> ciclo
                                    </p>
                                </div>
                            </content>
                        </header> 
                        <header class="entry-membro">
                            <h3 style="text-align:left;">Membros</h3>
                        </header>   
                        <div class="membros">
                            <?php 
    							while($membros = $exibeMembros -> fetch(PDO::FETCH_ASSOC)){ 
    						?>
                                <article style="margin: 30px 0">
                                    <div class="nomeMembro"><p><b>Nome: </b><?php echo($membros['nome']);?></p></div>
                                    <div class="ra"><p><b>RA: </b><?php echo($membros['ra']);?></p></div>
                                    <div class="<?php echo($membros['posicao']);?>" id="posicao">
                                    	<p><b>Posição: </b><span><?php echo($membros['posicao']);?></span></p>
                                    </div>
                                </article>
                            <?php 
    							}
    						}
    						?>
                        </div>
                </div>
            </div>
        </div>
        <div class="link">
        	<a href="listaEquipes.php">
            	<span class="glyphicon glyphicon-arrow-left"></span>
                Voltar para a página de validação de equipes
            </a>
        </div>
    </center>
</body>
</html>
