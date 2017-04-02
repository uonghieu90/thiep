<?php 
switch($action){

               case  "taotrang":              
		$trang= array();
		//$trang["vitri"]=filter_input(INPUT_POST,"vitri",FILTER_VALIDATE_INT);
		$trang["ten"]=filter_input(INPUT_POST,"ten");
		$trang["noidung"]=filter_input(INPUT_POST,"noidung");
                 $trang["menu"]=filter_input(INPUT_POST,"menu");
				  $trang["tacgia"]=filter_input(INPUT_POST,"tacgia");
              $trang["thongtin"]=filter_input(INPUT_POST,"thongtin");
		 if ( $trang["ten"]==null || $trang["noidung"]==null|| $trang["menu"]==null/**/)
		 {
			 baoloi(" l?i nh?p d? li?u sai");

		 }
	      else
		  {
			  create_trang($trang); echo"memay";
			 header("Location:admin.php?action=formnhaptrang");			  
		  }
		  break;
		   case "suatrang1":              
		$trang= array();
                $trang["id"]=filter_input(INPUT_POST,"id");
		$trang["ten"]=filter_input(INPUT_POST,"ten");
		$trang["noidung"]=filter_input(INPUT_POST,"noidung");
		$trang["menu"]=filter_input(INPUT_POST,"menu");                  
				  $trang["tacgia"]=filter_input(INPUT_POST,"tacgia");
              $trang["thongtin"]=filter_input(INPUT_POST,"thongtin");
		 if ($trang["id"]==null|| $trang["ten"]==null || $trang["noidung"]==null || $trang["menu"]==null/**/)
		 {
			 baoloi(" l?i nh?p d? li?u sai"); 

		 }
	      else
		  { 
			  sua_trang($trang);
	         header("Location:admin.php?action=formnhaptrang");			  		  
		  }
		  break;
		   case "xoatrang":
		$id=filter_input(INPUT_GET,"trangid",FILTER_VALIDATE_INT);
		
		delete_trang($id);
		 header("Location:admin.php?action=formnhaptrang");
		
		break;
		case "suatrang":
		$sua=true;
                 $trangid=filter_input(INPUT_GET,"trangid",FILTER_VALIDATE_INT);
		$tr1=get_trang($trangid);
       
		case "formnhaptrang":
		if(!isset($sua)){
		
		$tr1=array("ten"=>"","noidung"=>"","menu"=>"","thongtin"=>"1","tacgia"=>"");
		$sua=false;}
		$so1=filter_input(INPUT_GET,"so",FILTER_VALIDATE_INT);
	 if($so1!=null)
       $so1=($so1-1)*9;
         else
	     $so1=0;
                  $trang['ten']="Trang edit";
				  $trang['noidung']="";
				  $trangs=get_trang_offset($so1);
                 $them="trangtao.php";
		include("view/trangmau.php");
                break;
		  }