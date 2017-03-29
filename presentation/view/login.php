<?php 
$nhap=false; $tieude="khách hàng";
if(isset($_SESSION['laadmin']) )
{ if($_SESSION['laadmin']==0){
   $nhap=true;
   $tieude="Chào"." ".$_SESSION['ten'];
}
}
?>
<div class="panel panel-primary">
<div class="panel-heading">
<h4> <?php echo $tieude?></h4></div>
<div class="panel-body">
<?php if($nhap==false) {?>
<form action="index.php" method="POST" class="form-horizontal">
<input type="hidden" name="action" value="login">
<label > Email </label><input type="text" name="email">
<label > password </label><input type="password" name="password"><br>
<input type="submit" value="đăng nhập" class="btn btn-primary"><br>
</form>
<a href="index.php?action=dangky">Đăng ký</a>
<?php } else { ?>

<ul>
<li>
<a href="index.php?action=formnhapnguoi"> Sửa người</a>
</li>
<li>
<a href="index.php?action=formnhapdiachi"> Sửa địa chỉ</a>
</li>
<li>
<a href="index.php?action=mua"> Rỏ hàng</a>
</li>
<li>
<a href="index.php?action=donhang"> Đơn hàng</a>
</li>
<li>
<a href="index.php?action=xoanguoi"> Xoa account</a>
</li>
<li>
<a href="index.php?action=logout"> Logout</a>
</li>
</ul>
<?php } ?>
</div>
</div>