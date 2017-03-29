<?php
$bans=get_ban();
switch($action){
  case "formnhapban": 
  case "suaban":
  $so1=filter_input(INPUT_GET,"so",FILTER_VALIDATE_INT);
  if($so1!=null)
$so1=($so1-1)*9;
else
	$so1=0;
                 $cacban=get_ban2($so1);

				  $them=tableban($cacban,"ten","mieuta",'ban');
		include("view/bantao.php");
                break;
				 case "taoban":
			$banid=filter_input(INPUT_POST,"banid");	
       			
		$ten=filter_input(INPUT_POST,"ten");
		
		$mieuta=filter_input(INPUT_POST,"mieuta");
                if($ten==null)
                 {echo "loi voi ten loai";}
                 else {
		if($banid!=null){suaban($banid,$ten,$mieuta);}
		else{taoban($ten,$mieuta);}
		
		 header("Location:admin.php?action=formnhapban");
		
		
		}
break;
}