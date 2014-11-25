<?php

/**
* huffmanTreeNode类
*/
class huffmanTreeNode{
	
	private $weight;
	private $flag;
	private $parent,$lchild,$rchild;

	function __construct($weight){
		$this->weight=$weight;
		$this->flag=0;
		$this->parent=$this->lchild=$this->rchild=NULL;
	}

	function getFlag(){
		return $this->flag;
	}

	function getParent(){
		return $this->parent;
	}

	function getLchild(){
		return $this->lchild;
	}

	function getRchild(){
		return $this->rchild;
	}

	function setFlag($flag){
		$this->flag=$flag;
	}

	function setWeight($weight){
		$this->weight=$weight;
	}

	function setParent($parent){
		$this->parent=$parent;
	}

	function setLchild($lchild){
		$this->lchild=$lchild;
	}

	function setRchild($rchild){
		$this->rchild=$rchild;
	}
}

?>