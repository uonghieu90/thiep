 <?php 
$x=false;
$y=false;
$z=false;
 switch($action){
	 case "ban":
	 $banid=filter_input(INPUT_GET,"banid",FILTER_VALIDATE_INT);
	$ban=get_ten_loai_ban($banid);
	$x=true;
		break;
case "xemdssp":
    $x=true;
	$y=true;
	$loaiid=filter_input(INPUT_GET,"loaiid",FILTER_VALIDATE_INT);
	$loai=get_ten_loai($loaiid); 
		$banid=$loai['ban'];
		$ban=get_ten_loai_ban($banid);
		break;
	case "xemsp":
	$thiepid=filter_input(INPUT_GET,"thiepid",FILTER_VALIDATE_INT);
	$sanpham=get_sanpham($thiepid);
		$loaiid=$sanpham['loaiid'];
		$loai=get_ten_loai($loaiid); 
		$banid=$loai['ban'];
	$ban=get_ten_loai_ban($banid);
	  $x=true;
	$y=true;
	$z=true;
	break;
}
?>
<a href=".">Home</a>
<?php if($x):
?>
	><a href="?action=ban&banid=<?php echo $banid?>"><?php echo $ban['ten'];?></a>
	
<?php	
endif;?>
<?php if($y)
:?>
	><a href="?action=xemdssp&loaiid=<?php echo $loaiid?>"><?php echo $loai['ten'];?></a>
	
<?php	
endif;?>
<?php if($z)
:?>
	><a href="?action=xemsp&thieid=<?php echo $thiepid?>"><?php echo $sanpham['ten'];?></a>
	
<?php	
endif;?>