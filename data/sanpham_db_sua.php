<?php 
function create_sanpham($sanpham)
{
global $db;
$q="INSERT INTO sanphamthiep (loaiid,ten,mieuta,giathanh,giamgia,hinhanh,mausac,kichco) VALUES 
(:loaiid,:ten,:mieuta,:giathanh,:giamgia,:hinhanh,:mausac,:kichco)";
$s=$db->prepare($q)	;
$s->bindValue(":loaiid",$sanpham["loaiid"]);
$s->bindValue(":ten",$sanpham["ten"]);
$s->bindValue(":mieuta",$sanpham["mieuta"]);
$s->bindValue(":giathanh",$sanpham["giathanh"]);
$s->bindValue(":giamgia",$sanpham["giamgia"]);
$s->bindValue(":hinhanh",$sanpham["hinhanh"]);
$s->bindValue(":mausac",$sanpham["mausac"]);
$s->bindValue(":kichco",$sanpham["kichco"]);
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;
	
}
function sua_sanpham($sanpham)
{
global $db;
$q="UPDATE sanphamthiep SET loaiid=:loaiid,ten=:ten,mieuta=:mieuta,giathanh=:giathanh,giamgia=:giamgia,hinhanh=:hinhanh,mausac=:mausac,kichco=:kichco WHERE 
thiepid=:thiepid";
$s=$db->prepare($q)	;
$s->bindValue(":loaiid",$sanpham["loaiid"]);
$s->bindValue(":ten",$sanpham["ten"]);
$s->bindValue(":mieuta",$sanpham["mieuta"]);
$s->bindValue(":giathanh",$sanpham["giathanh"]);
$s->bindValue(":giamgia",$sanpham["giamgia"]);
$s->bindValue(":hinhanh",$sanpham["hinhanh"]);
$s->bindValue(":thiepid",$sanpham["thiepid"]);
$s->bindValue(":mausac",$sanpham["mausac"]);
$s->bindValue(":kichco",$sanpham["kichco"]);
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;
	
}
function delete_sanpham($thiepid)
{
global $db;
$q="DELETE FROM sanphamthiep WHERE thiepid= :thiepid";
$s=$db->prepare($q)	;
$s->bindValue(":thiepid",$thiepid);
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;	
	
	
}
function tang($thiepid)
{
global $db;
$q="UPDATE sanphamthiep SET checked=checked+1 WHERE thiepid=:thiepid";
$s=$db->prepare($q);
$s->bindValue(":thiepid",$thiepid);
$s->execute();
$kq=$s->fetch();
$s->closeCursor();
return $kq;	
}