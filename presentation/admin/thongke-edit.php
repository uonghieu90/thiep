<?php

switch($action){
  case "thongke": 
$trang['ten']="Thống kê";
$trang['noidung']="";
$sosp=get_count_sanpham();
$song=get_count_nguoi();
$sodh=get_count_donhang();
$sorh=get_count_rohang();
$dhtt=get_count_trangthai(1);
$dhktt=get_count_trangthai(0);
$dhvc=get_count_trangthai(2);
$cacban=get_ban2(0);
$laadmin=get_count_laadmin(1);
$klaadmin=get_count_laadmin(0);
//$soban=get_count_ban();
//$soloai=get_count_loai();
$trang['noidung'].="<h4> Sản phẩm </h4>";
$trang['noidung'].="Số sản phẩm:$sosp[0]</br>";
$trang['noidung'].="<h6> Ban </h6>";
for($i=0;$i<sizeof($cacban);$i++)
{      $sob=get_count_banthiep($cacban[$i]['banid']);
	$trang['noidung'].="".$cacban[$i]['ten'].":$sob[0] thiếp</br>";
}
$trang['noidung'].="<h4> Thành viên </h4>";
$trang['noidung'].="Số thành viên:$song[0]</br>";
$trang['noidung'].="Số thành viên la admin:$laadmin[0]</br>";
$trang['noidung'].="Số thành viên bình thường:$klaadmin[0]</br>";
$trang['noidung'].="<h4> Đơn hàng </h4>";
$trang['noidung'].="Số đơn hàng:$sodh[0]</br>";
$trang['noidung'].="Số đơn hàng vận chuyển :$dhvc[0]</br>";
$trang['noidung'].="Số đơn hàng trả tiền :$dhtt[0]</br>";
$trang['noidung'].="Số đơn hàng chưa trả tiền :$dhktt[0]</br>";
$trang['noidung'].="Số rỏ hàng:$sorh[0]</br>";

		include("view/trangmau.php");
                break;

		
break;
}