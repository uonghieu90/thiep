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
function get_trangs_show($offset=0)
{
global $db;
$q="SELECT ten,CAST(noidung AS CHAR(50)) AS noidung,menu,tacgia,thongtin,ngaytao,id FROM trang WHERE thongtin=1 ORDER BY ngaytao DESC LIMIT 9 OFFSET :off ";
$s=$db->prepare($q);
$s->bindValue(':off',(int)$offset,PDO::PARAM_INT);
$s->execute();
$trangs=$s->fetchAll();
$s->closeCursor();
return $trangs;
	
}
function get_count_trang()
{
	global $db;
$q="SELECT COUNT(*) FROM trang ";
$s=$db->prepare($q);
$s->execute();
$trangs=$s->fetch();
$s->closeCursor();
return $trangs;
}
function get_count_trang_show()
{
	global $db;
$q="SELECT COUNT(*) FROM trang  WHERE thongtin=1";
$s=$db->prepare($q);
$s->execute();
$trangs=$s->fetch();
$s->closeCursor();
return $trangs;
}
function get_trang_offset($offset=0)
{
global $db;
$q="SELECT ten,CAST(noidung AS CHAR(30)) AS noidung,menu,tacgia,thongtin,ngaytao,id FROM trang LIMIT 9 OFFSET :off";
$s=$db->prepare($q)	;
$s->bindValue(':off',(int)$offset,PDO::PARAM_INT);
$s->execute();
$product=$s->fetchAll();
$s->closeCursor();

	return $product;
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
$q="INSERT INTO trang (ten,noidung,menu,tacgia,thongtin,ngaytao) VALUES 
(:ten,:noidung,:menu,:tacgia,:thongtin,NOW())";
$s=$db->prepare($q)	;

$s->bindValue(":ten",$trang["ten"]);
$s->bindValue(":noidung",$trang["noidung"]);
$s->bindValue(":menu",$trang["menu"]);
$s->bindValue(":tacgia",$trang["tacgia"]);
$s->bindValue(":thongtin",$trang["thongtin"]);
$s->execute();
$ketqua=$s->fetch();
$s->closeCursor();

return $ketqua;
	
}
function sua_trang($trang)
{
global $db;
$q="UPDATE trang SET ten=:ten,noidung=:noidung,menu=:menu,tacgia=:tacgia,thongtin=:thongtin,ngaytao=NOW() WHERE 
id=:id";
$s=$db->prepare($q);
$s->bindValue(":id",$trang["id"]);
$s->bindValue(":ten",$trang["ten"]);
$s->bindValue(":noidung",$trang["noidung"]);
$s->bindValue(":menu",$trang["menu"]);
$s->bindValue(":tacgia",$trang["tacgia"]);
$s->bindValue(":thongtin",$trang['thongtin']);
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