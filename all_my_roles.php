<link href="/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
<script src="/bootstrap/assets/js/jquery.js"></script>
<script src="/bootstrap/dist/js/bootstrap.js"></script>


<!-- <a href="#myModal" class="btn btn-primary" btn-lg id="button">Launch demo modal</a>-->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div id="role-update-form" class="modal-body"></div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<?php
/**
 * Created by JetBrains PhpStorm.
 * User: C207-8a
 * Date: 9/17/13
 * Time: 6:12 PM
 * To change this template use File | Settings | File Templates.
 */
include('mydb_incl.php');



$sql = "SELECT * FROM `role` LIMIT 0, 30 ";
$results = mysqli_query($dbc,$sql);


if($results){
    echo '<table border=1 class="table table-striped table-hover">';
    echo "<a href='?new_role=1' >Create New Role</a>";
    while($row = mysqli_fetch_array($results)){
        echo "<tr><td><a class='button btn btn-primary btn-xs' data-role_id='" . $row['pk_role_id'] .
            "'> Update Me </a></td><td>"
            . $row['role_name'] . " "
            . $row['role_desc'] . "</td></tr>";
    }

    echo '</table>';

} else {

    echo "Whoa the query failed!";

}

mysqli_close($dbc);

?>
<script>
    $(".button").click(function(){
        var me = this;
        console.log($(me).data('pk_role_id'));

        $.ajax({
            url:"return_role_update_form.php?pk_role_id=" + $(me).data('pk_role_id'),
            type: "POST",
            success:function(result){
                $("#role-update-form").html(result);
                $('#myModal').modal('toggle');
            }});
    });

</script>