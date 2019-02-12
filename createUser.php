<?php
// Created by Professor Wergeles for CS2830 at the University of Missouri

	// Here we are using sessions to propagate the login
	// http://us3.php.net/manual/en/intro.session.php

    // HTTPS redirect
//     if ($_SERVER['HTTPS'] !== 'on') {
// 		$redirectURL = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
// 		header("Location: $redirectURL");
// 		exit;
// 	}
	
	// http://us3.php.net/manual/en/function.session-start.php
	if(!session_start()) {
		// If the session couldn't start, present an error
		header("Location: error.php");
		exit;
	}
	
	
	// Check to see if the user has already logged in
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	
	if ($loggedIn) {
		header("Location: page1.php");
		exit;
	}
	
	
	$action = empty($_POST['action']) ? '' : $_POST['action'];
	
	if ($action == 'do_create') {
		create_user();
	} 
    else {
		login_form();
	}
	
	function create_user() {
		$firstName = empty($_POST['firstName']) ? '' : $_POST['firstName'];
        $lastName = empty($_POST['lastName']) ? '' : $_POST['lastName'];
		$username = empty($_POST['username']) ? '' : $_POST['username'];
		$password = empty($_POST['password']) ? '' : $_POST['password'];
        $confirmPass = empty($_POST['confirmPass']) ? '' : $_POST['confirmPass'];
        $birthday = empty($_POST['birthday']) ? '' : $_POST['birthday'];
        $email = empty($_POST['email']) ? '' : $_POST['email'];
        //check whether get the data 
        
//		echo $firstName;
//		echo $lastName;
//		echo $username;
//		echo $password;
//		echo $confirmPass;
//		echo $birthday;
//		echo $email;
//        
//        exit;
	
        
        if(strcmp($password, $confirmPass)==0){
           // Require the credentials
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '1234'; 
            $dbname = 'cs2830';


            // Connect to the database
            $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

            // Check for errors
            if ($mysqli->connect_error) {
                $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
                require "createUser_form.php";
                exit;
            }

            // http://php.net/manual/en/mysqli.real-escape-string.php
//            $username = $mysqli->real_escape_string($username);
//            $password = $mysqli->real_escape_string($password);
////sha1 password 
//            $password = sha1($password);
            
            // Build query
//            $query = "SELECT id FROM users WHERE userName = '$username' AND password = '$password'";
            $query = "insert into users (firstName, lastName, username, userPassword, email) values('$firstName','$lastName','$username','$password','$email')";
            //STR_TO_DATE('$birthday','%Y-%m-%d')
            //convert the date to the proper format to mysqli

            //Sometimes it's nice to print the query. That way you know what SQL you're working with.
//            print $query;
           // exit;

            // Run the query
//            $mysqliResult = $mysqli->query($query);

            // If there was a result...
            if ($mysqli->query($query)=== TRUE) {
                $error = "new user created successfully";
                require "login_form.php";
                exit;
            }
            else{
                $error = "insert error:" . $query . "<br>" . $mysqli->error;
                require "createUser_form.php";
                exit;
            }
                // How many records were returned?
//                $match = $mysqliResult->num_rows;
//
//                // Close the results
//                $mysqliResult->close();
                // Close the DB connection
                $mysqli->close();
                exit; 
                // If there was a match, login
//                if ($match == 1) {
//                    $_SESSION['loggedin'] = $username;
//                    header("Location: page1.php");
//                    exit;
//                }
//                else {
//                    $error = 'Error: Incorrect username or password';
//                    require "login_form.php";
//                    exit;
//                }
            }  
        // Else, there was no result
        else {
          $error = 'error: password do not match';
          require "createUser_form.php";
          exit;
        }
	}
	
	function login_form() {
		$username = "";
		$error = "";
		require "login_form.php";
        exit;
	}
	
?>