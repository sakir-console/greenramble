<?php


$url = $_REQUEST['url'];
if (isset($_COOKIE['lang'])) {

    if ($_COOKIE['lang'] == 'bn') {

        setcookie('lang', 'en', time() + (86400 * 7));
        header('location:' . $url);
    } else {
        setcookie('lang', 'bn', time() + (86400 * 7));
        header('location:' . $url);
    }
   
} else {

    setcookie('lang', 'bn', time() + (86400 * 7));
    header('location:' . $url);
}