<link href="/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
<script src="/bootstrap/assets/js/jquery.js"></script>
<script src="/bootstrap/dist/js/bootstrap.js"></script>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update User</h4>
            </div>
            <div id="user-update-form" class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<?php
session_start();
/*if(!isset($_SESSION['agent']) or
         ($_SESSION['agent'] !=
         md5($_SERVER['HTTP_USER_AGENT']))){

    //redirect to index
    require('user_login_functions.inc.php');
    redirect_user();
	
}*/

if(isset($_SESSION['isloggedin']) && $_SESSION['isloggedin'] == true) {

	
	if($_SESSION['timeout'] + 2 * 60 < time()){ // if session timed out
      
	  echo '<h1>Error</h1>';
	  echo '<p>Your session has timed out. Please login again.</p>';
	  echo "<a class='button btn btn-primary btn-xs' href=\"index.php\">Login</a><br/>";
	  session_destroy();
	  exit();
	  
	  //header("Location: outoftime.php?redirectPage=" . urlencode($_SERVER['SERVER_ADDR'] . $_SERVER['SERVER_URI']));

	} else { //if session not timed out, reset session time
	
		$_SESSION['timeout'] = time();
		//echo print_r ($_SESSION);
	}
	
} else { //if not logged in, redirect using function

    require('user_login_functions.inc.php');
    redirect_user();     //redirects to index
}

require('db_incl.php'); //connect to the database

$query = "SELECT * FROM user where pk_user_id = {$_SESSION['pk_user_id']} LIMIT 0, 30"; //query parameters

$results = mysqli_query($dbc, $query); //run query

if($results){ //if query successful

    echo '<table border=1 class="table table-striped table-hover">';
	
    //echo "<a class='button btn btn-primary btn-xs' href='?new_user=1' >Create New User</a>";
    echo '<tr><td></td><td><b>First Name</b></td><td><b>Last Name</b></td> .
          <td><b>Login</b></td><td><b>Email</b></td> .
		  <td><b>Create Date</b></td> .
          <td><b>Update Date</b></td><td><b>Update By</b></td></tr>';

    while($row = mysqli_fetch_array($results)){

        echo "<tr><td><a class='button btn btn-primary btn-xs' data-pk_user_id='" .
            $row['pk_user_id'] . "' > Update Me </a></td><td>" .
            $row['user_first_name'] . "</td><td>" .
            $row['user_last_name'] . "</td><td>" .
            $row['user_login'] . "</td><td>" .
            $row['user_email'] . "</td><td>" .
            $row['create_date'] . "</td><td>" .
            $row['update_date'] . "</td><td>" .
            $row['update_by'] . "</td></tr>";

    }
    echo '</table>';
	echo "<p><a class='button btn btn-primary btn-xs' href=\"loggedin.php\">Main Page</a></p>
	      <p><a class='button btn btn-primary btn-xs' href=\"logout.php\">Logout</a></p>";

} else { //if query not successful

    echo "Query failure";

}

mysqli_close($dbc);
?>

<script>
$(".button").click(function(){
    var me = this;
    console.log($(me).data('pk_user_id'));

    $.ajax({
                url :"return_user_update_form.php?pk_user_id=" + $(me).data('pk_user_id'),
                type: "POST",

            success:function(result){
        $("#user-update-form").html(result);
        $('#myModal').modal('toggle');
    }});
    });
</script>