<?php
//this page lets the user logout

session_start(); //access existing session

//if no cookie redirect the user
if(!isset($_SESSION['agent'])){

    //need the function
    require('user_login_functions.inc.php');
    redirect_user();

} else {//cancel the session

    $SESSION = array(); //clear the variables
    session_destroy(); //destroy the session itself
    setcookie('PHPSESSID', '', time()-3600, '/', '', 0, 0); //destroy the cookie
}

//set the page title and include html
$page_title = 'Logged Out!';


//print custom message
echo "<h1>Logged Out!</h1>
<p>You are now logged out!</p>";


?>