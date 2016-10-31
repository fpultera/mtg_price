<?php
require_once 'app/init.php';
if(isset($_GET['q'])) {
  $q = $_GET['q'];
  $query = $es->search([
    'body' => [
      'query' => [
        'bool' => [
          'should' => [
            ['match' => ['name' => $q ]],
            ['match' => ['edition' => $q ]]
          ]
        ]
      ]
    ]
  ]);
  if($query['hits']['total'] >=1) {
    $results = $query['hits']['hits'];
  }
}
?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>search | ES</title>

    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <form action="index.php" method="get" autocomplete="off">
      <label>
        Busca algo
        <input type="text" name="q">
      </label>

      <input type="submit" value="Search">
    </form>
    <?php
      if(isset($results)) {
        foreach($results as $r) {
        ?>
          <div class="result">
            <div class="result">Vendedor: <?php echo $r['_source']['seller']; ?></div>
            <div class="result">Carta: <?php echo $r['_source']['name']; ?></div>
            <div class="result">Edicion: <?php echo $r['_source']['edition']; ?></div>
            <div class="result">Precio: <?php echo $r['_source']['price']; ?></div>
            <div class="result-keywords">-------------</div>
          </div>
        <?php 
        }
    }
    ?>
  </body>
</html>
