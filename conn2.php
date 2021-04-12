<?php

$query="select count(*) from userlist where name_user='$_SESSION[name]'";
$urs=mysqli_query($dbcon,$query);
if(!$urs) exit("Помилка - ".mysqli_error($dbcon));
$rez_total=mysqli_fetch_row($urs);
$total=$rez_total[0];
if($total>0) exit("Користувач з ім'ям <b>".$_SESSION['name']."</b> вже зареэстрований");

$str='0-Te=d7Z';
$str_hach=password_hash($_SESSION['pass'],PASSWORD_DEFAULT);
$str_md5=MD5($_SESSION['pass']);
$str_md5_salt=MD5($_SESSION['pass'].$str);

$query2="insert into userlist (id_user, name_user, password_user, pass_hach, pass_md5, pass_md5_salt, email, url, tel) values (null, '$_SESSION[name]', '$_SESSION[pass]', '$str_hach', '$str_md5', '$str_md5_salt', '$_SESSION[email]', '$_SESSION[url]', '$_SESSION[tel]')";

$query3="CREATE USER ".$_SESSION['name']." IDENTIFIED BY '".$_SESSION['pass']."'";

if(mysqli_query($dbcon,$query3))
{
  echo "<P>Реєстрація пройшла успішно</P>";
} else
{
  echo "<P>Виник збій при реєстрації #1</P>";
  echo mysqli_error($dbcon);
}

if(mysqli_query($dbcon,$query2))
{
$query4="GRANT SELECT, INSERT, UPDATE ON bada2s.* TO ".$_SESSION['name'];
echo $query4;
$query4="GRANT ALL ON bada2s.* TO ".$_SESSION['name'];

if(!mysqli_query($dbcon,$query4))
{
echo "<P>Привілеї не встановлено</P>";
exit("Помилка - ".mysqli_error($dbcon));
}
echo"
<table>
<form action='end.php' method='post'>
<p><input type='submit' value='Обнулити сесійні значення'></p>
</form>
</table>";
} else
{
echo "<P>Виник збій при реєстрації #2</P>";
}

$query5 = "show GRANTS FOR '".$_SESSION['name']."'@'%'";
echo $query5;
echo "<br>";
$ver=mysqli_query($dbcon,$query5);
if(!$ver) 
{
  echo "<P> Не вдалося показати привілеї </P>";
  exit(mysqli_error($dbcon));
}

echo "<table border=2>";
while(list($id)=mysqli_fetch_row($ver))
{
  echo "<tr>
          <td> $id</td>
       </tr>";
}
echo "</table>";

if(!mysqli_close($dbcon))
{
echo "Зв'язок з хостом ".$dblocation." не розірвано";
exit("Помилка - ".mysqli_error($dbcon));
} else
{
echo "Зв'язок з хостом ".$dblocation." розірвано";
}
?>
