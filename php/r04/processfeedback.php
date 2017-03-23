<?php 
	// utworzenie krótkich nazw zmiennych
	$name = $_POST['name'];
	$email = $_POST['email'];
	$feedback = $_POST['feedback'];

	// ustawienie stałych danych
	$toaddress = "jurek2006@gmail.com";

	$subject = "Feedback from web site";

	$mailcontent = 	"Customer name: " . filter_var($name) . "\n" .
					"Customer email: " . $email . "\n" .
					"Customer comments:\n" . $feedback . "\n";

	$fromaddress = "From: jurek2006@gmail.com";

	// wywołanie funkcji mail() do wysyłania wiadomości
	mail($toaddress, $subject, $mailcontent, $fromaddress);
?>

<!doctype html>

<html lang="pl">
<head>
  <meta charset="utf-8">

  <title>Bob's Auto Parts</title>

</head>

<body>

	<h1>Feedback submitted</h1>
	<p>Your feedback has been sent.</p>

</body>
</html>