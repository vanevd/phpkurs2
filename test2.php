<html>
<head>
</head>
<body>
<?php

session_start();

$clients = $_SESSION['clients'];

$error = "";
$first_name = "";
$last_name = "";
$email = "";
$phone = "";
$client_id = "";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_REQUEST['client_id'])) {
        $client_id = $_REQUEST['client_id'];
        if (isset($clients[$client_id])) {
            $first_name = $clients[$client_id]['first_name'];
            $last_name = $clients[$client_id]['last_name'];
            $email = $clients[$client_id]['email'];
            $phone = $clients[$client_id]['phone'];
        } else {
            $error = "Client not exists. Please enter new client data.";
        }    
    }    
    ?>    
        <h3><?= $error ?></h3>
        <form method="POST" action="test2.php">
        <input type="hidden" name="client_id" value="<?= $client_id ?>">
        First Name<br>
        <input type="text" name="first_name" value="<?= $first_name ?>">
        <br><br>
        Last Name<br>
        <input type="text" name="last_name" value="<?= $last_name ?>">
        <br><br>
        Email<br>
        <input type="text" name="email" value="<?= $email ?>">
        <br><br>
        Phone<br>
        <input type="text" name="phone" value="<?= $phone ?>">
        <br><br>
        <input type="submit" name="send_btn" value="Send">
        </form>
<?php        
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_REQUEST['first_name'];
    $last_name = $_REQUEST['last_name'];
    if (isset($_REQUEST['email'])) {
        $email = $_REQUEST['email'];
    } else {
        $email = "";
    }
    if (strlen($email) == 0) {    
        $email = "n\a";
        echo "Email missing!";
    }    
    $client_id = $_REQUEST['client_id'];
    if (strlen($client_id) > 0) {
        $clients[$client_id]['first_name'] = $_REQUEST['first_name'];
        $clients[$client_id]['last_name'] = $_REQUEST['last_name'];
        $clients[$client_id]['email'] = $_REQUEST['email'];
        $clients[$client_id]['phone'] = $_REQUEST['phone'];
    } else {    
        $client = [];
        $client['first_name'] = $_REQUEST['first_name'];
        $client['last_name'] = $_REQUEST['last_name'];
        $client['email'] = $_REQUEST['email'];
        $client['phone'] = $_REQUEST['phone'];
        $clients[] = $client;
    }    
    echo $first_name . " " . $last_name . " saved successfully.<br>";
    echo "email: " . $email . "<br>";
} else {


}
$_SESSION['clients'] = $clients;
?>
</body>
</html>