<?php
$so=filter_input(INPUT_GET,"so",FILTER_VALIDATE_INT);
if($so!=null)
$so=($so-1)*9;
else
	$so=0;
switch($action){
 case "gettrangs":
 $trangs=get_trangs_show($so);
 $trang['ten']="thông tin";
 $trang['noidung']="";
 $them="danhsachtrang.php";
 include "view/trangmau.php";
 break;
 case "xemtrang":
       
        if(!isset($trangid))
		$trangid=filter_input(INPUT_GET,"trangid",FILTER_VALIDATE_INT);
		if($trangid==NULL || $trangid==false) $trangid=1;
		$cacloai=get_loai();
		$trang=get_trang($trangid);
                if($trangid==7) {$nguois=get_nguois();$them=table($nguois,"ten","ho","email","id","nguoi");}
                if($trangid==10){$them=table2($_SESSION['mua'],"ten","soluong","gia","thiepid");}
                // if($trangid==12){$trangs1=get_trangs();$them=table($trangs1,'id','ten','menu','id','trang');}
                  if($trangid==11){$them=table3($_SESSION['mua'],"ten","soluong","gia",'thiepid');}
                //  if($trangid==13){$sanphamtc=get_sanphamtc();$them=table($sanphamtc,"ten","loaiid","giathanh",'thiepid','sp');}
		include "view/trang.php";
		break;
		
              
		  }