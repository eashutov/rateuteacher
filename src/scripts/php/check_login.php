<?php
require_once("database.php");

if(isset($_POST['query']))
{	
	$data = array();
    $login = mysqli_real_escape_string($link, $_POST['query']);
    $sql = "SELECT login FROM `admin` WHERE login='$login';";
    $result = mysqli_query($link, $sql);
    if (!$result) {
        die("Произошла ошибка при выполнении запроса");
    }
    echo mysqli_num_rows($result);
}