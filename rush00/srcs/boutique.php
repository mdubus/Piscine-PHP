<?php  include("header.php"); ?>
<!DOCTYPE html>
<html>
<body>
  <div id="content">
    <br/>
    
    <?PHP
    $path = "../private";
    $file = $path."/categories";
    $unserialized = unserialize(file_get_contents($file));
  echo "<h2>Boutique</h2>";
  echo "<aside>";
  echo "<p>Catégories :</p>";
  echo "<form method='post' action='check-box-boutique.php'>";
  foreach ($unserialized as $key=>$value)
  {
    foreach ($value as $elem)
    {
      echo "<input type='checkbox' name='".$elem."' checked='checked'> ".$elem."<br/>";
  }
}
  echo "<input type='submit' name = 'submit' value='Valider' />";
  echo "</form>";
  echo "</aside>";
  ?>

  <?PHP

  $bdd = unserialize(file_get_contents("../bdd/serialized"));
  // print_r ($bdd);
  echo "<table id='boutique-dino'>";
  foreach ($bdd as $dino)
  {
    echo "<tr><td class='nom-dino'>".$dino[1]."</td></tr>";
    echo "<tr><td><img src='".$dino[9]."'/ style='width:100%;'></td><tr/>";
    echo "<tr><td class='acheter-dino'><a href='adopte-dino.php?dino=".$dino[0]."'>J'adopte ce super dino !</a></td></tr>";
  }
  echo "</table>";

  ?>
</div>
</body>
<footer>
</footer>
</html>
