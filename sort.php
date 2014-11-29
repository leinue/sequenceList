<?php

/**
* 顺序表记录类
*/
class recordNode{
	
	private $key;//关键字
	private $element;//数据元素

	function __construct($key,$element=NULL){
		$this->key=$key;
		$this->element=$element;
	}

	function getKey(){
		return $this->key;
	}

	function getElement(){
		return $this->element;
	}

	function setKey($key){
		$this->key=$key;
	}

	function setElement($element){
		$this->element=$element;
	}
}


?>