<?php
function get_nhanxet($thiepid)
{
global $db;
$q="SELECT * FROM nhanxet WHERE thiepid= :thiepid";
$s=$db->prepare($q)	;
$s->bindValue(":thiepid",$thiepid);
$s->execute();
$product=$s->fetchAll();
$s->closeCursor();

	return $product;
	

}
function sao($thiepid)
{
$nhanxet=get_nhanxet($thiepid);
$tong=0;
for($i=0;$i<sizeof($nhanxet);$i++)
{
	$tong+=$nhanxet[$i]['sao'];
}	
$sao=$tong/sizeof($nhanxet);

global $db;
$q="UPDATE sanphamthiep SET sao=:sao WHERE 
thiepid=:thiepid";
$s=$db->prepare($q)	;
$s->bindValue(":sao",$sao,PDO::PARAM_STR);
$s->bindValue(":thiepid",$thiepid);
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;

}
function create_nhanxet($thiepid,$nguoiid,$mieuta,$sao)
{
global $db;
$q="INSERT INTO nhanxet (thiepid,nguoiid,mieuta,sao,ngaythang) VALUES 
(:thiepid,:nguoiid,:mieuta,:sao,CURDATE())";
$s=$db->prepare($q)	;
$s->bindValue(":thiepid",$thiepid);
$s->bindValue(":nguoiid",$nguoiid);
$s->bindValue(":mieuta",$mieuta);
$s->bindValue(":sao",$sao);
$s->execute();
$product=$s->fetch();
$s->closeCursor();
sao($thiepid);
return $product;
	
}

function delete_nhanxet($id)
{
global $db;
$q="DELETE FROM nhanxet WHERE id= :id";
$s=$db->prepare($q)	;
$s->bindValue(":id",$id);
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;	
	
	
}