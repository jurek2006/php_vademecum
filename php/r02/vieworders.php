<?php 
	$path = '../orders';
 ?>

<!doctype html>

<html lang="pl">
<head>
  <meta charset="utf-8">

  <title>Części samochodowe - zamówienia</title>

  <!-- <link rel="stylesheet" href=""> -->
</head>

<body>
	<h1>Części samochodowe</h1>
	<h2>Zamówienia:</h2>

	<?php 
		@$fp = fopen("$path/orders.txt", 'rb');
		flock($fp, LOCK_SH); // zablokowanie pliku do odczytu

		if(! $fp){
			echo "<p><strong>Nie można wczytać zamówień. Spróbuj ponownie później.</strong></p>";
			exit;
		}

		while (!feof($fp)) {
			$order = fgetss($fp);
			echo htmlspecialchars($order) . "<br>";
		}

		flock($fp, LOCK_UN); //odblokowanie pliku
		fclose($fp);
	?>
</body>
</html>