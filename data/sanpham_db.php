<?php 
function get_sanpham($thiepid)
{
global $db;
$q="SELECT * FROM sanphamthiep WHERE thiepid= :thiepid";
$s=$db->prepare($q)	;
$s->bindValue(":thiepid",$thiepid);
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;
	
}
function get_hangtinhchat($tinhchat)
{
global $db;
$q="SELECT * FROM hang_tinhchat WHERE tinhchat= :tinhchat";
$s=$db->prepare($q)	;
$s->bindValue(":tinhchat",$tinhchat);
$s->execute();
$product=$s->fetchAll();
$s->closeCursor();
return $product;
	
}


function get_sanpham_random()
{
global $db;
$q="SELECT * FROM sanphamthiep ORDER BY RAND() LIMIT 3 ";
$s=$db->prepare($q)	;
$s->execute();
$product=$s->fetchAll();
$s->closeCursor();
return $product;
	
}
function get_count()
{
	global $db;
$q="SELECT COUNT(*) FROM sanphamthiep ";
$s=$db->prepare($q)	;
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;
}
function get_count_ban($banid)
{
	global $db;
$q="SELECT COUNT(*) FROM sanphamthiep JOIN chungloai ON sanphamthiep.loaiid=chungloai.loaiid WHERE chungloai.ban= :banid";
$s=$db->prepare($q)	;
$s->bindValue(":banid",$banid);
$s->execute();
$product=$s->fetch();

$s->closeCursor();
return $product;	
	
}
function get_count_loai($loaiid)
{
global $db;
$q="SELECT COUNT(*) FROM sanphamthiep WHERE loaiid= :loaiid";
$s=$db->prepare($q)	;
$s->bindValue(":loaiid",$loaiid);
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;	
	
	
}
function get($offset=0)
{
	
global $db;
$q="SELECT * FROM sanphamthiep LIMIT 9 OFFSET :off";
$s=$db->prepare($q)	;
$s->bindValue(':off',(int)$offset,PDO::PARAM_INT);
$s->execute();
$products=$s->fetchAll();
$s->closeCursor();
return $products;	
	
	
}
function get_sanpham_loai($loaiid,$offset=0)
{
global $db;
$q="SELECT * FROM sanphamthiep WHERE loaiid= :loaiid LIMIT 9 OFFSET :off";
$s=$db->prepare($q)	;
$s->bindValue(":loaiid",$loaiid);
$s->bindValue(':off',(int)$offset,PDO::PARAM_INT);
$s->execute();
$products=$s->fetchAll();
$s->closeCursor();
return $products;	
	
	
}
function get_sanpham_search($tu,$offset=0)
{
global $db;
$q="SELECT * FROM sanphamthiep WHERE MATCH (ten,mieuta) AGAINST (:tu IN BOOLEAN MODE) LIMIT 9 OFFSET :off";
$s=$db->prepare($q)	;
$s->bindValue(":tu",$tu);
$s->bindValue(':off',(int)$offset,PDO::PARAM_INT);
$s->execute();
$products=$s->fetchAll();
$s->closeCursor();
return $products;	
	
	
}
function get_sanpham_ban($banid,$offset=0)
{
global $db;
$q="SELECT sanphamthiep.* FROM sanphamthiep JOIN chungloai ON sanphamthiep.loaiid=chungloai.loaiid WHERE chungloai.ban= :banid LIMIT 9 OFFSET :off";
$s=$db->prepare($q)	;
$s->bindValue(":banid",$banid);
$s->bindValue(':off',(int)$offset,PDO::PARAM_INT);
$s->execute();
$products=$s->fetchAll();

$s->closeCursor();
return $products;	
	
	
}
function get_sanphamtc($offset=0)
{
global $db;
$q="SELECT * FROM sanphamthiep LIMIT 9 OFFSET :off";
$s=$db->prepare($q)	;
$s->bindValue(':off',(int)$offset,PDO::PARAM_INT);
$s->execute();
$products=$s->fetchAll();
$s->closeCursor();
return $products;	
	
	
}
function get_tinhchat($id){
global $db;
$q="SELECT * FROM  hang_tinhchat WHERE id= :id";
$s=$db->prepare($q)	;
$s->bindValue(':id',$id,PDO::PARAM_INT);
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;	
}
function get_sanpham_tinhchat($gia=0,$sao=0,$mau=0,$kichco=0,$offset=0)
{
global $db;
$gia1=get_tinhchat($gia);
$sao1=get_tinhchat($sao);
$mau1=get_tinhchat($mau);
$kichco1=get_tinhchat($kichco);
$q="SELECT * FROM sanphamthiep WHERE ";
$i=0;
if($gia!=0){
	
	$q.="(giathanh-giamgia)>= :g1 and (giathanh-giamgia)<= :g2";$i=1;
}
if($sao!=0){
	if($i==1) $q.=" and ";
	//$q.="sao>= :s1 and sao<= :s2";
	$q.="sao>=:s1 and sao<=:s2";
	$i=1;
}
if($mau!=0){
	if($i==1) $q.=" and ";
	$q.="mausac=:m1";
	$i=1;
}
if($kichco!=0){
	if($i==1) $q.=" and ";
	$q.="kichco=:c1";
	$i=1;
}
$s=$db->prepare($q)	;
if($gia!=0){
$s->bindValue(":g1",$gia1['thap']);
$s->bindValue(":g2",$gia1['cao']);
}
if($sao!=0){
$s->bindValue(":s1",$sao1['thap']);
$s->bindValue(":s2",$sao1['cao']);
}
if($mau!=0){
$s->bindValue(":m1",$mau1['ten']);
}
if($kichco!=0){
$s->bindValue(":c1",$kichco1['ten']);
}
$s->execute();
$products=$s->fetchAll();
$s->closeCursor();
return $products;		
}



function get_sanpham_gia($gia,$offset=0)
{
global $db;
switch($gia){ 
case 1:$g1=5;$g2=10; break;
case 2:$g1=11;$g2=15; break;
case 3:$g1=16;$g2=20; break;
case 4:$g1=21;$g2=25; break;
default: $g1=5;$g2=10; break;}
$q="SELECT * FROM sanphamthiep WHERE (giathanh-giamgia)>= :g1 and (giathanh-giamgia)<= :g2 LIMIT 9 OFFSET :off ";
$s=$db->prepare($q)	;
$s->bindValue(":g1",$g1);
$s->bindValue(":g2",$g2);
$s->bindValue(':off',(int)$offset,PDO::PARAM_INT);
$s->execute();
$products=$s->fetchAll();
$s->closeCursor();
return $products;		
}
function get_count_gia($gia)
{
global $db;
switch($gia){ 
case 1:$g1=5;$g2=10; break;
case 2:$g1=11;$g2=15; break;
case 3:$g1=16;$g2=20; break;
case 4:$g1=21;$g2=25; break;
default: $g1=5;$g2=10; break;}
$q="SELECT COUNT(*) FROM sanphamthiep WHERE (giathanh-giamgia)>= :g1 and (giathanh-giamgia)<= :g2 ";
$s=$db->prepare($q)	;
$s->bindValue(":g1",$g1);
$s->bindValue(":g2",$g2);
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;	
	
	
}