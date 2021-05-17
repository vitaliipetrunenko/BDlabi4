<html>
<body>



    
    <?php
    require_once("conn1.php");




$sql = "SELECT * FROM product_catalog";
$result = $dbcon->query($sql);

if ($result !==false && $result->num_rows > 0) {
  
  // output data of each row
  
  echo '<form action="lab4res.php">
    <select size="1" name="prod">';
  echo  "<option disabled>Выберите продукт:</option>";

  while($row = $result->fetch_assoc()) {
    echo '<option selected value='.$row["prod_code"].'>'.$row["prod_name"].'</option>';
  }
  
  echo "</table>";
} else {
  echo "0 results";
}



    
    
    
   
   echo '</select>';

    
   

   


 echo " <input type='submit'></input></form>"








?>

<form action="lab4res.php">
    <textarea name="prod"></textarea>
    <input type='submit'></input></form>

    запит текстом
    <form action="lab4res2.php">
    <textarea name="prod"></textarea>
    <input type='submit'></input></form>

</body></html>



</body></html>