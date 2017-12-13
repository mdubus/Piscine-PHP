<?PHP session_start(); ?>
<?PHP include("header_admin.php"); ?>
<!DOCTYPE html>
<html>
<body>
  <div id="content">
    <br/>
    <a href="admin.php" class="admin-users">Retourner à la liste</a><br/><br/>
    <h2>Liste des utilisateurs</h2>
    <?PHP

    $path = "../../private";
    $file = $path."/passwd";


    if (!file_exists($file))
    {
      echo "<p>Aucun utilisateur n'est inscrit actuellement</p>";
    }
    else
    {
      $unserialized = unserialize(file_get_contents($file));
      echo "<div id='tab-admin-dino'>";
      echo "<table>";
      echo "<tr>
      <th>Nom</th>
      <th>Prenom</th>
      <th>Mail</th>
      </tr>";
      foreach ($unserialized as $elem)
      {
        echo "<tr>
        <td>".$elem['nom']."</td>
        <td>".$elem['prenom']."</td>
        <td>".$elem['mail']."</td>
        </tr>";
      }
      echo "</table>";
      echo "</div>";
    }
    ?>
    <br/>
    <h2>Ajouter un utilisateur</h2>
    <div id="add-user">
      <br/><p> Veuillez remplir le formulaire. Tous les champs sont obligatoires</p>
      <br/>
    <form method="post" action="admin-add.php">
    	Nom: <input type="text" name="nom"/><br /><br />
      Prenom : <input type="text" name="prenom"/><br /><br />
      Mail : <input type="text" name="mail"/><br /><br />
      Mot de passe : <input type="password" name="passwd1"/><br /><br />
      Répéter le mot de passe : <input type="password" name="passwd2"/><br /><br />
    	<input type="submit" name = "submit" value="Envoyer" />
    </form>
    </div>
    <?php
      if ($_SESSION['flagchamps'] == "ko")
      {
        echo "<p id='error'>Erreur : vous devez remplir tous les champs\n</p>";
        $_SESSION['flagchamps'] = NULL;
      }
      else if ($_SESSION['flagmail'] == "ko")
      {
    	  echo "<p id='error'>Erreur : un compte existe déjà avec cette adresse mail\n</p>";
        $_SESSION['flagmail'] = NULL;
      }
      else if ($_SESSION['flagpasswd'] == "ko")
      {
    	  echo "<p id='error'>Erreur : veuillez recopier votre mot de passe a l'identique\n</p>";
        $_SESSION['flagpasswd'] = NULL;
      }
      else if ($_SESSION['flagcreation'] == "ok")
        {
          echo "<div id='inscription-ok'>Inscription terminée !</div>";
          $_SESSION['flagcreation'] = NULL;
        }

    ?>
	<br/><h2>Modifier un utilisateur</h2>


 <br/><p>Entrez le mail de l'utilisateur que vous souhaitez modifier,
      ainsi que les modifications que vous souhaitez apporter :</p><br/>
	<form method="post" action="admin-modif-users.php">
	<p>Vous devez remplir tous les champs, si vous ne souhaitez pas modifier un element, renseignez l'ancien element a la place.</p>
      E-Mail de l'utilisateur : <input type="text" name="mail"/><br/><br/>
      Nouvel e-Mail de l'utilisateur : <input type="text" name="newmail"/><br/><br/>
      Nom de l'utilisateur : <input type="text" name="nom"/><br/><br/>
      Nouveau nom de l'utilisateur : <input type="text" name="newnom"/><br/><br/>
      Prenom de l'utilisateur : <input type="text" name="prenom"/><br/><br/>
      Nouveau prenom de l'utilisateur : <input type="text" name="newprenom"/><br/><br/>
        <input type="submit" name = "submit" value="OK" />
    </form>
 <?php
      if ($_SESSION['flag_modif_users'] == "KO")
      {
        echo "<p id='error'>Les informations renseignees sont incorrectes\n</p>";
		$_SESSION['flag_modif_users'] = "";
		unset($_SESSION['flag_modif_users']);
	  }
	  else if ($_SESSION['flag_modif_users'] == "KO-OK") //a virer
      {
        echo "<p id='error'>bllaaaaaaaaaaaaaaaaaaaaaaaaaaague\n</p>";
		$_SESSION['flag_modif_users'] = "";
		unset($_SESSION['flag_modif_users']);
	  }
	 else if ($_SESSION['flag_modif_users'] == "OK")
      {
          echo "<div id='inscription-ok'>La modification a bien ete apportee a l'utilisateur</div>";
		$_SESSION['flag_modif_users'] = "";
		unset($_SESSION['flag_modif_users']);
      }

    ?>



    <br/><h2>Supprimer un utilisateur</h2>
    <br/><p>Entrez l'adresse e-mail de l'utilisateur que vous souhaitez supprimer :</p>
    <form method="post" action="admin-delete.php">
      Mail: <input type="text" name="mail"/>
      <input type="submit" name = "submit" value="Envoyer" />
    </form>

    <?php
    if ($_SESSION['no-user-to-delete'] == "ko")
    {
      echo "<p id='error'>Erreur : aucun utilisateur présent dans la base de données</p>";
      $_SESSION['no-user-to-delete'] = "";
    }
    else {

      if ($_SESSION['flag_suppression_user'] == "ok")
      {
        echo "<p id='inscription-ok'>Utilisateur supprimé</p>";
        $_SESSION['flag_suppression_user'] = "";
      }
      else if ($_SESSION['flag_suppression_user'] == "ko")
      {
        echo "<p id='error'>Erreur : aucun utilisateur trouvé avec cette adresse mail</p>";
        $_SESSION['flag_suppression_user'] = "";
      }
    }
    ?>
  </div>
</body>
<br/><br/><br/>

<footer>
</footer>
</html>
