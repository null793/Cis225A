<link href="/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
<script src="/bootstrap/assets/js/jquery.js"></script>
<script src="/bootstrap/dist/js/bootstrap.js"></script>

<?php 
//user is redirected here from login

session_start(); // start the session

//check session & http user agent
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


//set page title and include header
$page_title = 'Logged In!';

//print customized message
echo "<h1>Logged In!</h1>
<p>You are now logged in, {$_SESSION['user_first_name']}!</p>
<p><a class='button btn btn-primary btn-xs'href=\"all_my_users.php\">Show User Account</a></p>
<p><a class='button btn btn-primary btn-xs'href=\"logout.php\">Logout</a></p>";


?>
