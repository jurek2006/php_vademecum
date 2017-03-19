<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Części samochodowe Janka - wyniki zamówienia</title>
</head>
<body>
	<h1>Części samochodowe Janka</h1>
	<h2>Wyniki zamówienia</h2>
	<?php
		// utwórz krótkie nazwy zmiennych
		$iloscopon = $_POST['iloscopon'];
		$iloscoleju = $_POST['iloscoleju'];
		$iloscswiec = $_POST['iloscswiec'];

		$ilosc = 0;
		$ilosc = $iloscopon + $iloscoleju + $iloscswiec;
		echo "Zamówionych części: $ilosc <br>";
		
		$wartosc = 0.00;
		define('CENAOPON', 100);
		define('CENAOLEJU', 10);
		define('CENASWIEC', 4);

		$wartosc = $iloscopon * CENAOPON
					+ $iloscoleju * CENAOLEJU
					+ $iloscswiec * CENASWIEC;

		echo "Cena netto: " . number_format($wartosc,2) . " PLN <br>";

		$stawkavat = 0.23;
		$wartosc *= (1 + $stawkavat);

		echo "Cena brutto: " . number_format($wartosc,2) . " PLN <br>";
	?>
</body>
</html>