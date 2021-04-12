<form action="metod.php">
  Name firm:<br>
  <input type="text" name="name_f"><br>
  Address firm:<br>
  <input type="text" name=" address_f"><br>
  Tel. firm:<br>
  <input type="text" name="tel_f"><br><br>
  <input type="submit" value="Додати запис">
</form>


<?php











$tableSelect =$_GET['table'];
$operationSelect =$_GET['operation'];
 if($operationSelect=='select'){

    select($tableSelect);
 }elseif($operationSelect=='insert'){
    buildinsert($tableSelect);

 }elseif($operationSelect=='update'){
     buildupdate($tableSelect);
 }

 function buildupdate($tableSelect){
    echo '<form action="QueryMethod.php">';
    echo "Set ";
    echo 
    '<select size="1" name="setAttribute">';
    if($tableSelect=="product_catalog"){
     echo '<option  value="prod_code">product code</option>
    <option value="prod_name">product name</option>
    <option value="prod_price">product price</option>';
}
else if($tableSelect=="client_catalog"){
    echo '<option  value="client_code">client code</option>
    <option value="client_name">client name</option>';
}
else if($tableSelect=="order_catalog"){
    echo '<option  value="order_code">client code</option>
    <option value="client_code">client name</option>
    <option  value="order_date">order date</option>
    <option value="payment_date">payment name</option>
    <option value="delivery_code">delivery code</option>';

}
else if($tableSelect=="order_catalog"){
    echo '<option  value="order_code">order code</option>
    <option value="prod_code">product code</option>
    <option value="order_quantity">order quantity</option>';

}
else if($tableSelect=="delivery_catalog"){
    echo '<option  value="delivery_code">delivery code</option>
    <option value="delivery_description">delivery description</option>';

}
echo '</select>';

//первый ввод

echo ' = <input type="text" name="row1"> where ' ;

//второй выбор
echo '<select size="1" name="whereAttribute">';
if($tableSelect=="product_catalog"){
 echo '<option  value="prod_code">product code</option>
<option value="prod_name">product name</option>
<option value="prod_price">product price</option>';
}
else if($tableSelect=="client_catalog"){
echo '<option  value="client_code">client code</option>
<option value="client_name">client name</option>';
}
else if($tableSelect=="order_catalog"){
echo '<option  value="order_code">client code</option>
<option value="client_code">client name</option>
<option  value="order_date">order date</option>
<option value="payment_date">payment name</option>
<option value="delivery_code">delivery code</option>';

}
else if($tableSelect=="order_catalog"){
echo '<option  value="order_code">order code</option>
<option value="prod_code">product code</option>
<option value="order_quantity">order quantity</option>';

}
else if($tableSelect=="delivery_catalog"){
echo '<option  value="delivery_code">delivery code</option>
<option value="delivery_description">delivery description</option>';

}
echo '</select>';   
  
    
echo ' = <input type="text" name="row2">' ;
echo '<select size="1" name="operation">
    <option value="update">update</option></select>';
    echo '<select size="1" name="table">
    <option value="'.$tableSelect.'">'.$tableSelect.'</option></select>';
echo '<input type="submit" value="Додати запис">';
echo '</form>';



}
  




 



function buildinsert($tableSelect){
    echo '<form action="QueryMethod.php">';
    if($tableSelect=="product_catalog"){
      echo 'prod code:<br>
      <input type="number" name="row1"><br>
      prod name:<br>
      <input type="text" name="row2"><br>
      prod price:<br>
      <input type="text" name="row3"><br><br>  ';
    }
    else if($tableSelect=="client_catalog"){
        echo 'client code:<br>
      <input type="number" name="row1"><br>
      client name:<br>
      <input type="text" name="row2"><br>';
    }
    else if($tableSelect=="order_catalog"){
        echo 'order code:<br>
      <input type="number" name="row1"><br>
      client code:<br>
      <input type="number" name="row2"><br>
      order date:<br>
      <input type="date" name="row3"><br>
      payment date:<br>
      <input type="date" name="row4"><br>
      delivery type:<br>
      <input type="number" name="row5"><br>';

    }
    else if($tableSelect=="order_contents"){
        echo 'order code:<br>
      <input type="number" name="row1"><br>
      prod code:<br>
      <input type="number" name="row2"><br>
      order quantity:<br>
      <input type="number" name="row3"><br>';

    }
    else if($tableSelect=="delivery_catalog"){
        echo 'delivery code:<br>
      <input type="number" name="row1"><br>
      delivery description:<br>
      <input type="text" name="row2"><br>';
    }
    echo '<select size="1" name="operation">
    <option value="insert">insert</option></select>';
    echo '<select size="1" name="table">
    <option value="'.$tableSelect.'">'.$tableSelect.'</option></select>';

    echo '<input type="submit" value="Додати запис">';
    echo'</form>';


}
function select($tableSelect){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bada2s";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    


$sql = "SELECT * FROM ".$tableSelect;
$result = $conn->query($sql);

if ($result !==false && $result->num_rows > 0) {
  
  // output data of each row
  echo "<table border=4>";

  if($tableSelect=="product_catalog"){
  echo "<tr><th>ID</th><th>Name</th><th>Quantity</th></tr>";
    while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["prod_code"]."</td><td>".$row["prod_name"]."</td><td>".$row["prod_price"]."</td></tr>";
  }
  
}
else if($tableSelect=="client_catalog"){
    echo "<tr><th>ID</th><th>Name</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["client_code"]."</td><td>".$row["client_name"]."</td></tr>";
  }
}
else if($tableSelect=="order_contents"){
    echo "<tr><th>ID</th><th>prod code</th><th>Quantity</th></tr>";
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>".$row["order_code"]."</td><td>".$row["prod_code"]."</td><td>".$row["order_quantity"]."</td></tr>";
    }
}
else if($tableSelect=="order_catalog"){
    echo "<tr><th>ID</th><th>client</th><th>order</th><th>payment</th><th>Quantity</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["order_code"]."</td><td>".$row["client_code"]."</td><td>".$row["order_date"]."</td><td>".$row["payment_date"]."</td><td>".$row["delivery_code"]."</td></tr>";
  }
}
else if($tableSelect=="delivery_catalog"){
    echo "<tr><th>ID</th><th>description</th></tr>";
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>".$row["delivery_code"]."</td><td>".$row["delivery_description"]."</td></tr>";
    }
    
}




  echo "</table>";
} else {
  echo "0 results";
}

$conn->close();








}




?>