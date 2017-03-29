<?PHP
$sanphams=get_sanpham_random();
$i=0;
 ?>

<div id="carousel-example-generic" class="carousel slide body" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>
 
  <!-- Wrapper for slides -->
  <div class="carousel-inner" style="background: url('image/header2blue.jpg'); height:200px;">
    <?php foreach($sanphams AS $sanpham) {?>
	
	<?php if($i==0) {?><div class="item active" style="margin-top:20px;"><?php $i++;}else {?>
	<div class="item" style="margin-top:20px;">
	<?php }?>
	<div class="crop center-block"><a href="?action=xemsp&thiepid=<?php echo $sanpham['thiepid'];?>">
      <img src="image/<?php echo $sanpham['hinhanh'];?>" height="200px" width="auto"></a>
	  </div>
      <div class="carousel-caption">
      	<h3><?php echo $sanpham["ten"]; ?></h3>
      </div>
	
    </div>
	
    <?php }?>
  </div>
 
  <!-- Controls -->
  <!--<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>-->
</div> <!-- Carousel -->