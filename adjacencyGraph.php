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

/**
* 边结点类
*/
class arcNode{

	private $value;//边或弧的权值
	private $nextArc;//指向下一条弧
	private $adjVex;//改弧指向的顶点位置
	
	function __construct($value=NULL,$nextArc=NULL,$adjVex=NULL){
		$this->value=$value;
		$this->adjVex=$adjVex;
		$this->nextArc=$nextArc;
	}

	function getValue(){
		return $this->value;
	}

	function getAjdVex(){
		return $this->adjVex;
	}

	function getNextArc(){
		return $this->nextArc;
	}

	function setValue($new){
		$this->value=$new;
	}

	function setAdjVex($new){
		$this->adjVex=$new;
	}

	function setNextArc($new){
		$this->nextArc=$new;
	}
}

?>