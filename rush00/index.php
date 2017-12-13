<?PHP
session_start();
//include("install.php");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Dino-Shop</title>
  <link rel="stylesheet" type="text/css" href="srcs/css/dinoshop.css">
  <meta name="google" content="notranslate"/>
</head>

<body>
  <div id="head">
    <a href="index.php"><img src="img/logo-dino.jpg"/></a>
    <a href="index.php"><h1>Dino-Shop</h1></a>
  </div>


  <div id="menu">
    <ul>
      <li><a href="srcs/qui-sommes-nous.php">Qui sommes nous ?</a></li>
      <li><a href="srcs/boutique.php">Boutique</a></li>
	  <li><a href="srcs/contact.php">Contact</a></li>

<?php
	if ($_SESSION['logged_on_user'] != "")
	{
		echo"<li><a href='srcs/connexion/mon_compte.php'>Mon Compte</a></li>";
		echo"<li><a href='srcs/connexion/deconnexion.php'>Deconnexion</a></li>";
	}
	else
	{
		echo"<li><a href='srcs/inscription.php'>Inscription</a></li>";
		echo"<li><a href='srcs/connexion/connexion.php'>Connexion</a></li>";
	}
?>

	  <li><a href="srcs/panier.php">Panier <?php
        if (!$_SESSION['nb_articles'])
          $_SESSION['nb_articles'] = 0;
		echo "(".$_SESSION['nb_articles'].")";?></a></li>

<?php
			if ($_SESSION['logged_on_user'] == "admin")
			{
      			echo"<li><a href='srcs/admin/admin.php'>Admin</a></li>";
			}
?>
    </ul>
  </div>

  <div id="content">

    <br/>
		<a href="srcs/boutique.php"><h3>Cliquez ici pour visiter notre Boutique de supers dinos</h3></a>

    <p>Xuanhanosaurus Ischyrosaurus Giganotosaurus Ozraptor Unescoceratops Nambalia
      Luoyanggia Banji Hypsilophodon Sonidosaurus Udanoceratops Blasisaurus
      Unescoceratops Ugrosaurus Microraptor Longisquama Nanningosaurus Leaellynasaura
      Ultrasauros Jingshanosaurus Trialestes Urbacodon Naashoibitosaurus Claosaurus
      Eoabelisaurus Ornithomerus Lusotitan Hoplosaurus Lesothosaurus Proplanicoxa
      Klamelisaurus Hylosaurus Hypselorhachis Sanpasaurus Labocania Carcharodontosaurus
      Zupaysaurus Spinosaurus Orkoraptor Tapinocephalus Elopteryx Segnosaurus Acristavus
      Procheneosaurus Stegosaurus Patagonykus Alaskacephale Gojirasaurus Procheneosaurus
	  Futabasaurus.</p>

		<a href="srcs/boutique.php"><img src="img/tyrannosaurus.jpg" title="Achetez-moi"/></a>

      <p>Xixianykus Uteodon Efraasia Oxalaia Hesperonychus Eocursor Mendozasaurus
        Rahiolisaurus Carnotaurus Helioceratops Incisivosaurus Wulagasaurus Compsognathus
        Machimosaurus Palaeosauriscus Jiangshanosaurus Medusaceratops Ponerosteus
        Camptosaurus Ornithomimus Polyonax Magnapaulia Xixiasaurus Procompsognathus
        Megaraptor Pantydraco Aniksosaurus Tribelesodon Tarbosaurus Pelecanimimus
        Palaeosauriscus Jixiangornis Dracopelta Tawa Supersaurus Sonorasaurus
        Acrocanthosaurus Technosaurus Dyoplosaurus Fukuititan Gondwanatitan
        Nopcsaspondylus Guanlong Mamenchisaurus Pectinodon Neimongosaurus Mamenchisaurus
        Dryosaurus Eurolimnornis Fukuiraptor.</p>

		<a href="srcs/boutique.php"><img src="img/mosasaurus.png" title="Achetez-moi"/></a>

        <p>Concavenator Zuniceratops Sauroposeidon Bonapartenykus Shidaisaurus
          Archaeopteryx Leyesaurus Uberabatitan Aeolosaurus Dimodosaurus Nambalia
          Mongolosaurus Timimus Amygdalodon Futalognkosaurus Dakosaurus Haplocheirus
          Erlicosaurus Planicoxa Volkheimeria Mendozasaurus Hippodraco Palaeosaurus
          Vitakrisaurus Riojasuchus Giraffatitan Stenotholus Basutodon Thespesius
          Deinodon Yuanmousaurus Macrurosaurus Edmontosaurus Arenysaurus Pachyspondylus
          Pachysauriscus Nanosaurus Actiosaurus Bravoceratops Anchisaurus Struthiomimus
          Rayososaurus Dinosaurus Losillasaurus Yueosaurus Chiayusaurus Gastonia
		  Jainosaurus Claorhynchus Maiasaura.</p>
<!-- Desolee!!! :( -->
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
        </div>

      </body>

      <footer>

      </footer>
      </html>
