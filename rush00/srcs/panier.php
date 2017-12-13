<?php include("header.php"); ?>
<!DOCTYPE html>
<html>
<body>
<!-- Panier -->
<div id="content">

<?PHP



$file = "../bdd/serialized";
$unserialized = unserialize(file_get_contents($file));

$_SESSION['nb_articles'] = count($_SESSION['panier']);


if ($_SESSION['nb_articles'] != 0)
{
		$total = 0;
		echo "<table id='tab-admin-dino'>";
		echo "<tr><th>Nom du dinosaure</th><th>Quantite</th><th>Prix</th><tr/>";
		foreach ($_SESSION['panier'] as $elem)
		{
			$id = $elem - 1;
			echo "<tr><td>".$unserialized[$id][1]."</td><td>1</td><td>".$unserialized[$id][6]."</td><tr/>";
			$total += $unserialized[$id][6];
		}

		echo "<tr><td></td><td>Total</td><td>".$total."</td><tr/>";
		echo "</table>";



		if ($_SESSION['logged_on_user'] != "")
		{
			$_SESSION['historique'] = $_SESSION['panier'];
			unset($_SESSION['panier']);
		$_SESSION['nb_articles'] = 0;

			echo "<form action='connexion/mon_compte.php' method='post'>";
				echo "<input type='submit' name='compte' value='Acheter' />";
			echo "</form>";
		}
		else if ($_SESSION['logged_on_user'] == "")
		{
			echo "<form action='inscription.php' method='post'>";
				echo "<input type='submit' name='pas-compte' value='Pas de compte' />";
			echo "</form>";
		}
}
else
{
	echo "<p>Votre panier est vide</p>";
}
?>

</div>


</body>

<footer>

</footer>
</html>












