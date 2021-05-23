<?php
$QuerySelect =$_GET['query'];

require_once("conn1.php");

if($QuerySelect==1){
    $date1 =$_GET['d1'];
    $date2 =$_GET['d2'];
    if( is_Date($date1) && is_Date($date2)){
        $sql = "CALL `p14`('$date1','$date2');";
        $result = $dbcon->query($sql);
        echo $sql;
        
        if ($result !==false && $result->num_rows > 0) {
            echo "<table border=4>";
            echo "<tr><th>ID</th><th>Name</th><th>Quantity</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["prod_name"]."</td><td>".$row["client_name"]."</td><td>".$row["price"]."</td><td>".$row["order_date"]."</td><td>".$row["payment_date"]."</td></tr>";
                }
            echo "</table>";
      } else {
        echo "0 results";
      }
    }
}
else if($QuerySelect==2){

    $days =$_GET['days'];
    if( is_numeric($days)){
        $sql = "CALL `p16`('$days');";
        $result = $dbcon->query($sql);
        echo $sql;
        
        if ($result !==false && $result->num_rows > 0) {
            echo "<table border=4>";
            echo "<tr><th>ID</th><th>Name</th><th>Quantity</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["prod_name"]."</td><td>".$row["client_name"]."</td><td>".$row["order_quantity"]."</td><td>".$row["order_date"]."</td><td>".$row["payment_date"]."</td></tr>";
                }
            echo "</table>";
      } else {
        echo "0 results";
      }
    }
}
else if($QuerySelect==3){
    $prod =$_GET['prod'];
    $sql = "CALL `p21`('".changeString($prod)."');";
    $result = $dbcon->query($sql);
        echo $sql;
        if ($result !==false && $result->num_rows > 0) {
            echo "<table border=4>";
            echo "<tr><th>ID</th><th>Quantity</th><th>Price</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["s"]."</td><td>".$row["quantity"]."</td><td>".$row["price"]."</td></tr>";
                }
            echo "</table>";
      } else {
        echo "0 results";
      }
}
else if($QuerySelect==4){
    $month =$_GET['month'];
    $year =$_GET['year'];
    if( is_numeric($month) && is_numeric($year)){
    $sql = "CALL `p22`($year,$month);";
    $result = $dbcon->query($sql);
        echo $sql;
        if ($result !==false && $result->num_rows > 0) {
            echo "<table border=4>";
            echo "<tr><th>ID</th><th>Quantity</th><th>Price</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["month"]."</td><td>".$row["quantity"]."</td><td>".$row["price"]."</td></tr>";
                }
            echo "</table>";
      } else {
        echo "0 results";
      }
    }
}
else if($QuerySelect==5){
    $date1 =$_GET['d1'];
    $date2 =$_GET['d2'];
    if( is_Date($date1) && is_Date($date2)){
        $sql = "CALL `p41`('$date1','$date2');";
        $result = $dbcon->query($sql);
        echo $sql;
        
        if ($result !==false && $result->num_rows > 0) {
            echo "<table border=4>";
            echo "<tr><th>Name</th><th>Price</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["prod_name"]."</td><td>".$row["prod_price"]."</td></tr>";
                }
            echo "</table>";
      } else {
        echo "0 results";
      }
    }
}
else if($QuerySelect==6){
    
}


function is_Date($str){ 
    $str=str_replace('/', '-', $str); 
    return is_numeric(strtotime($str));
}

function changeString($data)
{
    return  preg_replace('/[^а-яА-Я0-9 ]/ui','', $data);;
}
