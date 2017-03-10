<?php 
	include "settings/connection.php";
	include "mpdf/mpdf.php";

	$instrucao = "SELECT * FROM regras";
	$executa = $conn -> query($instrucao);



	$pagina ="<!DOCTYPE html>
			<html>
			<head>
				<meta charset='utf-8'>
				<meta http-equiv='X-UA-Compatible' content='IE=edge'>
				<title></title>
				<link rel='stylesheet' href=''>
			</head>
			<body>
				 <h4>Doação Obrigatória</h4>
                    <p>Cada participante do evento, incluindo o capitão, deverá doar 1kg de alimento não perecível ao entrar no evento</p>
                                        <h4>Apresentação RA</h4>
                    <p>Apresentação Obrigatória do R.A para a participação do evento. Obrigatória apresentação na hora dos jogos</p>
                                        <h4>Membros Mínimos</h4>
                    <p>O número de participantes do time não pode ser inferior á 6. Caso o número não alcance a quantidade mínima, o time não poderá ser validado</p>
                                        <h4>Membro único</h4>
                    <p>Um participante só poderá estar inscrito em um único time, caso o mesmo esteja em outro, o time será eliminado da competição</p>
                                        <h4>Membros máximos</h4>
                    <p>O número máximo de membros em uma equipe é não pode ser superior a 10 membros.</p>
                                        <h4>Apenas Alunos da Fatec-Bt</h4>
                    <p>Apenas alunos DEVIDAMENTE MATRICULADOS na Fatec de Botucatu poderão ingressar nesse campeonato</p>
			</body>
			</html>";



	$arquivo = "regras.pdf";

$mpdf = new mpdf();
$mpdf -> WriteHTML($pagina);
$mpdf-> Output($arquivo, "I");

?>