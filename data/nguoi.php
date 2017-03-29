<?php 
function get_nguoi($id)
{
global $db;
$q="SELECT * FROM nguoi WHERE id= :id";
$s=$db->prepare($q)	;
$s->bindValue(":id",$id);
$s->execute();
$nguoi=$s->fetch();
$s->closeCursor();
return $nguoi;
	
}
function get_nguois($offset=0)
{
global $db;
$q="SELECT * FROM nguoi LIMIT 9 OFFSET :off";
$s=$db->prepare($q);
$s->bindValue(':off',(int)$offset,PDO::PARAM_INT);
$s->execute();
$nguois=$s->fetchAll();
$s->closeCursor();
return $nguois;
	
}

function get_count_nguoi()
{
	global $db;
$q="SELECT COUNT(*) FROM nguoi ";
$s=$db->prepare($q)	;
$s->execute();
$product=$s->fetch();
$s->closeCursor();
return $product;
}

 function kiemtraadmin($ten,$password)
{
global $db;
echo $ten;
echo $password;
$q="SELECT laadmin,ten FROM nguoi WHERE ten=:ten AND password=:password AND laadmin=1  ";
$s=$db->prepare($q);
$s->bindValue(":ten",$ten);
$s->bindValue(":password",$password);
$s->execute();
$nguoi=$s->fetch();
$s->closeCursor();
return $nguoi;

}
 function kiemtrakhach($email,$password)
{
global $db;
$q="SELECT laadmin,ten,id FROM nguoi WHERE email=:email AND password=:password AND laadmin=0  ";
$s=$db->prepare($q);
$s->bindValue(":email",$email);
$s->bindValue(":password",$password);
$s->execute();
$nguoi=$s->fetch();
$s->closeCursor();
return $nguoi;

}
 function kiemtrakhachemail($email)
{
global $db;
$q="SELECT laadmin,ten,id FROM nguoi WHERE email=:email AND laadmin=0  ";
$s=$db->prepare($q);
$s->bindValue(":email",$email);
$s->execute();
$nguoi=$s->fetch();
$s->closeCursor();
return $nguoi;

}

function create_nguoi($nguoi)
{
global $db;
$q="INSERT INTO nguoi (ten,ho,diachi,dt,email,password) VALUES 
(:ten,:ho,:diachi,:dt,:email,:password)";
$s=$db->prepare($q)	;

$s->bindValue(":ten",$nguoi["ten"]);
$s->bindValue(":ho",$nguoi["ho"]);
$s->bindValue(":diachi",$nguoi["diachi"]);
$s->bindValue(":dt",$nguoi["dt"]);
$s->bindValue(":email",$nguoi["email"]);
$s->bindValue(":password",$nguoi["password"]);
$s->execute();
$ketqua=$s->fetch();
$s->closeCursor();

return $ketqua;
	
}

function tao_nguoi($nguoi)
{
global $db;
$q="INSERT INTO nguoi (ten,ho,email,password) VALUES 
(:ten,:ho,:email,:password)";
$s=$db->prepare($q)	;

$s->bindValue(":ten",$nguoi["ten"]);
$s->bindValue(":ho",$nguoi["ho"]);
//$s->bindValue(":diachi",$nguoi["diachi"]);
//$s->bindValue(":dt",$nguoi["dt"]);
$s->bindValue(":email",$nguoi["email"]);
$s->bindValue(":password",$nguoi["password"]);
$s->execute();
$ketqua=$s->fetch();
$s->closeCursor();

return $ketqua;
	
}

function sua_nguoi($nguoi)
{
global $db;
$q="UPDATE nguoi SET ten=:ten,ho=:ho,diachi=:diachi,dt=:dt,email=:email,password=:password,laadmin=:laadmin WHERE 
id=:id";
$s=$db->prepare($q);
$s->bindValue(":id",$nguoi["id"]);
$s->bindValue(":ten",$nguoi["ten"]);
$s->bindValue(":ho",$nguoi["ho"]);
$s->bindValue(":diachi",$nguoi["diachi"]);
$s->bindValue(":dt",$nguoi["dt"]);
$s->bindValue(":email",$nguoi["email"]);
$s->bindValue(":password",$nguoi["password"]);
$s->bindValue(":laadmin",$nguoi["laadmin"]);
$s->execute();
$ketqua=$s->fetch();
$s->closeCursor();
return $ketqua;
	
}
function sua_khach($nguoi)
{
global $db;
$q="UPDATE nguoi SET ten=:ten,ho=:ho,email=:email,password=:password WHERE 
id=:id";
$s=$db->prepare($q);
$s->bindValue(":id",$nguoi["id"]);
$s->bindValue(":ten",$nguoi["ten"]);
$s->bindValue(":ho",$nguoi["ho"]);
$s->bindValue(":email",$nguoi["email"]);
$s->bindValue(":password",$nguoi["password"]);
$s->execute();
$ketqua=$s->fetch();
$s->closeCursor();
return $ketqua;
	
}
function sua_khach_diachi($nguoi)
{
global $db;
$q="UPDATE nguoi SET diachi=:diachi,dt=:dt WHERE 
id=:id";
$s=$db->prepare($q);
$s->bindValue(":id",$nguoi["id"]);
$s->bindValue(":diachi",$nguoi["diachi"]);
$s->bindValue(":dt",$nguoi["dt"]);
$s->execute();
$ketqua=$s->fetch();
$s->closeCursor();
return $ketqua;
	
}
function delete_nguoi($id)
{
global $db; echo $id;
$q="DELETE FROM nguoi WHERE id= :id";
$s=$db->prepare($q)	;
$s->bindValue(":id",$id);
$s->execute();
$nguoi=$s->fetch();
$s->closeCursor();
return $nguoi;	
	
	
}


?>