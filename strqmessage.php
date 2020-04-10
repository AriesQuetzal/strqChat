<?php session_start(); 
if (!isset($_SESSION['username']))
 { 	
 $_SESSION['msg'] = "You must log in first"; 	header('location: login.php'); 
 }
  if (isset($_GET['logout'])) 
  { 	
  session_destroy(); 	unset($_SESSION['username']); 	header("location: login.php"); 
  }  
// connect to the database
 include('Db_conx.php');
 include ('onlinenow.php');

$artstrqid = intval($_GET['idstrq']); 
$userid = $_SESSION['id'];
$sender =  $_SESSION['username'];


  include('loaderfeel.php');
  include('colorswitch.php');
  include('DefaultAvatarColor.php');

  ?>   
   
<!DOCTYPE html> 
  
  <html> 
  <head> 	
  <title>Strq</title> 
  
 <meta charset="UTF-8"/>
 
  <link rel="img_src" href="https://meuzmbeta.epizy.com/strqicon.png">
  
  <meta property="og:image" content="https://meuzmbeta.epizy.com/strqicon.png"/>


<meta property="og:image" content="https://meuzmbeta.epizy.com/mzflash.png" link rel="image_src" type="image/png" href="https://meuzmbeta.epizy.com/strqicon.png" />


<!-- THEME COLOR FOR BROWSER ADDRESS BAR-->

  	<meta class="changebar" name="theme-color" content="<?php echo $browsercolor;?>" />
<!-- Windows Phone --> 
<meta class="changebar" name="msapplication-navbutton-color" content="<?php echo $browsercolor;?>"> 
<!-- iOS Safari --> 
<meta class="changebar" name="apple-mobile-web-app-capable" content="yes"> 
<meta class="changebar" name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  	
  	
  
  	<link rel="stylesheet" type="text/css" href="style.css"> 
  	
  	<link rel="stylesheet" type="text/css" href="studiomenus.css"> 
  	
  	 <link rel="stylesheet" type="text/css" media="screen and (min-width:900px)" href="stylewide.css"> 
  	
  	<link rel="stylesheet" type="text/css" href="0acube100.css"> 
  	
  	  	<link rel="stylesheet" type="text/css" href="0cubes.css"> 
  	
  	 	<link rel="stylesheet" type="text/css" href="0acubesmall.css"> 
  	 	
 <link rel="stylesheet" type="text/css" href="stylefeel.css"> 


  	 		
  	
  	 	<script src="MenuActions.js"></script>
  	 	
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	
 <link href="https://fonts.googleapis.com/css?family=Audiowide|Gaegu|Montserrat|Permanent+Marker" rel="stylesheet">
  	
  	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300" rel="stylesheet">  	
  	
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">  	
  	
  <style>

<?php 
 include('menubars.php');
  	?>
  	
  	</style>
  	
  	
  	</head> 
  	
  	<body id="body"  onload="downs()">
  	<div id="test"></div>
<?php

$sql = "SELECT username, feel , avatar , avatar2, avatar3, avatar4 FROM Users WHERE id = $artstrqid ";
if ($query = mysqli_query($con, $sql))
{
while ($row = mysqli_fetch_assoc($query))
{

include('cubeavatars.php');
$strqto = $row['username'];
  	echo"	

<div  class='studioheadstrq'  style='background-color:$row[feel]'>
  	  <span  class='icon2'  onclick='javascript:history.back()'><i class='fas fa-arrow-left'></i></span>
  	  
  	   <div class='procusmallmove strqtopcube'>
		<div  class='scenesmall'>
<div  class='cubesmallmove'>	

	<div  class='cube-facesmall  cube-face-frontsmall' style='border-color:$row[feel]'><img src='$avatar1' height='100%'></div>
	<div  class='cube-facesmall  cube-face-backsmall' style='border-color:$row[feel]'><img src='$avatar3' height='100%'></div>
	<div  class='cube-facesmall  cube-face-leftsmall' style='border-color:$row[feel]'><img src='$avatar2' height='100%'></div>
	<div  class='cube-facesmall  cube-face-rightsmall' style='border-color:$row[feel]'><img src='$avatar4' height='100%'></div>
	
	</div>
	</div>
		</div>
		
		
			<div class='strqheadname'  ><div   >$row[username]</div> <div class='strqheadactive' >";
			include('timeago.php');
			echo"</div></div>
  <!-- FEEL SELECTION CODE  -->	
	  
	  	<!-- feelbutton -->
	  
  	<div id='feelbtndiv'>
	  	<div  id='feeling' class='menufeel' onclick='openfeel()'>
<img src='feelicon50.png'>
</div>
  	</div>
  </div>";
}
}
?>

<!-- CLICKS STRQ REFRESH -->
<div id='refreshstrq' onclick='showStrq(<?php echo $artstrqid;?>); downs()' style='display:none;'>
</div>


	<div id="mzflashone" class="strqfixedcase">
		
		<div class="messplace">
		
		
		<div class="strqbase" id="strqCont" style="transition:.5s; style="transition:.5s;">  	 	
	
	<div class="forspace"></div>
	
		
<?php
$sql = "SELECT username, feel , avatar , avatar2, avatar3, avatar4 FROM Users WHERE id = $artstrqid ";
if ($query = mysqli_query($con, $sql))
{
while ($row = mysqli_fetch_assoc($query))
{

include('cubeavatars.php');
$strqto = $row['username'];
  	echo"		
			
<div class='strqmaincube'>

	<div  class='scene'>
<div  class='cube'>	
	<div  
  	 class='cube-face  cube-face-front' style='border-color:$row[feel];'><img src='$avatar1' height='100%'  ></div>
	<div    class='cube-face  cube-face-back' style='border-color:$row[feel];'><img src='$avatar3' height='100%'></div>
	<div   class='cube-face  cube-face-left' style='border-color:$row[feel];'><img src='$avatar2' height='100%'></div>
	<div    class='cube-face  cube-face-right'  style='border-color:$row[feel];'><img src='$avatar4' height='100%'></div>
	</div>
	</div>
<div class='nowStrqin'>	You are now Strqing with <br /> <span><strong> $row[username]</strong></span></div>
</div><!-- END STRQCUBE -->
";
}
}
?>
	
	
	 
  	 	
	<div class="input-group strqbase2" id="strqAjax" style="transition:.5s;">  	




<?php 
 include('strqfirst.php');
 ?>
          

	
  	 	
	</div> <!--END STRQAJAX-->
		</div> <!--END STRQBASE -->
	</div> <!--END MESSPLACE -->
		
	
	
<!-- STRQ SUBMIT -->	
	
		
		
		<form  class='strqform' >
	
	 <div class=mzflashinput> 		
	 
	<textarea type='text' name='comment' id='message'  onclick='down3();down2()'  onkeyup='activate(this); StrqActivated(this.value)'  onKeyDown='StrqActivated(this.value)'  placeholder=' Type a  message...'   autocomplete='off'></textarea>
		
		</div>
		<input type='radio' id='strqit' value='<?php echo$artstrqid;?>'  
	style='display:none;'>
		
		
  <div  class='mzbuttoncase ' id='fbutton'>
	<div class='mzflashsubmitload'>
		<button id='submit' type='button' class='strq2btn'  onclick='submitStrq();  clearbox(); downs(); disableafter()'>Post</button> 	
	</div>
		</div>

		<div class='mzsendload' id='mload'>
     <img src='<?php $loaderfeel;?>'  id='the2'>
   
	</div>
	</form>	
	
	<script>
document.getElementById('strqit').click()	
	</script>
		
	</div><!--END MZFLASHONE -->
	
	
	
	
	<!-- APPEARS WHEN OPTIONS OR MY FEEL APPEAR. THIS BLOCKS MOVEMENT AND ACTION FROM BACKGROUND -->  	
  	
 	<div class='blocker' id='stopblock'  onclick='imgOpsBye($imops$gad, $imblo$gad)'></div>

 
 
 
 
 	<!-- THIS IS THE FULL 'FEEL' POP UP BLOCK --> 	 	 	 
  	 	 
<div id='feelholder'>


     <div class='feels'>
     
     
<!--  START OF CUBE --> 


  	 	 	 

<div class='cubecenter' >  
     	<div  class='procufull'>
		<div  class='scenefull'>
<div  class='cubefull'>	


<!-- CUSTOM CUBE DETAILS BASED IN CURRENT USER USING PHP AND SQL -->
<?php

$query = "SELECT avatar, avatar2, avatar3, avatar4, feel FROM Users WHERE username = '".$_SESSION['username']."'  OR email='" . $_SESSION["username"] . "'"; 
  	 	 	 if($result = mysqli_query($db, $query)) 
  	 	 	 { 
  	 	
  	 	 	 while($row = mysqli_fetch_assoc($result)) 
  	 	 	 { 
  // to create a default avatar	 	 	 
  	 	 	include('cubeavatars.php');
  	 	 	 
echo"


	<div  class='cube-facefull  bordermenufeel cube-face-frontfull' style='border-color:$row[feel];'> <img src='$avatar1' height='100%'>
  	 	 </div>
	<div  class='cube-facefull  bordermenufeel cube-face-backfull'  style='border-color:$row[feel];'><img src='$avatar3' height='100%'>
	</div>
	<div  class='cube-facefull  bordermenufeel cube-face-leftfull'  style='border-color:$row[feel];'><img src='$avatar4' height='100%'>
	</div>
	<div  class='cube-facefull bordermenufeel cube-face-rightfull'  style='border-color:$row[feel];'><img src='$avatar2' height='100%'>
	</div>
	";
	
	}
  	 	 	 }
  	 	 	 ?>
	
	</div>
	</div>
	</div>
</div> <!-- CLOSE CLASS=CUBECENTER -->



     
   <!-- END OF CUBE --> 
 
 
<!-- THE FEEL ICONS AND THE ATTACHED AJAX AND JAVASCRIPT EVENTS --> 
     
        <div class='feelind' > <img src="iconyellow.png" id="emojiyellow"  onclick="changeFeel(1); Change('gold'); CloseFeel()">
        </div>
        
         <div class='feelind'>
          <img src='iconorange.png' id='emojiorange'   onclick="changeFeel(2); Change('orange') ; CloseFeel() ">
           </div>
           
          <div class='feelind'>
           <img src='iconred.png' id='emojired'  onclick="changeFeel(3) ;  Change('red') ; CloseFeel()">
           </div>
           
           <div class='feelind'> 
           <img src='iconpurple.png' id='emojipurple' onclick="changeFeel(4) ;  Change('purple') ; CloseFeel()" >
           </div>
           
            <div class='feelind'>
            <img src='iconblue.png' id='emojiblue'   onclick="changeFeel(5) ; Change('dodgerblue'); CloseFeel() ">
            </div>
            
            <div class='feelind'>
             <img src='icongreen.png' id='emojigreen' onclick="changeFeel(6);  Change('limegreen') ; CloseFeel() ">
            </div> 
             
            <div class='feelind'>
              <img src='icongray.png' id='emojigray'onclick="changeFeel(7) ;  Change('gray')  ; CloseFeel()"  >
              </div>


</div>
</div>
	
<!-- END OF FEEL POP BLOCK-->
 
	
	
	
 
 
 
 
 
 
 
	
	
	
	
	
<!-- MENUS -->		
		
	<!-- left side menu -->

<div class="menuspaceleft">
		<div id="bottommenu3" class="bottommenu3 small3 menufeel" onclick="grow3()" >
		
		<!-- INVISIBLE DIV TO FACILITATE OPENNING MENU -->	
			<div class="lefttouch"></div>
		
		<div class="iconspaceleft" align="right">
		  
		  	<div class="mainicons3"><a href="lobby.php"> <img src="lobbyicon.png"> </a></div>
		  	
		  		<div class="mainicons3"> <a href="mystudio.php"><img src="newstudioicon.png"> </a></div>
		  		
		  	
		  		 	 </div>
		  		 	 </div>
		  		 	  </div>
	 	





<!-- right side menu -->

		<div class="menuspaceright">
		<div id="bottommenu2" class="bottommenu2 small2 menufeel" onclick="grow2()" >
		
			<!-- INVISIBLE DIV TO FACILITATE OPENNING MENU -->	
			<div class="righttouch"></div>
		
		
		<div class="iconspaceright">
		 
		 
		  	
		  	<div class="mainicons2"><a href="strq.php"> <img src="strqicon.png"> </a></div>
		  	

		  		<div class="mainicons2"><a href="mymzflash.php"> <img src="mzflash.png"> </a></div>
		  		 
		  		 	 </div>
		  		 	 </div>
	 	 </div>
	


<!-- bottom menu -->
		<div id="bottommenu" class="bottommenu small menufeel" onclick="grow()" >
		
			<!-- INVISIBLE DIV TO FACILITATE OPENNING MENU -->	
			<div class="bottomtouch"></div>
		
		  
<div class="mainicons2"><a href="addexhibit.php"> <img src="add.png"> </a></div>
		  	  	

	 	 </div>
	 	 
	 	 
<!-- FOR STRQ REFRESH USED WITH A SETTIMEOUT -->	 	 
	 	 
<script>
function showStrq(str) {
if (str =="") {
document.getElementById("strqAjax").innerHTML="";
return;
} else {
if 
(window.XMLHttpRequest) {
xmlhttp = new XMLHttpRequest();
} else {
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function()
{
if (this.readyState==4 && this.status==200) {
document.getElementById("strqAjax").innerHTML= this.responseText;
}
}
xmlhttp.open("GET","strqrefresh.php?q=" +str, true);
xmlhttp.send();
}
}
</script>		
	
		
<!-- STRQ SUBMIT -->
	  	 <script>
function submitStrq()
{
var message = 
document.getElementById("message").value;
var strqit = 
document.getElementById("strqit").value;

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = 
function()
{
if (this.readyState==4 && this.status==200)
{
document.getElementById("strqAjax").innerHTML=this.responseText;
}
};
xhttp.open("POST","newStrqing.php",true);
xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
// uses userid variable for references
xhttp.send("sender1=<?php echo  "$userid";?>&message1=" + message + "&strqit1=" + strqit);
}

</script>
			 
	 	   		
	
	




	 

  	 	



  	 		
 
  	 		
<!-- general function scripts -->
  	 	<script>
 
  	 	

	

  


function loader(h, b) {
  lo =  document.getElementById(h);
   z= document.getElementById(b);
 
 if (z.style.display!="none")
 {
z.style.display="none";
  lo.style.display="flex";
  }
  else
   {
z.style.display="flex";
  lo.style.display="none";
  }  
	}
 
 // sets a timeout for loader  
function  loadertime()
{
setTimeout(loader, 5000);
  } 
  
  function cubeTwo()
  {
document.getElementById('topictwo').click();
document.getElementById('cubetoggle').click();

  }
 
//Selects the middle cube during wider screen mzflash when selecting from top row
 
 
 
 
  function reStrq()
  {
document.getElementById('refreshstrq').click();

  }
 // THIS KEEPS THE STRQ MESSAGES UPDATED EVERY SECOND  

  	var restrq = setInterval(reStrq, 600);
  	  	
  	


// closes right side menu when feed is scrolled
	document.getElementById("mzflashesAjax").addEventListener("scroll", function(event) 
{
var con = document.getElementsByClassName("bottommenu2");

for ( i = 0 ; i < con.length ; i++ )
{
if (event.target != con[i] && event.target.parentNode != con[i])
{
if (con[i].classList.contains("grow2"))
{
grow2();
}
}
}
});
	  
// closes left side menu when feed is scrolled
	document.getElementById("mzflashesAjax").addEventListener("scroll", function(event) 
{
var con = document.getElementsByClassName("bottommenu3");

for ( i = 0 ; i < con.length ; i++ )
{
if (event.target != con[i] && event.target.parentNode != con[i])
{
if (con[i].classList.contains("grow3"))
{
grow3();
}
}
}
});
	  	  
// closes bottom  menu when feed is scrolled
	document.getElementById("mzflashesAjax").addEventListener("scroll", function(event) 
{
var con = document.getElementsByClassName("bottommenu");

for ( i = 0 ; i < con.length ; i++ )
{
if (event.target != con[i] && event.target.parentNode != con[i])
{
if (con[i].classList.contains("grow"))
{
grow();
}
}
}
});	 


// CLEARS TEXT AREA
function  clearbox()
{
document.getElementById('message').value='';

}


// VAR SET AT 0 FOR SCROLLHEIGHT COMPARISON START


var xix;
// TO SCROLL DOWN ON SETINTERVAL FOR STRQ CHAT IF NEW MESSAGE IS ADDED, WHICH INCREASES HEIGHT
function downs()
{
var div= 
  	 	document.getElementById('strqCont');
 var yix = div.scrollHeight;
 
if (!xix)
{
div.scrollTop = div.scrollHeight;
xix = yix;
} 
else if (yix > xix)
{
div.scrollTop = div.scrollHeight;
xix = yix;
}
}



function down1() 
{
down3();
}

function down2() 
{
setTimeout(down3, 1000);
setTimeout(down1, 1500);
}



function down3()

{
var div= 
  	 	document.getElementById('strqCont');
 var yix = div.scrollHeight;
 

div.scrollTop = div.scrollHeight;
xix = yix;
 
 
}





	sub = 
document.getElementById("submit");

sub.style="background-color:black;color:gray";
sub.disabled = true;
	
	
	
function disableafter()
{	
	sub = 
document.getElementById("submit")

sub.style="background-color:black;color:gray";
sub.disabled = true;
	
	}
	
	
function activate(z)
	{
	su=
	document.getElementById('submit');
	 
if (z.value.length>0 )
{
su.style="background-color:<?php echo $feelofme ;?>;color:white";
su.disabled = false;
}
else 
{
su.style="background-color:black;color:gray;";
su.disabled = true;
}
	}
	
	

// RECORDS AND UPDATES NEW FEEL

function changeFeel(str) {
if (str =="") {
document.getElementById('feelbtndiv').innerHTML="";
return;
} else {
if 
(window.XMLHttpRequest) {
xmlhttp = new XMLHttpRequest();
} else {
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function()
{
if (this.readyState==4 && this.status==200) {
document.getElementById('feelbtndiv').innerHTML= this.responseText;
}
}
xmlhttp.open("GET","addnewfeel.php?q=" +str, true);
xmlhttp.send();
}


}


</script>




<script>
 	// OPENS FEEL SELECTION
 	
  function openfeel()	
  	 {
  	 	
  	 	feelpopup =  	document.getElementById('feelholder');
  	 	
  	 body = 
document.getElementById("body");
blocker =
document.getElementById("stopblock");

if (blocker.style.display!="block")
{

blocker.style.display="block";
body.style.overflow="hidden";  	 	
 	 	feelpopup.style.display='block';
  	 	
  	 }		
 
 }
 
 	
//CHANGES ALL MENU BARS AND BORDERS AFFECTED BY FEEL
  	
  	 	
  	 	function Change(feel)
  	 	{
 
 // AFFECTS BROWSER ADDRESS BAR 	 		 
  	 		 var barr = document.getElementsByClassName('changebar');

// AFFECTS MENU BARS  	 		 
  	 		  var menu = document.getElementsByClassName('menufeel');
  	 		 
  	 		 
// AFFECTS BORDER COLOR  	 		 
  	 		var colors = document.getElementsByClassName('bordermenufeel');
  	 		
  	 for(i = 0 ; i < colors.length ; i++)		
  	 
  	 {
  	 	
  	 
  	 		 colors[i].style.borderColor=feel;
  	 		
  	 		}
  	 		
// CHANGES ADDRESS BAR COLORS 
 	 		
  for(y = 0 ; y < colors.length ; y++)		  {
 barr[y].content=feel;
  	 		 	 		}
  	 	
  for(x = 0 ; x < menu.length ; x++)		  {
 menu[x].style.backgroundColor=feel;
  	 		 	 		}	 	
  	 	
  	 		
  	 		
  	 	}
 	
//CLOSES FEEL SELECTION AFTER .5 SECONDS  	
 function CloseFeel()
 {
 setTimeout(CloseAll(), 500);
 }
  	
  	
 function CloseAll()	
  	 {
  	 	
  	 blocker =
document.getElementById("stopblock"); 
 	 	
 body = 
document.getElementById("body"); 	 	
  	 
  	 	feelpopup =  	document.getElementById('feelholder');
  	 	
 blocker.style.display="none"; 	 	
 	body.style.overflow="auto";
 	feelpopup.style.display='none';
  	 	isplay='none';
  	 	
  	 }	
  	 

  	 	 </script>
  	 	 
  	 	 
  	 	 <script>
	//UPDATES STRQSTART WHEN TYPING IN TEXTBOX
// HACK TO GET THE VALUE TO REFLECT AS 0 IS TO MAKW STR THAT RANDOM SET OF LETTERS AND SYMBOLS	
function StrqActivaed(str) {
	
var oth = "2";
	
	
if (str =="uttrtghfhghthgh567577713@$#") {
document.getElementById("test").innerHTML="";
return;
} else {
if 
(window.XMLHttpRequest) {
xmlhttp = new XMLHttpRequest();
} else {
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function()
{
if (this.readyState==4 && this.status==200) {
document.getElementById("test").innerHTML= this.responseText;
}
}
xmlhttp.open("GET","StrqActive.php?q=" +str, true);
xmlhttp.send();
}
}
</script>	 			
				
				
				
				
  	 	 <script>
function StrqActivated(str)
{



var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = 
function()
{
if (this.readyState==4 && this.status==200)
{
document.getElementById('test').innerHTML=this.responseText;
}
};
xhttp.open("POST","StrqActive.php",true);
xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
// uses userid variable for references
xhttp.send("other=<?php echo"$artstrqid" ?>&q=" +str);
}

</script>
			 
	 	   		  	 	 
  	 	 
  	 	 
  	 	 
 <!-- SCRIPT THAT AFFECTS MENUS -->
     <script src="MenuActions.js"></script>   	 	 
  	 	 
  	 	 
  	 	  </body> 
  	 	  </html>