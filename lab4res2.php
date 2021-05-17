<?php



require_once("conn1.php");

$prodSelect =$_GET['prod'];


    $sql = "CALL `procProdByName`('".changeData($prodSelect)."');";
    echo $sql;
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







function changeData($data)
{
    return  preg_replace('/[^а-яА-Я0-9 ]/ui','', $data);;
}

?>