<link href="/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
<script src="/bootstrap/assets/js/jquery.js"></script>
<script src="/bootstrap/dist/js/bootstrap.js"></script>

<?php
//registers a new user

//check form for submission
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    require('db_incl.php'); //connects to the database

	//initialize an error array
	$errors = array();
	
	//check for a first name
	if (empty($_POST['user_first_name'])){
       $errors[] = 'You forgot to enter your first name.';
	} else {
	    $fn = mysqli_real_escape_string($dbc, trim($_POST['user_first_name']));
	}

    //check for a last name
    if (empty($_POST['user_last_name'])){
        $errors[] = 'You forgot to enter your last name.';
    } else {
        $ln = mysqli_real_escape_string($dbc, trim($_POST['user_last_name']));
    }
	
	//check for a user login
	if (empty($_POST['user_login'])){
       $errors[] = 'You forgot to enter your user login.';
	} else {
	    $log = mysqli_real_escape_string($dbc, trim($_POST['user_login']));
	}

    //check for email
    if (empty($_POST['user_email'])){
        $errors[] = 'You forgot to enter your email address.';
    } else {
        $e = mysqli_real_escape_string($dbc, trim($_POST['user_email']));
    }

    //validate password
    if (!empty($_POST['pass1'])){
        if ($_POST['pass1'] != $_POST['pass2']){
            $errors[] = 'Your password did not match the confirmed password';
        } else {
            $p = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
        }
    } else {
        $errors[] = 'You forgot to enter your password';
    }

    //if no errors
    if (empty($errors)){



        //create the query
        $q = "INSERT INTO user (user_login, user_first_name, user_last_name, user_email, user_password, create_date)
        VALUES ('$log', '$fn', '$ln', '$e', SHA1('$p'), NOW())";

        $r = @mysqli_query($dbc, $q); //runs query


        if ($r){  //checks if okay

            //print if okay
            echo '<h1>Thank you!</h1>
            <p>You are now registered. Please login.</p>
            <br />';
			echo "<p><a class='button btn btn-primary btn-xs' href=\"index.htm\">Proceed to Login</a></p>";

        } else {  //if not okay

            //error message public
            echo '<h1>System Error</h1>
            <p class="error">This email has already been registered.
            Please try again.</p>';

            //error message debugging
            //echo '<p>' . mysqli_error($dbc) . '<br />Query: ' . $q . '</p>';

        } //end if

        mysqli_close($dbc); //close database connection


        exit();

    } else { //report errors

        echo '<h1>Error!</h1>
        <p class="error">The following error(s) occurred:<br />';
        foreach ($errors as $msg) {
            //prints each error
            echo " - $msg<br />\n";
        }
        echo '</p><p>Please try again.</p><p><br /></p>';

    }//end if

    mysqli_close($dbc);

} //end submit conditional
?>
