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
		
	}

	function subString($begin,$end){

	}

	function insert($offset,$str){

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

?>