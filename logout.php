<?php

session_start();
session_unset();
session_destroy();

setcookie('id', '');
setcookie('user', '');

    header("location: login.php");
    exit;

?>