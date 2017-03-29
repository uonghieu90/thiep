<?php 
//$action=filter_input(INPUT_POST,"action");
 //echo $action."hohi";
switch($action){

		case "xemsp":
		$thiepid=filter_input(INPUT_GET,"thiepid",FILTER_VALIDATE_INT);
		if($thiepid==NULL || $thiepid==false) $thiepid=filter_input(INPUT_GET,"id",FILTER_VALIDATE_INT);
                 if($thiepid==NULL || $thiepid==false) $thiepid=1;
		$cacloai=get_loai();
		$sanpham=get_sanpham($thiepid);
		$loaiid=$sanpham['loaiid'];
		$loai=get_ten_loai($loaiid); 
		$banid=$loai['ban'];
                $sanpham["checked"]=$sanpham["checked"]+1;
                 tang($thiepid);
				
		include "view/sanpham.php";
		break;
		case "nhanxet":
		$thiepid=filter_input(INPUT_GET,"thiepid",FILTER_VALIDATE_INT);
		$nguoiid=filter_input(INPUT_GET,"nguoiid",FILTER_VALIDATE_INT);
		$mieuta=filter_input(INPUT_GET,"mieuta");
		$sao=filter_input(INPUT_GET,"sao",FILTER_VALIDATE_INT);
		create_nhanxet($thiepid,$nguoiid,$mieuta,$sao);
		 header("Location:.?action=xemsp&thiepid=$thiepid");
		break;

	
		
}