<!DOCTYPE html>
<html>
<head>
<title>Thiếp</title>
<?php require_once("head.php");?>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php require_once("header.php");?>
<?php require_once("aside.php");?>
<section>
<h2><?php echo $tieude; ?> </h2>
<form action="index.php"  method="post" enctype="multipart/form-data" >
<input type="hidden" name="action" value= <?php if($tieude=="tao trang") {?>"taotrang"<?php } else {?>"suatrang1"<?php } ?> >
<input type="hidden" name="id" value="<?php echo $trang[id]; ?>">
<label>Tên:</label><br> <input type="text" name="ten" value="<?php echo $trang[ten];?>"><br>
<label>Nội dung:</label><br> <textarea rows="20" cols="50" name="noidung" ><?php echo $trang[noidung];?></textarea><br>
<label>Vi trí:</label><br> <input type="text" name="vitri" value="<?php echo $trang[vitri];?>"> <br>
<label>Menu:</label><br> <input type="text" name="menu" value="<?php echo $trang[menu];?>"> <br>
<label>Là menu:</label><br> <input type="text" name="lamenu" value="<?php echo $trang[lamenu];?>"> <br>
<label>Hình ảnh: </label><br><input type="file" name="file"><br>
<label> &nbsp; </label>

<input type="submit" value="thêm trang">
</form>
</section>