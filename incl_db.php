<?php

DEFINE('DB_USER','user');
DEFINE('DB_PASSWORD','p');
DEFINE('DB_HOST','localhost');
DEFINE('DB_NAME','mydb');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
    OR die ('ERROR !!!!'.mysqli_connect_error());


?>
