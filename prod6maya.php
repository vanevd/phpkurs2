<?php

session_start();

$products = $_SESSION['products'];
?>
<html>
<head>
<title>Products</title>
</head>

<body>
<table border="2">
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
        <td><?= $product['id'] ?></td>
        <td><?= $product['name'] ?></td>
        <td><?= $product['code'] ?></td>
        <td><?= $products['price'] ?></td>
    </tr>
<?php    
}    
?>
</table>

</body>
</html>