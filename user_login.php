<?php 
//this page processes login & redirects

//check if form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    //for processing login
    require('user_login_functions.inc.php');

    //need database connection
    require('db_incl.php');

    //check login
    list($check, $data) = check_login($dbc, $_POST['email'], $_POST['pass']);

    if ($check){

        //set session data
        session_start();
        $_SESSION['pk_user_id'] = $data['pk_user_id'];
        $_SESSION['user_first_name'] = $data['user_first_name'];

        //store the http user agent
        $_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);
		
		//store the timeout
		$_SESSION['timeout'] = time();
		$_SESSION['isloggedin'] = true;

        //redirect
        redirect_user('loggedin.php');
    } else {

        //assign $data to $errors for reporting
        $errors = $data;
    }

    mysqli_close($dbc);
} else {

	echo '<h1>Error!</h1>
	      <p>You have reached this page in error. Please try again.</p>';
}
?>
