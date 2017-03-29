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
<h1>Người edit</h1>
<?php echo $them; ?>
<?php include "sotrang.php";?>
<!--<h2><?php //if(isset($tieude))echo $tieude; ?> </h2>-->
<?php if(isset($them2))echo $them2; ?>
</form>
</section>
</div>

<?php require_once("footer.php");?>
</body>