<?php

switch($action)
	{
               
                 case "login":
                $email=filter_input(INPUT_POST,"email");
                $password=filter_input(INPUT_POST,"password");
                 $nguoi=kiemtrakhach($email,$password);
                 if($nguoi['ten']==null){
                 header("Location:.");
                  }
                 else {
                 $_SESSION['ten']=$nguoi['ten'];
                 $_SESSION['laadmin']=$nguoi['laadmin'];
				 $_SESSION['id']=$nguoi['id'];
                header("Location:.");
                  }

                break;
               
                
                case "logout":
                 $_SESSION=array();
               
                 header("Location:.");
                  break;
	}