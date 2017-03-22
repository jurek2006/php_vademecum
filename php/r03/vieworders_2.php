<?php 
	$path = '../orders';
 ?>

<!doctype html>

<html lang="pl">
<head>
  <meta charset="utf-8">

  <title>Części samochodowe - zamówienia</title>

  <style type="text/css">
  	table, th, td{
  		border-collapse: collapse;
  		border: 1px solid black;
  		padding: 6px;
  	}

  	th{
  		background: #ccf;
  	}
  </style>
</head>

<body>
	<h1>Części samochodowe</h1>
	<h2>Zamówienia:</h2>

	<?php 
		// Wczytanie całego pliku
		// Każde zamówienie zostaje elementem tablicy
		$orders = file("$path/orders.txt");

		$number_of_orders = count($orders);
		if($number_of_orders == 0){
			echo "<p><strong>Brak zamówień. Spróbuj ponownie później.</strong></p>";
		}

		// zbudowanie tabeli
		?>
		<table>
			<tr>
				<th>Data zamówienia</th>
				<th>Opony</th>
				<th>Olej</th>
				<th>Świece</th>
				<th>Razem</th>
				<th>Adres</th>
			</tr>
		<?php

		for($i = 0; $i < $number_of_orders; $i++){
		// podzielenie każdej linii
			$line = explode("\t", $orders[$i]);

			// zachowanie tylko numerów rzeczy zamówionych
			$line[1] = intval($line[1]);
			$line[2] = intval($line[2]);
			$line[3] = intval($line[3]);
			$line[4] = floatval($line[4]);

			// wyświetlanie każdego zamówienia
			?>
				<tr>
					<td><?php echo $line[0]; ?></td>
					<td style="text-align: right;"><?php echo $line[1]; ?></td>
					<td style="text-align: right;"><?php echo $line[2]; ?></td>
					<td style="text-align: right;"><?php echo $line[3]; ?></td>
					<td style="text-align: right;"><?php echo $line[4] . ' zł'; ?></td>
					<td><?php echo $line[5]; ?></td>
				</tr>
			<?php
		}

	?>
		</table>
</body>
</html>