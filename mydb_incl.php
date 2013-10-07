<?php

DEFINE('DB_USER','root');
DEFINE('DB_PASSWORD','');
DEFINE('DB_HOST','localhost');
DEFINE('DB_NAME','mydb');

$dbc = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME)
    OR die ('ERROR !!!! ' . mysqli_connect_error());

$sql = "SELECT * FROM `role` LIMIT 0, 30 ";

$results = mysqli_query($dbc,$sql);
/*if($results){
    echo "It Worked!";
} else {
    echo "Whoa the query failed!";
}*/

?>