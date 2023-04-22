<?php
session_status() === PHP_SESSION_ACTIVE ?: session_start();
$_SESSION['year'] = $_POST['year'];
header('Location: ' . $_SERVER['HTTP_REFERER']);