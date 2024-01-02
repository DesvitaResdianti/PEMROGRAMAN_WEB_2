<?php

$negara = ["Indonesia", "Singapura", "Malaysia", "Brunei", "Thailand"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charsct="UTF-8">
	<title>Daftar Negara ASEAN</title>
</head>
<body>
	<?php
			echo "<b> Daftar Negara ASEAN Awal </b>";
			foreach ($negara as $baru) {
			echo "<li>$baru</li>";	
		}
	?>
	<?php
			echo "<b> Daftar Negara ASEAN Baru </b>";
			$baris = array_push($negara, "Laos", "Filiphina", "Myanmar");
			foreach ($negara as $baru){
				echo "<li>$baru</li>"; 
			}
	?>
</body>
</html>