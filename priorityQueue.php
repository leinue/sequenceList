<?php

/**
* 优先队列结点Data类
*/
class priorityData{

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

?>