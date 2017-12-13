<?PHP
session_start();

  if ((isset($_POST['category']) && $_POST['category'] != NULL)&&
  (isset($_POST['submit']) && $_POST['submit'] === "Envoyer"))
  {
    $path = "../../private";
    $file = $path."/categories";

    $flag = 1;
    $unserialized = unserialize(file_get_contents($file));
    foreach ($unserialized as $dino=>$value)
    {
        if ($value[0] == $_POST['category'])
            $flag = 0;
    }
  }
  else
  {
    header('Location: admin-categories.php');
    exit();
  }

echo $flag;

if ($flag == 0)
{
  $_SESSION['category-create'] = "ko";

  echo "<meta http-equiv='refresh' content='0,url=admin-categories.php'>";
  exit();
}
else if ($flag == 1)
{
  $unserialized[cat1][] = $_POST['category'];
  $serialized = serialize($unserialized);
  file_put_contents($file, $serialized);
  $_SESSION['flag-creation-cat'] = "ok";
  echo "<meta http-equiv='refresh' content='0,url=admin-categories.php'>";
  exit();
}
?>
