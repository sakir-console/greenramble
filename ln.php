<?php

$ln = 'bn';
$link_off = 'cursor:default;pointer-events:none';
$link_url = basename($_SERVER["REQUEST_URI"]);
if (!isset($_COOKIE['lang'])) {
    setcookie('lang', 'bn', time() + (86400 * 30));
} else {

    if ($_COOKIE['lang'] == 'bn') {

        $ln = 'bn';
    } elseif ($_COOKIE['lang'] == 'en') {
        $ln = 'en';
    }
}

?>