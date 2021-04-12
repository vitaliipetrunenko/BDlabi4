<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
   <h1>запросики</h1> 
<a href="options.php">options</a>
<a href="login.php">login</a>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bada2s";

$picbeetween = "<a href='options.php'><img src='img.jpg' ></img></a>";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM client_catalog";
$result = $conn->query($sql);

if ($result !==false && $result->num_rows > 0) {
  
  // output data of each row
  echo "<table border=4>";
  echo "<tr><th>ID</th><th>Name</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["client_code"]."</td><td>".$row["client_name"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}

echo $picbeetween;


$sql = "SELECT * FROM product_catalog";
$result = $conn->query($sql);

if ($result !==false && $result->num_rows > 0) {
  
  // output data of each row
  echo "<table border=4>";
  echo "<tr><th>ID</th><th>Name</th><th>Quantity</th></tr>";
  

  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["prod_code"]."</td><td>".$row["prod_name"]."</td><td>".$row["prod_price"]."</td></tr>";
  }
  
  echo "</table>";
} else {
  echo "0 results";
}

echo $picbeetween;

$sql = "SELECT * FROM order_catalog";
$result = $conn->query($sql);

if ($result !==false && $result->num_rows > 0) {
  
  // output data of each row
  echo "<table border=4>";
  echo "<tr><th>ID</th><th>client</th><th>order</th><th>payment</th><th>Quantity</th></tr>";
  

  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["order_code"]."</td><td>".$row["client_code"]."</td><td>".$row["order_date"]."</td><td>".$row["payment_date"]."</td><td>".$row["delivery_code"]."</td></tr>";
  }
  
  echo "</table>";
} else {
  echo "0 results";
}
echo $picbeetween;

$sql = "SELECT * FROM order_contents";
$result = $conn->query($sql);

if ($result !==false && $result->num_rows > 0) {
  
  // output data of each row
  echo "<table border=4>";
  echo "<tr><th>ID</th><th>prod code</th><th>Quantity</th></tr>";
  

  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["order_code"]."</td><td>".$row["prod_code"]."</td><td>".$row["order_quantity"]."</td></tr>";
  }
  
  echo "</table>";
} else {
  echo "0 results";
}
echo $picbeetween;

$sql = "SELECT * FROM delivery_catalog";
$result = $conn->query($sql);

if ($result !==false && $result->num_rows > 0) {
  
  // output data of each row
  echo "<table border=4>";
  echo "<tr><th>ID</th><th>description</th></tr>";
  

  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["delivery_code"]."</td><td>".$row["delivery_description"]."</td></tr>";
  }
  
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();


?>
</body>
</html>