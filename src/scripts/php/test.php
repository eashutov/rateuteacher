<?php

$answers_a = [
    "a1" => $_POST['a1'],
    "a2" => $_POST['a2'],
    "a3" => $_POST['a3'],
    "a4" => $_POST['a4'],
    "a5" => $_POST['a5']
];

$answers_b = [
    "b1" => $_POST['b1'],
    "b2" => $_POST['b2'],
    "b3" => $_POST['b3'],
    "b4" => $_POST['b4'],
    "b5" => $_POST['b5'],
    "b6" => $_POST['b6'],
    "b7" => $_POST['b7'],
    "b8" => $_POST['b8']
];

$answers_c = [
    "c1" => $_POST['c1']
];

$a = array_sum($answers_a)/count($answers_a);
$b = array_sum($answers_b)/count($answers_b);
$c = array_sum($answers_c)/count($answers_c);


ob_start();
$new_url = 'http://localhost/rateuteacher/redirection.html';
header('Location: '.$new_url);
ob_end_flush();
