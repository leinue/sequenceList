<?php

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
}

?>