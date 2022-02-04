<?php
//data
$products = [
  [
    'Nome' => 'Gocciole',
    'Prezzo' => 2.97,
    'Immagine' => 'https://i.picsum.photos/id/225/200/200.jpg?hmac=52EiCj00RHCtvmOTzd1OIWV0prXw1EISWtV8iI65NL4',
    'Tipologia' => 'Alimentare',
  ],
  [
    'Nome' => 'Amuchina',
    'Prezzo' => 5.31,
    'Immagine' => 'https://i.picsum.photos/id/225/200/200.jpg?hmac=52EiCj00RHCtvmOTzd1OIWV0prXw1EISWtV8iI65NL4',
    'Tipologia' => 'Igiene personale',
  ],
  [
    'Nome' => 'Pannolini',
    'Prezzo' => 5.48,
    'Immagine' => 'https://i.picsum.photos/id/225/200/200.jpg?hmac=52EiCj00RHCtvmOTzd1OIWV0prXw1EISWtV8iI65NL4',
    'Tipologia' => 'Prodotti per neonati',
  ],
];
// var_dump($_GET['prezzo']);
// var_dump($_GET['tipologia']);
$filteredProducts = $products;
[
  $prezzo,
  $tipologia
  ] = 'all';
  // se non settato valore, imposta a true
//filtra sia per prezzo che per tipologia
if (isset($_GET['prezzo']) === true) {
  $prezzo = $_GET['prezzo'];
}
if (isset($_GET['tipologia']) === true) {
  $tipologia = $_GET['tipologia'];
}
// var_dump($prezzo, $tipologia);

//controllo se bisogna filtrare per filtro/tipologia
if($prezzo !== 'all' || $tipologia !== 'all') {
  // reset carte filtrate
  $filteredProducts = [];
  //cicla e filtra
  foreach ($products as $key => $p) {
    // var_dump($p);
    if($p['Prezzo'] < $prezzo) {
      $filteredProducts[] = $p;
      // echo '---coondizione prezzo < prezzo selezionato per filtraggio';
    }
  }
}
    // if($prezzo === 'all' && $tipologia === 'all') {
    //   echo "filtra sia per prezzo che per tipologia: ",$prezzo, $tipologia,'<br>';
    // } elseif ($prezzo === 'all') {
    //   echo "filtra solo per prezzo: ",$prezzo,'<br>';
    // } elseif ($tipologia == 'all'){
    //   echo "filtra solo per tipologia: ",$tipologia,'<br>';
    // }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Snack</title>
</head>

<body>
  <main>
    <div class="container">
      <form action="index.php" method="GET">
        <select name="prezzo" id="prezzo">
          <option value="all">All</option>
          <option value="3">
            <3 </option>
          <option value="5">
            <5 </option>
          <option value="10">
            <10 </option>
        </select>
        <select name="tipologia" id="tipologia">
          <option value="all">All</option>
          <option value="alimentari">alimentari</option>
          <option value="igiene-personale">Igiene Personale</option>
          <option value="prodotti-per-neonati">Prodotti per Neonati</option>
        </select>
        <button>Cerca</button>
      </form>
      <?php
      echo '<ul>';
      foreach ($filteredProducts as $product) {
        echo '<li>';
        echo '<h2>' . $product['Nome'] . '</h2>';
        echo '<b>' . $product['Prezzo'] . '</b><br>';
        echo "<img src='" . $product['Immagine'] . "' alt='" . $product['Nome'] . "'><br>";
        echo '<span>' . $product['Tipologia'] . '</span><br>';
        echo '</li>';
      }
      echo '</ul>';
      ?>
    </div>
  </main>
</body>

</html>