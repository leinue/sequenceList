<?php

class squenceList{
	
	private $curLen;
	private $listElement=array();
	private $maxSize;

	function __construct($par_maxSize){
		$this->maxSize=$par_maxSize;
		$this->curLen=0;
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
		if($this->curLen==$this->maxSize){
			return -1; //序列表已满
		}

		if($index<0 || $index>$this->curLen){
			return -2; //index不合法
		}

		for($i=$this->curLen;$i>$index;$i--){ 
			$this->listElement[$i]=$this->listElement[$i-1];
		}

		$this->listElement[$index]=$x;
		$this->curLen+=1;
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
$listElem=new squenceList(5);

$listElem->insert(0,'a');
$listElem->insert(1,'z');
$listElem->insert(2,'d');
$listElem->insert(3,'m');
$listElem->insert(4,'z');
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