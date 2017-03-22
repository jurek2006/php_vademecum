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

		$orders = file("$path/orders.txt");

		$number_of_orders = count($orders);
		if($number_of_orders == 0){
			echo "<p><strong>Brak zamówień. Spróbuj ponownie później.</strong></p>";
		}

		for($i = 0; $i < $number_of_orders; $i++){
			echo $orders[$i] . "<br>";
		}
	?>
</body>
</html>