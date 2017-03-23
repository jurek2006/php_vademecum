<?php 
	// utworzenie krótkich nazw zmiennych
	$name = trim($_POST['name']);
	$email = trim($_POST['email']);
	$feedback = trim($_POST['feedback']);

	// ustawienie stałych danych
	$toaddress = "jurek2006@gmail.com";

	$subject = "Feedback from web site"; 

	$mailcontent = 	"Customer name: " . str_replace("\r\n", "", $name) . "\n" .
					"Customer email: " . str_replace("\r\n", "", $email) . "\n" .
					"Customer comments:\n" . str_replace("\r\n", "",$feedback) . "\n";

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
	<p>Your feedback (shown below) has been sent.</p>
	<p><?php echo nl2br(htmlspecialchars($feedback)); ?></p>

</body>
</html>