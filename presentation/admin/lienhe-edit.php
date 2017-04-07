<?php
switch($action){
	case "formlienhe":
	getlienhes($action);
	break;
	case "xoalienhe":
	xoalienhe();
	break;
}
function xoalienhe(){
	$id=filter_input(INPUT_GET,"id");
	delete_lienhe($id);
	header("Location:admin.php?action=formlienhe");
}
function getlienhes($action){
	$xem=false;
	$lh="";
	$id=filter_input(INPUT_GET,"id");
	if($id!=null) 
	{$xem=true;
     $lh= get_lienhe2($id);
	}
	
	$so1=filter_input(INPUT_GET,"so",FILTER_VALIDATE_INT);
	 if($so1!=null)
       $so1=($so1-1)*9;
         else
	     $so1=0;
	 $trangs=get_lienhe($so1);
	 $trang['ten']="Liên hệ edit";
      $trang['noidung']="";
	  $them="lienhetao.php";
		include("view/trangmau.php");
                break;
}