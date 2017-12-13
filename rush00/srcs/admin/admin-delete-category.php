<?PHP
session_start();

if ((isset($_POST['category']) && $_POST['category'] != NULL)&&
(isset($_POST['submit']) && $_POST['submit'] === "Envoyer"))
{
  $path = "../../private";
  $file = $path."/categories";

  $flag = 0;
  $unserialized = unserialize(file_get_contents($file));

  if (array_search($_POST['category'], $unserialized[cat1]))
  {
    $return = array_search($_POST['category'], $unserialized[cat1]);
    unset($unserialized[cat1][$return]);
    $unserialized[cat1] = array_values($unserialized[cat1]);
    $flag = 1;
  }
}
else
{
  echo "<meta http-equiv='refresh' content='0,url=admin-categories.php'>";
  exit();
}

echo $flag;

if ($flag == 0)
{
  $_SESSION['category-delete'] = "ko";
  echo "<meta http-equiv='refresh' content='0,url=admin-categories.php'>";
  exit();
}
else if ($flag == 1)
{
  $serialized = serialize($unserialized);
  file_put_contents($file, $serialized);
  $_SESSION['flag-delete-cat'] = "ok";
  echo "<meta http-equiv='refresh' content='0,url=admin-categories.php'>";
  exit();
}
?>
