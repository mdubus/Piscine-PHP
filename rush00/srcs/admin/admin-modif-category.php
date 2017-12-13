<?PHP
session_start();

if ((isset($_POST['old-category']) && $_POST['old-category'] != NULL)&&
(isset($_POST['new-category']) && $_POST['new-category'] != NULL)&&
(isset($_POST['submit']) && $_POST['submit'] === "Envoyer"))
{
  $path = "../../private";
  $file = $path."/categories";

  $flag = 0;
  $unserialized = unserialize(file_get_contents($file));
  foreach ($unserialized as $cat=>$value)
  {
    $i = 0;
    foreach($value as $elem)
    {
      if ($elem == $_POST['old-category']){
        $unserialized[$cat][$i] = $_POST['new-category'];
        $flag = 1;
      }
      $i++;
    }
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
  $_SESSION['category-modif'] = "ko";
  echo "<meta http-equiv='refresh' content='0,url=admin-categories.php'>";
  exit();
}
else if ($flag == 1)
{
  $serialized = serialize($unserialized);
  file_put_contents($file, $serialized);
  $_SESSION['flag-modif-cat'] = "ok";
  echo "<meta http-equiv='refresh' content='0,url=admin-categories.php'>";
  exit();
}
?>
