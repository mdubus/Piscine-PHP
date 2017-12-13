<?PHP session_start(); ?>
<?PHP include("header_admin.php"); ?>
<!DOCTYPE html>
<html>
<body>
  <div id="content">
    <br/>
    <a href="admin.php" class="admin-users">Retourner à la liste</a><br/><br/>
    <h2>Liste des catégories</h2>

    <?PHP
    $path = "../../private";
    $file = $path."/categories";
    if (!file_exists($file))
    {
      echo "<p>Aucune catégorie n'existe actuellement</p>";
    }
    else
    {
      $unserialized = unserialize(file_get_contents($file));

      $cat1 = $unserialized[cat1];
      $cat2 = $unserialized[cat2];
      echo "<div id='tab-admin-dino'>";
      echo "<table>";
      echo "<tr>
      <th>Catégorie 1</th>
      </tr>";
      foreach ($cat1 as $cat1_elem)
      {
        echo "<tr>
        <td>".$cat1_elem."</td>";
      }
      echo "</table>";
      echo "</div><br/><br/>";

      echo "<div id='tab-admin-dino'>";
      echo "<table>";
      echo "<tr>
      <th>Catégorie 2</th>
      </tr>";
      foreach ($cat2 as $cat2_elem)
      {
        echo "<td>".$cat2_elem."</td>
        </tr>";
      }
      echo "</table>";
      echo "</div>";
    }

    ?>
    <br/>
    <h2>Ajouter une catégorie</h2>
    <div id="add-user">
      <br/><p> Veuillez indiquer la catégorie à rajouter :</p>
      <br/>
      <form method="post" action="admin-add-category.php">
        Catégorie 1 : <input type="text" name="category"/>
        <input type="submit" name = "submit" value="Envoyer" />
      </form>
    </div>
  <?PHP
    if ($_SESSION['category-create'] == "ko")
    {
    echo "<p id='error'>Erreur : Cette catégorie existe déjà !</p>";
    $_SESSION['category-create'] = NULL;
    }
    else if ($_SESSION['flag-creation-cat'] == "ok")
    {
    echo "<p id='inscription-ok''>Catégorie créée avec succès !</p>";
    $_SESSION['flag-creation-cat'] = NULL;
    }
?>

<br/><h2>Modifier une catégorie</h2>

<br/><p>Entrez le nom de la catégorie que vous souhaitez modifier :</p>
<form method="post" action="admin-modif-category.php">
  Ancienne catégorie : <input type="text" name="old-category"/><br/><br/>
  Nouvelle catégorie : <input type="text" name="new-category"/><br/><br/>
  <input type="submit" name = "submit" value="Envoyer" />
</form>
<?PHP
  if ($_SESSION['category-modif'] == "ko")
  {
  echo "<p id='error'>Erreur : Cette catégorie n'existe pas !</p>";
  $_SESSION['category-modif'] = NULL;
  }
  else if ($_SESSION['flag-modif-cat'] == "ok")
  {
  echo "<p id='inscription-ok''>Catégorie modifiée avec succès !</p>";
  $_SESSION['flag-modif-cat'] = NULL;
  }
?>

<br/><h2>Supprimer une catégorie</h2>
<br/><p>Entrez le nom de la catégorie que vous souhaitez supprimer :</p>
<form method="post" action="admin-delete-category.php">
  Catégorie : <input type="text" name="category"/>
  <input type="submit" name = "submit" value="Envoyer" />
</form>
<?PHP
  if ($_SESSION['category-delete'] == "ko")
  {
  echo "<p id='error'>Erreur : Cette catégorie n'existe pas !</p>";
  $_SESSION['category-delete'] = NULL;
  }
  else if ($_SESSION['flag-delete-cat'] == "ok")
  {
  echo "<p id='inscription-ok''>Catégorie supprimée avec succès !</p>";
  $_SESSION['flag-delete-cat'] = NULL;
  }
?>

</div>
</body>
<br/><br/><br/>

<footer>
</footer>
</html>
