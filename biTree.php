<?php

require('linkStack.php');
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
* biTreeNode
* 二叉链表结构存储
*/
class biTreeNode{
	
	private $data;
	private $lchild;
	private $rchild;

	function __construct($data=NULL,biTreeNode $lchild=NULL,biTreeNode $rchild=NULL){
		$this->data=$data;
		$this->lchild=$lchild;
		$this->rchild=$rchild;
	}

	function getData(){
		return $this->data;
	}

	function getLchild(){
		return $this->lchild;
	}

	function getRchild(){
		return $this->rchild;
	}

	function setData($new){
		$this->data=$new;
	}

	function setLchild($new){
		$this->lchild=$new;
	}

	function setRchild($new){
		$this->rchild=$new;
	}
}

/**
* 二叉链式存储结构下二叉树类
*/
class biTree{

	private $root;
	
	function __construct(){
		
	}

	function getRoot(){
		return $this->root;
	}

	function setRoot($new){
		$this->root=$new;
	}

	/*
	//先根遍历递归算法
	function preRootTraverse(biTreeNode $T){
		if($T!=NULL){
			print($T->getData());
			preOrderTraverse($T->getLchild());
			preOrderTraverse($T->getRchild());
		}
	}

	//中根遍历递归算法
	function inRootTraverse(biTreeNode $T){
		if($T!=NULL){
			inOrderTraverse($T->getLchild());
			print($T->getData());
			inOrderTraverse($T->getRchild());
		}		
	}

	//后根遍历递归算法
	function postRootTraverse(biTreeNode $T){
		if($T!=NULL){
			postOrderTraverse($T->getLchild());
			postOrderTraverse($T->getRchild());
			print($T->getData());
		}		
	}*/

	//先根遍历非递归算法
	function preRootTraverse(){
		$T=$this->root;

		if($T!=NULL){
			$stack=new linkStack();
			$stack->push($T);
			while(!$stack->isEmpty()){
				$T=$stack->pop();
				print($T->getData());
				while($T!=NULL){
					if($T->getLchild()!=NULL){
						print($T->getLchild()->getData());
					}
					if($T->getRchild()!=NULL){
						$stack->push($T->getRchild());
					}
					$T=$T->getLchild();
				}
			}
		}
		
	}

	//中根遍历非递归算法
	function inRootTraverse(){
		$T=$this->root;
		if($T!=NULL){
			$s=new linkStack();
			$s->push($T);
			while(!$s->isEmpty()){
				while($s->peek()!=NULL){
					$s->push($s->peek()->getLchild());
				}
				$s->pop();
				if(!$s->isEmpty()){
					$T=$s->pop();
					print($T->getData());
					$s->push($T->getRchild());
				}
			}
		}
	}

	//后根遍历非递归算法
	function postRootTraverse(){
		$T=$this->root;
		if($T!=NULL){
			$s=new linkStack();
			$s->push($T);
			$flag=NULL;
			$p=NULL;
			while(!$s->isEmpty()){
				while($s->peek()!=NULL){
					$s->push($s->peek()->getLchild());
				}
				$s->pop();
				while(!$s->isEmpty()){
					$T=$s->peek();
					if($T->getRchild()==NULL || $T->getRchild()==$p){
						print($T->getData());
						$s->pop();
						$p=$T;
						$flag=true;
					}else{
						$s->push($T->getRchild());
						$flag=false;
					}
					if(!$flag){
						break;
					}
				}
			}
		}
	}

	//层次遍历算法
	function levelTraverse(){
		$T=$this->root;
		if($T!=NULL){
			$l=linkQueue();
			$l->offer($T);
			while(!$l->isEmpty()){
				print($T->getData());
				if($T->getLchild()!=NULL){
					$l->offer($T);
				}
				if($T->getRchild()!=NULL){
					$l->offer($T);
				}
			}
		}
	}

}

?>