<?php
$cacloai=get_loai();
$ban=get_ban();
if(isset($banid))
$cacloai=get_loai_ban($banid);
	
?>
<aside>
<?php include "login.php";?>

<div class="panel panel-info">
<div class="panel-heading">
<h4> Tìm kiếm</h4></div>
<div class="panel-body">
<form action="index.php">
<input type="hidden" name="action" value="search">
<div class="input-append">
<input type="text" name="tu" class="span2 search-query"></input>
<input type="submit" value="Tìm kiếm" class="btn btn-primary">
</div>
</form>
</div></div>


<div class="panel panel-info">
<div class="panel-heading"><h4 class="panel-title">Các ban</h4></div>
<div class="panel-body">
<nav>
<ul class="nav nav-list">
<?php foreach ($ban AS $ban1): ?>
<li>
<a href="?action=ban&banid=<?php echo $ban1['banid'];?>">
<?php echo $ban1["ten"]; echo " (".get_count_banthiep($ban1['banid'])[0].")";?>
</a>
</li>
<?php endforeach; ?>
</ul>
</nav>
</div>
</div>
<?php if(isset($banid)){?>
<div class="panel panel-info">
<div class="panel-heading">
<h4> Các loại thiếp</h4></div>
<div class="panel-body">
<nav>
<ul class="nav nav-list">
<?php foreach ($cacloai AS $loai1): ?>
<li>
<a href="?action=xemdssp&loaiid=<?php echo $loai1['loaiid'];?>">
<?php echo $loai1["ten"];echo " (".get_count_loai($loai1['loaiid'])[0].")"; ?>
</a>
</li>
<?php endforeach; ?>
</ul>
</nav>
</div>
</div>

<?php }?>
<!--
<div class="panel panel-info">
<div class="panel-heading">
<h4>Giá thành </h4></div>
<div class="panel-body">
<ul class="nav nav-list">
<li>
<a href="?action=timgia&&gia=1">
5000 VND- 10000 VND
</a></li>
<li>
<a href="?action=timgia&&gia=2">
11000 VND- 15000 VND
</a></li>
<li>
<a href="?action=timgia&&gia=3">
16000 VND- 200000 VND
</a></li>
<li>
<a href="?action=timgia&&gia=4">
21000 VND- 250000 VND
</a></li>
</ul>
</div>
</div>
--!>
<?php include "tinhchat.php";?>
<!--
<//?php if($_SESSION["laadmin"]==1){?>
<h3> Hành động admin</h3>
<ul>
<li>
<a href="?action=formnhapthiep">
Nhập thiếp
</a> </li>
<li>
<a href="?action=formnhaploai">
Nhập loại
</a>
</li>
<li>
<a href="?action=formnhaptrang">
Nhập trang
</a>
</li>
</ul>-->

</aside>