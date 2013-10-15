<link href="/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
<script src="/bootstrap/assets/js/jquery.js"></script>
<script src="/bootstrap/dist/js/bootstrap.js"></script>

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


if ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ){
        $id = $_POST['id'];

    } else {
        echo '<p class="error">This page has been accessed in error.</p>';
        exit();
    }

require_once('db_incl.php'); //connect to the database

//check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errors = array();

    //check for first name
    if (empty($_POST['fname'])){
        $errors[] = 'You forgot to enter your first name.';
    } else {
        $fn = mysqli_real_escape_string($dbc, trim($_POST['fname']));
    }
    //check for last name
    if (empty($_POST['lname'])){
        $errors[] = 'You forgot to enter your last name.';
    } else {
        $ln = mysqli_real_escape_string($dbc, trim($_POST['lname']));
    }

    //check for an login
    if (empty($_POST['login'])){
        $errors[] = 'You forgot to enter your login information.';
    } else {
        $log = mysqli_real_escape_string($dbc, trim($_POST['login']));
    }

    //check for an email address
    if (empty($_POST['email'])){
        $errors[] = 'You forgot to enter your email address.';
    } else {
        $e = mysqli_real_escape_string($dbc, trim($_POST['email']));
    }
	
    //validate password
    if (!empty($_POST['pass1'])){
        if ($_POST['pass1'] != $_POST['pass2']){
            $errors[] = 'Your password did not match the confirmed password';
        } else {
            $p = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
			$ep = crypt('$p', '$e');
        }
    } else {
        $errors[] = 'You forgot to enter your password';
    }

    if (empty($errors)){  //if everything okay

        //test for unique email address
        $q = "SELECT pk_user_id FROM user WHERE user_email='$e' AND pk_user_id != $id";
        $r = @mysqli_query($dbc, $q);

        if (mysqli_num_rows($r) == 0){
            //make the query
            $q = "UPDATE user
				  SET user_first_name='$fn', user_last_name='$ln', user_login='$log', user_email='$e', user_password='$ep'
                  WHERE pk_user_id=$id LIMIT 1";
            $r = @mysqli_query($dbc, $q);

            //print a message
            if (mysqli_affected_rows($dbc) == 1){
                echo "<table border=1 class='table table-striped table-hover'>
                    <tr><td></td><td><b>Query Result</b></td></tr>
                    <tr>
                        <td><a class='button btn btn-primary btn-xs' href='all_my_users.php'>Back</a></td>
                        <td>Your account information has been updated.</td>
                </tr>
                </table>";
                #echo '<p>The user has been edited.</p><br/>';
                #echo "<a class='button btn btn-primary btn-xs' href='all_my_users.php'>Back</a>";
            } else { //no changes
                echo "<table border=1 class='table table-striped table-hover'>
                    <tr><td></td><td><b>Query Result</b></td></tr>
                    <tr>
                        <td><a class='button btn btn-primary btn-xs' href='all_my_users.php'>Back</a></td>
                        <td>No changes were submitted to the database.</td>
                    </tr>
                </table>";
                #echo '<p class="error">No changes were made to the database.</p><br/>';
                #echo "<a class='button btn btn-primary btn-xs' href='all_my_users.php'>Back</a>";
                #echo'<p>' . mysqli_error($dbc) . '<br />Query: ' . $q . '</p>';
            }
        } else { //already registered

            echo '<p class="error">The email address has already been registered.</p>';
        }
    } else {  //report the errors

        echo '<p class="error">The following error(s) occurred:<br />';
        foreach ($errors as $msg){
            echo " - $msg<br />\n";
        }
        echo '<p>Please try again.</p>';
        echo "<a class='button btn btn-primary btn-xs' href='all_my_users.php'>Back</a>";
    }
} //end submit conditional


mysqli_close($dbc);

?>