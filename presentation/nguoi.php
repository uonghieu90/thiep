$action=filter_input(INPUT_POST,"action");
switch($action){
                  
				  case "xemnguoi":
                     $id=filter_input(INPUT_GET,"id");
                    $nguoi=get_nguoi($id);
                     $them=danhsach($nguoi);
                     $trang=get_trang(9);
                     include "view/trang.php";
                  break;
				
}