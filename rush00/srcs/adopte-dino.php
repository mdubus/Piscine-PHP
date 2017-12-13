<?php  include("header.php"); ?>
<!DOCTYPE html>
<html>
<body>
  <div id="content">
    <br/>
    <h2>Mon super dino</h2>

    <?PHP
    $bdd = unserialize(file_get_contents("../bdd/serialized"));
    $flag = 0;
    $id = $_GET[dino] - 1;
    foreach ($bdd as $num_dino)
    {
        if ($num_dino[0] == $_GET[dino])
          $flag = 1;
    }
    if (isset($_GET[dino]) && $_GET[dino] != NULL &&
    $_GET[dino] >= 0 && is_numeric($_GET[dino]) && $flag == 1)
    {
      echo "<a href='boutique.php' class='admin-users'>Revenir à la liste</a><br/><br/>";
      echo "<table id='page-dino'>";
      echo "<tr><td class='nom-dino'>".$bdd[$id][1]."</td><tr/>";
      echo "<tr><td><img src='".$bdd[$id][9]."'/ style='width:100%;'></td><tr/>";
      echo "<tr><td>Catégories : ".$bdd[$id][2].", ".$bdd[$_GET[dino]][3]."</td><tr/>";
      echo "<tr><td>Taille : ".$bdd[$id][7]."</td><tr/>";
      echo "<tr><td>Poids : ".$bdd[$id][8]."</td><tr/>";
      echo "<tr><td>Prix : ".$bdd[$id][6]."</td><tr/>";
	  echo "<tr><td><a href='add_panier.php?dino=".$bdd[$id][0]."'>Je le mets dans mon panier</a></td><tr/>";
      echo "</table>";
    }
    else {
      echo "<meta http-equiv='refresh' content='0,url=boutique.php'>";
      exit();
    }
    ?>
  </div>
</body>
<footer>
</footer>
</html>
