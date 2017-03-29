<?php

class TinhChat{
	private $ten="";
	private $laso;
	private $hang_tinhchat=[];
	private $length;
	function __construct($id)
	{ 
		global $db;
        $q="SELECT * FROM tinhchat WHERE id= :id";
         $s=$db->prepare($q)	;
        $s->bindValue(":id",$id);
         $s->execute();
        $product=$s->fetch();
        $s->closeCursor();
        $this->ten=$product['ten'];
		$this->laso=$product['so'];
		$q="SELECT * FROM hang_tinhchat WHERE tinhchat= :id";
		$s=$db->prepare($q)	;
        $s->bindValue(":id",$id);
         $s->execute();
        $tinhchats=$s->fetchAll();
        $s->closeCursor();
		$this->hang_tinhchat=$tinhchats;
		
	}
	function getten(){
		return $this->ten;
	}
	function getlength(){
		return sizeof($this->hang_tinhchat);
	}
	function getso(){
		 if($this->laso==1)return true;
		 else return false;
	}
	function gettinhchat(){
		return $this->hang_tinhchat;
	}
	function getdong($id){
		return $this->hang_tinhchat[$id];
	}
}