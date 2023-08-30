<?php
session_start();
require 'connect.php';

if (isset($_POST['submit'])) {
    $image = $_FILES['image'];
    $image_name = $image['name'];
    $tmp_name = $image['tmp_name'];

    $exe = pathinfo($image_name);
    $extension = $exe['extension'];

    $new_name = uniqid() . "." . $extension;

    $storage = 'image/' . $new_name;

    $allowed = array("jpg", "png", "jpeg", "svg", "gif", "fift");

    if (in_array($extension, $allowed)) {
        move_uploaded_file($tmp_name, $storage);
    }else {
        echo "الامتداد غير صحيح";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form method="post" enctype="multipart/form-data">
        <input type="file" name="image">
        <button type="submit" name="submit">Send</button>
    </form>

</body>

</html>