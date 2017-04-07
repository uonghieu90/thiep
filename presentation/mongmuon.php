<?php
 switch($action)
	{
 case "getmongmuon":
                 $gia=filter_input(INPUT_GET,"gia");
                 
				 $ten1=filter_input(INPUT_GET,"ten");
                  
                 $id=filter_input(INPUT_GET,"id");
                if(isset($_COOKIE['user']))
				 $value=$_COOKIE['user'];
                 if(!isset($_COOKIE['user'])) {
					 $value=uniqid();
					 setcookie('user', $value, time() + (86400 * 30), "/");
					 
				 }
				 
				 if($gia!=NULL)
				 {$mongmuonid=get_mongmuon($value); 
			      add_mm($mongmuonid,$id,$gia,$ten1);
			 }
				 $mongmuonid=get_mongmuon2($value);
				
				 $mangs=show_mm($mongmuonid);
                  $trang['ten']="Yêu thích";
      $trang['noidung']="";
	  $them="yeuthich.php";
		include("view/trangmau.php");
                  break;
                case "xoamm":
				
                 $id=filter_input(INPUT_GET,"id");
				 $mongmuonid=filter_input(INPUT_GET,"mongmuonid");
                 delete_mm($id);
               header("Location:.?action=getmongmuon");
			   break;
                  case "xoamongmuon":

				 $mongmuonid=filter_input(INPUT_GET,"mongmuonid");
                 delete_mongmuon($mongmuonid);
                
                   header("Location:.?action=getmongmuon");
                  break;
				 
	}