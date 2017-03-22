<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Test</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- <link rel="stylesheet" href=""> -->

  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <![endif]-->
</head>

<body>
  <!-- <script src="js/scripts.js"></script> -->

<h1>Test heredoc</h1>
<?php 
	echo <<<KONIEC
	wiersz1
	wiersz2
	wiersz3
KONIEC;
?>

<!-- <h1>phpinfo()</h1>
<?php //phpinfo(); ?> -->

</body>
</html>