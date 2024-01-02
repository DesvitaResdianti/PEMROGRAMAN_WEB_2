<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="widht=device-width, initial-scale=1">
	<title>Latihan1C</title>
</head>
<body>
	<?php

	$d = "A";
	$e = "B";
	$s = "C";

	?>
	<div class="awal">
		<div class ="pertama">
			<p><?php echo $d ?></p>
		</div>

		<div class="kedua">
			<p><?php echo $d ?></p>
			<p><?php echo $e ?></p> 
		</div>

		<div class="ketiga">
			<p><?php echo $d ?></p>
			<p><?php echo $e ?></p>
			<p><?php echo $s ?></p>
		</div>

				<style type="text/css">
					.awal {
						border: 1px solid black;
						width: 148px;
						height: 150px;
						margin-left: 600px;
						margin-top: 230px;
						display: table;
					}

					.pertama{
						border: 2px solid black;
						width: 40px;
						height: 44px;
						margin-left: 4px;
						margin-top: 5px;
						padding-bottom: 3px;
						text-align: center; 
					}

					.kedua{
						display: flex;
					}
					.kedua p{
						border: 2px solid black;
						width: 40px;
						height: 33px;
						margin-left: 4px;
						margin-top: 5px;
						margin-bottom: 5px;
						padding-top: 13px;
						text-align: center; 
					}

					.ketiga{
						display: flex;
					}
					.ketiga p{
						border: 2px solid black;
						width: 40px;
						height: 33px;
						margin-left: 4px;
						margin-top: 0px;
						padding-top: 13px;
						text-align: center;
						margin-bottom: 5px; 
					}

				</style>

			</div>

		</body>

	</html>
