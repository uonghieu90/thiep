<?php
function create_lienhe($hoten,$diachi,$dt,$email,$tieude,
$noidung)
{
global $db;
$q="INSERT INTO lienhe(hoten,diachi,dienthoai,email,tieude,noidung) VALUES 
(:hoten,:diachi,:dienthoai,:email,:tieude,:noidung)";
$s=$db->prepare($q)	;
$s->bindValue(":hoten",$hoten);
$s->bindValue(":diachi",$diachi);
$s->bindValue(":dienthoai",$dt);
$s->bindValue(":email",$email);
$s->bindValue(":tieude",$tieude);
$s->bindValue(":noidung",$noidung);
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;
echo $product;	
}
function get_lienhe2($id)
{
global $db;
$q="SELECT * FROM lienhe WHERE id= :id";
$s=$db->prepare($q)	;
$s->bindValue(":id",$id);
$s->execute();
$product=$s->fetch();
$s->closeCursor();

	return $product;
}
function get_count_lienhe2()
{
global $db;
$q="SELECT COUNT(*) FROM lienhe ";
$s=$db->prepare($q)	;
$s->execute();
$product=$s->fetch();
$s->closeCursor();

	return $product;
}
function delete_lienhe($id)
{
global $db;
$q="DELETE FROM lienhe WHERE id= :id";
$s=$db->prepare($q)	;
$s->bindValue(":id",$id);
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;	
	
	
}
function get_lienhe($offset=0)
{
global $db;
$q="SELECT * FROM lienhe LIMIT 9 OFFSET :off";
$s=$db->prepare($q)	;
$s->bindValue(':off',(int)$offset,PDO::PARAM_INT);
$s->execute();
$product=$s->fetchAll();
$s->closeCursor();

	return $product;
}
