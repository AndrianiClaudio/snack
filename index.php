<?php
/**
 * To-Do
 * PULIZIA CODICE!!!!
 * Prove: 
 *    creare funzione per filtraggio in base a valore, cosi da non ripetere troppo il ciclo foreach
 * controllo codice, sembra un po 'sporco'
 * inserire immagini adatte
 * 
 */



//data
$products = [
  [
    'Nome' => 'Gocciole',
    'Prezzo' => 2.97,
    'Immagine' => 'https://i.picsum.photos/id/225/200/200.jpg?hmac=52EiCj00RHCtvmOTzd1OIWV0prXw1EISWtV8iI65NL4',
    'Tipologia' => 'Alimentari',
  ],
  [
    'Nome' => 'Gocciole Dark +',
    'Prezzo' => 4.97,
    'Immagine' => 'https://i.picsum.photos/id/225/200/200.jpg?hmac=52EiCj00RHCtvmOTzd1OIWV0prXw1EISWtV8iI65NL4',
    'Tipologia' => 'Alimentari',
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
// [
//   $prezzo,
//   $tipologia
//   ] = 'all';
  // se non settato valore, imposta a true
//filtra sia per prezzo che per tipologia
if (isset($_GET['prezzo']) === true || isset($_GET['tipologia']) === true) {
  if(isset($_GET['prezzo']) === true) {
    $prezzo = $_GET['prezzo'];
    // echo $prezzo;
    if($prezzo === 'all') {
      $filteredProducts = $products;
    } else {
      $filteredProducts = [];
    }
    //PRIMO FILTRAGGIO PER PREZZO
    foreach ($products as $prod) {
      if($prod['Prezzo'] < $prezzo) {
        $filteredProducts[] = $prod;
      }
    }
  }
  //SECONDO FILTRAGGIO PER TIPOLOGIA
  if(isset($_GET['tipologia']) === true) {
    $tipologia = str_replace('-', ' ',strtolower($_GET['tipologia']));
    if($tipologia != 'all') {
      $tipologia [0] = strtoupper($tipologia[0]); {
      }
      // echo 'Tipologia: ',$tipologia;
      foreach ($filteredProducts as $key => $fProd) {
        if($fProd['Tipologia'] !== $tipologia) {
          unset($filteredProducts[$key]);
          // $filteredProducts[] = $fProd;
        }
      }
    }
  }
}
    // $filteredProducts = [];

// if (isset($_GET['tipologia']) === true) {
//   $tipologia = $_GET['tipologia'];
// }
// echo $prezzo,$tipologia;
// echo '<br><br><br><br><br><br>';

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
        <label for="prezzo">
          Filtra per prezzo
          <select name="prezzo" id="prezzo">
            <option value="all">All</option>
            <option value="3">
              <3
            </option>
            <option value="5">
              <5
            </option>
            <option value="10">
              <10
            </option>
          </select>
        </label>
        <label for="tipologia">
          Filtra per tipologia
          <select name="tipologia" id="tipologia">
            <option value="all">All</option>
            <option value="alimentari">alimentari</option>
            <option value="igiene-personale">Igiene Personale</option>
            <option value="prodotti-per-neonati">Prodotti per Neonati</option>
          </select>
          <button>Cerca</button>
        </label>
      </form>
      <?php
      echo '<ul>';
      foreach ($filteredProducts as $product) {
        echo '<li>';
        // var_dump($product);
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