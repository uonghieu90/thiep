<?php 

function get_count_sanpham()
{
	global $db;
$q="SELECT COUNT(*) FROM sanphamthiep ";
$s=$db->prepare($q)	;
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;
}
function get_count_trangthai($trangthai)
{
	global $db;
$q="SELECT COUNT(*) FROM donhang WHERE trangthai=:trangthai";
$s=$db->prepare($q)	;
$s->bindValue(':trangthai',$trangthai);
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;
}
function get_count_laadmin($laadmin)
{
	global $db;
$q="SELECT COUNT(*) FROM nguoi WHERE laadmin=:laadmin";
$s=$db->prepare($q)	;
$s->bindValue(':laadmin',$laadmin);
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;
}
function get_count_banthiep($ban)
{
	global $db;
$q="SELECT COUNT(*) FROM sanphamthiep JOIN chungloai ON sanphamthiep.loaiid=chungloai.loaiid JOIN ban ON chungloai.ban=ban.banid  WHERE ban.banid=:ban";
$s=$db->prepare($q)	;
$s->bindValue(':ban',$ban);
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;
}






