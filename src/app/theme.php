<?php

if (!empty($_COOKIE['theme'])) {
    if ($_COOKIE['theme'] == 'dark') {
        $themeClass = 'dark-theme';
        $themeImage = "src/images/sun.svg";
    } else if ($_COOKIE['theme'] == 'light') {
        $themeClass = 'light-theme';
        $themeImage = "src/images/moon.svg";
    }  
} else {
    $themeClass = '';
    $themeImage = "src/images/moon.svg";
}