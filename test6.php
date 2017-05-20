<?php

session_start();

$clients = $_SESSION['clients'];
?>
<html>
<head>
<title>Clients</title>
</head>

<body>
<table border="1">
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>
<?php
foreach ($clients as $key => $client) {
?>    
    <tr>
        <td><?= $key ?></td>
        <td><?= $client['first_name'] ?></td>
        <td><?= $client['last_name'] ?></td>
        <td><?= $client['email'] ?></td>
        <td><?= $client['phone'] ?></td>
    </tr>
<?php    
}    
?>
</table>

</body>
</html>