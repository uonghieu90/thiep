<?php 


session_start();
require("mod/csdl.php");
require("mod/sanpham_db.php");
require("mod/loai_db.php");
require("mod/sanpham_db_sua.php");
require("mod/trang.php");
require("mod/nguoi.php");
require("mod/util.php");
$action=filter_input(INPUT_POST,"action");
$path=getcwd().DIRECTORY_SEPARATOR."image"; 
$trangs=get_trangs();
$ten=$_SESSION['ten'];
foreach($trangs as $key=>$trang1){
if($trangs[$key]['lamenu']==0){unset($trangs[$key]);}
if($ten!=null)
{ if($trangs[$key]['lamenu']==2){unset($trangs[$key]);}//khong cho dang nhap
}
if($_SESSION['laadmin']!='1')
{if($trangs[$key]['lamenu']==3){unset($trangs[$key]);} } else //khong cho khong la admin
{if($trangs[$key]['lamenu']==4){unset($trangs[$key]);}}//khong cho admin
}
$tsl=$_SESSION['tsl'];


if($ten==null)
{
$middle=$trangs[2];
unset($trangs[2]);
$trangs[6]=$middle;
unset($trangs[5]);
}

if($action==NULL)
{
	$action=filter_input(INPUT_GET,"action");
	if($action==NULL)
    {
		$action="xemdssp";
    }
	
}
switch($action)
	{
               case "chonmh":
                 $id=filter_input(INPUT_POST,"id");
                  $sl=filter_input(INPUT_POST,"sl");
                 $_SESSION['mua'][$id]['soluong']=$sl;
                 $tong=$_SESSION['mua'][$id]['gia']*$_SESSION['mua'][$id]['soluong'];
                 $tatca;
                     foreach($_SESSION['mua'] as $k)
                   {
                       $tatca+=$k['gia']*$k['soluong'];
                   }
                  $tsl=tinhsoluong();
                 echo json_encode(array('t'=>$tong,'tc'=>$tatca,'tsl'=>$tsl));
                  break;
                case "xoamh":
                 $id=filter_input(INPUT_POST,"id");
                 unset($_SESSION['mua'][$id]);
                 $tatca=0;
                     foreach($_SESSION['mua'] as $k)
                   {
                       $tatca+=$k['gia']*$k['soluong'];
                   }
                    $tsl=tinhsoluong();
                 echo json_encode(array('tc'=>$tatca,'tsl'=>$tsl));
                  break;
                 case "login":
                $ten=filter_input(INPUT_POST,"ten");
                $password=filter_input(INPUT_POST,"password");
                 $nguoi=kiemtra($ten,$password);
                 if($nguoi['ten']==null){
                  baoloi( "nhập thiếu");
                  }
                 else {
                 $_SESSION['ten']=$nguoi['ten'];
                 $_SESSION['laadmin']=$nguoi['laadmin'];
                 header("Location:.");
                  }

                break;
                case "mua":
                 $gia=filter_input(INPUT_GET,"gia");
                 $ten1=filter_input(INPUT_GET,"ten");
                  
                 $id=filter_input(INPUT_GET,"id");
                if($_SESSION['mua'][$id]['gia']==null){
                 $_SESSION['mua'][$id]['gia']=$gia;
                 $_SESSION['mua'][$id]['ten']=$ten1;
                 $_SESSION['mua'][$id]['soluong']=0;
                 $_SESSION['mua'][$id]['thiepid']=$id;
                 }
                 if($_SESSION['mua'][$id]['soluong']<=11)
                 $_SESSION['mua'][$id]['soluong']=$_SESSION['mua'][$id]['soluong']+1;
                 $them=table2($_SESSION['mua'],"ten","soluong","gia",'thiepid');
                  $trang=get_trang(10);
                  $tsl=tinhsoluong();
                     include "view/trang.php";
                  break;
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
                     $_SESSION['ten']=$nguoi['ten'];
                    $ten=$_SESSION['ten'];
                    $trang=get_trang(7);
                    $nguois=get_nguois();$them=table($nguois,"ten","ho","email","id","nguoi");
                     include "view/trang.php";
                  break;
                case "suanguoi":
                   $id=filter_input(INPUT_GET,"id");
                     $nguoi=get_nguoi($id);
                    if($nguoi['laadmin']!=1) unset($nguoi['laadmin']);
                      $them=form($nguoi,"sn");
                       include "view/trang.php";
                       break;
                case "xoanguoi":
                   $id=filter_input(INPUT_GET,"id");
                  delete_nguoi($id);
                  header("Location:.?action=xemtrang&&trangid=7");
                 break;
                case "logout":
                 $_SESSION=array();
               
                 header("Location:.");
                  break;
                case "xemnguoi":
                     $id=filter_input(INPUT_GET,"id");
                    $nguoi=get_nguoi($id);
                     $them=danhsach($nguoi);
                     $trang=get_trang(9);
                     include "view/trang.php";
                  break;
		case "xemdssp":
		$loaiid=filter_input(INPUT_GET,"loaiid",FILTER_VALIDATE_INT);
		if($loaiid==NULL || $loaiid==false) $loaiid=1;
 		$cacloai=get_loai();
		$loai=get_ten_loai($loaiid); 
		$cacsanpham=get_sanpham_loai($loaiid);
 		include "view/danhsach.php";
		break;
               case "timgia":
		$gia=filter_input(INPUT_GET,"gia",FILTER_VALIDATE_INT);
		 if($gia==NULL || $gia==false) $gia=1;
		$cacloai=get_loai();
		$loai=array();
                 $loai["ten"]="gia thanh";
		$cacsanpham=get_sanpham_gia($gia);
		include "view/danhsach.php";
		break;
		case "xemsp":
		$thiepid=filter_input(INPUT_GET,"thiepid",FILTER_VALIDATE_INT);
		if($thiepid==NULL || $thiepid==false) $thiepid=filter_input(INPUT_GET,"id",FILTER_VALIDATE_INT);
                 if($thiepid==NULL || $thiepid==false) $thiepid=1;
		$cacloai=get_loai();
		$sanpham=get_sanpham($thiepid);
                $sanpham["checked"]=$sanpham["checked"]+1;
                 tang($thiepid);
		include "view/sanpham.php";
		break;
                case "xemtrang":
		$trangid=filter_input(INPUT_GET,"trangid",FILTER_VALIDATE_INT);
		if($trangid==NULL || $trangid==false) $trangid=1;
		$cacloai=get_loai();
		$trang=get_trang($trangid);
                if($trangid==7) {$nguois=get_nguois();$them=table($nguois,"ten","ho","email","id","nguoi");}
                if($trangid==10){$them=table2($_SESSION['mua'],"ten","soluong","gia","thiepid");}
                 if($trangid==12){$trangs1=get_trangs();$them=table($trangs1,'id','ten','menu','id','trang');}
                  if($trangid==11){$them=table3($_SESSION['mua'],"ten","soluong","gia",'thiepid');}
                  if($trangid==13){$sanphamtc=get_sanphamtc();$them=table($sanphamtc,"ten","loaiid","giathanh",'thiepid','sp');}
		include "view/trang.php";
		break;
		case  "taothiep":              
		$sanpham= array();
		$sanpham["loaiid"]=filter_input(INPUT_POST,"loaiid",FILTER_VALIDATE_INT);
		$sanpham["ten"]=filter_input(INPUT_POST,"ten");
		$sanpham["mieuta"]=filter_input(INPUT_POST,"mieuta");
		$sanpham["giathanh"]=filter_input(INPUT_POST,"giathanh",FILTER_VALIDATE_INT);
		$sanpham["giamgia"]=filter_input(INPUT_POST,"giamgia",FILTER_VALIDATE_INT); 
                $tentamthoi=$_FILES["file"]["tmp_name"]; 
                $sanpham["hinhanh"]=$_FILES["file"]["name"];                                         
                $name=$path.DIRECTORY_SEPARATOR.$sanpham["hinhanh"];
                 move_uploaded_file($tentamthoi,$name);
                  
		 if ($sanpham["loaiid"]==NULL || $sanpham["ten"]==null || $sanpham["mieuta"]==null|| $sanpham["giathanh"]==null || $sanpham["giamgia"]==null/**/)
		 {
			 baoloi(" lỗi nhập dữ liệu sai");

		 }
	      else
		  {
			  create_sanpham($sanpham);
			  header("Location:.?loaiid=$sanpham[loaiid]");			  
		  }
		  break;
               case  "taotrang":              
		$trang= array();
		$trang["vitri"]=filter_input(INPUT_POST,"vitri",FILTER_VALIDATE_INT);
		$trang["ten"]=filter_input(INPUT_POST,"ten");
		$trang["noidung"]=filter_input(INPUT_POST,"noidung");
                 $trang["menu"]=filter_input(INPUT_POST,"menu");
                $trang["lamenu"]=filter_input(INPUT_POST,"lamenu",FILTER_VALIDATE_INT);
		 if ($trang["vitri"]==NULL || $trang["ten"]==null || $trang["noidung"]==null|| $trang["menu"]==null/**/)
		 {
			 baoloi(" lỗi nhập dữ liệu sai");

		 }
	      else
		  {
			  create_trang($trang);
			  header("Location:.");			  
		  }
		  break;
              case  "taonguoi":              
		$trang= array();
		$nguoi["ten"]=filter_input(INPUT_POST,"ten");
		$nguoi["ho"]=filter_input(INPUT_POST,"ho");
		$nguoi["diachi"]=filter_input(INPUT_POST,"diachi");
                 $nguoi["dt"]=filter_input(INPUT_POST,"dt");
                $nguoi["email"]=filter_input(INPUT_POST,"email");
                 $nguoi["password"]=filter_input(INPUT_POST,"password");
		 if ($nguoi["ten"]==null||$nguoi["ho"]==null||$nguoi["diachi"]==null||$nguoi["dt"]==null||$nguoi["email"]==null|| $nguoi["password"]==null)
		 {
			 baoloi(" lỗi nhập dữ liệu sai"); echo $type;

		 }
	      else
		  {
			  create_nguoi($nguoi);
			  header("Location:.");			  
		  }
		  break;
              case  "suathiep":              
		$sanpham= array();
                $sanpham["hinhanh1"]=filter_input(INPUT_POST,"thiepha");
                $sanpham["thiepid"]=filter_input(INPUT_POST,"thiepid",FILTER_VALIDATE_INT);
		$sanpham["loaiid"]=filter_input(INPUT_POST,"loaiid",FILTER_VALIDATE_INT);
		$sanpham["ten"]=filter_input(INPUT_POST,"ten");
		$sanpham["mieuta"]=filter_input(INPUT_POST,"mieuta");
		$sanpham["giathanh"]=filter_input(INPUT_POST,"giathanh",FILTER_VALIDATE_INT);
		$sanpham["giamgia"]=filter_input(INPUT_POST,"giamgia",FILTER_VALIDATE_INT); 
                $tentamthoi=$_FILES["file"]["tmp_name"]; 
                $sanpham["hinhanh"]=$_FILES["file"]["name"];                                         
                $name=$path.DIRECTORY_SEPARATOR.$sanpham["hinhanh"];                 
                 if ($sanpham['hinhanh']==NULL){$sanpham['hinhanh']=$sanpham['hinhanh1'];}
                 else{
                  move_uploaded_file($tentamthoi,$name);
                  }
 
		 if ($sanpham["loaiid"]==NULL || $sanpham["ten"]==null || $sanpham["mieuta"]==null|| $sanpham["giathanh"]==null || $sanpham["giamgia"]==null/**/)
		 {
			 baoloi(" lỗi nhập dữ liệu sai"); echo $type;

		 }
	      else
		  { 
			  sua_sanpham($sanpham);
			  header("Location:.?action=xemsp&thiepid=$sanpham[thiepid]");			  
		  }
		  break;
                     case "suatrang1":              
		$trang= array();
                $trang["id"]=filter_input(INPUT_POST,"id");
		$trang["ten"]=filter_input(INPUT_POST,"ten");
		$trang["noidung"]=filter_input(INPUT_POST,"noidung");
		$trang["vitri"]=filter_input(INPUT_POST,"vitri",FILTER_VALIDATE_INT);
		$trang["menu"]=filter_input(INPUT_POST,"menu");                  
                 $trang["lamenu"]=filter_input(INPUT_POST,"lamenu",FILTER_VALIDATE_INT);
		 if ( $trang["ten"]==null || $trang["noidung"]==null|| $trang["vitri"]==null || $trang["menu"]==null/**/)
		 {
			 baoloi(" lỗi nhập dữ liệu sai"); 

		 }
	      else
		  { 
			  sua_trang($trang);
			  header("Location:.?action=xemtrang&trangid=$trang[id]");			  
		  }
		  break;
		 case "xoasp": case "xoathiep":
		$thiepid=filter_input(INPUT_GET,"thiepid",FILTER_VALIDATE_INT);
                 if($thiepid==NULL || $thiepid==false) $thiepid=filter_input(INPUT_GET,"id",FILTER_VALIDATE_INT);
		delete_sanpham($thiepid);
		 header("Location:.");
		
		break;
                case "xoatrang":
		$id=filter_input(INPUT_GET,"trangid",FILTER_VALIDATE_INT);
		delete_trang($id);
		 header("Location:.");
		
		break;
                  case "taoloai":
		$tenloai=filter_input(INPUT_POST,"tenloai");
                if($tenloai==null)
                 {echo "loi voi ten loai";}
                 else {
		taoloai($tenloai);
		 header("Location:.");
		}
		break;
		case "formnhapthiep":
                  $cacloai=get_loai();
                $tieude="Nhap thiep";
		include("view/sanphamtao.php");
                break;
                case  "suasp":case "xuathiep":
                 $thiepid=filter_input(INPUT_GET,"thiepid",FILTER_VALIDATE_INT);
                if($thiepid==NULL || $thiepid==false) $thiepid=filter_input(INPUT_GET,"id",FILTER_VALIDATE_INT);
		if($thiepid==NULL || $thiepid==false) $thiepid=1;
		$cacloai=get_loai();
		$sanpham=get_sanpham($thiepid);
                $tieude="Sua thiep";
		include("view/sanphamtao.php");
                break;
               case "suatrang":
                 $trangid=filter_input(INPUT_GET,"trangid",FILTER_VALIDATE_INT);
		if($trangid==NULL || $trangid==false) $trangid=1;
		$cacloai=get_loai();
		$trang=get_trang($trangid);
                $tieude="Sua trang";
		include("view/nhaptrang.php");
                break;
                case "formnhaploai":
                  $cacloai=get_loai();
		include("view/loaitao.php");
                break;
                  case "formnhaptrang":
                  $cacloai=get_loai();
                 $tieude="tao trang";
		include("view/nhaptrang.php");
                break;
		default: break;
		
	}
?>