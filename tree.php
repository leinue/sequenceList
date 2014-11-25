<?php

/**
* linkQueue
*/
class linkQueue{
	
	private $front;
	private $rear;

	function __construct(){
		$this->front=$this->rear=new node();
	}

	function clear(){
		$this->front=$this->rear=NULL;
	}

	function length(){
		if($this->isEmpty()){
			return NULL;
		}else{
			$p=$this->front;
			$length=0;
			while($p!=NULL){
				$p=$p->getNext();
				$length++;
			}
			return $length-1;
		}
	}

	function offer($x){
		$p=new node($x);
		if($this->front!=NULL){
			$this->rear->setNext($p);
			$this->rear=$p;
		}else{
			$this->fron=$this->rear=$p;
		}
	}

	function poll(){
		print($this->front->getData());
		if($this->front!=NULL){
			$p=$this->front;
			$this->front=$this->front->getNext()->getNext();
			return $p->getNext()->getData();
		}else{
			return NULL;
		}
	}

	function peek(){
		if($this->isEmpty()){
			return NULL;
		}else{
			return $this->front->getNext()->getData();
		}
	}

	function isEmpty(){
		return $this->front==NULL;
	}

	function display(){
		if($this->isEmpty()){
			print("NULL");
		}else{
			$p=$this->front;
			while($p!=NULL){
				print($p->getData()."  ");
				$p=$p->getNext();
			}
		}
	}
}

/**
* treeNode
*/
class CSTreeNode{

	private $data;
	private $firstChild,$nextSibling;
	
	function __construct($data,$firstChild,$nextSibling){
		$this->data=$data;
		$this->firstChild=$firstChild;
		$this->nextSibling=$nextSibling;
	}

	function getData(){
		return $this->data;
	}

	function getFirstChild(){
		return $this->firstChild;
	}

	function getNextSibling(){
		return $this->nextSibling;
	}

	function setData($data){
		$this->data=$data;
	}

	function setFirstChild($firstChild){
		$this->firstChild=$firstChild;
	}

	function setNextSibling($nextSibling){
		$this->nextSibling=$nextSibling;
	}
}

//先根遍历树
function preRootTraverse($T){
	if($T!=NULL){
		print($T->getData());
		preRootTraverse($T->firstChild());
		preRootTraverse($T->getNextSibling());
	}
}

//后根遍历树
function postRoorTraverse($T){
	if($T!=NULL){
		preRootTraverse($T->firstChild());
		print($T->getData());
		preRootTraverse($T->getNextSibling());		
	}
}

//层次遍历
function levelTraverse($T){
	if($T!=NULL){
		$l=new linkQueue();
		$l->offer($T);
		while(!$l->isEmpty()){
			for($T=$l->poll();$T!=NULL;$T=$T->getNextSibling()){
				print($T->getData()."   ");
				if($T->getFirstChild()!=NULL){
					$l->offer($T->getFirstChild());
				}
			}
		}
	}
}

?>