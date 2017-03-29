<!DOCTYPE html>
<html>
<head>
<?php require_once("head.php");?>
<link rel="stylesheet" type="text/css" href="style.css">
<title>Thiep</title>
</head>
<body>
<?php require_once("header.php");?>
<div class="body">
<?php require_once("aside.php");?>
<section>
<h2><?php echo $trang['ten']; ?> </h2>

<p><?php echo $trang["noidung"]; ?></p>
<?php if(isset($them))echo $them; ?>

</section>
</div>
<?php require_once("footer.php");?>
</body>