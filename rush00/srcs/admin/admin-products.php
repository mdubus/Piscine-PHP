<?PHP session_start();
include("header_admin.php"); ?>
<!DOCTYPE html>
<html>
<body>
  <div id="content">
    <br/>
    <a href="admin.php" class="admin-users">Retourner à la liste</a><br/><br/>
    <h2>Liste des Dinosaures</h2>
    <?PHP
    $path = "../../bdd";
    $file = $path."/serialized";
    if (!file_exists($file))
    {
      echo "<p>Aucun dinosaure n'est disponible à la vente</p>";
    }
    else
    {
      $unserialized = unserialize(file_get_contents($file));
      echo "<div id='tab-admin-dino'>";
      echo "<table>";
      echo "<tr>
      <th>Id</th>
      <th>Dinosaure</th>
      <th>Catégorie 1</th>
      <th>Catégorie 2</th>
      <th>Quantité F</th>
      <th>Quantité M</th>
      <th>Prix</th>
      <th>Taille</th>
      <th>Poids</th>
      <th>Image</th>
      </tr>";
      foreach ($unserialized as $elem)
      {
        echo "<tr>
        <td>".$elem[0]."</td>
        <td>".$elem[1]."</td>
        <td>".$elem[2]."</td>
        <td>".$elem[3]."</td>
        <td>".$elem[4]."</td>
        <td>".$elem[5]."</td>
        <td>".$elem[6]."</td>
        <td>".$elem[7]."</td>
        <td>".$elem[8]."</td>
        <td>".$elem[9]."</td>
        </tr>";
      }
      echo "</table>";
      echo "</div>";
    }
    ?>
    <br/>
    <h2>Ajouter un dinosaure</h2>
    <div id="add-user">
      <br/><p> Veuillez indiquer le dinosaure à rajouter :</p>
      <br/>
      <form method="post" action="admin-add-dino.php">
        Dinosaure : <input type="text" name="dinosaure"/><br/><br/>
        Catégorie 1 : <input type="text" name="categorie1"/><br/><br/>
        Catégorie 2 : <input type="text" name="categorie2"/><br/><br/>
        Quantité femelle : <input type="text" name="quantite_femelle"/><br/><br/>
        Quantité mâle : <input type="text" name="quantite_male"/><br/><br/>
        Prix : <input type="text" name="prix"/><br/><br/>
        Taille : <input type="text" name="taille"/><br/><br/>
        Poids : <input type="text" name="poids"/><br/><br/>
        Image : <input type="file" name="image"/><br/><br/>
        <input type="submit" name = "submit" value="Envoyer" />
      </form>
    </div>
    <?php
    if ($_SESSION['flagchamps'] == "ko")
    {
      echo "<p id='error'>Erreur : vous devez remplir tous les champs\n</p>";
      $_SESSION['flagchamps'] = NULL;
    }
    else if ($_SESSION['flagcreation'] == "ok")
    {
      echo "<div id='inscription-ok'>Félicitation ! Vous possédez un nouveau dino !</div>";
      $_SESSION['flagcreation'] = NULL;
    }

    ?>
    <br/><h2>Modifier un dinosaure</h2>
    <br/><p>Entrez l'identifiant du dinosaure que vous souhaitez modifier,
      ainsi que les modifications que vous souhaitez apporter :</p><br/>
    <form method="post" action="admin-modif-dino.php">
      Identifiant du dinosaure : <input type="text" name="id"/><br/><br/>
      Nom du dinosaure : <input type="text" name="dinosaure"/><br/><br/>
      Catégorie 1 : <input type="text" name="categorie1"/><br/><br/>
      Catégorie 2 : <input type="text" name="categorie2"/><br/><br/>
      Quantité femelle : <input type="text" name="quantite_femelle"/><br/><br/>
      Quantité mâle : <input type="text" name="quantite_male"/><br/><br/>
      Prix : <input type="text" name="prix"/><br/><br/>
      Taille : <input type="text" name="taille"/><br/><br/>
      Poids : <input type="text" name="poids"/><br/><br/>
      Image : <input type="file" name="image"/><br/><br/>
      <input type="submit" name = "submit" value="Envoyer" />
    </form>
<?PHP

if ($_SESSION['flag_modif_dino'] == "ko")
{
  echo "<p id='error'>Erreur : aucun dinosaure trouvé avec cet identifiant</p>";
  $_SESSION['flag_modif_dino'] = "";
}
else if ($_SESSION['flag_champs_modif_dino'] == "ko")
{
  echo "<p id='error'>Erreur : Vous devez remplir tous les champs !</p>";
  $_SESSION['flag_champs_modif_dino'] = "";
}
else if ($_SESSION['flag_modif_dino'] == "ok")
{
  echo "<p id='inscription-ok'>Votre dinosaure a bien été modifié !</p>";
  $_SESSION['flag_modif_dino'] = "";
}
?>
    <br/><h2>Supprimer un dinosaure</h2>
    <br/><p>Entrez l'identifiant du dinosaure que vous souhaitez supprimer :</p><br/>
    <form method="post" action="admin-delete-dino.php">
      Identifiant du dinosaure : <input type="text" name="id"/>
      <input type="submit" name = "submit" value="Envoyer" />
    </form>

    <?php
    if ($_SESSION['no-dino-to-delete'] == "ko")
    {
      echo "<p id='error'>Erreur : aucun dinosaure présent dans la base de données</p>";
      $_SESSION['no-dinoto-delete'] = "";
    }
    else {

      if ($_SESSION['flag_suppression_dino'] == "ok")
      {
        echo "<p id='inscription-ok'>Adieu petit dinosaure !</p>";
        $_SESSION['flag_suppression_dino'] = "";
      }
      else if ($_SESSION['flag_suppression_dino'] == "ko")
      {
        echo "<p id='error'>Erreur : aucun dinosaure trouvé avec cet identifiant</p>";
        $_SESSION['flag_suppression_dino'] = "";
      }
    }
    ?>
  </div>
</body>
<br/><br/><br/>

<footer>
</footer>
</html>
