<?php
session_start();

if(isset($_POST['username']))
{
$_SESSION['username']=$_POST['username'];
$_SESSION['password']=$_POST['password'];
}

require_once("conn.php");

if(empty($_GET['id_user']))
{
  echo "<br>";

  $query="select * from bada2s.userlist order by name_user";
  $usr=mysqli_query($dbcon,$query);
  if(!$usr) exit ("Помилка1 - ".mysqli_error($dbcon));
  while($user=mysqli_fetch_array($usr,MYSQLI_BOTH))
  {
    echo "<a href=$_SERVER[PHP_SELF]?id_user=$user[id_user]> $user[name_user]</a><br>";
  }
  echo "<a href= 'login.php'>На початок</a><br>";
}
else{

  echo "<br>";

  $query="select * from bada2s.userlist where id_user= ".$_GET['id_user'];
  echo $query."<br>";
  $usr=mysqli_query($dbcon,$query);
  if(!$usr) exit ("Помилка2 - ".mysqli_error($dbcon));
  $user=mysqli_fetch_array($usr,MYSQLI_BOTH);

  echo "Ім'я користувача - ".$user['name_user']."<br>";
  if(!empty($user['email'])) echo "e-mail - ".$user['email']."<br>";
  if(!empty($user['url'])) echo "url - ".$user['url']."<br>";
  echo "<br>";
  echo "<br>";

  echo "<a href= 'userconnect.php'>Повернутися</a><br>";
  echo "<a href= 'login.php'>На початок</a><br>";
}
?>
