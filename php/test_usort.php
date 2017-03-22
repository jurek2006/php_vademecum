<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Test - usort</title>
  <meta name="description" content="">
  <meta name="author" content="">

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

<h1>Test usort</h1>
<?php 

  // Stworzenie tabeli osób
  $osoby = array(
            array('imie' => "Jan",
                  'nazwisko' => "Kowalski",
                  'wiek' => 39,
                  'wzrost' => 198
            ),
            array('imie' => "Grzegorz",
                  'nazwisko' => "Brzęczyszczykiewicz",
                  'wiek' => 59,
                  'wzrost' => 156
            ),
            array('imie' => "Anna",
                  'nazwisko' => "Bez",
                  'wiek' => 19,
                  'wzrost' => 158
            )
          );

  // var_dump($osoby);
  wyswietlOsoby($osoby);


  echo '<h2>Sortowanie po nazwisku:</h2>';
  usort($osoby, sortNazwisko);
  wyswietlOsoby($osoby);

  echo '<h2>Sortowanie po wzroście:</h2>';
  usort($osoby, sortWzrost);
  wyswietlOsoby($osoby);

  echo '<h2>Sortowanie po wieku:</h2>';
  usort($osoby, sortWiek);
  wyswietlOsoby($osoby);

  function wyswietlOsoby($tabela_osob){
  // wyświetla tabelę osób

    ?>
    <table>
      <tr>
        <th>Imię</th>
        <th>Nazwisko</th>
        <th>Wiek</th>
        <th>Wzrost</th>
      </tr>
    <?php

    for($i = 0; $i < count($tabela_osob); $i++) {
      // var_dump($tabela_osob[$i]); echo "<br>";
      ?>
      <tr>
         <td><?php echo $tabela_osob[$i]['imie']; ?></td>
         <td><?php echo $tabela_osob[$i]['nazwisko']; ?></td>
         <td><?php echo $tabela_osob[$i]['wiek']; ?></td>
         <td><?php echo $tabela_osob[$i]['wzrost']; ?></td>
      </tr>
       
      <?php
    }

    ?>
    </table> 
    <?php
  }

  function podSort($x, $y, $element_str){
  // prosta podfunkcja sortująca do funkcji używanych w usort
  // $element_str określa klucz wg którego następuje sortowanie
    if      ($x[$element_str] == $y[$element_str])  { return 0;}
    elseif  ($x[$element_str] < $y[$element_str])    { return -1; }
    else{ return 1;}
  }

  function sortNazwisko($x, $y){
  // funkcja do sortowania po nazwisku za pomocą usort
    return podSort($x, $y, 'nazwisko');
  }

  function sortWzrost($x, $y){
  // funkcja do sortowania po wzroście za pomocą usort
    return podSort($x, $y, 'wzrost');
  }

  function sortWiek($x, $y){
  // funkcja do sortowania po wieku za pomocą usort
    return podSort($x, $y, 'wiek');
  }
?>



</body>
</html>