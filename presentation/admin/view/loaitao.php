<!DOCTYPE html>
<?php $title="Nhap loai";
if($action=="sualoai"){
	$loaiid=filter_input(INPUT_GET,"loaiid");
	$loai=get_ten_loai($loaiid);
	
	$ten=$loai['ten'];
	
	$mieuta=$loai['mieuta'];
	$ban1=$loai['ban'];
	$title="Sửa loai";
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
<h1>Loại edit</h1>
<?php echo $them;?>
<?php include "sotrang.php";?>
<h2><?php echo $title;?> </h2>
<form action="admin.php"  method="post">
<input type="hidden" name="action" value="taoloai">
<?php if(isset($loaiid)){?>
<input type="hidden" name="loaiid" value="<?php echo $loaiid;?>">
<?php } ?>
<label>Tên loại</label> <input type="text" name="ten" value="<?php  if(isset($ten))echo$ten;?>"><br>
<label>Miêu tả</label> <input type="text" name="mieuta" value="<?php if(isset($mieuta))echo $mieuta;?>"><br>
<select name="ban">
<?php foreach($cacban AS $ban){?>

	<option value="<?php echo $ban['banid'];?>" <?php if(isset($ban1))if($ban1==$ban['banid']) echo "selected";?> ><?php echo $ban['ten'];?></option>

<?php }?>
</select>
<input type="submit" value="Tạo loại" class="btn btn-primary">
</select>
</form>
</section>
<div>
<?php require_once("footer.php");?>
</body>