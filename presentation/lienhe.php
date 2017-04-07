<?php
switch($action)
{
	case "postlienhe":postlienhe();
	break;
}



function postlienhe(){
	$hoten=filter_input(INPUT_GET,"hoten");
	$diachi=filter_input(INPUT_GET,"diachi");
	$dt=filter_input(INPUT_GET,"dienthoai");
	$email=filter_input(INPUT_GET,"email");
	$tieude=filter_input(INPUT_GET,"tieude");
	$noidung=filter_input(INPUT_GET,"noidung");
	create_lienhe($hoten,$diachi,$dt,$email,$tieude,
$noidung);
    header("Location:.");
     
}
