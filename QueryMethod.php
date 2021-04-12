<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bada2s";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}




$tableSelect =$_GET['table'];
$operationSelect =$_GET['operation'];

$row1 =$_GET['row1'];
$row2 =$_GET['row2'];
$values;
if($operationSelect=="insert"){
if($tableSelect=='delivery_catalog' or $tableSelect=='client_catalog'){
    $values = "'".$row1 ."','". $row2."'";
}
elseif($tableSelect=='product_catalog' or $tableSelect=='order_contents'){
    $row3 =$_GET['row3'];
    $values = "'".$row1 ."','". $row2 ."','". $row3."'";
}
else{
    $row3 =$_GET['row3'];
    $row4 =$_GET['row4'];
    $row5 =$_GET['row5']; 
    $values = "'".$row1 ."','". $row2 ."','". $row3 ."','". $row4 ."','". $row5."'";
}









$sql = "INSERT INTO ".$tableSelect." VALUES(".$values.");";
//echo $sql;
}
else if($operationSelect=="update"){
    $set = $_GET['setAttribute'];
    $where = $_GET['whereAttribute'];
    $values = "'".$row1 ."','". $row2."'";
    if ($row2 == ""){
    $sql = "UPDATE ".$tableSelect." SET ".$set." = ".$row1.";";
    }
    else{
        $sql = "UPDATE ".$tableSelect." SET ".$set." = '".$row1."' WHERE ".$where." = '".$row2."';";  
    }
   
    

}

echo $sql;
if($conn->query($sql)===TRUE){
    echo '<br>';
    echo '<br>';
    echo 'Successfully updated table';
    echo '<br>';
    echo "<br>Affected rows: ".$conn->affected_rows;
}else{
    echo '<br>';
    echo '<br>';
    echo "operation unsuccessful";
    echo '<br>';
    echo '<br>';
    echo $conn->error;  
}
$conn->close();


?>