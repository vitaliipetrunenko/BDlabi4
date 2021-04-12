<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  

<form action='method.php'>
<select size="1" name="table">
    <option disabled>Выберите таблицу</option>
    <option selected value="product_catalog">product_catalog</option>
    <option value="client_catalog">client_catalog</option>
    <option value="order_catalog">order_catalog</option>
    <option value="order_contents">order_contents</option>
    <option value="delivery_catalog">delivery_catalog</option>
   </select>

   <select size="1" name="operation">
    <option disabled>Выберите действие</option>
    <option selected value="select">select</option>
    <option value="insert">insert</option>
    <option value="update">update</option>
    

   
   </select>

   <input type='submit'></input>
</form>
<?php





?>







</body>
</html>