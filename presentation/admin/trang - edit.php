 $action=filter_input(INPUT_POST,"action");
switch($action){

               case  "taotrang":              
		$trang= array();
		$trang["vitri"]=filter_input(INPUT_POST,"vitri",FILTER_VALIDATE_INT);
		$trang["ten"]=filter_input(INPUT_POST,"ten");
		$trang["noidung"]=filter_input(INPUT_POST,"noidung");
                 $trang["menu"]=filter_input(INPUT_POST,"menu");
                $trang["lamenu"]=filter_input(INPUT_POST,"lamenu",FILTER_VALIDATE_INT);
		 if ($trang["vitri"]==NULL || $trang["ten"]==null || $trang["noidung"]==null|| $trang["menu"]==null/**/)
		 {
			 baoloi(" l?i nh?p d? li?u sai");

		 }
	      else
		  {
			  create_trang($trang);
			  header("Location:.");			  
		  }
		  break;
		   case "suatrang1":              
		$trang= array();
                $trang["id"]=filter_input(INPUT_POST,"id");
		$trang["ten"]=filter_input(INPUT_POST,"ten");
		$trang["noidung"]=filter_input(INPUT_POST,"noidung");
		$trang["vitri"]=filter_input(INPUT_POST,"vitri",FILTER_VALIDATE_INT);
		$trang["menu"]=filter_input(INPUT_POST,"menu");                  
                 $trang["lamenu"]=filter_input(INPUT_POST,"lamenu",FILTER_VALIDATE_INT);
		 if ( $trang["ten"]==null || $trang["noidung"]==null|| $trang["vitri"]==null || $trang["menu"]==null/**/)
		 {
			 baoloi(" l?i nh?p d? li?u sai"); 

		 }
	      else
		  { 
			  sua_trang($trang);
			  header("Location:.?action=xemtrang&trangid=$trang[id]");			  
		  }
		  break;
		   case "xoatrang":
		$id=filter_input(INPUT_GET,"trangid",FILTER_VALIDATE_INT);
		delete_trang($id);
		 header("Location:.");
		
		break;
		case "suatrang":
                 $trangid=filter_input(INPUT_GET,"trangid",FILTER_VALIDATE_INT);
		if($trangid==NULL || $trangid==false) $trangid=1;
		$cacloai=get_loai();
		$trang=get_trang($trangid);
                $tieude="Sua trang";
		include("view/nhaptrang.php");
                break;
		case "formnhaptrang":
                  $cacloai=get_loai();
                 $tieude="tao trang";
		include("view/nhaptrang.php");
                break;
		  }