<?php $giaca=new Tinhchat(1);
$sao=new Tinhchat(2);
$mausac=new Tinhchat(3);
$kichco=new Tinhchat(4);
$mang=["blue","red","violet","yellow","white","pink","brown"];

$sao1=filter_input(INPUT_GET,"sao",FILTER_VALIDATE_INT);
		$giaca1=filter_input(INPUT_GET,"giaca",FILTER_VALIDATE_INT);
		$mausac1=filter_input(INPUT_GET,"mausac",FILTER_VALIDATE_INT);
		$kichco1=filter_input(INPUT_GET,"kichco",FILTER_VALIDATE_INT);
$arr=["","","",""];
$arr2=["giaca","sao","mausac","kichco"];
$arr3=[$giaca1,$sao1,$mausac1,$kichco1];
for ($i=0;$i<4;$i++)
{
for($j=0;$j<4;$j++){
	if($i!=$j && $arr3[$j]!=0) $arr[$i].="&&".$arr2[$j]."=".$arr3[$j];
}

}





?>


<div class="panel panel-info">
<div class="panel-heading"><h4>Gía thành </h4></div>
<div class="panel-body">
<input type=hidden name="tinhchat" value="1"><ul class="nav nav-list">
<?php for($i=0;$i<$giaca->getlength();$i++){
	$tinh=$giaca->getdong($i)?>
<li>
<a href="?action=tinhchat&<?php echo $giaca->getten();?>=<?php echo $tinh['id'].$arr[0];?>">
<?php echo $tinh['thap'];?>000 VND- <?php echo $tinh['cao'];?>000 VND
</a></li>

<?php } ?></ul>
</div>
</div>

<div class="panel panel-info">
<div class="panel-heading"><h4>Sao </h4></div>
<div class="panel-body">
<input type=hidden name="tinhchat" value="1"><ul class="nav nav-list">
<?php for($i=0;$i<$sao->getlength();$i++){
	$tinh=$sao->getdong($i)?>
<li>
<a href="?action=tinhchat&<?php echo $sao->getten();?>=<?php echo $tinh['id'].$arr[1];?>">
<?php //echo $tinh['thap'];?> <?php //echo $tinh['cao'];?>
<?php for($j=1;$j<=$i+1;$j++){ ?>
<img src="image/star.jpg" height="12" width="12">
 <?php }?>
</a></li>

<?php } ?></ul>
</div>
</div>


<div class="panel panel-info">
<div class="panel-heading"><h4>Màu sắc </h4></div>
<div class="panel-body">
<input type=hidden name="tinhchat" value="1">
<?php for($i=0;$i<$mausac->getlength();$i++){
	$tinh=$mausac->getdong($i)?>

<a href="?action=tinhchat&<?php echo $mausac->getten();?>=<?php echo $tinh['id'].$arr[2];?>" style="text-decoration: none;">
<?php //echo $tinh['ten'];?> <div class="btn" style="background-color:<?php echo $mang[$i]?>;height:25px;padding-bottom:5px;"></div>
</a>

<?php } ?>
</div>
</div>

<div class="panel panel-info">
<div class="panel-heading"><h4>Kích cỡ </h4></div>
<div class="panel-body">
<input type=hidden name="tinhchat" value="1">
<?php for($i=0;$i<$kichco->getlength();$i++){
	$tinh=$kichco->getdong($i)?>

<a href="?action=tinhchat&<?php echo $kichco->getten();?>=<?php echo $tinh['id'].$arr[3];?>" style="text-decoration: none;">
<?php $array=explode("X", $tinh['ten']); echo $array[0]."cmX".$array[1]."cm";?> 
</a>

<?php } ?>
</div>
</div>

