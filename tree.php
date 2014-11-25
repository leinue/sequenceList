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


?>