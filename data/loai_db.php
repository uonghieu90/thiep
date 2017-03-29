<?php 
function get_loai($offset=0)
{
global $db;
$q="SELECT * FROM chungloai LIMIT 9 OFFSET :off";
$s=$db->prepare($q)	;
$s->bindValue(':off',(int)$offset,PDO::PARAM_INT);
$s->execute();
$cacloai=$s->fetchAll();

$s->closeCursor();
return $cacloai;
	
}
function get_loais($offset=0)
{
global $db;
$q="SELECT * FROM chungloai ";
$s=$db->prepare($q)	;

$s->execute();
$cacloai=$s->fetchAll();

$s->closeCursor();
return $cacloai;
	
}
function get_count_loai2()
{
	global $db;
$q="SELECT COUNT(*) FROM chungloai ";
$s=$db->prepare($q)	;
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;
}
function get_count_ban2()
{
	global $db;
$q="SELECT COUNT(*) FROM ban ";
$s=$db->prepare($q)	;
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;
}

function get_loai_ban($banid)
{
global $db;
$q="SELECT * FROM chungloai WHERE chungloai.ban= :banid";
$s=$db->prepare($q)	;
$s->bindValue(":banid",$banid);
$s->execute();
$cacloai=$s->fetchAll();

$s->closeCursor();
return $cacloai;
	
}
function get_ban()
{
global $db;
$q="SELECT * FROM ban";
$s=$db->prepare($q)	;
$s->execute();
$ban=$s->fetchAll();

$s->closeCursor();

return $ban;
	
}
function get_ban2($offset=0)
{
global $db;
$q="SELECT * FROM ban LIMIT 9 OFFSET :off";
$s=$db->prepare($q)	;
$s->bindValue(':off',(int)$offset,PDO::PARAM_INT);
$s->execute();
$ban=$s->fetchAll();

$s->closeCursor();

return $ban;
	
}


function get_ten_loai($loaiid)
{
global $db;
$q="SELECT * FROM chungloai WHERE loaiid= :loaiid";
$s=$db->prepare($q)	;
$s->bindValue(":loaiid",$loaiid);
$s->execute();
$loai=$s->fetch();
$s->closeCursor();
return $loai;	
	
	
}
function get_ten_loai_ban($banid)
{
global $db;
$q="SELECT * FROM ban WHERE banid= :banid";
$s=$db->prepare($q)	;
$s->bindValue(":banid",$banid);
$s->execute();
$loai=$s->fetch();
$s->closeCursor();
return $loai;	
	
	
}
function sualoai($loaiid,$ten,$mieuta,$ban)
{
global $db;
$q="UPDATE chungloai SET ten=:ten,mieuta=:mieuta,ban=:ban WHERE loaiid=:loaiid";
$s=$db->prepare($q)	;
$s->bindValue(":loaiid",$loaiid);
$s->bindValue(":ten",$ten);
$s->bindValue(":mieuta",$mieuta);
$s->bindValue(":ban",$ban);
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;
	
}
function suaban($banid,$ten,$mieuta)
{
global $db;
$q="UPDATE ban SET ten=:ten,mieuta=:mieuta WHERE banid=:banid";
$s=$db->prepare($q)	;
$s->bindValue(":banid",$banid);
$s->bindValue(":ten",$ten);
$s->bindValue(":mieuta",$mieuta);
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;
	
}
function taoban($ten,$mieuta)
{
global $db;
$q="INSERT INTO ban (ten,mieuta) VALUES 
(:ten,:mieuta)";
$s=$db->prepare($q);
$s->bindValue(":ten",$ten);
$s->bindValue(":mieuta",$mieuta);
$s->execute();
$sodong=$s->fetch();
$s->closeCursor();
return $sodong;
}

function taoloai($ten,$mieuta,$ban)
{
global $db;
$q="INSERT INTO chungloai (ten,mieuta,ban) VALUES 
(:ten,:mieuta,:ban)";
$s=$db->prepare($q);
$s->bindValue(":ten",$ten);
$s->bindValue(":mieuta",$mieuta);
$s->bindValue(":ban",$ban);
$s->execute();
$sodong=$s->fetch();
$s->closeCursor();
return $sodong;
}