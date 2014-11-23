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

	//先根非递归算法
	function preRootTraverse(){
		$T=$this->root;

		while($T!=NULL){
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
						print($T->getRchild()->getData());
					}
				}
			}
		}
		

	}

}

?>