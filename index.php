<?php 


session_start();
require("data/csdl.php");
require("data/sanpham_db.php");
require("data/loai_db.php");
require("data/thongke_db.php");
require("data/rohang_db.php");
require("data/donhang_db.php");
require("data/sanpham_db_sua.php");
require("data/trang.php");
require("data/nguoi.php");
require("data/nhanxet.php");
require("data/tinhchat.php");
require("data/lienhe.php");
require("data/util.php");
$action=filter_input(INPUT_POST,"action");
$path=getcwd().DIRECTORY_SEPARATOR."image"; 
$trangs=get_trangs();


if($action==NULL)
{
	$action=filter_input(INPUT_GET,"action");
	if($action==NULL)
    {
		$action="xem";
    }
	
}
 if($action=="timgia"||$action=="xemdssp"||$action=="ban"||$action=="xem"||$action=="search")
 include("presentation/loai.php");
elseif ($action=="xemsp"||$action=="nhanxet"){
include("presentation/sanpham.php");
}
elseif ($action=="xoamh"||$action=="chonmh"||$action=="mua"||$action=="xoarohang"||$action=="tratien"||$action=="diachi"||$action=="khangdinh"){
	include("presentation/rohang.php");
}
elseif ($action=="login"||$action=="logout") include("presentation/dangnhap.php");
 elseif (($action=="dangky"||$action=="taonguoi")) include("presentation/dangky.php");
 elseif ($action=="xemtrang"||$action=="gettrangs") include("presentation/trang.php");
  elseif ($action=="tinhchat") include("presentation/tinhchat-control.php");
   elseif($action=="postlienhe") include("presentation/lienhe.php");
 if(isset($_SESSION['laadmin']))
 {
	  if($_SESSION['laadmin']==0)
	  {
		if($action=="suanguoi"||$action=="suadiachi"||$action=="formnhapnguoi"||$action=="formnhapdiachi"||$action=="xoanguoi"||$action=="donhang"||$action=="xemdonhang")
 include("presentation/khachhang-edit.php") ; 
		  
	  }
	 
 }