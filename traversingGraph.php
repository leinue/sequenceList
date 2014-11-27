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


//BFS

$visited=array();
function BFSTraverse($G){
	//初始化访问标识数组
	for($v=0;$v<$G->getVexNum();$v++){
		$visited[$v]=false;
	}

	//开始遍历
	for($v=0;$v<$G->getVexNum();$v++){
		if(!$visited[$v]){
			BFS($G,$v);
		}
	}
}

//使用队列
function BFS($G,$v){
	$visited[$v]=true;
	print($G->getVex($v)."  ");
	$q=linkQueue();
	$q->offer($v);
	while(!$q->isEmpty()){
		$u=$q->poll();
		for($w=$G->firstAdjVex($u);$w>=0;$w=$G->nextAdjVex($u,$w)){
			if(!$visited[$w]){
				$visited[$w]=false;
				print($G->getVex($w)+"  ");
				$q->offer($w);
			}
		}
	}
}
?>