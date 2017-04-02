
<table class='table table-bordered table-striped table-hover'>
<tr>
<th>tên trang</th>
<th>nội dung</th>
<th>ngày tạo</th>
<th>thông tin</th>
<th>tác giả</th>
<th>xóa</th>
<th>sửa</th>
</tr>
<?php foreach($trangs as $tr){?>
<tr>
<td><?php echo $tr['ten'];?></td>
<td><?php echo $tr['noidung'];?></td>
<td><?php echo $tr['ngaytao'];?></td>
<td><?php echo $tr['thongtin'];?></td>
<td><?php echo $tr['tacgia'];?></td>
<td><a href="admin.php?action=xoatrang&&trangid=<?php echo $tr['id'];?>"class="btn btn-danger">xóa</a></td>
<td><a href="admin.php?action=suatrang&&trangid=<?php echo $tr['id'];?>"class="btn btn-warning">sửa</a></td>
</tr>
<?php }?>
</table>
<?php include "sotrang.php"; ?>

<form action="admin.php" method="POST">
<h3>Nhập trang</h3>
<?php if($sua==true){?>
<input type="hidden" name="action" value="suatrang1">
<input type="hidden" name="id" value="<?php echo $tr1['id']; ?>">
<?php }elseif($sua==false){?>
<input type="hidden" name="action" value="taotrang">
<?php } ?>
<label>Tên</label>
<input name="ten" type="text" value=<?php echo $tr1['ten']; ?>><br>
<label>Nội dung</label><br>
<textarea name="noidung"><?php echo $tr1['noidung']; ?></textarea><br>
<label>Menu</label>
<input name="menu" type="text" value=<?php echo $tr1['ten']; ?>><br>
<label>Thông tin</label>
<select name="thongtin">
<option value='0' <?php if ($tr1['thongtin']==0) echo "selected"; ?>>không là thông tin</option>
<option value='1'<?php if ($tr1['thongtin']==1) echo "selected"; ?> >là thông tin</option>
</select></br>
<input type="hidden" name="tacgia"  value=<?php if($sua==true) echo $tr1['tacgia']; else echo $_SESSION['ten'];?>>
<input type="submit" class="btn btn-primary" value="Nhập trang">
</form>

 <script src="tinymce/js/tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>