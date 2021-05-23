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
    echo '<option selected value='.$row["prod_code"].'>'.$row["prod_name"]." код: ".$row["prod_code"].'</option>';
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
    запит 1
    <form action="lab4_queries.php">
    <select size="1" name="query">
    <option selected value='1'></option>
    </select>
    <input type="date" name="d1"></input>
    <input type="date" name="d2"></input>
    <input type='submit'></input></form>
    запит 2
    <form action="lab4_queries.php">
    <select size="1" name="query">
    <option selected value='2'></option>
    </select>
    <input type="number" name="days"></input>
    <input type='submit'></input></form>
    запит 3
    <form action="lab4_queries.php">
    <select size="1" name="query">
    <option selected value='3'></option>
    </select>
    <textarea name="prod"></textarea>
    <input type='submit'></input></form>
    запит 4
    <form action="lab4_queries.php">
    <select size="1" name="query">
    <option selected value='4'></option>
    </select>
    Month
    <input type="number" name="month"></input>
    Year
    <input type="number" name="year"></input>
    <input type='submit'></input></form>
    запит 5
    <form action="lab4_queries.php">
    <select size="1" name="query">
    <option selected value='5'></option>
    </select>
    <input type="date" name="d1"></input>
    <input type="date" name="d2"></input>
    <input type='submit'></input></form>

</body></html>



</body></html>