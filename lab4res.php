<?php



require_once("conn1.php");

$prodSelect =$_GET['prod'];

if(is_numeric($prodSelect)){
    $sql = "CALL `procProdByID`($prodSelect);";
    $result = $dbcon->query($sql);
    
if ($result !==false && $result->num_rows > 0) {
  



    echo "<table border=4>";
  echo "<tr><th>ID</th><th>Name</th><th>Quantity</th></tr>";
  

  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["prod_code"]."</td><td>".$row["prod_name"]."</td><td>".$row["prod_price"]."</td></tr>";
  }
  
  echo "</table>";
   
    
    
  } else {
    echo "0 results";
  }


}else{
    echo "ніяких ін'єкцій сьогодні";
}

?>