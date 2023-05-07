<?php
session_status() === PHP_SESSION_ACTIVE ?: session_start();
require_once('database.php');

$login = mysqli_real_escape_string($link, $_POST['login']);
$password = md5(mysqli_real_escape_string($link, trim($_POST['password'])));
$sql = "SELECT id_admin, role, pass FROM `admin` WHERE login='$login';";
$result = mysqli_query($link, $sql);

if(!$result) {
    die("Произошла ошибка при выполнении запроса");
}
if(mysqli_num_rows($result) == 0) {
    $_SESSION['wrong_info'] = 'Неверный логин или пароль';
    $new_url = 'http://localhost/rateuteacher/profile.php';
    header('Location: '.$new_url);
    exit();
}

$user = mysqli_fetch_all($result, MYSQLI_ASSOC);

if($password != $user['0']['pass']) {
    $_SESSION['wrong_info'] = 'Неверный логин или пароль';
    $new_url = 'http://localhost/rateuteacher/profile.php';
    header('Location: '.$new_url);
    exit();
}

$_SESSION['id_admin'] = [ 
    "id" => $user['0']['id_admin'],
    "role" => $user['0']['role']
];
$new_url = 'http://localhost/rateuteacher/profile.php';
header('Location: '.$new_url);