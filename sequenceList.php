<?php

class squenceList{
	
	private $curLen;
	private $listElement=array();
	private $maxSize;

	function __construct($par_maxSize,$list){
		$this->maxSize=$par_maxSize;
		if(is_array($list)){
			$this->listElement=$list;
			$this->curLen=count($list);
		}else{
			throw new Exception("list must be an array!", 1);
		}
		
	}

	function clear(){
		$this->curLen=0;
		$this->listElement=array();
	}

	function isEmpty(){
		return $this->curLen==0;
	}

	function length(){
		return $this->curLen;
	}

	function get($index){
		if($index<0 || $index>$this->curLen-1){
			return -1;
		}else{
			return $this->listElement[$index];
		}
	}

	function insert($index,$x){
		if($this->curLen==$maxSize){
			return -1; //序列表已满
		}

		if($index<0 || $index>$this->curLen){
			return -2; //index不合法
		}

		for($i=$this->ccurLen;$i>$index;$i--){ 
			$this->listElement[$i]=$this->listElement[$i-1];
		}

		$this->listElement[$index]=$x;
		$this->ccurLen+=1;
	}

	function delete($index){
		if($index<0 || $index>$this->curLen){
			return -2; //index不合法
		}

		for($i=$index;$i<$this->curLen-1;$i++){ 
			$this->listElement[$i]=$this->listElement[$i+1];
		}
		$this->curLen-=1;
	}

	function indexOf($x){
		$i=0;
		foreach ($this->listElement as $key => $value) {
			if($value==$x){
				return $key;
			}
		}
	}

	function display(){
		foreach ($this->listElement as $key => $value) {
			print("key=$key value=$value");
			print("<br>");
		}
		print("<br>");
	}
}

$listArray=array('a','z','d','m','z');
$listElem=new squenceList(5,$listArray);
$listElem->display();
print("*********display end*********<br>");
$len=$listElem->length();
print('len='.$len);
print("<br>*********length end*********<br>");
$pos=$listElem->indexOf('z');
print($pos);
print("<br>*********pos end*********<br>");
print($listElem->get(2));
?>