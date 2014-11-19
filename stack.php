<?php

/**
* sequence stack 
*/
class stack{
	
	private $top;
	private $stackElem=array();
	private $size;

	function __construct($maxSize){
		$this->top=0;
		$this->size=$maxSize;
	}

	function clear(){
		$this->top=0;
	}

	function length(){
		return $this->top;
	}

	function isEmpty(){
		return $this->top==0;
	}

	//取栈顶元素
	function peek(){
		if(!($this->isEmpty())){
			return $this->stackElem[$this->top-1];
		}else{
			return null;
		}
	}

	function push($x){
		if(!($this->top==$this->size)){
			$this->stackElem[$this->top++]=$x;
			return true;
		}else{
			return -1; //stack满
		}
	}

	function pop(){
		if(!($this->isEmpty())){
			return $this->stackElem[--$this->top];
		}else{
			return -1; //栈为空
		}
	}

}

$sequenceStack=new stack(5);

for($i=0;$i<5;$i++){
	$sequenceStack->push($i);
}
$s=$sequenceStack->peek();
if($s){
	print($s);
}else{
	print("fail");
}
?>