<?php
include('incl_db.php');

	if((isset($_GET["pk_content_id"]) && is_numeric(htmlspecialchars($_GET["pk_role_id"]))))
	{
    	$sql = "SELECT * FROM `content` WHERE `pk_content_id` = '" . $_GET["content_id"];
    	$results = mysqli_query($dbc,$sql);
    	$row = mysqli_fetch_array($results);
?>
	<form action="update_content.php" class="form-horizontal" method="POST">
	Content:     <input type="text" value="<?php echo $row["content_id"] ?>">
			     <br>
	Create Date: <input type="text" value="<?php echo $row["create_date"] ?>"/>
             	 <br>
             
	<input type="hidden" value="<?php echo $_GET["pk_content_id"]?>"/>

	<button type="submit" >update</button>

	</form>
<?php }
