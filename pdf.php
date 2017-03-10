<? include "settings/connection.php";
   include "mpdf/mpdf.php";
   
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php while($exibe = $produtos -> fetch(PDO::FETCH_ASSOC)) {  ?>
		<h3> <?php echo $exibe[titulo]; ?></h3>
		<p> <?php echo $exibe[conteudo]; ?></p>
	<?php } ?>
</body>
</html>