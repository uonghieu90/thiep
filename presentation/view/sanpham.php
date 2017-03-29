<?php $recom=recommend_donhang($sanpham['thiepid']);
  
 ?>
<!DOCTYPE html>
<html>
<head>
<?php require_once("head.php");?>
<link rel="stylesheet" type="text/css" href="style.css">
<title>Thiếp</title>

</head>
<body>
<?php require_once("header.php");?>
<div class="body">
<?php require_once("aside.php");?>
<section>
<?php require_once("danxuat.php");?>
<h2><?php echo $sanpham["ten"]; ?> </h2>
<div id="sanpham"> <div class="crop3 center-block"><img src="image/<?php echo $sanpham['hinhanh'];?>" height="400" width="220"></div></div>
<div  id="sanpham">
<p><?php echo $sanpham["mieuta"]; ?></p>
<p> Gíá cả: <?php echo $sanpham["giathanh"]; ?>000 VND</p>
<p> Giảm giá: <?php echo $sanpham["giamgia"]; ?>000 VND </p>
<p> Giá cuối: <?php $gia=$sanpham["giathanh"]-$sanpham["giamgia"];echo $gia; ?>000 VND </p>
<?php echo "Kích cỡ:"; ?>
<p><?php $array=explode("X", $sanpham['kichco']); echo $array[0]."cmX".$array[1]."cm";?> </P>
<p><?php echo "Màu sắc:".$sanpham['mausac']; ?></p>
<?php if ($sanpham["checked"]!=0){?><p> <?php echo $sanpham["checked"]; ?> lượt xem </p> <?php }?>
 <div><?php for($i=1;$i<=5;$i++){ if ($i<=$sanpham['sao']){?>
<img src="image/star.jpg" height="12" width="12">
 <?php }
 else { ?><img src="image/star2.png" height="12" width="12">
<?php }} ?></div>
<form action="index.php" id="nut"><input type=hidden name="action" value="mua"><input type=hidden name="gia" value="<?php echo $gia;?>"><input type=hidden name="ten" value="<?php echo $sanpham["ten"];?>"><input type=hidden name="id" value="<?php echo $sanpham['thiepid'];?>"> <input type="submit"  value="Vào rỏ" class="btn btn-primary">  </form>

<?php if($recom!=null){ ?><h4>Khách hàng cũng mua sản phẩm sau</h4>

<div class="row">
<?php foreach($recom AS $sp) {?>
<div class="col-md-3 panel panel-default" style="height:130px;">
<?php $sp2=get_sanpham($sp[0]);  
  echo "<h5>$sp[1]</h5>";echo $sp2["mieuta"];?><br>
  <a href="?action=xemsp&thiepid=<?php echo $sp2['thiepid'];?>" class="btn btn-info">Xem </a>
</div>
<?php }?>
</div>
<?php }?>


<?php if(isset($_SESSION["laadmin"])&&$_SESSION["laadmin"]==0 ){?>
<form action="index.php">

<h4>Viết nhận xét</h4>
<input type="hidden" name="action"value="nhanxet">
<input type="hidden" name="nguoiid"value="<?php echo $_SESSION['id'];?>">
<input type="hidden" name="thiepid"value="<?php echo $sanpham['thiepid'];?>">
<label>Miêu tả</label><textarea class="form-control" name="mieuta" rows="5"></textarea><br>
<label>Sao</label><select name="sao">
<option value=1>1</option>
<option value=2>2</option>
<option value=3>3</option>
<option value=4>4</option>
<option value=5>5</option>
</select><br>
<input type="submit" value="Nhận xét" class="btn btn-primary">
</form>
<?php  } ?>
</div>

<div>

<h3>Nhận xét</h3></div>

<?php $nhanxets=get_nhanxet($sanpham['thiepid']); ?>
<?php foreach($nhanxets AS $nhanxet) { ?>
<div class="panel panel-info">
<div class="panel-heading"><h5>
<?php $nguoi=get_nguoi($nhanxet['nguoiid']); echo $nguoi['ho']." ".$nguoi['ten'];?></h5>
<span> <?php echo $nhanxet['ngaythang'];?></span></div>

<div class="panel-body">
<p> <?php echo $nhanxet['mieuta'];?></p>
 <?php for($i=0;$i<$nhanxet['sao'];$i++){?>
<img src="image/star.jpg" height="20" width="20">
 <?php } ?>
</div>
</div>
<?php } ?>

</div>
</section>
</div>
<?php require_once("footer.php");?>
</body>