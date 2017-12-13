<?PHP
session_start();
function	get_data()
{
  if ((isset($_POST['id']) && $_POST['id'] != NULL) &&
  (isset($_POST['dinosaure']) && $_POST['dinosaure'] != NULL) &&
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
    $tab[0] = $_POST['id'];
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
    $_SESSION['flag_champs_modif_dino'] = "ko";
    header('Location: admin-products.php');
    exit();
  }
  return ($tab);
}

$path = "../../bdd";
$file = $path."/serialized";

$tab = get_data();

$unserialized = unserialize(file_get_contents($file));
$flag = 0;
foreach($unserialized as $key=>$dino)
{
  if ($tab[0] == $dino[0])
  {
    $flag = 1;
    $unserialized[$key][1] = $tab[1];
    $unserialized[$key][2] = $tab[2];
    $unserialized[$key][3] = $tab[3];
    $unserialized[$key][4] = $tab[4];
    $unserialized[$key][5] = $tab[5];
    $unserialized[$key][6] = $tab[6];
    $unserialized[$key][7] = $tab[7];
    $unserialized[$key][8] = $tab[8];
    $unserialized[$key][9] = $tab[9];
  }
}
if ($flag == 0)
{
  $_SESSION['flag_modif_dino'] = "ko";
  echo "<meta http-equiv='refresh' content='0,url=admin-products.php'>";
}
else {
$serialized = serialize($unserialized);
file_put_contents($file, $serialized);
$_SESSION['flag_modif_dino'] = "ok";
echo "<meta http-equiv='refresh' content='0,url=admin-products.php'>";
exit();
}
?>
