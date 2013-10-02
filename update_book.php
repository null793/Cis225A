<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Jim
 * Date: 9/24/13
 * Time: 11:09 AM
 * To change this template use File | Settings | File Templates.
 */
include('db_incl.php');

$sql="INSERT INTO `content` (content_text, fk_user_id, fk_book_id)
 VALUES ('$_POST[content_text]','$_POST[user_id]','$_POST[book_id]')";
if (!mysqli_query($dbc,$sql))
{
    die('Error: ' . mysqli_error($dbc));
}
echo "Chapter Added";
?>