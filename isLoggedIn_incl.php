<?php
    session_start();
    if (isset($_SESSION['isloggedin']) && $_SESSION['isloggedin'] == true) {
        if ($_SESSION['timeout'] + 2 * 60 < time()){
            echo 'should have been logged out';
            session_destroy();
            header("Location: outoftime.php?redirectPage=" . urlencode($_SERVER['SERVER_ADDR'].$_SERVER['REQUEST_URI']));
        }
    } else {

        header("Location: index.php?redirectPage=");

        exit();
    }
?>