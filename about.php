<?php
require_once 'core/init.php';

$token = hash("sha256", time());
$_SESSION['token'] = $token;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="/admin/process/add_message.php">
<input type="text" name="message" >
    <input type="btnAddMsg" value="insert">
    <input type="hidden">
</form>
</body>
</html>
<?php
