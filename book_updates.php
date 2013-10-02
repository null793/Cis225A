<link href="/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
<script src="/bootstrap/assets/js/jquery.js"></script>
<script src="/bootstrap/dist/js/bootstrap.js"></script>

<!-- Modal -->
<!--
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div id="book_update_form" class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    <!--</div><!-- /.modal-dialog -->
<!--</div><!-- /.modal -->


<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Jim
 * Date: 9/24/13
 * Time: 9:10 AM
 * To change this template use File | Settings | File Templates.
 */
include('db_incl.php');

if( (isset($_GET["user_id"]) && isset($_GET["first_name"]) && isset($_GET["last_name"])
        && is_numeric(htmlspecialchars($_GET["user_id"]))
    ) ||
    (
        isset($_GET["new_chapter"]) && isset($_GET["user_id"]) && isset($_GET["book_id"])
        && is_numeric(htmlspecialchars($_GET["new_chapter"]))
    )
)

{
    ?>

    <form action="update_book.php" method="POST">
        <div><label>Content: <br></label>
            <textarea cols="60" rows="20" input type="text" name="content_text" maxlength="21800" placeholder="Write your chapter here." value="<?php echo $_GET["content_text"]?>" required></textarea></div>
        <input type="hidden" value="<?php echo $_GET["user_id"]?>" name="user_id" />
        <input type="hidden" value="<?php echo $_GET["book_id"]?>" name="book_id"/>
        <div><input type="submit" value="Submit" class="FormButton"></div><br>
    </form>

<?php
} else {
    $sql = "SELECT * FROM `content` LIMIT 0, 30 ";
    $results = mysqli_query($dbc,$sql);



    if($results){
        echo '<table border=1 class="table table">';
        while($row = mysqli_fetch_array($results)){
            echo "<tr><td><a href='?content_id=" . $row['pk_content_id']
                . "&book_id=" . $row['fk_book_id']
                . "&content=" . $row['content_text']
                . "&user_id= 1"
                . "'></td><td>"
                . $row['content_text'] . "</td></tr>";
        }
        echo "</table>";

        echo "<a class= 'button btn btn-primary btn-xs' href='?new_chapter=1&user_id=1&book_id=2'  >Add A Chapter</a>";
    } else {
        echo "Whoa the query failed!";
    }
}
mysqli_close($dbc);

/*?>
<script>
    $(".button").click(function(){
        var me = this;
        console.log($(me).data('actor_id'));

        $.ajax({
            url:"book_update_form.php?user_id=" + $(me).data('user_id'),
            type:"POST",
            success:function(result){
                $("#actor-update-form").html(result);
                $('#myModal').modal('toggle');
            }});

    });
</script>*/
?>
