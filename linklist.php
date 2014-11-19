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

	function __construct($Data=NULL,$Next=NULL){
		$this->head=new node($Data,$Next);
	}

	//下面这两个函数可以当作是降序或升序排列

	function createAfterHead($Data){
		$this->insert(0,$Data);
	}

	function createAtLast($Data){
		$this->insert($this->length(),$Data);
	}

	function get($i){
		$p=$this->head->getNext();

		$j=0;

		while($p!=NULL && $j<$i){
			$p=$this->head->getNext();
			$j+=1;
		}

		if($p=null || $j>$i){
			return -1; //不存在
		}

		return $p->getData();
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
			$this->head=$s;
		}else{
			$s->setNext($p->getNext());
			$p->setNext($s);
		}
	}

	function remove($i){
		$p=$this->head;

		$j=-1;

		while($p->getNext()!=NULL && $j<$i-1){
			$p=$p->getNext();
			$j+=1;
		}

		if($j>$i-1 || $p->getNext==NULL){
			return -1; //删除位置不合法
		}

		$p->setNext($p->getNext()->getNext());
	}

	function indexOf($x){
		$p=$this->getNext();

		$j=0;
		while($p!=NULL && $p->getData()==$x){
			$p=$this->getNext();
			$j+=1;
		}

		if($p!=NULL){
			return $j;
		}else{
			return -1; //没有找到
		}
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

$L=new linkList();

for($i=0;$i<10;$i++){
	$L->insert($i,$i);
}

$L->display();

?>