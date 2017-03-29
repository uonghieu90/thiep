<?php

switch($action)
	{
               
                 case "login":
                $ten=filter_input(INPUT_POST,"ten");
                $password=filter_input(INPUT_POST,"password");
                 $nguoi=kiemtraadmin($ten,$password);
                 if($nguoi['ten']==null){
                  header("Location:admin.php");
                  }
                 else {
                 $_SESSION['ten']=$nguoi['ten'];
                 $_SESSION['laadmin']=$nguoi['laadmin'];
				 unset($_SESSION['id']);
                 header("Location:admin.php");
                  }

                break;
               
                
                case "logout":
                 $_SESSION=array();
               
                 header("Location:admin.php");
                  break;
	}