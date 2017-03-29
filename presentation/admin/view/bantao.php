<!DOCTYPE html>
<?php $title="Nhap ban";
if($action=="suaban"){
	$banid=filter_input(INPUT_GET,"banid");
	$ban=get_ten_loai_ban($banid);
	
	$ten=$ban['ten'];
	
	$mieuta=$ban['mieuta'];
	
	$title="Sửa ban";
}

?>
<html>
<head>
<title>Thiếp</title>
<?php require_once("head.php");?>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php require_once("header.php");?>
<div class="body">
<?php require_once("aside.php");?>
<section>
<h1>Ban edit</h1>
<?php echo $them;?>
<?php include "sotrang.php";?>
<h2><?php echo $title;?> </h2>
<form action="admin.php"  method="post">
<input type="hidden" name="action" value="taoban">
<?php if(isset($banid)){?>
<input type="hidden" name="banid" value="<?php echo $banid;?>">
<?php } ?>
<label>Tên ban</label> <input type="text" name="ten" value="<?php  if(isset($ten))echo$ten;?>"><br>
<label>Miêu tả</label> <input type="text" name="mieuta" value="<?php if(isset($mieuta))echo $mieuta;?>"><br>
<input type="submit" value="Tạo ban" class="btn btn-primary">
</select>
</form>
</section>
</div>
<?php require_once("footer.php");?>
</body>