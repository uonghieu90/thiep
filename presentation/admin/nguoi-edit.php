<?php
switch($action){
                  case "sn":
                   $nguoi["id"]=filter_input(INPUT_GET,"id");
                   $nguoi["ten"]=filter_input(INPUT_GET,"ten");
                  $nguoi["ho"]=filter_input(INPUT_GET,"ho");
                   $nguoi["diachi"]=filter_input(INPUT_GET,"diachi");
                     $nguoi["dt"]=filter_input(INPUT_GET,"dt");
                    $nguoi["email"]=filter_input(INPUT_GET,"email");
                   $nguoi["password"]=filter_input(INPUT_GET,"password");
                    $nguoi["laadmin"]=filter_input(INPUT_GET,"laadmin");
                      sua_nguoi($nguoi);
                  header("Location:admin.php?action=formnhapnguoi");
                  break;
				  case "formnhapnguoi": case "suanguoi":
				  $id=filter_input(INPUT_GET,"id");
				  if($id!=null){
				  $nguoi=get_nguoi($id);
				  $them2=form($nguoi,"sn");
				  $tieude="Sửa người";
				  }
				  $so1=filter_input(INPUT_GET,"so",FILTER_VALIDATE_INT);
				  if($so1!=null)
$so1=($so1-1)*9;
else
	$so1=0;
           
				  $nguois=get_nguois($so1);$them=tablenguoi($nguois,"ten","ho","email","id","nguoi");
				  
                     include "view/nguoitao.php";
					 break;
                case "xoanguoi":
                   $id=filter_input(INPUT_GET,"id");
                  delete_nguoi($id);
                  header("Location:admin.php?action=formnhapnguoi");
                 break;
				
				
}