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

/**
* 记录关键字类
*/
class keyType{
	
	private $key;

	function __construct($key=NULL){
		$this->key=$key;
	}

	function getKey(){
		return $this->key;
	}

	function setKey($key){
		$this->key=$key;
	}

	function toString(){
		return $key+" ";
	}

	function compareTo(keyType anotherType){
		$thisVal=$this->key;
		$anotherVal=$anotherType->getKey();
		return ($thisVal<$anotherVal ? -1 : ($thisVal==$anotherVal ? 0:1));
	}
}

/**
* 顺序表类
*/
class seqList{
	
	private $r;//顺序表记录结点数组
	private $curLen;//顺序表长度,即记录个数
	private $maxSize;//存储空间容量

	function __construct($max){
		$this->maxSize=$max;
		$this->curLen=0;
	}

	function getRecord(){
		return $this->r;
	}

	function setRecord($new){
		$this->r=$new;
	}

	function insert($index,recordNode $x){
		if($this->curLen==$this->maxSize){
			return -1; //序列表已满
		}

		if($index<0 || $index>$this->curLen){
			return -2; //index不合法
		}

		for($i=$this->curLen;$i>$index;$i--){ 
			$this->r[$i]=$this->r[$i-1];
		}

		$this->r[$index]=$x;
		$this->curLen+=1;
	}

}

?>