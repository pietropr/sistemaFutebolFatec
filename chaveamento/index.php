<?php
	include "../settings/connection.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Chaveamento</title>
	<link rel="stylesheet" href="">
	 <link href="../estilos/bootstrap.css" rel="stylesheet">
    <link href="../estilos/principal.css" rel="stylesheet">
</head>
<body class="chaveamento">
	<h2 style="text-align: center;">Chaveamento e Jogos</h2>
	<div class="container">
		<div class="geral row">
			<div class="alert alert-warning" role="alert" style="text-align: center;">
				<strong>ATENÇÃO!</strong> O A classificação por pontos estará disponível assim que começar os jogos.
			</div>
			<div class="col-sm-10">
				<h3 style="text-align: center;">Grupos</h3>
				<?php 
					//GRUPO A
					$selecionaA = "SELECT * FROM equipe WHERE Grupo = 'A';";
					$executaA = $conn -> query($selecionaA);

					//GRUPO B
					$selecionaB = "SELECT * FROM equipe WHERE Grupo = 'B';";
					$executaB = $conn -> query($selecionaB);

					//GRUPO C
					$selecionaC = "SELECT * FROM equipe WHERE Grupo = 'C';";
					$executaC = $conn -> query($selecionaC);

					//GRUPO D
					$selecionaD = "SELECT * FROM equipe WHERE Grupo = 'D';";
					$executaD = $conn -> query($selecionaD);

					//GRUPO E
					$selecionaE = "SELECT * FROM equipe WHERE Grupo = 'E';";
					$executaE = $conn -> query($selecionaE);

				?>

				<div class="grupos">
					<div class="centraliza">
						<!-- GRUPO A -->
						<div class="A">
							<div class="titulo">
								<b>Grupo A</b>
							</div>
							<div class="conteudo">
								<?php while ($array = $executaA -> fetch(PDO::FETCH_ASSOC)) { ?>
									<p><?php echo $array['nome']; ?></p>
								<?php } ?>
							</div>
						</div>

						<!-- GRUPO B -->
						<div class="B">
							<div class="titulo">
								<b>Grupo B</b>
							</div>
							<div class="conteudo">
								<?php while ($array = $executaB -> fetch(PDO::FETCH_ASSOC)) { ?>
									<p><?php echo $array['nome']; ?></p>
								<?php } ?>
							</div>
						</div>

						<!-- GRUPO C -->
						<div class="C">
							<div class="titulo">
								<b>Grupo C</b>
							</div>
							<div class="conteudo">
								<?php while ($array = $executaC -> fetch(PDO::FETCH_ASSOC)) { ?>
									<p><?php echo $array['nome']; ?></p>
								<?php } ?>
							</div>
						</div>
						
						<!-- GRUPO D -->
						<div class="D">
							<div class="titulo">
								<b>Grupo D</b>
							</div>
							<div class="conteudo">
								<?php while ($array = $executaD -> fetch(PDO::FETCH_ASSOC)) { ?>
									<p><?php echo $array['nome']; ?></p>
								<?php } ?>
							</div>
						</div>

						<!-- GRUPO E -->
						<div class="E">
							<div class="titulo">
								<b>Grupo E</b>
							</div>
							<div class="conteudo">
								<?php while ($array = $executaE -> fetch(PDO::FETCH_ASSOC)) { ?>
									<p><?php echo $array['nome']; ?></p>
								<?php } ?>
							</div>
						</div>
						<br>
					</div>
				</div>
			
			</div>	

			<!-- <div class="col-sm-4">
				<h4 style="text-align: right;">Informações</h4>
				<table class="criterio">
					<tr>
						<td colspan="2" class="titulo">
							<b>Regras de desempate</b>
						</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Saldo de gols</td>
					</tr>
					<tr>
						<td>2</td>
						<td>Gols Pro</td>
					</tr>
					<tr>
						<td>3</td>
						<td>Cartão Vermelho</td>
					</tr>
					<tr>
						<td>4</td>
						<td>Cartão Amarelo</td>
					</tr>
					<tr>
						<td>5</td>
						<td>Faltas</td>
					</tr>
				</table>
			</div> -->

			<div class="col-sm-12">
				<div class="horarios">
					<h2>Primeira fase</h2>
					<div class="primeiro-dia">
						<div>

							<div class="dia">
								<div class="horario">
									<b>Jogos dia 17/09/2016 (sábado)</b>
								</div>
								<div class="1709" style="margin-bottom: 30px;">
									<p><b>13h30</b> - SEM MASSAGEM FUTEBOL CLUBE <b style="font-size: 18px;"> x </b> PASSEIO FUTEBOL CLUBE</p>
									<p><b>14h30</b> - KEBRAMESTRES F.C <b style="font-size: 18px;"> x </b> CABRA MACHO</p>
									<p><b>15h30</b> - SHOW BALL <b style="font-size: 18px;"> x </b> DETRAN TEAM</p>
									<p><b>16h30</b> - PAUCAVALO F.C <b style="font-size: 18px;"> x </b> LOGÍSTICA XXVIII</p>
								</div>
							</div>

			
							<div class="dia">
								<div class="horario">
									<b>Jogos dia 18/09/2016 (domingo)</b>
								</div>
								<div class="1809" style="margin-bottom: 30px;">
									<p><b>09h30</b> - PASSO O RODO F.C <b style="font-size: 18px;"> x </b> CHAPÉU E CANETA F.C</p>
									<p><b>10h30</b> - VELHO BARREIRO F.C <b style="font-size: 18px;"> x </b> CAMARÃO F.C</p>
									<p><b>11h30</b> - TESTE DE MESA F.C <b style="font-size: 18px;"> x </b> RÖNTGEN F.C</p>
								</div>
							</div>

		

							<div class="dia">
								<div class="horario">
									<b>Jogos dia 01/10/2016 (sábado)</b>
								</div>
								<div class="0110" style="margin-bottom: 30px;">
									<p><b>13h30</b> - RADIOATIVOS FUTEBOL CLUBE <b style="font-size: 18px;"> x </b> AL FATEC F.C</p>
									<p><b>14h30</b> - MESTRES DA BOLA (PROFESSORES) <b style="font-size: 18px;"> x </b> AMIGOS DO PEPE F.C</p>
									<p><b>15h30</b> - BAR SEM LONA F.C <b style="font-size: 18px;"> x </b> MADRUGUINHA FUTEBOL CLUBE</p>
									<p><b>16h30</b> - KEBRAMESTRES F.C <b style="font-size: 18px;"> x </b> PASSEIO FUTEBOL CLUBE</p>
								</div>
							</div>



			
							<div class="dia">			
								<div class="horario">
									<b>Jogos dia 02/10/2016 (domingo)</b>
								</div>
								<div class="0210" style="margin-bottom: 30px;">
									<p><b>09h30</b> - CABRA MACHO <b style="font-size: 18px;"> x </b> SEM MASSAGEM FUTEBOL CLUBE</p>
									<p><b>10h30</b> - PAU CAVALO F.C <b style="font-size: 18px;"> x </b> DETRAM TEAM</p>
									<p><b>11h30</b> - LOGÍSTICA XXVIII <b style="font-size: 18px;"> x </b> SHOW BALL</p>
								</div>
							</div>




							<div class="dia">
								<div class="horario">
									<b>Jogos dia 08/10/2016 (sábado)</b>
								</div>
								<div class="0810" style="margin-bottom: 30px;">
									<p><b>13h30</b> - VELHO BARREIRO F.C <b style="font-size: 18px;"> x </b> CHAPÉU E CANETA F.C</p>
									<p><b>14h30</b> - CAMARÃO F.C <b style="font-size: 18px;"> x </b> PASSA O RODO F.C</p>
									<p><b>15h30</b> - RADIOATIVOS FUTEBOL CLUBE <b style="font-size: 18px;"> x </b> RÖNTGEN F.C</p>
									<p><b>16h30</b> - AL FATEC F.C <b style="font-size: 18px;"> x </b> TESTE DE MESA F.C</p>
								</div>
							</div>


							<div class="dia">
								<div class="horario">
									<b>Jogos dia 09/10/2016 (domingo)</b>
								</div>
								<div class="0910" style="margin-bottom: 30px;">
									<p><b>09h30</b> - BAR SEM LONA F.C <b style="font-size: 18px;"> x </b> AMIGOS DO PEPE F.C</p>
									<p><b>10h30</b> - MADRUGUINHA FUTEBOL CLUBE <b style="font-size: 18px;"> x </b> MESTRES DA BOLA (PROFESSORES)</p>
									<p><b>11h30</b> - SEM MASSAGEM FUTEBOL CLUBE <b style="font-size: 18px;"> x </b> KEBRAMESTRES F.C</p>
								</div>
							</div>


							<div class="dia">
								<div class="horario">
									<b>Jogos dia 15/10/2016 (sábado)</b>
								</div>
								<div class="1510" style="margin-bottom: 30px;">
									<p><b>13h30</b> - PASSEIO FUTEBOL CLUBE <b style="font-size: 18px;"> x </b> CABRA MACHO</p>
									<p><b>14h30</b> - SHOW BALL <b style="font-size: 18px;"> x </b> PAUCAVALO F.C</p>
									<p><b>15h30</b> - DETRAN TEAM <b style="font-size: 18px;"> x </b> LOGÍSTICA XXVIII</p>
									<p><b>16h30</b> - PASSA O RODO F.C <b style="font-size: 18px;"> x </b> VELHO BARREIRO F.C</p>
								</div>
							</div>


							<div class="dia">
								<div class="horario">
									<b>Jogos dia 16/10/2016 (domingo)</b>
								</div>
								<div class="1610" style="margin-bottom: 30px;">
									<p><b>09h30</b> - CHAPÉU E CANETA F.C <b style="font-size: 18px;"> x </b> CAMARÃO F.C</p>
									<p><b>10h30</b> - TESTE DE MESA F.C <b style="font-size: 18px;"> x </b> RADIOATIVOS FUTEBOL CLUBE</p>
									<p><b>11h30</b> - RÖNTGEN F.C <b style="font-size: 18px;"> x </b> AL FATEC</p>
								</div>
							</div>

							<div class="dia">
								<div class="horario">
									<b>Jogos dia 22/10/2016 (sábado)</b>
								</div>
								<div class="2210" style="margin-bottom: 30px;">
									<p><b>13h30</b> - MESTRES DA BOLA (PROFESSORES) <b style="font-size: 18px;"> x </b> BAR SEM LONA F.C</p>
									<p><b>14h30</b> - AMIGOS DO PEPE F.C <b style="font-size: 18px;"> x </b> MADRUGUINHA FUTEBOL CLUBE</p>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<hr>
	
	
<script src="../javaScript/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>