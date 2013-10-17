<link href="/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
<script src="/bootstrap/assets/js/jquery.js"></script>
<script src="/bootstrap/dist/js/bootstrap.js"></script>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">m</h4>
            </div>
            <div id="role-update-form" class="modal-body"></div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>



<?php

include('incl_db.php');

	$sql = "SELECT * FROM `content` LIMIT 0, 30 ";
	$results = mysqli_query($dbc,$sql);

	if($results)
	{
    	echo '<table border=1 class="table table-striped table-hover">';
    	echo "<a href='?new_content=1' >new content</a>";
    	while($row = mysqli_fetch_array($results)){
        	echo "<tr><td><a class='button btn btn-primary btn-xs' cont_id='".$row['pk_content_id'] ."'>update</a></td><td>".$row['content_text']." ".$row['create_date']."</td></tr>";
    }

    echo '</table>';

	} 
	
	else 
	{
    echo "Whoa the query failed!";
	}

mysqli_close($dbc);

?>
<script>
	$(".button").click(function(){
	var me = this;
	console.log($(me).data('pk_content_id'));

	$.ajax({
	url:"return_content_update_form.php?content_id=" + $(me).data('pk_content_id'),
	type: "POST",
	success:function(result){
	$("#content-update-form").html(result);
	$('#myModal').modal('toggle');
	}});
	});
</script>
