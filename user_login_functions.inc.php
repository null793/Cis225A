<?php
//this page defines two functions used by login and logout

//this function determines absolute url and redirects user to index.php
function redirect_user($page = 'index.php'){

    //starts defining url
    $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);

    //remove trailing slashes
    $url = rtrim($url, '/\\');

    //add the page
    $url .= '/' . $page;

    //redirect the user
    header("Location: $url");
    exit(); //quit the script
}//end redirect function

//this function validates the login information
function check_login($dbc, $email = '', $pass = ''){

    $errors = array(); //initialize error array

    //validate email
    if(empty($email)){
        $errors[] = 'You forgot to enter your email address.';
    } else {
        $e = mysqli_real_escape_string($dbc, trim($email));
    }

    //validate password
    if(empty($pass)){
        $errors[] = 'You forgot to enter your password.';
    } else {
        $p = mysqli_real_escape_string($dbc, trim($pass));
    }

    if(empty($errors)){ //if no errors
	
		$ep = crypt('$p', '$e'); //encrypt password

        //retrieve the username and password
        $q = "SELECT pk_user_id, user_first_name FROM user
              WHERE user_email='$e' AND user_password='$ep'";


        //retrieve the username and password old
        //$q = "SELECT pk_user_id, user_first_name FROM user
         //     WHERE user_email='$e' AND user_password=SHA1('$p')";

        $r = @mysqli_query($dbc, $q); //run the query

        if(mysqli_num_rows($r) == 1){ //if match found

            $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
            return array(true, $row);

        } else { //if no match

            $errors[] = 'The email address and password entered do not match those on file.';
        }
    } //end if no errors

    //return false and errors
    return array(false, $errors);
    
} //end check login function