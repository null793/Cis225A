<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Jim
 * Date: 9/30/13
 * Time: 6:31 PM
 * To change this template use File | Settings | File Templates.
 */
include('db_incl.php');

    ?>
    <form action="update_book.php" method="POST">
        <div><label>Content: <br></label>
            <textarea cols="60" rows="20" input type="text" name="content_text" maxlength="21800" placeholder="Write your chapter here." value="<?php echo $_GET["content_text"]?>" required></textarea></div>
        <input type="hidden" value="<?php echo $_GET["user_id"]?>" name="user_id"/>
        <input type="hidden" value="<?php echo $_GET["book_id"]?>" name="book_id"/>
        <button type="submit" >Update</button>
    </form>
<?php

?>