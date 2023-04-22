<?php

$link = mysqli_connect('localhost','root','','rut_database');
if(!$link) {
    echo "did not connected: ".mysqli_connect_error();
    exit();
}