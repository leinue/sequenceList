<?php

require('linklist.php');

/**
* linkstack
*/
class linkStack{
	
	private $top;

	function __construct(){
		$this->top=new node();
	}

	function clear(){
		$this->top=NULL;
	}
	
	function isEmpty(){
		return $top==NULL;
	}

	function length(){
		$p=$this->top;

		$length=0;

		while($p!=NULL){
			$p=$p->getNext();
			$length+=1;
		}

		return $length-1;
	}

	function push($x){
		$p=new node($x);
		$p->setNext($this->top);
		$this->top=$p;
	}

	function pop(){
		if(!($this->isEmpty())){
			$p=$this->top;
			$this->top=$this->top->getNext();
			return $p->getData();
		}else{
			return NULL;
		}
	}

	function peek(){
		if(!($this->isEmpty())){
			return $this->top->getData();	
		}else{
			return NULL;
		}
	}

	function display(){
		$p=$this->top;
		while ($p!=NULL) {
			print($p->getData()."  ");
			$p=$p->getNext();
		}
	}
}

$linkstack=new linkStack();

for($i=0;$i<5;$i++){
	//print("$i");
	$linkstack->push($i);
}

$linkstack->display();

print("<br>");

print("peek=".$linkstack->peek());

print("<br>");

print("length=".$linkstack->length());
?>