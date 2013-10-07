<?php

include('mydb_incl.php');

mysql_query("INSERT INTO role(role_name, role_desc)
        VALUES(Administrator', 'Has full control of all books written and an override and delete content if necessary')");
Print "Your table has been populated";
?>