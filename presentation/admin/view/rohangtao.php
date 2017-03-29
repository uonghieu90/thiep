<!DOCTYPE html>
<?php 
if($action=="xemrohang"){
	$rohangid=filter_input(INPUT_GET,"rohangid");
	
	$rohang=show_hrh($rohangid);
	$them2=tablerh($rohang);
	$title="Xem rỏ hàng";
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
<h1>Rỏ hàng edit</h1>
<?php echo $them;?>
<?php include "sotrang.php";?>
<?php if(isset($title)){?>
<h2><?php echo $title;?> </h2>
<?php echo $them2;?>
<?php } ?>
</section>
</div>
<?php require_once("footer.php");?>
</body>