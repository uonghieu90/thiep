<?php 
if($mangs!=null){?>
<table class='table table-bordered table-striped table-hover'>
<tr><th> ten </th><th>gia</th>";
<th>xoa</th>
<th>mua</th>
</tr>
<?php 

$table="";
foreach ($mangs as $mang) {
	$id=$mang['id'];
$table.="<tr id=$mang[ten]><td>".$mang['ten']."</td>"."<td>".$mang['gia'].".000VND</td>";
$table.="<td>";
$table.="<form action=index.php>";
$table.="<input type=hidden name=action value=xoamm>";
$table.="<input type=hidden name=id value=$mang[id]><input type=hidden name=mongmuonid value=$mang[mongmuonid]><input type=submit  value=xoa id=xoa$mang[thiepid] class='btn btn-danger'>.</form>";
$table.="</td>";
$table.="<td>";
$table.="<form action=index.php id=nut><input type=hidden name=gia value=$mang[gia]><input type=hidden name=ten value='".$mang['ten']."'><input type=hidden name=action value=mua><input type=hidden name=id value=$mang[thiepid]> <input type=submit class='btn btn-primary'  value=Mua>";
$table.="</td>";
$table.="</tr> ";

}


$table.="</table>";
echo $table;}
else{
	echo "Bạn chưa yên thích cái nào";
}
?>