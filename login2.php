<?php
// Created by Professor Wergeles for CS2830 at the University of Missouri

	// Here we are using sessions to propagate the login
	// http://php.net/manual/en/book.session.php
	
	// http://php.net/manual/en/function.session-start.php
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
	
	if ($action == 'do_login') {
		handle_login();
	} 
    else {
		login_form();
	}
	
	function handle_login() {
		$username = empty($_POST['username']) ? '' : $_POST['username'];
		$password = empty($_POST['password']) ? '' : $_POST['password'];
	
//		if ($username == "test" && $password == "pass") {
//			// Instead of setting a cookie, we'll set a key/value pair in $_SESSION
//			$_SESSION['loggedin'] = $username;
//			header("Location: page1.php");
//			exit;
//		} 
        
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '1234'; 
    $dbname = 'cs2830';

    // Connect to the database
    // http://php.net/manual/en/book.mysqli.php
    // http://php.net/manual/en/mysqli.construct.php
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
            
        if ($mysqli->connect_error) {
            print "Connect Error";
            require "login_form.php";
            exit;
        }
        
        else{     
        $query = "select id from users where username = '$username' and userPassword = '$password'";
//        print $query;
//        exit;
        
        $result = $mysqli->query($query);
             
        if($result){
            
            $match = $result->num_rows;
            echo $match;
            $result->close();
            $mysqli->close();
                
            if($match == 1){
                $_SESSION['loggedin'] = $username;
                header("Location: page2.php");
                exit;
            }    
            else{
			     $error = "Error: Incorrect username or password";
                require "login_form.php";
                exit;
		  }		
	   }
	// else, there was no result
        else {
            $error = 'Login Error: please contact the system administrator.';
            require "login_form.php";
            exit;
            }
        }
}
        
	function login_form() {
		$username = "";
		$error = "";
		require "login_form.php";
	}
	
	
?>