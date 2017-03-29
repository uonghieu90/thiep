<h5> Nhập vào địa chỉ bạn muốn gửi hàng đến</h5>
<form action="index.php">


<input type="hidden" name="action" value="khangdinh">
<input type="hidden" name="rohangid" value="<?php echo $rohangid;?>"">
<label>Địa chỉ </label> <textarea class="form-control" rows="5" name="diachi" value="<?php echo $nguoi['diachi'];?>"><?php echo $nguoi['diachi'];?></textarea>
<label>Điện thoại </label><input type=text name="dt"value="<?php echo $nguoi['dt'];?>" ><br>

<input type=submit value='Xác nhận địa chỉ' class="btn btn-primary">
</form>