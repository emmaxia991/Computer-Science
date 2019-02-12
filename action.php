<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
	<title>thank you</title>
    <style>
    #jojo{
        width:300px;
        height:200px;
        }
    #hamster{
          text-align: center;  
        }
    p{
        text-align: center;
        font-size: 50px;
        color:burlywood;
        }
    </style>
        <script src="jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
        <script src="jquery-ui-1.11.4.custom/jquery-ui.js"></script>
    
    <!-- using jquey here-->
<script> 
    $(document).ready(function(){
        $("#hamster1").click(function(){
            $("#jojo").hide(1000);
        });
    
        $("#hamster2").click(function(){
            $("#jojo").show(1000);
        });
    }); 
     </script>
        <script src="background.js"></script>    
</head>
    
	<body id="content" onload="pageLoaded()">  
        <div id="hamster">
            <p>Got it! Thank you! 谢谢！🙏</p>
            <img id="jojo" src="pics/hamster.jpeg" alt="hamster">
            <br>
            <button id="hamster1">hide my little pet</button>
            <button id="hamster2">my little pet</button>
            <a href="page1.php"> back to 2018 Timeline</a>
        </div> 
</body>
</html>