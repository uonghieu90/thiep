
<table class='table table-bordered table-striped table-hover'>
<tr>
<th>họ tên</th>
<th>địa chỉ</th>
<th>điện thoại</th>
<th>tiêu đề</th>
<th>email</th>
<th>xóa</th>
<th>xem</th>
</tr>
<?php foreach($trangs as $tr){?>
<tr>
<td><?php echo $tr['hoten'];?></td>
<td><?php echo $tr['diachi'];?></td>
<td><?php echo $tr['dienthoai'];?></td>
<td><?php echo $tr['tieude'];?></td>
<td><?php echo $tr['email'];?></td>
<td><a href="admin.php?action=xoalienhe&id=<?php echo $tr['id'];?>"class="btn btn-danger">xóa</a></td>
<td><a href="admin.php?action=formlienhe&id=<?php echo $tr['id'];?>"class="btn btn-warning">xem</a></td>
</tr>
<?php }?>
</table>
<?php include "sotrang.php"; ?>

<?php if($xem==true){?>
<h3> Khách hàng liên hệ</h3>
<p>Họ tên:
<?php echo $lh['hoten'];?>
</p>
<P>Địa chỉ:
<?php echo $lh['diachi'];?>
</p>
<p>Điện thoại
<?php echo $lh['dienthoai'];?>
</p>
<P>Tiếu đề:
<?php echo $lh['tieude'];?>
</p>
<P>Email:
<?php echo $lh['email'];?>
</p>
<p>
Nội dung:
<?php echo $lh['noidung'];?>
</p>
<?php }?>
