<?php

require("linklist.php"); //引入linkList中的node类

/**
* 优先队列结点Data类
*/
class priorityQueueData{

	private $elem;
	private $priority;
	
	function __construct($Elem,$Priority){
		$this->elem=$Elem;
		$this->priority=$Priority;
	}

	function getElem(){
		return $this->elem;
	}

	function getPriority(){
		return $this->priority;
	}

	function setElem($newElem){
		$this->elem=$newElem;
	}

	function setPriority($newPriority){
		$this->priority=$newPriority;
	}
}

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

	function offer(priorityQueueData $x){
		$pn=$x;
		$s=new node($x);
		if($this->front!=NULL){
			$p=$this->front;
			$q=$this->front;

			while($p!=NULL && $pn.getPriority()>=$p->getData()->getPriority()){
				$q=$p;
				$p=$p->getNext();
			}

			//p为空,表示遍历到了队列尾部
			if($p==NULL){
				//加入到队尾
				$this->rear->setNext($s);
				$this->rear=$s;
			}elseif($p==$this->front){ //p的优先级大于首结点优先值
				//加入到队首
				$s->setNext($this->front);
				$this->front=$s;
			}else{
				$q->setNext($s);
				$s->setNext($p);
			}
		}else{
			$this->fron=$this->rear=$s;
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

?>