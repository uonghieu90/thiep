<?php

function tao_donhang($nguoi)
{
global $db;
$q="INSERT INTO donhang (nguoiid,ngaythang) VALUES 
(:nguoiid,CURDATE())";
$s=$db->prepare($q)	;
$s->bindValue(":nguoiid",$nguoi);
$s->execute();
$product=$s->fetch(PDO::FETCH_ASSOC);
$product=$db->lastInsertId();
$s->closeCursor();
return $product;	
}
function create_donhang($donhangid,$gia,$ten,$thiepid,$soluong)
{
global $db;
$q="INSERT INTO hang_donhang (donhangid,gia,ten,thiepid,soluong) VALUES 
(:donhangid,:gia,:ten,:thiepid,:soluong)";
$s=$db->prepare($q)	;
$s->bindValue(":donhangid",$donhangid);
$s->bindValue(":gia",$gia);
$s->bindValue(":ten",$ten);
$s->bindValue(":thiepid",$thiepid);
$s->bindValue(":soluong",$soluong);
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;
	
}

function get_donhang2($nguoi)
{
global $db;
$q="SELECT * FROM donhang WHERE nguoiid= :nguoi";
$s=$db->prepare($q)	;
$s->bindValue(":nguoi",$nguoi);
$s->execute();
$product=$s->fetchAll();
$s->closeCursor();

	return $product;
}
function get_donhang($offset=0)
{
global $db;
$q="SELECT * FROM donhang LIMIT 9 OFFSET :off";
$s=$db->prepare($q)	;
$s->bindValue(':off',(int)$offset,PDO::PARAM_INT);
$s->execute();
$product=$s->fetchAll();
$s->closeCursor();

	return $product;
}
function show_donhang($donhangid)
{
global $db;
$q="SELECT * FROM hang_donhang WHERE donhangid= :donhangid ";
$s=$db->prepare($q)	;
$s->bindValue(":donhangid",$donhangid);
$s->execute();
$product=$s->fetchAll();
$s->closeCursor();	
return $product;
}

function recommend_donhang($thiepid)
{
global $db;
$q="SELECT d2.thiepid,d2.ten,COUNT(d2.thiepid) FROM hang_donhang d1 JOIN hang_donhang d2 ON d1.donhangid=d2.donhangid WHERE d1.thiepid= :thiepid AND d2.thiepid!= :thiepid GROUP BY d2.thiepid ORDER BY COUNT(d2.thiepid) DESC LIMIT 5";
$s=$db->prepare($q)	;
$s->bindValue(":thiepid",$thiepid);
$s->execute();
$product=$s->fetchAll();
$s->closeCursor();	
return $product;
}
function recommend_rohang($rohangid)
{
global $db;
$q="SELECT d1.thiepid,d1.ten,COUNT(d1.thiepid) FROM hang_donhang d1 JOIN hang_donhang d2 ON d1.donhangid=d2.donhangid JOIN hang_rohang ON d2.thiepid=hang_rohang.thiepid WHERE hang_rohang.rohangid= :rohangid AND d1.thiepid NOT IN(SELECT thiepid FROM hang_rohang WHERE rohangid= :rohangid) GROUP BY d1.thiepid ORDER BY COUNT(d1.thiepid) DESC LIMIT 5";
$s=$db->prepare($q)	;
$s->bindValue(":rohangid",$rohangid);
$s->execute();
$product=$s->fetchAll();
$s->closeCursor();	
return $product;
}

function delete_donhang($donhangid)
{
global $db;
$q="DELETE FROM hang_donhang WHERE donhangid= :donhangid";
$s=$db->prepare($q)	;
$s->bindValue(":donhangid",$donhangid);
$s->execute();
$product=$s->fetch();
$s->closeCursor();

global $db;
$q="DELETE FROM donhang WHERE donhangid= :donhangid";
$s=$db->prepare($q)	;
$s->bindValue(":donhangid",$donhangid);
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;		
}
function get_count_donhang()
{
	global $db;
$q="SELECT COUNT(*) FROM donhang ";
$s=$db->prepare($q)	;
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;
}
function sua_donhang($donhangid,$trangthai)
{
global $db;
$q="UPDATE donhang SET trangthai=:trangthai WHERE 
donhangid=:donhangid ";
$s=$db->prepare($q)	;
$s->bindValue(":donhangid",$donhangid);
$s->bindValue(":trangthai",$trangthai);
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;
	
}


