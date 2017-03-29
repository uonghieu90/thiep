<?php
$bans=get_ban();
switch($action){
  case "formnhaprohang": 
  case "xemrohang":
  $so1=filter_input(INPUT_GET,"so",FILTER_VALIDATE_INT);
  if($so1!=null)
$so1=($so1-1)*9;
else
	$so1=0;
           
                 $cacrohang=get_rohangs($so1);
				  $them=tablerohang($cacrohang,"rohangid","ngaythang",'rohang');
		include("view/rohangtao.php");
                break;
				
break;
  case "xoarohang":
  
  header("Location:admin.php?action=formnhaprohang");
  break;
}