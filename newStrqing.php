<?php session_start();


$me = $_SESSION['id'];

if(isset($_POST['sender1']))
{
include('Db_conx.php');
mysqli_set_charset($db,"utf8mb4");

date_default_timezone_set("America/New_York");

$sender = mysqli_real_escape_string($con,$_POST['sender1']);
$message = mysqli_real_escape_string($con,$_POST['message1']);
$strqee = mysqli_real_escape_string($con,$_POST['strqit1']);




$sql="SELECT artist1, artist2 FROM StrqStart WHERE artist1 = $me AND artist2 = $strqee OR artist1 = $strqee AND artist2 = $me";
if($resultq = mysqli_query($con,$sql))
{
while($rowq = mysqli_fetch_assoc($resultq))
{




if($rowq[artist1]==$me)
{
if($query=mysqli_query($con,"UPDATE StrqStart SET senderactive1 = '0' WHERE artist1 = $me AND artist2 = $strqee "))
{



}
} 
else if($rowq[artist2]==$me)
{
	if($query=mysqli_query($con,"UPDATE StrqStart SET senderactive2 = '0' WHERE artist2 = $me AND artist1 = $strqee "))
	{


}
}

}// END WHILE
}//END IF








 $sql = "SELECT  feel FROM Users WHERE id  = '$sender'";
 if($result = mysqli_query($con, $sql)) 
  	 	 	 { 
while($row = mysqli_fetch_assoc($result)) 
  	 	 	 { 
$feelpost = $row['feel'];
  }
  }  
 
 $strq = "SELECT COUNT(id) FROM StrqStart WHERE artist1 = $me AND artist2  = $strqee OR artist1 = $strqee AND artist2  = $me";
 $squery = mysqli_query($con, $strq);
 $srow = mysqli_fetch_array($squery);
 
 
 
 
 
// STRQSTART UPDATE ALLOWS TO KEEP TRACK OF ACTIVITY FOR USE WITH NOTICES 
 
 if ($srow[0] > 0 )
 {
 
 mysqli_query($db, "UPDATE StrqStart SET laststrq = NOW()   WHERE artist1 = $me AND artist2  = $strqee OR artist1 = $strqee AND artist2  = $me"); 
 
 } else 
{

mysqli_query($db, "INSERT INTO StrqStart ( artist1 , artist2, check1, laststrq) VALUES ('$me', '$strqee', NOW(), NOW())");

}
// LEFT UNFINISHED USE TO INSERT INTO THE STRQSTART TABLE

$sql =mysqli_query($con,"INSERT INTO StrqMessages(message, strqsender, strqreceiver, madeon, feelsender)  VALUES('$message', '$sender', '$strqee', NOW(),  '$feelpost')");





//SELECTING FEEL FROM USER TABLE
$sfeel = "SELECT feel FROM Users WHERE id = $me";
if ($dbsfeel = mysqli_query($con,$sfeel))
{
while($sfrow = mysqli_fetch_assoc($dbsfeel))
{
	$myfeel = $sfrow['feel'];
}
}


//ADDS FEEL AND DATE THAT MESSAGE WAS SEEN ON	

	
if (mysqli_query($con,"UPDATE StrqMessages SET checkfeel = '$myfeel' , checkdate = NOW()  WHERE strqreceiver = $me AND strqsender = $strqee AND checkfeel = ''" ))
{
	
	
}
else
{
	
	
}	
	
	
	//CHECKS FOR ID OF LAST MESSAGE 
  		
		$sql6 = "SELECT id FROM StrqMessages WHERE strqreceiver = $strqee AND  strqsender = $me AND checkfeel != ''  ORDER BY id DESC LIMIT 1";
if ($result6 = mysqli_query($con, $sql6))
{
while ($rows6 = mysqli_fetch_assoc($result6))
{
 	$lastid = $rows6[id];
		
	}
	
	}
  	 	






$sql = "SELECT id, message, feelsender, DATE_FORMAT(madeon, ' %b %e AT %l:%i %p') AS tiempo, strqreceiver, strqsender, checkfeel FROM StrqMessages WHERE strqreceiver = $me AND  strqsender = $strqee OR strqreceiver = $strqee AND strqsender = $me  ORDER BY id ";
if ($result = mysqli_query($con, $sql))
{
while ($rows = mysqli_fetch_assoc($result))
{


// TO COMPARE DATE IN ORDER TO DISPLAY TIME ONLY OR FULL DATE
$sqlt = "SELECT DATE_FORMAT(madeon, '%Y-%m-%d') AS isday FROM StrqMessages WHERE id = $rows[id] ";
if ($resultt = mysqli_query($con, $sqlt))
{
while ($rowst = mysqli_fetch_assoc($resultt))
{

$dayfrom = $rowst[isday];
}// END WHILE
}// END IF



$sqly = "SELECT madeon FROM StrqMessages WHERE id = $rows[id] ";
if ($resulty = mysqli_query($con, $sqly))
{
while ($rowsy = mysqli_fetch_assoc($resulty))
{

$dayonly = $rowsy['madeon'];
} // END WHILE
}//END IF



$sqlt = "SELECT DATE_FORMAT(madeon, ' %l:%i %p') AS timeonly FROM StrqMessages WHERE id = $rows[id] ";
if ($resultoo = mysqli_query($con, $sqlt))
{
while ($rowsoo = mysqli_fetch_assoc($resultoo))
{

$timeonly = $rowsoo[timeonly];
} // END WHILE
}// END IF


$hogo = date('Y-m-d');

$yesterday=date ("Y-m-d H:i:s", mktime (0,0,0,date("m"),date("d") -1,date("Y")));
$today=date ("Y-m-d H:i:s", mktime (0,0,0,date("m"),date("d") ,date("Y")));


if($hogo == $dayfrom)
{
$made =  $timeonly;
}
else if ($dayonly >= $yesterday && $dayonly < $today)
{
$made =  "Yesterday AT $timeonly";
}
else
{

$made =  $rows[tiempo];
}


// GIVES RECEIVED MESSAGES A DIFFERENT TONE

if ($rows['strqsender'] == $strqee)
{
$fadecolor = "rgba(128,0,128,.3)"	;
  	switch( $rows['feelsender']) 	 {
  	 	case "gold":
  	 	 	 $fadecolor = 'rgba(255,215,0,.3)';
  	 	 	 break;
  	 	 	case "orange":
  	 	 	 $fadecolor = 'rgba(255,165,0,.3)';
  	 	 	 break;
  	 	case "red":
  	 	 	 $fadecolor = 'rgba(255,0,0,.3)';
  	 	 	 break;
  	 	case "purple":
  	 	 	 $fadecolor = 'rgba(128,0,128,.3)';  	 	 
  	 	 	 break;	 
  	 	case "dodgerblue":
  	 	 	 $fadecolor = 'rgba(30,144,255,.3)';  	 	 	  
  	 	 	 break;
  	 	case "limegreen":
  	 	 	 $fadecolor = 'rgba(50,205,50,.3)';
  	 	 	 break;
  	 	 case "gray":
  	 	 	 $fadecolor = 'rgba(128,128,128,.3)';
  	 	 	 
  	 	 	 break;
  	 	 	 } // END FADECOLOR SWITCH


echo"

	<div class='tiempo'>$made</div>
  	 	 <div class='strqcaseget'>";
  	 	 
  	 	 $sqla = "SELECT avatar, avatar2 , avatar3, avatar4 FROM Users WHERE id = $strqee ";
if ($que = mysqli_query($con, $sqla))
{
while ($row = mysqli_fetch_assoc($que))
{



include('cubeavatars.php');
echo"
  	 	 
  	 	   <div class=' strqfrontcube'>
		<div  class='scenesmall'>
<div  class='cubesmall'>	

	<div  class='cube-facesmall  cube-face-frontsmall' style='border-color:$rows[feelsender]'><img src='$avatar1' height='100%'></div>
	<div  class='cube-facesmall  cube-face-backsmall' style='border-color:$rows[feelsender]'><img src='$avatar3' height='100%'></div>
	<div  class='cube-facesmall  cube-face-leftsmall' style='border-color:$rows[feelsender]'><img src='$avatar2' height='100%'></div>
	<div  class='cube-facesmall  cube-face-rightsmall' style='border-color:$rows[feelsender]'><img src='$avatar4' height='100%'></div>
	
	</div>
	</div>
		</div>
		";
		
		}// END WHILE
		}// END IF
		
		echo"
		
  	 	<div class='strqget' style='background-color:$fadecolor ;border:2px solid $rows[feelsender];>
<p class='mzflashflash'>$rows[message]</p>
  	 	</div>
  	 	</div>
  	 	";
  	 	}// END STRQSENDER $AQ
  	 	
  	 	else if ($rows['strqsender'] == $me)
  	 	{
  	 	 $fadecolor = "rgba(128,0,128,.7)"	;
  	switch( $rows['feelsender']) 	 {
  	 	case "gold":
  	 	 	 $fadecolor = 'rgba(255,215,0,.7)';
  	 	 	 break;
  	 	 	case "orange":
  	 	 	 $fadecolor = 'rgba(255,165,0,.7)';
  	 	 	 break;
  	 	case "red":
  	 	 	 $fadecolor = 'rgba(255,0,0,.7)';
  	 	 	 break;
  	 	case "purple":
  	 	 	 $fadecolor = 'rgba(128,0,128,.7)';  	 	 
  	 	 	 break;	 
  	 	case "dodgerblue":
  	 	 	 $fadecolor = 'rgba(30,144,255,.7)';  	 	 	  
  	 	 	 break;
  	 	case "limegreen":
  	 	 	 $fadecolor = 'rgba(50,205,50,.7)';
  	 	 	 break;
  	 	 case "gray":
  	 	 	 $fadecolor = 'rgba(128,128,128,.7)';
  	 	 	 
  	 	 	 break;
  	 	 	 } // END FADECOLOR SWITCH
  	 	
  	 	
  	 	 $chkicon = "avataricon.png"	;
  	switch( $rows['checkfeel']) 	 {
  	 	case "gold":
  	 	 	 $chkicon = 'avatariconyellow.png';
  	 	 	 break;
  	 	 	case "orange":
  	 	 	 $chkicon = 'avatariconorange.png';
  	 	 	 break;
  	 	case "red":
  	 	 	 $chkicon = 'avatariconred.png';
  	 	 	 break;
  	 	case "purple":
  	 	 	 $chkicon = 'avatariconpurple.png';  	 	 
  	 	 	 break;	 
  	 	case "dodgerblue":
  	 	 	 $chkicon = 'avatariconblue.png';  	 	 	  
  	 	 	 break;
  	 	case "limegreen":
  	 	 	 $chkicon = 'avataricongreen.png';
  	 	 	 break;
  	 	 case "gray":
  	 	 	 $chkicon = 'avataricongray.png';
  	 	 	 
  	 	 	 break;
  	 	 	 } // END CHKICON SWITCH
  	 	
  	 	
  	
  	 	
  	 	
  	 	echo"
  	 	
  	 	<div class='tiempo'>$made</div>
  	 	  	 	 <div class='strqcasesend' >
  	 	  	 	 
  	 	<div class='strqcheckbox'>	  	 	 
  	 	  	 	 
	<div class='strqsend'  style='background-color:$fadecolor ;border:2px solid $rows[feelsender];   '>
<p class='mzflashflash'>$rows[message]  </p> </div>



<!-- ADD TO REFRESH AND NEWSTRQ -->  	 	
  	<div class='didcheckcase'>
  	";
  	
  	if ($rows[id] == $lastid)
  	{
  		echo"<div class='didcheck'  style='background-color: ; opacity:1;' >  ";
  		
  	}
   else
   {
   echo"
<div class='didcheck'  style='background-color: ; opacity:.5;' >  ";
  }   
 
 if ($rows[checkfeel] != '' )
{
	echo"
     
     <img src='$chkicon ' height='100%'>
     ";
     
     
  }


  	echo" 	</div>  
     
     </div>

</div>
<!--END DIDCHECK BLOCK -->





  	 	</div>
  	 	";
     
 
    
    
    
     } // END IF
     
     }// END ELSE IF STRQSENDER $ME
     
     
     
     
     
     
      
	 
  $queryfeel="SELECT feel FROM Users WHERE id = $strqee";
  $resu=mysqli_query($con,$queryfeel);
  $rfee=mysqli_fetch_assoc($resu);
  
  $actfeel = $rfee['feel'];
  
  
 $fadecolora = "rgba(128,0,128,.3)"	;
  	switch( $actfeel) 	 {
  	 	case "gold":
  	 	 	 $fadcolora = 'rgba(255,215,0,.3)';
  	 	 	 break;
  	 	 	case "orange":
  	 	 	 $fadecolora = 'rgba(255,165,0,.3)';
  	 	 	 break;
  	 	case "red":
  	 	 	 $fadecolora = 'rgba(255,0,0,.3)';
  	 	 	 break;
  	 	case "purple":
  	 	 	 $fadecolora = 'rgba(128,0,128,.3)';  	 	 
  	 	 	 break;	 
  	 	case "dodgerblue":
  	 	 	 $fadecolora = 'rgba(30,144,255,.3)';  	 	 	  
  	 	 	 break;
  	 	case "limegreen":
  	 	 	 $fadecolora = 'rgba(50,205,50,.3)';
  	 	 	 break;
  	 	 case "gray":
  	 	 	 $fadecolora = 'rgba(128,128,128,.3)';
  	 	 	 
  	 	 	 break;
  	 	 	 } // END FADECOLOR SWITCH
  	 	
  	 	 
     
     
      $sqlact = "SELECT senderactive1, senderactive2, artist1, artist2 FROM StrqStart WHERE artist1 = $me AND artist2 = $strqee OR artist1 = $strqee AND artist2 = $me";
if ($resultsact = mysqli_query($con, $sqlact))
{
while ($rowact = mysqli_fetch_assoc($resultsact))
{


     
if ($rowact['artist2'] == $me && $rowact['senderactive1'] == 1)
     {
     	
     	
     	echo"
     	 <!-- TESTING ANIMATION FOR ACTIVE MESSAGE BOX -->		

<div id='activestrqnow' class='strqcaseget'    >

  <div class=' strqfrontcube'>
	  	<div  class='scenesmall'>
<div  class='cubesmall'>	

	<div  class='cube-facesmall  cube-face-frontsmall' style='border-color:$actfeel'><img src='$avatar1' height='100%'></div>
	<div  class='cube-facesmall  cube-face-backsmall' style='border-color:$actfeel'><img src='$avatar3' height='100%'></div>
	<div  class='cube-facesmall  cube-face-leftsmall' style='border-color:$actfeel'><img src='$avatar2' height='100%'></div>
	<div  class='cube-facesmall  cube-face-rightsmall' style='border-color:$actfeel'><img src='$avatar4' height='100%'></div>
	
	</div>
	</div>
	   </div><!--END STRQFRONTCUBE-->	
	   
	     	<!--  ANIMATION FOR ACTIVE MESSAGE BOX -->		
		
<div class='strqget' style='background-color:$fadecolora ;border:2px solid $actfeel;   >
	
	  
	  <div class='activemessage'  >
	  
	<div class='strqdots'  id='dotone'>
	</div>
	<div  class='strqdots'  id='dottwo'>
	</div>
	<div  class='strqdots'  id='dotthree'>
	</div>
	
	   </div><!--END ACTIVEMESSAGE-->
	   
		</div>	<!--END STRQGET-->
		
		
		</div>		<!--END STRQCASEGET -->
     	";
     	
     }// END IF ARTIST 2
     else if ($rowact['artist1'] == $me && $rowact['senderactive2'] == 1)
     {
     	
     	
     	echo"
   <!-- TESTING ANIMATION FOR ACTIVE MESSAGE BOX -->		

<div id='activestrqnow' class='strqcaseget'  >

  <div class=' strqfrontcube'>
	  	<div  class='scenesmall'>
<div  class='cubesmall'>	

	<div  class='cube-facesmall  cube-face-frontsmall' style='border-color:$actfeel'><img src='$avatar1' height='100%'></div>
	<div  class='cube-facesmall  cube-face-backsmall' style='border-color:$actfeel'><img src='$avatar3' height='100%'></div>
	<div  class='cube-facesmall  cube-face-leftsmall' style='border-color:$actfeel'><img src='$avatar2' height='100%'></div>
	<div  class='cube-facesmall  cube-face-rightsmall' style='border-color:$actfeel'><img src='$avatar4' height='100%'></div>
	
	</div>
	</div>
	   </div><!--END STRQFRONTCUBE-->	
	   
	     	<!--  ANIMATION FOR ACTIVE MESSAGE BOX -->		
		
<div class='strqget'  style='background-color:$fadecolora ;border:2px solid $actfeel;  >
	
	  
	  <div class='activemessage' >
	  
	<div class='strqdots'  id='dotone'>
	</div>
	<div  class='strqdots'  id='dottwo'>
	</div>
	<div  class='strqdots'  id='dotthree'>
	</div>
	
	   </div><!--END ACTIVEMESSAGE-->
	   
		</div>	<!--END STRQGET-->
		
		
		</div>		<!--END STRQCASEGET -->
     	"; 	 	
     }// END ELSE IF 
  }   // END WHILE
    
    
     
     
     
     
     
     } // END WHILE
     } // END IF
	
	}// INITIAL IF
	
 ?>