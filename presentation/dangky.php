<?php 
switch($action){
 case  "taonguoi":              
		$trang= array();
		$nguoi["ten"]=filter_input(INPUT_POST,"ten");
		$nguoi["ho"]=filter_input(INPUT_POST,"ho");
		//$nguoi["diachi"]=filter_input(INPUT_POST,"diachi");
              //   $nguoi["dt"]=filter_input(INPUT_POST,"dt");
                $nguoi["email"]=filter_input(INPUT_POST,"email");
                 $nguoi["password"]=filter_input(INPUT_POST,"password");
				 $trave=kiemtrakhachemail($nguoi["email"]);
				 //echo $trave['ten'];
		 if ($nguoi["ten"]==null||$nguoi["ho"]==null||$nguoi["email"]==null|| $nguoi["password"]==null||$trave['ten']!=null)
		 {
			 baoloi(" l?i nh?p d? li?u sai"); echo $type;

		 }
	      else
		  {
			  tao_nguoi($nguoi);
			  
			  header("Location:.");			  
		  }
		  break;
case "dangky"	:
      $trang['ten']="Đăng ký";
	  
      $them="dangnhap.php"	 ;
	  $trang["noidung"]="";
      	include "view/trangmau.php";  
}