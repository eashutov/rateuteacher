<?php
require_once("database.php");

if(isset($_POST['phone'])) {
    $phone = mysqli_real_escape_string($link, $_POST['phone']);
    $sql = "UPDATE `admin` SET phone='".$phone."';";
    $result = mysqli_query($link, $sql);
    if (!$result) {
        die("Произошла ошибка при выполнении запроса");
    }
}
if(isset($_POST['email'])) {
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $sql = "UPDATE `admin` SET email='".$office."';";
    $result = mysqli_query($link, $sql);
    if (!$result) {
        die("Произошла ошибка при выполнении запроса");
    }
}
if(isset($_POST['office'])) {
    $office = mysqli_real_escape_string($link, $_POST['office']);
    $sql = "UPDATE `admin` SET office='".$office."';";
    $result = mysqli_query($link, $sql);
    if (!$result) {
        die("Произошла ошибка при выполнении запроса");
    }
}

$new_url = 'http://localhost/rateuteacher/profile.php';
header('Location: '.$new_url);