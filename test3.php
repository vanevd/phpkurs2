<html>
<head>
</head>


<body>
<?php
$first_name = $_REQUEST['first_name'];
$last_name = $_REQUEST['last_name'];
if (isset($_REQUEST['email'])) {
    $email = $_REQUEST['email'];
} else {
    $email = "n\a";
    $_REQUEST['email'] = $email;
    echo "Email missing!";
}    

echo $first_name . " " . $last_name . " saved successfully.<br>";
echo "email: " . $email . "<br>";
?>


</body>
</html>