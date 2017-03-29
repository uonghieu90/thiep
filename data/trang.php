<?php 
function get_trang($trangid)
{
global $db;
$q="SELECT * FROM trang WHERE id= :trangid";
$s=$db->prepare($q)	;
$s->bindValue(":trangid",$trangid);
$s->execute();
$trang=$s->fetch();
$s->closeCursor();
return $trang;
	
}
function get_trangs()
{
global $db;
$q="SELECT id,menu,lamenu,ten FROM trang ";
$s=$db->prepare($q);
$s->execute();
$trangs=$s->fetchAll();
$s->closeCursor();
return $trangs;
	
}
function create_trang($trang)
{
global $db;
$q="INSERT INTO trang (ten,noidung,vitri,menu,lamenu) VALUES 
(:ten,:noidung,:vitri,:menu,:lamenu)";
$s=$db->prepare($q)	;

$s->bindValue(":ten",$trang["ten"]);
$s->bindValue(":noidung",$trang["noidung"]);
$s->bindValue(":vitri",$trang["vitri"]);
$s->bindValue(":menu",$trang["menu"]);
$s->bindValue(":lamenu",$trang["lamenu"]);
$s->execute();
$ketqua=$s->fetch();
$s->closeCursor();

return $ketqua;
	
}
function sua_trang($trang)
{
global $db;
$q="UPDATE trang SET ten=:ten,noidung=:noidung,vitri=:vitri,menu=:menu,lamenu=:lamenu WHERE 
id=:id";
$s=$db->prepare($q);
$s->bindValue(":id",$trang["id"]);
$s->bindValue(":ten",$trang["ten"]);
$s->bindValue(":noidung",$trang["noidung"]);
$s->bindValue(":vitri",$trang["vitri"]);
$s->bindValue(":menu",$trang["menu"]);
$s->bindValue(":lamenu",$trang["lamenu"]);
$s->execute();
$ketqua=$s->fetch();
$s->closeCursor();
echo $trang["ten"];
return $ketqua;
	
}
function delete_trang($id)
{
global $db;
$q="DELETE FROM trang WHERE id= :id";
$s=$db->prepare($q)	;
$s->bindValue(":id",$id);
$s->execute();
$trang=$s->fetch();
$s->closeCursor();
return $trang;	
	
	
}


?>