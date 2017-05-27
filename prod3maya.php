<html>
<head>
</head>


<body>
<?php
$product_id = $_REQUEST['product_id'];
$name = $_REQUEST['name'];
if (isset($_REQUEST['code'])) {
    $code = $_REQUEST['code'];
} else {
    $code = "n\a";
    $_REQUEST['code'] = $code;
    echo "Code missing!";
}    

echo $product_id . " " . $name . " saved successfully.<br>";
echo "code: " . $code . "<br>";
?>


</body>
</html>