<?php
	ini_set('display_errors', 1);
	error_reporting(E_ALL);

	// utwórz krótkie nazwy zmiennych
	$iloscopon = (int) $_POST['iloscopon'];
	$iloscoleju = (int)$_POST['iloscoleju'];
	$iloscswiec = (int)$_POST['iloscswiec'];
	$adres = preg_replace('/\t|\R/', ' ', $_POST['adres']);
	$document_root = $_SERVER['DOCUMENT_ROOT'];
	$date = date('H:i, jS F Y');
?>

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
		ini_set('display_errors', 1);
		error_reporting(E_ALL);

		echo "<p>Zamówienie przetworzone " . date('H:i, jS F Y') . "</p>";
		echo "<p>Szczegóły Twojego zamówienia:</p>";

		$ilosc = 0;
		$ilosc = $iloscopon + $iloscoleju + $iloscswiec;
		echo "Zamówionych części: $ilosc <br>";
		
		$wartosc = 0.00;
		define('CENAOPON', 100);
		define('CENAOLEJU', 10);
		define('CENASWIEC', 4);

		if($ilosc == 0){
			echo "Nie zamówiłeś niczego na poprzedniej stronie! <br>";
		}
		else{
			if($iloscopon > 0){
				echo htmlspecialchars($iloscopon) . ' opon <br>';
			}
			if($iloscoleju > 0){
				echo htmlspecialchars($iloscoleju) . ' butelek oleju <br>';
			}
			if($iloscswiec > 0){
				echo htmlspecialchars($iloscswiec) . ' świec zapłonowych <br>';
			}
		}

		$wartosc = $iloscopon * CENAOPON
					+ $iloscoleju * CENAOLEJU
					+ $iloscswiec * CENASWIEC;

		echo "Cena netto: " . number_format($wartosc,2) . " PLN <br>";

		$stawkavat = 0.23;
		$wartosc *= (1 + $stawkavat);

		echo "Cena brutto: " . number_format($wartosc,2) . " PLN <br>";

		echo "<p>Adres do wysyłki" . htmlspecialchars($adres) . "</p>";

		// część odpowiedzialna za zapis zamówienia:
		$outputstring = $date . "\t" . $iloscopon . " opon\t" . $iloscoleju . " oleju\t" . $iloscswiec . " świec\t" . $wartosc . " zł\t" . $adres . "\n";

		// otwarcie pliku do dodawania
		@$fp = fopen("../orders/orders.txt", 'ab');

		if(!$fp){
			echo "<p><strong>Twoje zamówienie nie może być przetworzone w tym momencie. Proszę spróbuj później.</strong></p>";
			exit;
		}

		flock($fp, LOCK_EX);
		fwrite($fp, $outputstring, strlen($outputstring));
		flock($fp, LOCK_UN);

		fclose($fp);

		echo "<p>Zamówienie zapisane.</p>";


	?>
</body>
</html>