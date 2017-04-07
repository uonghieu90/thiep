 <?php 
$so1=1;
$so1=filter_input(INPUT_GET,"so",FILTER_VALIDATE_INT);

 switch($action){
	 case "formnhaploai":
	  case "sualoai":
	$so=get_count_loai2();
	$action="formnhaploai";
	$sotrang=ceil($so[0]/9);
		break;

		 case "formnhapban":
		 case "suaban":
	$so=get_count_ban2();
	$action="formnhapban";
	$sotrang=ceil($so[0]/9);
		break;
		 case "formnhapnguoi":
		 case "suanguoi":
	$so=get_count_nguoi();
	$action="formnhapnguoi";
	$sotrang=ceil($so[0]/9);
		break;
		 case "formnhapthiep":
		  case  "suasp":case "xuathiep":
	$so=get_count();
	$action="formnhapthiep";
	$sotrang=ceil($so[0]/9);
		break;
		 case "formnhapdonhang":
		 case "xemdonhang2":case "xoadonhang":case "suadonhang":
	$so=get_count_donhang();
	$action="formnhapdonhang";
	$sotrang=ceil($so[0]/9);
		break;
 case "formnhaprohang":
   case "xemrohang":
	$so=get_count_rohang();
	$action="formnhaprohang";
	$sotrang=ceil($so[0]/9);
		break;
	case "formnhaptrang":case "suatrang":
	$so=get_count_trang();
	$action="formnhaptrang";
	$sotrang=ceil($so[0]/9);
		break;
		case "formlienhe":
	$so=get_count_lienhe2();
	$action="formlienhe";
	$sotrang=ceil($so[0]/9);
		break;
}

$so=(int)$so1;
if($so<$sotrang){
$so=$so+1;}

?>
<div class="pagination">
<ul class="pagination">
<?php  for($i=1;$i<=$sotrang;$i++) {?>
	<li><a href="?action=<?php echo $action?>&so=<?php echo $i;?>"><?php echo $i;?></a></li>
	
  <?php }?>
<li><a href="?action=<?php echo $action?>&so=<?php echo $so;?>">&raquo;</a></li>
</ul>
</div>