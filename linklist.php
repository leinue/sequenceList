<?php

/**
* 节点类
*/
class node{
	
	private $data;
	private $next;

	function __construct($Data=NULL,$Next=NULL){
		$this->data=$Data;
		$this->next=$next;
	}

	function getData(){
		return $this->data;
	}

	function getNext(){
		return $this->next;
	}

	function setData($Data){
		return $this->data=$Data;
	}

	function setNext($Next){
		$this->next=$Next;
	}
}

/**
* 单链表类
*/
class linkList{
	
	private $head;

	function __construct(argument){
		$head=new node();
	}
}

?>