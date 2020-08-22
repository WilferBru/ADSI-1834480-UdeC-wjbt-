<!DOCTYPE html>
<html>
<head>
	<title>Encriptacion Y desencriptacion</title>
</head>
<body>

	<?php 
		include_once('SED.php');

		$clave = "M123";

		echo "<b><u>Palabra: </u></b>" .  $clave ."<br>";

		$claveE=SED::encryption($clave);

		echo "<b><u>Encriptada = </u></b>" .  $claveE ."<br>";

		$claveD=SED::decryption($claveE);

		echo "<b><u>Desencriptada =  </u></b>" . $claveD . "<br>";
	?>

</body>
</html>