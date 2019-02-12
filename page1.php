<?php

// // A user has to have logged in order to have this 'username' cookie
// $username = empty($_COOKIE['username']) ? '' : $_COOKIE['username'];
// 
// // If the cookie isn't there, send them back to the login
// if (!$username) {
//  header("Location: login.php");
//  exit;
// }
//    if ($_SERVER['HTTPS'] !== 'on') {
//		$redirectURL = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//		header("Location: $redirectURL");
//		exit;
//	}
    
	// Every time we want to access $_SESSION, we have to call session_start()
	if(!session_start()) {
		header("Location: error.php");
		exit;
	}
	
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	if (!$loggedIn) {
		header("Location: login.php");
		exit;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8"> 
	<title>Page 1</title>
    <style>
        h1{
            text-align: center;
            color:bisque;
         }
        form{
            float:right;
        }
        iframe{
            float:left;
        }
        #page{
            float:left;
            color:coral;
        }
    </style>
        <script src="jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
        <script src="jquery-ui-1.11.4.custom/jquery-ui.js"></script>
        <script src="background.js"></script>

</head>
	<body id="content" onload="pageLoaded()">  
        <h1>Traveling 2018</h1>
        
<!--     using a template here  -->
        
        <iframe src='https://cdn.knightlab.com/libs/timeline3/latest/embed/index.html?source=1yIf_lqcp7UvzWrX_uUWDqjwvu8xQltXdmVeaboLdPjg&font=Default&lang=en&initial_zoom=2&height=650' width='100%' height='650' webkitallowfullscreen mozallowfullscreen allowfullscreen frameborder='0'></iframe>
        
<!-- insert youtube video here -->
        
        <div class="video"><iframe src="https://www.youtube.com/embed/CjnyinHsWy8"></iframe></div>
        <div class="video"><iframe src="https://www.youtube.com/embed/NzHxV-iAHAo"></iframe></div>
        <div class="video"><iframe src="https://www.youtube.com/embed/2OCb6JgMzV8"></iframe></div>
        
<!--        useing a form here -->
        <form action="action.php">
            <textarea name="message" rows="10" cols="30">Help me to decide my next destination. Type in the testarea. 告诉我下一个目的地 </textarea>
            <br>
            <input type="submit">
        </form>
        <div id="page">
            <p> this is a private page </p>
            <p>This is a page containing protected content<?php print " for $loggedIn"; ?>.</p>
            <a href="index.html">back to homepage</a>
            <br> 
             <a href="page2.php">check out page2</a>
            <br>
            <a href="logout.php">log out</a>
        </div>
</body>
</html>



