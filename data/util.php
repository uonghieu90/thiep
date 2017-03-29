<?php 
function tablethiep($mangs,$bien1,$bien2,$bien3,$bien4,$bien,$bien5){
$table="";
$table.="<table class='table table-bordered table-striped table-hover'>"."<tr><th>".$bien1."</th>"."<th>".$bien2."</th>"."<th>".$bien3."</th>"."<th>".$bien5."</th>";
if($_SESSION['laadmin']==1 || $_SESSION['ten']!=null){
$table.="<th>xóa</th>";
$table.="<th>sửa</th>";
$table.="</tr>";
foreach ($mangs as $mang) { 
$table.="<tr ><td>".$mang[$bien1]."</td>"."<td>".$mang[$bien2]."</td>"."<td>".$mang[$bien3]."</td>"."<td>".$mang[$bien5]."</td>";
if($_SESSION['laadmin']==1 || $_SESSION['ten']==$mang['ten']){
$table.="<td><form action=admin.php><input type=hidden name=action value=xoa$bien><input type=hidden name=thiepid value=$mang[$bien4]><input type=hidden name=id value=$mang[$bien4]><input type=submit value=xóa class='btn btn-danger' ></form>";
$table.="<td><form action=admin.php><input type=hidden name=action value=sua$bien><input type=hidden name=thiepid value=$mang[$bien4]><input type=hidden name=id value=$mang[$bien4]><input type=submit value=sửa class='btn btn-warning'></form>";
}

$table.="</td></tr>";
}
$table.="</table>";
return $table;
}
}

function tablenguoi($mangs,$bien1,$bien2,$bien3,$bien4,$bien){
	$vai="";

$table="";
$table.="<table class='table table-bordered table-striped table-hover'>"."<tr><th>".$bien1."</th>"."<th>".$bien2."</th>"."<th>".$bien3."</th>"."<th>"."Vai trò"."</th>";
if($_SESSION['laadmin']==1 || $_SESSION['ten']!=null){
$table.="<th>xóa</th>";
$table.="<th>sửa</th>";
$table.="</tr>";
foreach ($mangs as $mang) {
	if($mang["laadmin"]==0)$vai="khách";
elseif ($mang["laadmin"]==1)$vai="admin";
elseif ($mang["laadmin"]==2)$vai="nhân viên"; 
$table.="<tr ><td>".$mang[$bien1]."</td>"."<td>".$mang[$bien2]."</td>"."<td>".$mang[$bien3]."</td>";
$table.="<td>".$vai."</td>";
if($_SESSION['laadmin']==1 || $_SESSION['ten']==$mang['ten']){
$table.="<td><form action=admin.php><input type=hidden name=action value=xoa$bien ><input type=hidden name=id value=$mang[$bien4]><input type=submit value=xóa class='btn btn-danger'></form>";
$table.="<td><form action=admin.php><input type=hidden name=action value=sua$bien><input type=hidden name=id value=$mang[$bien4]><input type=submit value=sửa class='btn btn-warning'></form>";
}

$table.="</td></tr>";
}
$table.="</table>";
return $table;
}
}



function tableloai($mangs,$bien1,$bien2,$bien3,$bien4,$bien){
$table="";
$table.="<table class='table table-bordered table-striped table-hover'>"."<tr><th>".$bien1."</th>"."<th>".$bien2."</th>"."<th>".$bien3."</th>"."<th>".$bien4."</th>";
if($_SESSION['laadmin']==1 || $_SESSION['ten']!=null){
$table.="<th>xóa</th>";
$table.="<th>sửa</th>";
}
$table.="</tr>";
foreach ($mangs as $mang) { 
$table.="<tr ><td>".$mang[$bien1]."</td>"."<td>".$mang[$bien2]."</td>"."<td>".$mang[$bien3]."</td>"."<td>".$mang[$bien4]."</td>";
if($_SESSION['laadmin']==1 || $_SESSION['ten']==$mang['ten']){
$table.="<td><form action=admin.php><input type=hidden name=action value=xoa$bien ><input type=hidden name=loaiid value=$mang[loaiid]><input type=hidden name=id value=$mang[$bien4]><input type=submit value=xóa class='btn btn-danger'></form>";
$table.="<td><form action=admin.php><input type=hidden name=action value=sua$bien><input type=hidden name=loaiid value=$mang[loaiid]><input type=hidden name=id value=$mang[$bien4]><input type=submit value=sửa class='btn btn-warning'></form>";
}

$table.="</td></tr>";
}
$table.="</table>";
return $table;
}

function tableban($mangs,$bien1,$bien2,$bien){
$table="";
$table.="<table class='table table-bordered table-striped table-hover'>"."<tr><th>".$bien1."</th>"."<th>".$bien2."</th>";
if($_SESSION['laadmin']==1 || $_SESSION['ten']!=null){
$table.="<th>xóa</th>";
$table.="<th>sửa</th>";
}
$table.="</tr>";
foreach ($mangs as $mang) { 
$table.="<tr ><td>".$mang[$bien1]."</td>"."<td>".$mang[$bien2]."</td>";
if($_SESSION['laadmin']==1 || $_SESSION['ten']==$mang['ten']){
$table.="<td><form action=admin.php><input type=hidden name=action value=xoa$bien ><input type=hidden name=banid value=$mang[banid]><input type=submit value=xóa class='btn btn-danger'></form>";
$table.="<td><form action=admin.php><input type=hidden name=action value=sua$bien><input type=hidden name=banid value=$mang[banid]><input type=submit value=sửa class='btn btn-warning'></form>";
}

$table.="</td></tr>";
}
$table.="</table>";
return $table;
}
function tablerohang($mangs,$bien1,$bien2,$bien){
$table="";
$table.="<table class='table table-bordered table-striped table-hover'>"."<tr><th>".$bien1."</th>"."<th>".$bien2."</th>";
if($_SESSION['laadmin']==1 || $_SESSION['ten']!=null){
$table.="<th>xóa</th>";
$table.="<th>xem</th>";
}
$table.="</tr>";
foreach ($mangs as $mang) { 
$table.="<tr ><td>".$mang[$bien1]."</td>"."<td>".$mang[$bien2]."</td>";
if($_SESSION['laadmin']==1 || $_SESSION['ten']==$mang['ten']){
$table.="<td><form action=admin.php><input type=hidden name=action value=xoa$bien ><input type=hidden name=rohangid value=$mang[rohangid]><input type=submit value=xóa class='btn btn-danger'></form>";
$table.="<td><form action=admin.php><input type=hidden name=action value=xem$bien><input type=hidden name=rohangid value=$mang[rohangid]><input type=submit value=xem class='btn btn-info'></form>";
}

$table.="</td></tr>";
}
$table.="</table>";
return $table;
}
function select($thiepid,$chon,$rohangid){
	$s="";
	$s.="<form action=index.php id=$thiepid>";
	$s.="<input type=hidden name=action value=chonmh>";
	$s.="<input type=hidden name=thiepid value=$thiepid>";
	$s.="<input type=hidden name=rohangid value=$rohangid>";
$s.="<select name=sl  id=c$thiepid>";
for($i=1;$i<12;$i++)
{
if($i==$chon)
$s.= "<option value=$i selected>$i</option>";
else
$s.= "<option value=$i>$i</option>";
}
$s.="</select>";
$s.="</form>";
return $s;
}

/** bang 2 **/
function table2($mangs,$bien1,$bien2,$bien3,$bien4){
$table;
if ($mangs!=null){
$table.="<form action=index.php>";
$table.="<input type=hidden name=action value=xemtrang>";
$table.="<input type=hidden name=trangid value=11>";
$table.="<table>"."<tr><th>".$bien1."</th>"."<th>".$bien2."</th>"."<th>".$bien3."</th>";
$table.="<th>tong</th>";
$table.="<th>xoa</th>";
$table.="</tr>";
foreach ($mangs as $mang) {
$table.="<tr id=$mang[$bien4]><td>".$mang[$bien1]."</td>"."<td >".select($mang[$bien4],$mang[$bien2])."</td>"."<td>".$mang[$bien3].".000VND</td>";
$table.="<td id=t$mang[$bien4] class=sum>".($mang[$bien2]*$mang[$bien3]).".000VND</td>";
$table.="<td><input type=hidden name=id value=$mang[$bien4]><input type=button  value=xoa id=xoa$mang[$bien4] class='btn btn-danger'>";
$table.="</td></tr> ";
$tong+=$mang[$bien2]*$mang[$bien3];
}
$table.="<tr><td>Tong:</td><td></td><td></td><td id=sum>$tong.000VND</td></tr>";
$table.="</table><input type=submit value='Tra tien'></form>";}
else $table.="Ban chua co cai nao trong ro";
return $table;
}
/**bang 4 **/
function table4($mangs){
$table="";
$tong=0;
$rohangid=0;
if ($mangs!=null){

$table.="<table class='table table-bordered table-striped table-hover'>"."<tr><th> ten </th>"."<th>soluong</th>"."<th>gia</th>";
$table.="<th>tong</th>";
$table.="<th>xoa</th>";
$table.="<th>sua</th>";
$table.="</tr>";
foreach ($mangs as $mang) {
	$rohangid=$mang['rohangid'];
$table.="<tr id=$mang[ten]><td>".$mang['ten']."</td>"."<td >".select($mang['thiepid'],$mang['soluong'],$mang['rohangid'])."</td>"."<td>".$mang['gia'].".000VND</td>";
$table.="<td id=$mang[thiepid] class=sum>".($mang['soluong']*$mang['gia']).".000VND</td>";
$table.="<td>";
$table.="<form action=index.php>";
$table.="<input type=hidden name=action value=xoamh>";
$table.="<input type=hidden name=id value=$mang[id]><input type=hidden name=rohangid value=$mang[rohangid]><input type=submit  value=xoa id=xoa$mang[thiepid] class='btn btn-danger'>.</form>";
$table.="</td>";
$table.="<td><button type=submmit form=$mang[thiepid] value=sua class='btn btn-warning'>sửa</button></td>";
$table.="</tr> ";
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
$table.="<form action=index.php>";
$table.="<input type=hidden name=action value=xoarohang>";
$table.="<input type=hidden name=rohangid value=$rohangid>";
$table.="<input type=submit value='Xóa rỏ hàng' class='btn btn-danger'></form>";

}
else $table.="Ban chua co cai nao trong ro";
return $table;
}
/**tong**/

function tong($mangs){
$table="";
$tong=0;
$rohangid=0;
if ($mangs!=null){


foreach ($mangs as $mang) {
	$rohangid=$mang['rohangid'];

$tong+=$mang['soluong']*$mang['gia'];
}

}

return $tong;
}




/**bang don hang**/
function tabledonhang($mangs){
$table="";
$tong=0;
$rohangid=0;
if ($mangs!=null){

$table.="<table class='table table-bordered table-striped table-hover'>"."<tr><th> ten </th>"."<th>soluong</th>"."<th>gia</th>";
$table.="<th>tong</th>";
$table.="</tr>";
foreach ($mangs as $mang) {
	
$table.="<tr id=$mang[ten]><td>".$mang['ten']."</td>"."<td >".select($mang['thiepid'],$mang['soluong'],$mang['donhangid'])."</td>"."<td>".$mang['gia'].".000VND</td>";
$table.="<td id=$mang[thiepid] class=sum>".($mang['soluong']*$mang['gia']).".000VND</td>";
$table.="</tr> ";
$tong+=$mang['soluong']*$mang['gia'];
}
$table.="<tr><td>Tong:</td><td></td><td></td><td id=sum>$tong.000VND</td></tr>";

$table.="</table>";

}
else $table.="Ban chua co cai nao trong ro";
return $table;
}







/**bang mot ro hang **/
function tablerh($mangs){
$table="";
$tong=0;
if ($mangs!=null){

$table.="<table class='table table-bordered table-striped table-hover'>"."<tr><th> ten </th>"."<th>soluong</th>"."<th>gia</th>";
$table.="<th>tong</th>";
$table.="</tr>";
foreach ($mangs as $mang) {
$table.="<tr id=$mang[ten]><td>".$mang['ten']."</td>"."<td >".select($mang['thiepid'],$mang['soluong'],$mang['rohangid'])."</td>"."<td>".$mang['gia'].".000VND</td>";
$table.="<td id=$mang[thiepid] class=sum>".($mang['soluong']*$mang['gia']).".000VND</td>";
$table.="</tr> ";
$tong+=$mang['soluong']*$mang['gia'];
}
$table.="<tr><td>Tong:</td><td></td><td></td><td id=sum>$tong.000VND</td></tr>";

$table.="</table>";}
else $table.="Ban chua co cai nao trong ro";
return $table;
}




/** bang 3 **/

function table3($mangs,$bien1,$bien2,$bien3,$bien4){
$table;
if ($mangs!=null){
$table.="<table class='table table-bordered table-striped table-hover'>"."<tr><th>".$bien1."</th>"."<th>".$bien2."</th>"."<th>".$bien3."</th>";
$table.="<th>tổng</th>";
$table.="</tr>";
foreach ($mangs as $mang) {
$table.="<tr id=$mang[$bien4]><td>".$mang[$bien1]."</td>"."<td >".$mang[$bien2]."</td>"."<td>".$mang[$bien3].".000VND</td>";
$table.="<td id=t$mang[$bien4] class=sum>".($mang[$bien2]*$mang[$bien3]).".000VND</td>";
$table.="</td></tr> ";
$tong+=$mang[$bien2]*$mang[$bien3];
}
$table.="<tr><td>Tổng:</td><td></td><td></td><td id=sum>$tong.000VND</td></tr></table>";}
if($_SESSION['ten']==null)
{$table.="<br><br> Bạn cần đăng nhập<br>";
$table.=" Click vào <a href=.?action=xemtrang&&trangid=5> Đăng nhập </a>";}
return $table;

}

/** danhsach **/
function danhsach($danhsach){
$ds;

foreach ($danhsach as $key=>$value)
{
if($key!="id"&&$key!="password"&&$key!="laadmin"&& is_numeric($key)==false ){
$ds.= "<p>".$key.":".$value."</p>";}
}

return $ds;
}

function form($form,$form1){
$chucdanh=array("khách","admin","nhân viên");
$f="";
$f.="<h1> Sua nguoi </h1>";
$f.="<form action=admin.php>";
$f.="<input type=hidden name=action value=$form1>";
$f.="<input type=hidden name=id value=$form[id]>";
foreach ($form as $key=>$value)
{
if($key!="id" && is_numeric($key)==false && $key!="laadmin"){
$f.= "<label>".$key."</label>"."<br>"."<input name=$key value=$value>"."<br>";}
}
$f.="<select name=laadmin>";
$index=0;
foreach($chucdanh AS $danh)
{
	if ($index==$form['laadmin'])$f.="<option value=$index selected>".$danh."<option>";
else $f.="<option value=$index>".$danh."<option>";
$index++;
}
$f.="</select>";
$f.="<input type=submit value=suanguoi class='btn btn-warning' > </form>";
return $f;
}
function tinhsoluong()
{
/*$tsl=0;
foreach($_SESSION['mua'] as $gh)
{$tsl+=$gh['soluong'];
}
$_SESSION['tsl']=$tsl;
return $tsl;
*/
}
function baoloi($loi)
{
global $trangs;
//$trang=get_trang(14);

$trang['ten']="Báo lỗi";
$trang['noidung']=$loi;
include "presentation/admin/view/trangmau.php";

}
