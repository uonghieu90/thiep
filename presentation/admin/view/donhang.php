
<?php 
$bo=false;

if (isset($_SESSION['id']))
 $id=$_SESSION['id'];
 if(isset($id)){
 $donhang=get_donhang2($id);}
 else{
	 $so1=filter_input(INPUT_GET,"so",FILTER_VALIDATE_INT);
	 if($so1!=null)
$so1=($so1-1)*9;
else
	$so1=0;
           
	 $donhang=get_donhang($so1);
 }
 if($action=="xemdonhang"||$action=="xemdonhang2"){
	 $bo=true;
	 
	 $donhangid=filter_input(INPUT_GET,"donhangid");$mangs=show_donhang($donhangid);
	 $them=tabledonhang($mangs);
 }
?>

<table class="table table-bordered table-striped table-hover">
<tr><th>Đơn hàng id</th><th>nguoiid</th><th>ngày tháng</th><th>Địa chỉ</th><th>hình thức trả tiên</th><th>trạng thái</th><th>xóa</th><th>sửa</th><th>xem</th></tr>
<?php foreach($donhang AS $hang){?>
<tr>
<td><?php echo $hang['donhangid'];?></td>
<td><?php  $nguoi=get_nguoi($hang['nguoiid']);echo $nguoi['ten']?></td>
<td><?php echo $hang['ngaythang'];?></td>
<td><?php echo $hang['diachi'];?></td>
<td><?php if($hang['thanhtoan']==1)echo "tiền mặt";
elseif($hang['thanhtoan']==2)echo "paypal"
?></td>
<td><form action="admin.php" id="<?php echo $hang['donhangid']?>">
<input type="hidden" name="action" value="suadonhang">
<input type="hidden" name="donhangid" value="<?php echo $hang['donhangid'];?>">
<select name="trangthai">
<option value=0 <?php if($hang['trangthai']==0)echo "selected";?>>chua tra</option>
<option value=1 <?php if($hang['trangthai']==1)echo "selected";?>>da tra</option>
<option value=2 <?php if($hang['trangthai']==2)echo "selected";?>>da chuyen</option>
</select></form></td>



<td>
<form action="admin.php">
<input type="hidden" name="action" value="xoadonhang">
<input type="hidden" name="donhangid" value="<?php echo $hang['donhangid'];?>">

<input type="submit" name="xoa" value="xóa" class="btn btn-danger"></form></td>
<td><button type="submmit" form="<?php echo $hang['donhangid'];?>" class="btn btn-warning" value="sua">sửa</button></td>
<td><form action="admin.php">
<input type="hidden" name="action" value="xemdonhang2">
<input type="hidden" name="donhangid" value="<?php echo $hang['donhangid'];?>">
<input type="submit" name="xem" value="xem" class="btn btn-info"></form></td>

</tr>
<?php }?>
</table>
<?php include "sotrang.php";?>
<?php if($bo==true){
echo $them;}?>
