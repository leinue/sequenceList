<?php

require("linklist.php"); //引入linkList中的node类

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
		if($this->front!=NULL){
			$p=$this->front;
			$this->front=$this->front->getNext();
			return $p->getData();
		}else{
			return NULL;
		}
	}

	function peek(){
		if($this->isEmpty()){
			return NULL;
		}else{
			return $this->front->getData();
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

$lq=new linkQueue();

for($i=0;$i<5;$i++){
	$lq->offer($i);
}

print("<br>peek=".$lq->peek());
print("<br>length=".$lq->length());

print("<br>display=");
$lq->display();

print("<br>poll=".$lq->poll());

print("<br>new display=");
$lq->display();
?>