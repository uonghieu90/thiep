<?php
switch($action){
 case "formnhapdonhang": case "xemdonhang2":
				  
				 
				  $trang['ten']="Đơn hàng";
			   
	  
             $them="donhang.php"	 ;
	         $trang["noidung"]="";
      	include ("view/trangmau.php");
		break;
		case "xoadonhang":			
               		$donhangid=filter_input(INPUT_GET,"donhangid");
				 delete_donhang($donhangid);
				  $trang['ten']="Đơn hàng";
			   
	  
             $them="donhang.php"	 ;
			 
	         $trang["noidung"]="";
      	include ("view/trangmau.php");
		break;
		case "suadonhang":	
 		
               		$donhangid=filter_input(INPUT_GET,"donhangid");
				 $trangthai=filter_input(INPUT_GET,"trangthai");
				 sua_donhang($donhangid,$trangthai);
				  $trang['ten']="Đơn hàng";
			   
	  
             $them="donhang.php"	 ;
			 
	         $trang["noidung"]="";
      	include ("view/trangmau.php");
				  
break;}