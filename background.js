
       function pageLoaded(){
		      var d = new Date(); 
              var hours = d.getHours(); 
              var content = document.getElementById("content"); 
				if(7 <= hours && hours < 9){
                    content.style.background = "url('pics/morningsea.jpg') no-repeat";
                    content.style.backgroundSize = "cover"; 

                }
				else if(9 <= hours && hours < 18){
                    content.style.background = "url('pics/twinklingsea.jpg') no-repeat";
                    content.style.backgroundSize = "cover"; 
                }
           
				else if(18 <= hours && hours < 20){
                    content.style.background = "url('pics/dawnsea.jpg') no-repeat"; 
                    content.style.backgroundSize = "cover";
                }
				else if(20 <= hours || hours < 7){
                    content.style.background = "url('pics/nightsea.jpg') no-repeat";
                    content.style.backgroundSize = "cover";
                }
                else {
                    content.style.background = "url(pics/sea.jpg)";
                    content.style.backgroundSize = "cover";
                }
            }
