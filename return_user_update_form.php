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

	
	if($_SESSION['timeout'] + 1 * 60 < time()){ // if session timed out
      
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

if((isset($_GET["pk_user_id"]) && is_numeric(htmlspecialchars($_GET["pk_user_id"])))){

    $sql = "SELECT pk_user_id, user_first_name, user_last_name, user_login, user_email, user_password
	FROM `user` WHERE `pk_user_id` = '" . $_GET["pk_user_id"] . "' LIMIT 0, 30 ";

    $results = mysqli_query($dbc,$sql);

    $row = mysqli_fetch_array($results);

    ?>
    <form action="update_user.php" class="form-horizontal" method="POST">
		<table>
        <tr><td>First Name</td><td><input type="text" name="fname" value="<?php echo $row["user_first_name"] ?>" ></td></tr>
        <tr><td>Last Name</td><td><input type="text" name="lname" value="<?php echo $row["user_last_name"] ?>"/></td></tr>
        <tr><td>Login</td><td><input type="text" name="login" value="<?php echo $row["user_login"] ?>"/></td></tr>
        <tr><td>Email</td><td><input type="text" name="email" value="<?php echo $row["user_email"] ?>"/></td></tr>
		</table>
        <input type="hidden" name="id" value="<?php echo $row["pk_user_id"] ?>"/>

        <br/><button type="submit" >Update!</button>

    </form>
<?php
}
?>