<?php 

switch($action){

case  "taothiep":              
		$sanpham= array();
		$sanpham["loaiid"]=filter_input(INPUT_POST,"loaiid",FILTER_VALIDATE_INT);
		$sanpham["ten"]=filter_input(INPUT_POST,"ten");
		$sanpham["mieuta"]=filter_input(INPUT_POST,"mieuta");
		$sanpham["mausac"]=filter_input(INPUT_POST,"mausac");
		$sanpham["kichco"]=filter_input(INPUT_POST,"kichco");
		$sanpham["giathanh"]=filter_input(INPUT_POST,"giathanh",FILTER_VALIDATE_INT);
		$sanpham["giamgia"]=filter_input(INPUT_POST,"giamgia",FILTER_VALIDATE_INT); 
                $tentamthoi=$_FILES["file"]["tmp_name"]; 
                $sanpham["hinhanh"]=$_FILES["file"]["name"];                                         
                $name=$path.DIRECTORY_SEPARATOR.$sanpham["hinhanh"];
                 move_uploaded_file($tentamthoi,$name);
                  
		 if ($sanpham["loaiid"]==NULL || $sanpham["ten"]==null || $sanpham["mieuta"]==null|| $sanpham["giathanh"]==null || $sanpham["giamgia"]==null/**/)
		 {
			 baoloi(" lỗi nhập dữ liệu sai");

		 }
	      else
		  {
			  create_sanpham($sanpham);
			  header("Location:admin.php?action=formnhapthiep");			  
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
		$sanpham["mausac"]=filter_input(INPUT_POST,"mausac");
		$sanpham["kichco"]=filter_input(INPUT_POST,"kichco");
                $tentamthoi=$_FILES["file"]["tmp_name"]; 
                $sanpham["hinhanh"]=$_FILES["file"]["name"];                                         
                $name=$path.DIRECTORY_SEPARATOR.$sanpham["hinhanh"];                 
                 if ($sanpham['hinhanh']==NULL){$sanpham['hinhanh']=$sanpham['hinhanh1'];}
                 else{
                  move_uploaded_file($tentamthoi,$name);
                  }
 
		 if ($sanpham["loaiid"]==NULL || $sanpham["ten"]==null || $sanpham["mieuta"]==null|| $sanpham["giathanh"]==null || $sanpham["giamgia"]==null/**/)
		 {
			 baoloi(" lỗi nhập dữ liệu sai");

		 }
	      else
		  { 
			  sua_sanpham($sanpham);
			  header("Location:admin.php?action=formnhapthiep");			  
		  }
		  break;
case "formnhapthiep":
		$so1=filter_input(INPUT_GET,"so",FILTER_VALIDATE_INT);
		if($so1!=null)
$so1=($so1-1)*9;
else
	$so1=0;
                  $cacloai=get_loais();
				  
				  $sanphamtc=get_sanphamtc($so1);
				   $index=0;
				  foreach($sanphamtc AS $sanpham1){
					  foreach($cacloai AS $loai){
						  if($sanpham1['loaiid']==$loai['loaiid'])
						  {
							  
							  $sanphamtc[$index]['loaiid']=$loai['ten'];
							  
						  }
					  }
					  $index++;
				  }
				  
				  $them=tablethiep($sanphamtc,"ten","loaiid","giathanh",'thiepid','sp','mieuta');
                $tieude="Nhap thiep";
				$maus=get_hangtinhchat(3);
				$kichcos=get_hangtinhchat(4);
		         include("view/sanphamtao.php");
                break;
    case  "suasp":case "xuathiep":
				 $sanphamtc=get_sanphamtc();
				 $cacloai=get_loais();
				 $index=0;
				  foreach($sanphamtc AS $sanpham){
					  foreach($cacloai AS $loai){
						  if($sanpham['loaiid']==$loai['loaiid'])
						  {
							  
							  $sanphamtc[$index]['loaiid']=$loai['ten'];
							  
						  }
					  }
					  $index++;
				  }
				 $them=tablethiep($sanphamtc,"ten","loaiid","giathanh",'thiepid','sp','mieuta');
                 $thiepid=filter_input(INPUT_GET,"thiepid",FILTER_VALIDATE_INT);
                if($thiepid==NULL || $thiepid==false) $thiepid=filter_input(INPUT_GET,"id",FILTER_VALIDATE_INT);
		if($thiepid==NULL || $thiepid==false) $thiepid=1;
		$cacloai=get_loais();
		$sanpham=get_sanpham($thiepid);
                $tieude="Sua thiep";
				$maus=get_hangtinhchat(3);
				$kichcos=get_hangtinhchat(4);
		include("view/sanphamtao.php");
                break;
case "xoasp": case "xoathiep":
		$thiepid=filter_input(INPUT_GET,"thiepid",FILTER_VALIDATE_INT);
                 if($thiepid==NULL || $thiepid==false) $thiepid=filter_input(INPUT_GET,"id",FILTER_VALIDATE_INT);
		delete_sanpham($thiepid);
		 header("Location:admin.php?action=formnhapthiep");
		
		break;
		
}