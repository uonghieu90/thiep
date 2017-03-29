<?php $dsn="mysql:host=localhost;dbname=thiep";
      $user="root";
       $password="";
       try{
        $db=new PDO ($dsn,$user,$password);
		$db->exec("set names utf8");
       }
        catch(PDOException $e)
       {
         echo $e->getMessage();
        }
		
?>