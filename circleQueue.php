<?php

/**
* 循环队列
* 是顺序队列的一种,需要指定maxSize
*/
class circleQueue{
	
	private $queueElem=array();
	private $front;
	private $rear;
	private $maxSize;

	function __construct($par_maxSize){
		$this->front=$this->rear=0;
		$this->maxSize=$par_maxSize;
	}

	function clear(){
		$this->front=$this->rear=0;
		$this->queueElem=NULL;
	}

	function length(){
		return ($this->rear-$this->front+$this->maxSize)%$this->maxSize;
	}

	//取队首元素
	function peek(){
		if($this->isEmpty()){
			return NULL;
		}else{
			return $this->queueElem[$this->front];
		}
	}

	function isEmpty(){
		return $this->front==$this->rear;
	}

	function offer($x){
		if(($this->rear+1)%$this->maxSize==$this->front){
			return -1; //队列满
		}else{
			$this->queueElem[$this->rear]=$x;
			$this->rear=($this->rear+1)%$this->maxSize;
		}
	}

	function poll(){
		if($this->front==$this->rear){
			return NULL;
		}else{
			$t=$queueElem[$this->front];
			$this->front=($this->front+1)%$this->maxSize;
			return $t;
		}
	}

	function display(){
		if($this->isEmpty()){
			print("NULL");
		}else{
			for($i=$this->front;$i!=$this->rear;$i=($i+1)%$this->maxSize){
				print($this->queueElem[$i]."  ");
			}
		}
	}
}

?>