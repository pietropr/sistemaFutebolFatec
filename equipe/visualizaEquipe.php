<?php
    //Chamada para os arquivos de configurações do sistema.
    include("../settings/connection.php");
    
    //Instrução para busca do capitão direto no banco de dados.
    $instrucao = "SELECT equipe.codigoEquipe,
				  		 equipe.nome as nomeEquipe,
				  		 equipe.curso as curso,
				  		 equipe.modalidade as modalidade,
				  		 usuario.nome as nomeCapitao
				  FROM equipe, usuario
				  WHERE usuario.codigoUsuario = equipe.codigoUsuario
				  AND equipe.situacao = 1 ORDER BY codigoEquipe DESC;";
    
    //Atribui a instrução a um objeto de consulta SQL.
    $consultaEquipe = $conn -> query($instrucao);





    //verifica a página atual caso seja informada na URL, senão atribui como 1ª página
    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
 
   
    //conta o total de itens
    $total = $consultaEquipe ->rowCount();
   
    //seta a quantidade de itens por página, neste caso, 2 itens
    $registros = 6;
   
    //calcula o número de páginas arredondando o resultado para cima
    $numPaginas = ceil($total/$registros);
   
    //variavel para calcular o início da visualização com base na página atual
    $inicio = ($registros*$pagina)-$registros;
 
    //seleciona os itens por página
    $cmd = "SELECT equipe.codigoEquipe,
                   equipe.nome as nomeEquipe,
                   equipe.curso as curso,
                   equipe.modalidade as modalidade,
                         usuario.nome as nomeCapitao
            FROM equipe, usuario
            WHERE usuario.codigoUsuario = equipe.codigoUsuario
            AND equipe.situacao = 1 ORDER BY codigoEquipe DESC LIMIT $inicio,$registros ;";
    $produtos = $conn -> query($cmd);
 
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <title>Equipes Cadastradas</title>
    <link href="../estilos/bootstrap.css" rel="stylesheet">
    <link href="../estilos/principal.css" rel="stylesheet">
</head>
<body class="visualiza">
	<center>
    	<div class="box-equipes container">
            <div class="row" style=" text-align: left !important;">
                <center>
                    <?php
                        //Roda um laço de repetição exibindo os resultados em uma matriz.
                        while($exibe = $produtos -> fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <div class="panel panel-default equipe" style="width: 27% !important; display: inline-block;">
                        <div class="grid" style="padding: 0 15px; min-height: 140px;">
                            <div class="<?php echo($exibe['codigoEquipe']); ?>"></div>
                            <div class="nome">
                                <h2><?php echo($exibe['nomeEquipe']); ?></h2>
                            </div>
                            <div class="curso">
                                <p style="margin: 0;"><span class="glyphicon glyphicon-education"></span><?php echo($exibe['curso']); ?></p>
                            </div>
                            <div class="modalidade">
                                <p style="margin: 0;"><span class="glyphicon glyphicon-user"></span><?php echo($exibe['modalidade']); ?></p>
                            </div>
                            <div class="capitao">
                                <p style="margin: 0; margin-bottom: 20px !important;">
                                	<b>Capitão: </b>
    								<?php echo($exibe['nomeCapitao']); ?>
                                </p>
                            </div>
                        </div>
                        <form action="singleEquipe.php" method="post" name="envio">
                            <input type="hidden" name="pao" value="<?php echo $exibe['codigoEquipe']; ?>"  />
                            <input type="submit" value="Veja Mais" name="botao" class="btn btn-success btn-block"/>
                        </form>
                    </div>
                <?php 
					}
				?>
                </center>
                <div class="paginacao">
                <?php

                    //exibe a paginação
                    for($i = 1; $i < $numPaginas + 1; $i++) {

                        echo "<a class='pagina ' href='visualizaEquipe.php?pagina=$i'>".$i."</a> ";
                    }

                ?>
                </div>
               
            </div>
        </div>
       <div class="link">
        	<a href="../index.php">
            	<span class="glyphicon glyphicon-arrow-left"></span>
            	Voltar para a página inicial
            </a>
        </div>
    </center>
</body>
</html>
