<!DOCTYPE html>
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
<h1>Thiếp edit</h1>
<?php echo $them;?>
<?php include "sotrang.php";?>
<h2><?php echo $tieude; ?> </h2>
<form action="admin.php"  method="post" enctype="multipart/form-data" >
<input type="hidden" name="action" value=<?php if($tieude=="Sua thiep"){?>"suathiep"<?php } else {?> "taothiep"<?php }?>>
<input type="hidden" name="thiepha" value="<?php if(isset($sanpham['hinhanh']))echo $sanpham['hinhanh']; ?>">
<input type="hidden" name="thiepid" value="<?php if(isset($sanpham['thiepid']))echo $sanpham['thiepid']; ?>">
<label>Tên:</label><br> <input type="text" name="ten" value="<?php if(isset($sanpham['ten']))echo $sanpham['ten'];?>"><br>
<label>Miêu tả:</label><br> <textarea rows="4" cols="50" name="mieuta" ><?php if(isset($sanpham['mieuta']))echo $sanpham['mieuta'];?></textarea><br>
<label>Giá thành:</label><br> <input type="text" name="giathanh" value="<?php  if(isset($sanpham['giathanh']))echo$sanpham['giathanh'];?>"> 000 VND<br>
<label>Giảm giá:</label> <br><input type="text" name="giamgia" value="<?php if(isset($sanpham['giamgia']))echo $sanpham['giamgia'];?>"> 000 VND<br>
<label> Loại </label> <br><select name="loaiid">
 <?php foreach($cacloai AS $loai):?>
 <option value=<?php echo $loai['loaiid'];?> <?php if(isset($sanpham['loaiid'])){if($loai['loaiid']==$sanpham['loaiid']){?>selected="selected"<?php }}?> >
 <?php echo $loai["ten"]; ?>
 </option>
 <?php endforeach;?>
</select><br>
<label> Màu sắc </label> <br><select name="mausac">
 <?php foreach($maus AS $mau):?>
 <option value=<?php echo $mau['ten'];?> <?php if(isset($sanpham['mausac'])){if($mau['ten']==$sanpham['mausac']){?>selected="selected"<?php }}?> >
 <?php echo $mau["ten"]; ?>
 </option>
 <?php endforeach;?>
</select><br>

<label> Kich cỡ </label> <br><select name="kichco">
 <?php foreach($kichcos AS $kichco):?>
 <option value=<?php echo $kichco['ten'];?> <?php if(isset($sanpham['kichco'])){if($kichco['ten']==$sanpham['kichco']){?>selected="selected"<?php }}?> >
 <?php echo $kichco["ten"]; ?>
 </option>
 <?php endforeach;?>
</select><br>

<label>Hình ảnh: </label><br><input type="file" name="file"><br>
<label> &nbsp; </label><br>

<input type="submit" value="thêm thiếp" class="btn btn-primary">
</form>
</section>
<div>

<?php require_once("footer.php");?>
</body>