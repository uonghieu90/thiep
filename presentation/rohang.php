<?php
 switch($action)
	{
 case "mua":
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
				 {$rohangid=get_rohang($value); 
			      add_hrh($rohangid,$gia,$ten1,$id,1);
			 }
				 $rohangid=get_rohang2($value);
				$recom=recommend_rohang($rohangid);
				 $mua=show_hrh($rohangid);
                 $them=table4($mua);
				 if($mua!=null)
				 $them.="<h4>Khách hàng cũng mua sản phẩm sau</h4><div class=row>";
               foreach($recom AS $sp) {
              $them.="<div class='col-md-3 panel panel-default' style=height:130px;>";
               $sp2=get_sanpham($sp[0]);  
               $them.="<h5>$sp[1]</h5>".$sp2["mieuta"]."<br>";
               $them.="<a href=?action=xemsp&thiepid=$sp2[thiepid] class='btn btn-info'>Xem </a>";
                $them.= "</div>";
                     }
                  $them.="</div>";
                  $trang=get_trang(10);
                  $tsl=tinhsoluong();
                     include "view/trang.php";
                  break;
				  case "chonmh":
                 $id=filter_input(INPUT_GET,"id");
                  $sl=filter_input(INPUT_GET,"sl");
                $rohangid=filter_input(INPUT_GET,"rohangid");
				$thiepid=filter_input(INPUT_GET,"thiepid");
               sua_hrh($rohangid,$thiepid,$sl);
                  $mua=show_hrh($rohangid);
                 $them=table4($mua);
                  $trang=get_trang(10);
                 
                     include "view/trang.php";
                  break;
                case "xoamh":
				
                 $id=filter_input(INPUT_GET,"id");
				 $rohangid=filter_input(INPUT_GET,"rohangid");
                 delete_hrh($id);
                $mua=show_hrh($rohangid);
                 $them=table4($mua);
                  $trang=get_trang(10);
                 
                     include "view/trang.php";
                  case "xoarohang":

				 $rohangid=filter_input(INPUT_GET,"rohangid");
                 delete_rohang($rohangid);
                
                  header("Location:index.php?action=mua");
                  break;
				  case "diachi":
				  $id=$_SESSION['id'];
				  if($id!=null){
				  $nguoi=get_nguoi($id);
				  }
				  
			   $rohangid=filter_input(INPUT_GET,"rohangid");
	             $trang['ten']="Bước 1 :Xác nhận địa chỉ";
                  $them="1_diachi.php"	 ;
	              $trang["noidung"]="";
                 	include "view/trangmau.php";
				  break;
				  case "khangdinh":
				  $rohangid=filter_input(INPUT_GET,"rohangid");
				  $diachi=filter_input(INPUT_GET,"diachi");
				  $dt=filter_input(INPUT_GET,"dt");
				  sua_hrh2($rohangid,$diachi,$dt);
				  $trang['ten']="Bước 2:Xác nhận mua hàng";
				  $them="2_xemlairo.php"	 ;
				  $mangs=show_hrh($rohangid);
                 
	              $trang["noidung"]="";
                 	include "view/trangmau.php";
					break;
				   case "tratien":
				   $thanhtoan=filter_input(INPUT_GET,"thanhtoan");
                  $nguoi=$_SESSION['id'];
				 $rohangid=filter_input(INPUT_GET,"rohangid");
				 $mua=show_hrh($rohangid);
				 if($mua==NULL)
				 {header("Location:index.php");
				 break;}
				 $tong=tong($mua);
				 $tong=$tong/22.6;
				 $tong=number_format($tong, 2, '.', '');
				 $donhangid=tao_donhang($nguoi);
				 insert_dhdc($rohangid,$donhangid,$thanhtoan);
				 foreach($mua AS $hang){
					 create_donhang($donhangid,$hang['gia'],$hang['ten'],$hang['thiepid'],$hang['soluong']);
				 }
                 delete_rohang($rohangid);
				 
				 $trang['ten']="Trả tiền";
			   
	              if($thanhtoan==2)
                  $them="paypal.php"	 ;
			    elseif($thanhtoan==1)
				$them="tienmat.php";
	              $trang["noidung"]="";
                 	include "view/trangmau.php";
				 
				 
				 
				 $mua="";
                
                  //header("Location:index.php?action=mua");
                  break;
	}