<?PHP
session_start();
function	get_data()
{
  if ((isset($_POST['dinosaure']) && $_POST['dinosaure'] != NULL) &&
  (isset($_POST['categorie1']) && $_POST['categorie1'] != NULL) &&
  (isset($_POST['categorie2']) && $_POST['categorie2'] != NULL) &&
  (isset($_POST['quantite_femelle']) && $_POST['quantite_femelle'] != NULL) &&
  (isset($_POST['quantite_male']) && $_POST['quantite_male'] != NULL) &&
  (isset($_POST['prix']) && $_POST['prix'] != NULL) &&
  (isset($_POST['taille']) && $_POST['taille'] != NULL) &&
  (isset($_POST['poids']) && $_POST['poids'] != NULL) &&
  (isset($_POST['image']) && $_POST['image'] != NULL) &&
  (isset($_POST['submit']) && $_POST['submit'] === "Envoyer"))
  {
    $tab[0] = NULL;
    $tab[1] = $_POST['dinosaure'];
    $tab[2] = $_POST['categorie1'];
    $tab[3] = $_POST['categorie2'];
    $tab[4] = $_POST['quantite_femelle'];
    $tab[5] = $_POST['quantite_male'];
    $tab[6] = $_POST['prix'];
    $tab[7] = $_POST['taille'];
    $tab[8] = $_POST['poids'];
    $tab[9] = "../img/".$_POST['image'];
  }
  else
  {
    $_SESSION['flagchamps'] = "ko";
    header('Location: admin-products.php');
    exit();
  }
  return ($tab);
}

$path = "../../bdd";
$file = $path."/serialized";

$tab = get_data();
$unserialized = unserialize(file_get_contents($file));
$tab[0] = count($unserialized) + 1;
echo $tab[0];
$unserialized[] = $tab;
$serialized = serialize($unserialized);
file_put_contents($file, $serialized);
$_SESSION['flagcreation'] = "ok";
echo "<meta http-equiv='refresh' content='0,url=admin-products.php'>";
exit();
?>
