<?php
function get_rohang($nguoi)
{
global $db;
$q="SELECT * FROM rohang WHERE nguoiid= :nguoi";
$s=$db->prepare($q)	;
$s->bindValue(":nguoi",$nguoi);
$s->execute();
$product=$s->fetch();
$s->closeCursor();

if($product!=NULL){
	return $product['rohangid'];
}
else{
	$r=tao_rohang($nguoi);
	return $r;
}	

}
function get_count_rohang()
{
	global $db;
$q="SELECT COUNT(*) FROM rohang ";
$s=$db->prepare($q)	;
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;
}

function get_rohang2($nguoi)
{
global $db;
$q="SELECT * FROM rohang WHERE nguoiid= :nguoi";
$s=$db->prepare($q)	;
$s->bindValue(":nguoi",$nguoi);
$s->execute();
$product=$s->fetch();
$s->closeCursor();

	return $product['rohangid'];
	

}
function get_rohangs($offset=0)
{
global $db;
$q="SELECT * FROM rohang LIMIT 9 OFFSET :off ";
$s=$db->prepare($q)	;
$s->bindValue(':off',(int)$offset,PDO::PARAM_INT);
$s->execute();
$products=$s->fetchAll();
$s->closeCursor();
return $products;	

}

function tao_rohang($nguoi)
{
global $db;
$q="INSERT INTO rohang (nguoiid,ngaythang) VALUES 
(:nguoiid,CURDATE())";
$s=$db->prepare($q)	;
$s->bindValue(":nguoiid",$nguoi);
$s->execute();
$product=$db->lastInsertId();
$s->closeCursor();
return $product;	
}
function add_hrh($rohangid,$gia,$ten,$thiepid,$soluong)
{
global $db;
$q="SELECT * FROM hang_rohang WHERE rohangid= :rohangid AND thiepid=:thiepid";
$s=$db->prepare($q)	;
$s->bindValue(":rohangid",$rohangid);
$s->bindValue(":thiepid",$thiepid);
$s->execute();
$product=$s->fetch();
$s->closeCursor();	
	if($product!=NULL){
		$soluong+=$product["soluong"];
		sua_hrh($rohangid,$thiepid,$soluong);
	}
	else{
		create_hrh($rohangid,$gia,$ten,$thiepid,$soluong);
	}
}
function show_hrh($rohangid)
{
global $db;
$q="SELECT * FROM hang_rohang WHERE rohangid= :rohangid ";
$s=$db->prepare($q)	;
$s->bindValue(":rohangid",$rohangid);
$s->execute();
$product=$s->fetchAll();
$s->closeCursor();	
return $product;
}

function create_hrh($rohangid,$gia,$ten1,$thiepid,$soluong)
{
global $db;
$q="INSERT INTO hang_rohang (rohangid,gia,ten,thiepid,soluong) VALUES 
(:rohangid,:gia,:ten,:thiepid,:soluong)";
$s=$db->prepare($q)	;
$s->bindValue(":rohangid",$rohangid);
$s->bindValue(":gia",$gia);
$s->bindValue(":ten",$ten1);
$s->bindValue(":thiepid",$thiepid);
$s->bindValue(":soluong",$soluong);
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;
	
}
function delete_hrh($id)
{
global $db;
$q="DELETE FROM hang_rohang WHERE id= :id";
$s=$db->prepare($q)	;
$s->bindValue(":id",$id);
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;	
	
	
}
function delete_rohang($rohangid)
{
global $db;
$q="DELETE FROM hang_rohang WHERE rohangid= :rohangid";
$s=$db->prepare($q)	;
$s->bindValue(":rohangid",$rohangid);
$s->execute();
$product=$s->fetch();
$s->closeCursor();

global $db;
$q="DELETE FROM rohang WHERE rohangid= :rohangid";
$s=$db->prepare($q)	;
$s->bindValue(":rohangid",$rohangid);
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;		
}


function sua_hrh($rohangid,$thiepid,$soluong)
{
global $db;
$q="UPDATE hang_rohang SET soluong=:soluong WHERE 
thiepid=:thiepid AND rohangid=:rohangid";
$s=$db->prepare($q)	;
$s->bindValue(":rohangid",$rohangid);
$s->bindValue(":soluong",$soluong);
$s->bindValue(":thiepid",$thiepid);
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;
	
}

function sua_hrh2($rohangid,$diachi,$dt)
{
global $db;
$q="UPDATE rohang SET diachi=:diachi,dt=:dt WHERE 
rohangid=:rohangid";
$s=$db->prepare($q)	;
$s->bindValue(":rohangid",$rohangid);
$s->bindValue(":diachi",$diachi);
$s->bindValue(":dt",$dt);
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;
	
}

function lay_rh($rohangid)
{
global $db;
$q="SELECT diachi,dt FROM rohang WHERE 
rohangid=:rohangid";
$s=$db->prepare($q)	;
$s->bindValue(":rohangid",$rohangid);
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;	
}
function insert_dhdc($rohangid,$donhangid){
	$rohang=lay_rh($rohangid);
	global $db;
$q="UPDATE donhang SET diachi=:diachi,dt=:dt WHERE 
donhangid=:donhangid";
$s=$db->prepare($q)	;
$s->bindValue(":donhangid",$donhangid);
$s->bindValue(":diachi",$rohang['diachi']);
$s->bindValue(":dt",$rohang['dt']);
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;
}
