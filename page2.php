	<?php
    if(!session_start()) {
		header("Location: error.php");
		exit;
	}
	
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	if (!$loggedIn) {
		header("Location: login2.php");
		exit;
	}
?>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="page2css.css">
	<title>Page 2</title>
    
<!-- using get and ajax -->
    <script>
        
         function loadDoc() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("map").innerHTML =
            this.responseText;
            }
    };
            xhttp.open("GET", "txt/xz.txt", true);
            xhttp.send();
} 
         function loadDoc1() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("map").innerHTML =
            this.responseText;
            }
    };
            xhttp.open("GET", "txt/las.txt", true);
            xhttp.send();
} 
        
         function loadDoc2() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("map").innerHTML =
            this.responseText;
            }
    };          
            xhttp.open("GET", "txt/zjg.txt", true);
            xhttp.send();           
 }
        function loadDoc3() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("map").innerHTML =
            this.responseText;
            }
    };
            xhttp.open("GET", "txt/glby.txt", true);
            xhttp.send();
} 
    </script>
    <script src="background.js"></script>
</head>
    
<body id="content" onload="pageLoaded()">
    <div id="background">
    <h1>Photo Pisplay 旅行照片</h1>
    <div class="inline">
        
<div class="polaroid inline rotateRight spin">
       <img src="pics/xizang.jpeg" onclick="loadDoc()" alt="xizang" >
    </div>
    
	<div class="polaroid inline rotateRight spin">
      <img src="pics/las.jpeg" onclick="loadDoc1()" alt="las">
     </div>
        
    <div class="polaroid inline rotateRight spin">
      <img src="pics/zhijiage.jpeg" onclick="loadDoc2()" alt="zhijiage">
    </div>
     <div class="polaroid inline rotateRight spin">
       <img src="pics/gelunbiya.jpeg" onclick="loadDoc3()" alt="gelunbia" >
    </div>
                                 
<!--         <button type="button" onclick="loadDoc2()"> guess where I took this pic? </button>-->

     </div> 
<h2> click the pic to see the place 点击图片</h2>
    <div id="map"> <div> </div></div>
    </div>
        <p> this is a private page </p>
        <p>This is a page containing protected content<?php print " for $loggedIn"; ?>.</p>
        <a href="index.html">homepage</a>
<br>
        <a href="logout.php">log out</a>
</body>
</html>
