<?php
function get_mongmuon($nguoi)
{
global $db;
$q="SELECT * FROM mongmuon WHERE nguoiid= :nguoi";
$s=$db->prepare($q)	;
$s->bindValue(":nguoi",$nguoi);
$s->execute();
$product=$s->fetch();
$s->closeCursor();

if($product!=NULL){
	return $product['mongmuonid'];
}
else{
	$r=tao_mongmuon($nguoi);
	return $r;
}	

}
function get_count_mongmuon()
{
	global $db;
$q="SELECT COUNT(*) FROM mongmuon ";
$s=$db->prepare($q)	;
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;
}

function get_mongmuon2($nguoi)
{
global $db;
$q="SELECT * FROM mongmuon WHERE nguoiid= :nguoi";
$s=$db->prepare($q)	;
$s->bindValue(":nguoi",$nguoi);
$s->execute();
$product=$s->fetch();
$s->closeCursor();

	return $product['mongmuonid'];
	

}
function get_mongmuons($offset=0)
{
global $db;
$q="SELECT * FROM mongmuon LIMIT 9 OFFSET :off ";
$s=$db->prepare($q)	;
$s->bindValue(':off',(int)$offset,PDO::PARAM_INT);
$s->execute();
$products=$s->fetchAll();
$s->closeCursor();
return $products;	

}

function tao_mongmuon($nguoi)
{
global $db;
$q="INSERT INTO mongmuon (nguoiid,ngaythang) VALUES 
(:nguoiid,CURDATE())";
$s=$db->prepare($q)	;
$s->bindValue(":nguoiid",$nguoi);
$s->execute();
$product=$db->lastInsertId();
$s->closeCursor();
return $product;	
}
function add_mm($mongmuonid,$thiepid,$gia,$ten)
{
global $db;
$q="SELECT * FROM hang_mongmuon WHERE mongmuonid= :mongmuonid AND thiepid=:thiepid";
$s=$db->prepare($q)	;
$s->bindValue(":mongmuonid",$mongmuonid);
$s->bindValue(":thiepid",$thiepid);
$s->execute();
$product=$s->fetch();
$s->closeCursor();	
	if($product!=NULL){

	}
	else{
		create_mm($mongmuonid,$gia,$ten,$thiepid);
	}
}
function show_mm($mongmuonid)
{
global $db;
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
$q="SELECT * FROM hang_mongmuon WHERE mongmuonid= :mongmuonid ";
$s=$db->prepare($q)	;
$s->bindValue(":mongmuonid",$mongmuonid);
$s->execute();
$product=$s->fetchAll();
$s->closeCursor();	
return $product;
}

function create_mm($mongmuonid,$gia,$ten1,$thiepid)
{
global $db;
$q="INSERT INTO hang_mongmuon (mongmuonid,gia,ten,thiepid) VALUES 
(:mongmuonid,:gia,:ten,:thiepid)";
$s=$db->prepare($q)	;
$s->bindValue(":mongmuonid",$mongmuonid);
$s->bindValue(":gia",$gia);
$s->bindValue(":ten",$ten1);
$s->bindValue(":thiepid",$thiepid);
$s->execute();
$product=$s->fetch();

$s->closeCursor();
return $product;
	
}
function delete_mm($id)
{
global $db;
$q="DELETE FROM hang_mongmuon WHERE id= :id";
$s=$db->prepare($q)	;
$s->bindValue(":id",$id);
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;	
	
	
}
function delete_mongmuon($mongmuonid)
{
global $db;
$q="DELETE FROM hang_mongmuon WHERE mongmuonid= :mongmuonid";
$s=$db->prepare($q)	;
$s->bindValue(":mongmuonid",$mongmuonid);
$s->execute();
$product=$s->fetch();
$s->closeCursor();

global $db;
$q="DELETE FROM mongmuon WHERE mongmuonid= :mongmuonid";
$s=$db->prepare($q)	;
$s->bindValue(":mongmuonid",$mongmuonid);
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;		
}


function sua_mm($mongmuonid,$thiepid,$soluong)
{
global $db;
$q="UPDATE hang_mongmuon SET soluong=:soluong WHERE 
thiepid=:thiepid AND mongmuonid=:mongmuonid";
$s=$db->prepare($q)	;
$s->bindValue(":mongmuonid",$mongmuonid);
$s->bindValue(":soluong",$soluong);
$s->bindValue(":thiepid",$thiepid);
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;
	
}

function sua_mm2($mongmuonid,$diachi,$dt)
{
global $db;
$q="UPDATE mongmuon SET diachi=:diachi,dt=:dt WHERE 
mongmuonid=:mongmuonid";
$s=$db->prepare($q)	;
$s->bindValue(":mongmuonid",$mongmuonid);
$s->bindValue(":diachi",$diachi);
$s->bindValue(":dt",$dt);
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;
	
}

function lay_mm($mongmuonid)
{
global $db;
$q="SELECT diachi,dt FROM mongmuon WHERE 
mongmuonid=:mongmuonid";
$s=$db->prepare($q)	;
$s->bindValue(":mongmuonid",$mongmuonid);
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;	
}

