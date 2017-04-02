<?php foreach($trangs as $page){?>
<div>
<h4><a href="index.php?action=xemtrang&&trangid=<?php echo $page['id'];?>"><?php echo $page['ten'];?></a>
</h4>
<span>Tác giả:<?php echo $page['tacgia'];?> </span>
<span>Thời gian:<?php echo $page['ngaytao'];?> </span>
<div>
<?php echo $page['noidung'];?>
</div>
<div>
<a class="btn btn-primary"href="index.php?action=xemtrang&&trangid=<?php echo $page['id'];?>">Xem tiếp</a>

</div>
<br>
<?php }?>
<?php include "sotrang.php";?>