<?php

session_start();

$products = $_SESSION['products'];
?>
<html>
<head>
<title>Products</title>
</head>

<body>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Code</th>
        <th>Price</th>
        
    </tr>
<?php
foreach ($products as $key => $product) {
?>    
    <tr>
        <td><?= $key ?></td>
        <td><?= $product['name'] ?></td>
        <td><?= $product['code'] ?></td>
        <td><?= $product['price'] ?></td>
    </tr>
<?php    
}    
?>
</table>

</body>
</html>