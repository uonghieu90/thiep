<?php
switch($action){
                  case "suanguoi":case "suadiachi":
                   $nguoi["id"]=filter_input(INPUT_GET,"id");
				   if($action=="suanguoi"){
                   $nguoi["ten"]=filter_input(INPUT_GET,"ten");
                  $nguoi["ho"]=filter_input(INPUT_GET,"ho");
                    $nguoi["email"]=filter_input(INPUT_GET,"email");
                   $nguoi["password"]=filter_input(INPUT_GET,"password");
				   sua_khach($nguoi);
				   }
				   
				   if($action=="suadiachi"){
				   $nguoi["diachi"]=filter_input(INPUT_GET,"diachi");
                     $nguoi["dt"]=filter_input(INPUT_GET,"dt");
					 sua_khach_diachi($nguoi);
                   }
                      
                  header("Location:index.php?action=formnhapnguoi");
                  break;
				  case "formnhapnguoi": case "formnhapdiachi":
				  $id=$_SESSION['id'];
				  if($id!=null){
				  $nguoi=get_nguoi($id);
				  }
				  if($action=="formnhapnguoi")
				  $trang['ten']="Sửa người";
			      else $trang['ten']="Sửa địa chỉ";
	  
      $them="trinhsua.php"	 ;
	  $trang["noidung"]="";
      	include "view/trangmau.php";
				  
					 break;
					 
					 case "donhang": case "xemdonhang":
				  $id=$_SESSION['id'];
				  if($id!=null){
				  $nguoi=get_nguoi($id);
				  }
				 
				  $trang['ten']="Đơn hàng";
			   
	  
      $them="donhang.php"	 ;
	  $trang["noidung"]="";
      	include "view/trangmau.php";
				  
					 break;
					 
                case "xoanguoi":
                   $id=$_SESSION['id'];
				   $_SESSION=array();
                  delete_nguoi($id);
                  header("Location:index.php");
                 break;
				
				
}