
<?php 
$bo=false;
$bo2=false;
 if($action=="formnhapnguoi")
				  $bo=true;
			      else $bo2=true;
?>

<p>Tên:<?php echo $nguoi['ten'];?></p>
<p>Họ:<?php echo $nguoi['ho'];?></p>
<p>Email:<?php echo $nguoi['email'];?></p>
<p>Password:<?php echo $nguoi['password'];?></p>
<p>Địa chỉ:<?php echo $nguoi['diachi'];?></p>
<p>Điện thoại:<?php echo $nguoi['dt'];?></p>
<form action="index.php">

<input type="hidden" name="id" value="<?php echo $nguoi['id'];?>">
<?php if($bo==true){?>
<input type="hidden" name="action" value="suanguoi">
<label>Tên</label><input type=text name="ten" value="<?php echo $nguoi['ten'];?>"><br>
<label>Họ </label><input type=text name="ho" value="<?php echo $nguoi['ho'];?>"><br>
<label>Email </label><input type=text name="email" value="<?php echo $nguoi['email'];?>"><br>
<label>Password </label><input type=text name="password" value="<?php echo $nguoi['password'];?>"><br>
<?php }?>
<?php if($bo2==true){?>
<input type="hidden" name="action" value="suadiachi">
<label>Địa chỉ </label> <textarea class="form-control" rows="5" name="diachi" value="<?php echo $nguoi['diachi'];?>"><?php echo $nguoi['diachi'];?></textarea>
<label>Điện thoại </label><input type=text name="dt"value="<?php echo $nguoi['dt'];?>" ><br>
<?php }?>
<input type=submit value=suanguoi class="btn btn-primary">
</form>