<?php

		$sao=filter_input(INPUT_GET,"sao",FILTER_VALIDATE_INT);
		$giaca=filter_input(INPUT_GET,"giaca",FILTER_VALIDATE_INT);
		$mausac=filter_input(INPUT_GET,"mausac",FILTER_VALIDATE_INT);
		$kichco=filter_input(INPUT_GET,"kichco",FILTER_VALIDATE_INT);
		if($sao==null)$sao=0;
		if($giaca==null)$giaca=0;
		if($mausac==null)$mausac=0;
		if($kichco==null)$kichco=0;
		if($sao==null&&$giaca==null&&$mausac==null&&$kichco==null) header('Location:.?index.php');
		$cacsanpham=get_sanpham_tinhchat($giaca,$sao,$mausac,$kichco);
      include "view/tinhchat-pre.php";
        
		