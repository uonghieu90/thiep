<?php 


session_start();
require("data/csdl.php");
require("data/sanpham_db.php");
require("data/loai_db.php");
require("data/rohang_db.php");
require("data/sanpham_db_sua.php");
require("data/trang.php");
require("data/nguoi.php");
require("data/nhanxet.php");
require("data/util.php");
require("data/tinhchat.php");
require("data/donhang_db.php");
require("data/thongke_db.php");

$action=filter_input(INPUT_POST,"action");
$path=getcwd().DIRECTORY_SEPARATOR."image"; 
$trangs=get_trangs();


if($action==NULL)
{
	$action=filter_input(INPUT_GET,"action");
	if($action==NULL)
    {
		$action="thongke";
    }
}
if((!isset ($_SESSION['laadmin']) || $_SESSION['laadmin']!=1) AND $action!="login")
{$action="xemtrang";
$trangid=5;

}

if($action=="xemtrang") {include("presentation/trang.php");}
elseif($action=="thongke") {include("presentation/admin/thongke-edit.php");}
elseif($action=="formnhaptrang"||$action=="suatrang"||$action=="xoatrang"||$action=="taotrang"||$action=="suatrang1") {include("presentation/admin/trang-edit.php");}
elseif($action=="login"||$action=="logout"){include("presentation/admin/login.php");}
elseif($action=="formnhaploai"||$action=="taoloai"||$action=="sualoai"){include("presentation/admin/loai-edit.php");}
elseif($action=="formnhapban"||$action=="taoban"||$action=="suaban"){include("presentation/admin/ban-edit.php");}
elseif($action=="formnhapthiep"||$action=="taothiep"||$action=="suathiep"||$action=="suasp"||$action=="xoasp"){include("presentation/admin/sanpham-edit.php");}
elseif($action=="formnhapnguoi"||$action=="suanguoi"||$action=="sn"||$action=="xoanguoi"){include("presentation/admin/nguoi-edit.php");}
elseif($action=="formnhaprohang"||$action=="xemrohang"||$action=="xoarohang"){include("presentation/admin/rohang-edit.php");}
elseif($action=="formnhapdonhang"||$action=="xemdonhang2"||$action=="xoadonhang"||$action=="suadonhang"){include("presentation/admin/donhang-edit.php");}