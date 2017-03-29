 <?php 
$x=false;
$y=false;
$z=false;
$w=false;
$so=1;
$so=filter_input(INPUT_GET,"so",FILTER_VALIDATE_INT);

 switch($action){
	 case "ban":
	 $banid=filter_input(INPUT_GET,"banid",FILTER_VALIDATE_INT);
	$so=get_count_ban($banid);
	
	$sotrang=ceil($so[0]/9);
	$x=true;
		break;
case "xemdssp":
	$y=true;
	$loaiid=filter_input(INPUT_GET,"loaiid",FILTER_VALIDATE_INT);
	$so=get_count_loai($loaiid); 
	$sotrang=ceil($so[0]/9);
		break;
	case "xem":
	$z=true;
	$so=get_count(); 
	$sotrang=ceil($so[0]/9);
	break;
	case "timgia":
	$w=true;
	$gia=filter_input(INPUT_GET,"gia",FILTER_VALIDATE_INT);
		$so=get_count_gia($gia); 
	$sotrang=ceil($so[0]/9);
	break;
}
if($x||$y||$z||$w){
$so=(int)$so;
if($so<$sotrang)
$so=$so+1;}

?>
<div class="pagination">
<ul class="pagination">
<?php if($x):
  for($i=1;$i<=$sotrang;$i++) {?>
	<li><a href="?action=ban&banid=<?php echo $banid?>&so=<?php echo $i;?>"><?php echo $i;?></a></li>
	
  <?php }?>
<li><a href="?action=ban&banid=<?php echo $banid?>&so=<?php echo $so;?>">&raquo;</a></li>
<?php  
endif;?>
<?php if($y)
:  for($i=1;$i<=$sotrang;$i++) {?>
	<li><a href="?action=xemdssp&loaiid=<?php echo $loaiid?>&so=<?php echo $i;?>"><?php echo $i;?></a>	</li>  
	  <?php }?>
	<li> <a href="?action=xemdssp&loaiid=<?php echo $loaiid?>&so=<?php echo $so;?>">&raquo;</a>	</li> 
<?php 	
endif;?>
<?php if($z)
:for($i=1;$i<=$sotrang;$i++) {?>
	<li><a href="?action=xem&so=<?php echo $i;?>"><?php echo $i;?></a></li>
	 <?php }?>
	<li> <a href="?action=xem&so=<?php echo $so;?>">&raquo;</a></li>
<?php 	
endif;?>
<?php if($w)
:for($i=1;$i<=$sotrang;$i++) {?>
	<li><a href="?action=timgia&gia=<?php echo $gia;?>&so=<?php echo $i;?>"><?php echo $i;?></a></li>
	  <?php }?>
	  <li><a href="?action=timgia&gia=<?php echo $gia;?>&so=<?php echo $so;?>">&raquo;</a></li>
<?php 	
endif;?>
</ul>
</div>