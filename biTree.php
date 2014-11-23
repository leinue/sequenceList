<?php

require('linkStack.php');

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

	}

}

?>