<!DOCTYPE html>
<html>
<head>
<title> Thiếp </title>
<?php require_once("head.php");?>

<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php require_once("header.php");?>
<div class="body">
<?php require_once("aside.php");?>
<section>
<?php require_once("danxuat.php");?>
<h2> <?php echo $loai["ten"];  ?></h2> 
<p> <?php echo $loai["mieuta"];  ?></p> 

<form>
<select id="sl">
<option selected disabled>...</option>
<option value="giat">giá tăng</option>
<option value="giag">giá giảm</option>
<option value="luotxem">luợt xem</option>
</select></form><div class="sort">
<?php $i=0;?>
<?php foreach($cacsanpham AS $sanpham) :?>
<?php if ($i%3==0) echo "<div class=row>";?>
<div class="sanpham thumbnail" width="304" height="236" gia="<?php echo ($sanpham["giathanh"]-$sanpham["giamgia"]);  ?>" luotxem="<?php echo $sanpham['checked'];?>">

<div class="crop2">
<img src="image/<?php echo $sanpham['hinhanh'];?> " height="120" width="115"></div><br>
<h5 class="text-center"><?php echo $sanpham["ten"]; ?></h5>
   <?php echo ($sanpham["giathanh"]-$sanpham["giamgia"])."000  "; $gia=($sanpham["giathanh"]-$sanpham["giamgia"]);  ?> VND<br>
 <div><?php for($i=1;$i<=5;$i++){ if ($i<=$sanpham['sao']){?>
<img src="image/star.jpg" height="7" width="7">
 <?php }
 else { ?><img src="image/star2.png" height="7" width="7">
<?php }} ?></div>
<form action="index.php" id="nut"><input type=hidden name="gia" value="<?php echo $gia;?>"><input type=hidden name="ten" value="<?php echo $sanpham['ten'];?>"><input type=hidden name="action" value="mua"><input type=hidden name="id" value="<?php echo $sanpham['thiepid'];?>"> <input type="submit" class="btn btn-primary"  value="Mua"> <a href="?action=xemsp&thiepid=<?php echo $sanpham['thiepid'];?>" class="btn btn-info">Xem</a> </form>

</div>
<?php $i++;if ($i%3==0)echo "</div>";?>
<?php endforeach; ?>

</div>
<?php require_once("sotrang.php");?>
</section>
</div>
<?php require_once("footer.php");?>

</body>