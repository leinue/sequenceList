<?php

/**
* 节点类
*/
class node{
	
	private $data;
	private $next;

	function __construct($Data=NULL,node $Next=NULL){
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

	function setNext(node $Next){
		$this->next=$Next;
	}
}

/**
* 单链表类
*/
class linkList{
	
	private $head;

	function __construct(argument){
		$this->head=new node();
	}

	function create1($n){

	}

	function create2($n){

	}

	function get($i){

	}

	function insert($i,$x){
		$p=$this->head;
		$j=0;

		while($p!=NULL && $j<$i-1){
			$p=$p->getNext();
			$j+=1;
		}

		if($j>$i || $p=null){
			return -1; //插入位置非法
		}

		$s=new node($x);
		if($i==0){
			//表头
			$s->setNext($p);
			$p=$s;
		}else{
			$s->setNext($p->getNext());
			$p->setNext($s);
		}
	}

	function remnove($i){

	}

	function indexOf($x){

	}

	function clear(){
		$this->head->setData(NULL);
		$this->head->setNext(NULL);
	}

	function isEmpty(){
		return $this->head->getNext()==NULL;
	}

	function length(){
		$p=$this->head->getNext();
		$length=0;
		while($p!=NULL){
			$p=$this->head->getNext();
			$length+=1;
		}
		return $length;
	}

	function display(){
		$p=$this->head->getNext();
		while($p!=NULL){
			print("data=".$this->head->getData()."<br>");
			$p=$this->head->getNext();
		}
	}
}

?>