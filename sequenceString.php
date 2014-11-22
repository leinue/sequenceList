<?php

/**
* sequenceString
* 顺序串
*/
class sequenceString{
	
	private $strValue=array();
	private $curlen;
	private $maxSize;

	function __construct($max){
		$this->curlen=0;
		$this->maxSize=$max;
	}

	function clear(){
		$this->curlen=0;
		$this->strValue=array();
	}

	function length(){
		return $this->curlen;
	}

	function isEmpty(){
		return $this->curlen==0;
	}

	function charAt($i){
		if($i<$this->length() && $i>=0){
			return $this->strValue[$i];
		}else{
			return NULL;
		}
	}

	function subString($begin,$end){

	}

	//在offset个字符之前插入str 0<=offset<=curlen
	function insert($offset,$str){
		if($offset<0){
			return -1;//范围不对
		}

		$length=strlen($str);
		$addedLength=$this->curlen+$length;
		//print($addedLength."<br>");

		//空间不足 分配空间
		if($addedLength>$this->maxSize){
			$this->allocate();
		}

		for($i=$this->curlen-1;$i>=$offset;$i--){
			$this->strValue[$length+$i]=$this->strValue[$i];
			//print($this->strValue[$i]."<br>");
		}

		for($i=0;$i<$length;$i++){
			$this->strValue[$offset+$i]=$str[$i];
			//print("offset=$offset+$i;add=".$this->strValue[$offset+1]."<br>");
		}

		$this->curlen=$addedLength;
	}

	function allocate(){
		$temp=$this->strValue;
		for($i=0;$i<count($this->strValue);$i++){
			$this->strValue[$i]=$temp[$i];
		}
	}

	function delete($begin,$end){

	}

	function concat($str){

	}

	function compareTo($str){

	}

	function indexOf($str,$begin){

	}
}

$ss=new sequenceString(5);
$ss->insert(0,"fuck");

print("charAt=".$ss->charAt(0)."<br>");

$ss->insert(4,"bitch");
print("charAt=".$ss->charAt(4));
?>