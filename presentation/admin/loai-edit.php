<?php
$bans=get_ban();
switch($action){
  case "formnhaploai": 
  case "sualoai":
  $so1=filter_input(INPUT_GET,"so",FILTER_VALIDATE_INT);
  if($so1!=null)
$so1=($so1-1)*9;
else
	$so1=0;
           
                 $cacban=get_ban();
				 
                  $cacloai=get_loai($so1);
				  $index=0;
				  foreach($cacloai AS $loai){
					  foreach($cacban AS $ban){
						  if($loai['ban']==$ban['banid'])
						  {
							  
							  $cacloai[$index]['ban']=$ban['ten'];
							  
						  }
					  }
					  $index++;
				  }
				  $them=tableloai($cacloai,"ten","loaiid","mieuta",'ban','loai');
		include("view/loaitao.php");
                break;
				 case "taoloai":
			$loaiid=filter_input(INPUT_POST,"loaiid");	
       			
		$ten=filter_input(INPUT_POST,"ten");
		$mieuta=filter_input(INPUT_POST,"mieuta");
		$ban=filter_input(INPUT_POST,"ban");
                if($ten==null)
                 {echo "loi voi ten loai";}
                 else {
		if($loaiid!=null){sualoai($loaiid,$ten,$mieuta,$ban);}
		else{taoloai($ten,$mieuta,$ban);}
		
		 header("Location:admin.php?action=formnhaploai");
		
		
		}
break;
}