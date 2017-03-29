 <?php $action=filter_input(INPUT_POST,"action");

if($action==NULL)
{
	$action=filter_input(INPUT_GET,"action");
	if($action==NULL)
    {
		$action="xem";
    }
	
}
$so=filter_input(INPUT_GET,"so",FILTER_VALIDATE_INT);
if($so!=null)
$so=($so-1)*9;
else
	$so=0;

 switch($action){
	 case "ban":
		$banid=filter_input(INPUT_GET,"banid",FILTER_VALIDATE_INT);
		if($banid==NULL || $banid==false) $banid=1;
 	
		$loai=get_ten_loai_ban($banid); 
		$cacsanpham=get_sanpham_ban($banid,$so);
		
 		include "view/danhsach.php";
		
		break;
		case "xem":
		$loai["ten"]="Cac loai thiep";
				 $loai['mieuta']="cac thiep ";
		
		$cacsanpham=get($so);
 		include "view/danhsach.php";
		break;
case "xemdssp":
		$loaiid=filter_input(INPUT_GET,"loaiid",FILTER_VALIDATE_INT);
		if($loaiid==NULL || $loaiid==false) $loaiid=1;
 		$cacloai=get_loai();
		$loai=get_ten_loai($loaiid); 
		$banid=$loai['ban'];
		$cacsanpham=get_sanpham_loai($loaiid,$so);
 		include "view/danhsach.php";
		break;
 case "timgia":
		$gia=filter_input(INPUT_GET,"gia",FILTER_VALIDATE_INT);
		 if($gia==NULL || $gia==false) $gia=1;
		$cacloai=get_loai();
		$loai=array();
                 $loai["ten"]="gia thanh";
				 $loai['mieuta']="cac thiep nam trong khoang gia thanh";
		$cacsanpham=get_sanpham_gia($gia,$so);
		include "view/danhsach.php";
		break;
		case "search":
		$tu=filter_input(INPUT_GET,"tu");
		 if($tu==NULL || $tu==false) $tu="";
		$loai=array();
                 $loai["ten"]="tim kiem";
				 $loai['mieuta']="cac thiep co tu tuong tu";
				 
		$cacsanpham=get_sanpham_search($tu,$so);
		include "view/danhsach.php";
		break;
}
