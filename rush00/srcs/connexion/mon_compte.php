<?PHP session_start(); ?>
<?PHP include("header_connexion.php"); ?>
<!DOCTYPE html>
<html>
<body>
<!-- Mon_Compte -->
<div id='content'>
<h3>Bonjour <?php echo $_SESSION['logged_on_user'] ?>, voici les informations relatives a votre compte:</h3>
<br />
<p>Votre nom: <?php echo $_SESSION['nom'] ?></p>
<p>Votre prenom: <?php echo $_SESSION['logged_on_user'] ?></p>
<p>Votre adresse mail: <?php echo $_SESSION['mail'] ?></p>
<br />


<p>Mes Commandes:</p>
<?PHP
if ($_POST['compte'] == "Acheter" || ((count($_SESSION['historique'])) != 0))
{
	$file = "../../bdd/serialized";
	$unserialized = unserialize(file_get_contents($file));

	$_SESSION['nb_articles'] = count($_SESSION['historique']);


	if ($_SESSION['nb_articles'] != 0)
	{
		$total = 0;
		echo "<table id='tab-admin-dino'>";
		echo "<tr><th>Nom du dinosaure</th><th>Quantite</th><th>Prix</th><tr/>";
		foreach ($_SESSION['historique'] as $elem)
		{
			$id = $elem - 1;
			echo "<tr><td>".$unserialized[$id][1]."</td><td>1</td><td>".$unserialized[$id][6]."</td><tr/>";
			$total += $unserialized[$id][6];
		}

		echo "<tr><td></td><td>Total</td><td>".$total."</td><tr/>";
		echo "</table>";
		$_SESSION['nb_articles'] = 0;

	}
	else
	{
	echo "<p>Votre panier est vide</p>";
	}

}
else
{
	echo"<p>Auncune commande</p>";
}

?>



<br />
<p>Vous souhaitez supprimer votre compte? Vraiment?! D'accord... <a href="suppr_compte.php" >Cliquez ici alors..</a></p>
</div>



</body>

<footer>

</footer>
</html>
