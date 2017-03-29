<label> Địa chỉ </label><p> <?php echo $diachi;?></p>
<label> Đt </label><p> <?php echo $dt;?></p>
<?php
$table="";
$tong=0;
$rohangid=0;
if ($mangs!=null){

$table.="<table class='table table-bordered table-striped table-hover'>"."<tr><th> ten </th>"."<th>soluong</th>"."<th>gia</th>";
$table.="<th>tong</th>";
$table.="</tr>";
foreach ($mangs as $mang) {
	$rohangid=$mang['rohangid'];
$table.="<tr id=$mang[ten]><td>".$mang['ten']."</td>"."<td >".$mang['soluong']."</td>"."<td>".$mang['gia'].".000VND</td>";
$table.="<td id=$mang[thiepid] class=sum>".($mang['soluong']*$mang['gia']).".000VND</td>";

$tong+=$mang['soluong']*$mang['gia'];
}
$table.="<tr><td>Tong:</td><td></td><td></td><td id=sum>$tong.000VND</td></tr>";

$table.="</table>";
if (isset($_SESSION['laadmin'])){
	if ($_SESSION['laadmin']==0){
$table.="<form action=index.php>";
$table.="<input type=hidden name=action value=tratien>";
$table.="<input type=hidden name=rohangid value=$rohangid>";
$table.="<input type=submit value='Tra tien'></form>";}}

}
else $table.="Ban chua co cai nao trong ro";
echo $table;

?>
