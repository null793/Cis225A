<?php
include('mydb_incl.php');
/**
 * Created by JetBrains PhpStorm.
 * User: Jim
 * Date: 9/24/13
 * Time: 6:31 PM
 * To change this template use File | Settings | File Templates.
 */

if(  (   isset($_GET["pk_role_id"])

    && is_numeric(htmlspecialchars($_GET["pk_role_id"]))
) ){
    $sql = "SELECT * FROM `role` WHERE `pk_role_id` = '" . $_GET["role_id"] . "' LIMIT 0, 30 ";
    $results = mysqli_query($dbc,$sql);
    $row = mysqli_fetch_array($results);

    ?>
    <form action="update_role.php" class="form-horizontal" method="POST">
        Role Name <input type="text" value="<?php echo $row["role_name"] ?>" ><br>
        Role Description  <input type="text" value="<?php echo $row["role_desc"] ?>"/><br>
        <input type="hidden" value="<?php echo $_GET["pk_role_id"] ?>"/>
        <button type="submit" >Update!</button>
    </form>
    <?php
}