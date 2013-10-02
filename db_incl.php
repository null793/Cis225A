<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Jim
 * Date: 9/17/13
 * Time: 6:00 PM
 * To change this template use File | Settings | File Templates.
 */
DEFINE('DB_USER','dbuser');
DEFINE('DB_PASSWORD','legacy');  // We only need one password
DEFINE('DB_HOST','localhost');
DEFINE('DB_NAME','mydb');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
    OR die ('ERROR !!!!'.mysqli_connect_error());


?>