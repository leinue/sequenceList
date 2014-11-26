<?php

/**
* 顶点结点
*/
class VNode{

	private $data;
	private $firstArc;
	
	function __construct($data=NULL,$firstArc=NULL){
		$this->data=$data;
		$this->firstArc=$firstArc;
	}

	function getData(){
		return $this->data;
	}

	function getFirstArc(){
		return $this->firstArc;
	}

	function setData($data){
		$this->data=$data;
	}

	function setFirstArc($new){
		$this->firstArc=$new;
	}
}

?>