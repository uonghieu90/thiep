<?php 
$action=filter_input(INPUT_POST,"action");
switch($action){

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
			 baoloi(" l?i nh?p d? li?u sai");

		 }
	      else
		  {
			  create_sanpham($sanpham);
			  header("Location:action.php?action=formnhapthiep");			  
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
			 baoloi(" l?i nh?p d? li?u sai"); echo $type;

		 }
	      else
		  { 
			  sua_sanpham($sanpham);
			  header("Location:action.php?action=formnhapthiep");			  
		  }
		  break;
		  case "formnhapthiep":
                  $cacloai=get_loai();
				  $sanphamtc=get_sanphamtc();$them=table($sanphamtc,"ten","loaiid","giathanh",'thiepid','sp');
                $tieude="Nhap thiep";
		include("view/sanphamtao.php");
                break;
                case  "suasp":case "xuathiep":
                 $thiepid=filter_input(INPUT_GET,"thiepid",FILTER_VALIDATE_INT);
                if($thiepid==NULL || $thiepid==false) $thiepid=filter_input(INPUT_GET,"id",FILTER_VALIDATE_INT);
		if($thiepid==NULL || $thiepid==false) $thiepid=1;
		$cacloai=get_loai();
		$sanphamtc=get_sanphamtc();$them=table($sanphamtc,"ten","loaiid","giathanh",'thiepid','sp');
		$sanpham=get_sanpham($thiepid);
                $tieude="Sua thiep";
		include("view/sanphamtao.php");
                break;
				case "xoasp": case "xoathiep":
		$thiepid=filter_input(INPUT_GET,"thiepid",FILTER_VALIDATE_INT);
                 if($thiepid==NULL || $thiepid==false) $thiepid=filter_input(INPUT_GET,"id",FILTER_VALIDATE_INT);
		delete_sanpham($thiepid);
		 header("Location:action.php?action=formnhapthiep");
		
		break;
		
}