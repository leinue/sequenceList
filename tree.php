<?php

/**
* treeNode
*/
class CSTreeNode{

	private $data;
	private $firstChild,$nextSibling;
	
	function __construct($data,$firstChild,$nextSibling){
		$this->data=$data;
		$this->firstChild=$firstChild;
		$this->nextSibling=$nextSibling;
	}

	function getData(){
		return $this->data;
	}

	function getFirstChild(){
		return $this->firstChild;
	}

	function getNextSibling(){
		return $this->nextSibling;
	}

	function setData($data){
		$this->data=$data;
	}

	function setFirstChild($firstChild){
		$this->firstChild=$firstChild;
	}

	function setNextSibling($nextSibling){
		$this->nextSibling=$nextSibling;
	}
}

//先根遍历树
function preRootTraverse($T){
	if($T!=NULL){
		print($T->getData());
		preRootTraverse($T->firstChild());
		preRootTraverse($T->getNextSibling());
	}
}

//后根遍历树


?>