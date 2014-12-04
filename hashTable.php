<?php

/**
* hash table
* v2.0
*/
class hashTable{
	
	private $table=array();

	function __construct($size){
		for($i=0;$i<$size;$i++){
			$this->table[$i]=new linkList();
		}
	}

	function hash($key){
		return $key % count($this->table);
	}

	function insert($element){
		$key=$this->hashCode($element);
		$i=$this->hash($key);
		$this->table[$i]->insert(0,$element);
	}

	function hashCode($ele){
		return ord($ele);
	}

	function printHashTable(){
		foreach($this->table as $key=>$value){
			print("table $key =");
			$value->display();
		}
	}

	function search($element){
		$key=$this->hashCode($element);
		$i=$this->hash($key);
		$index=$this->table[$i]->indexOf($element);
		if($index>=0){
			return $this->table[$i]->get($index);
		}else{
			return NULL;
		}
	}

	function contain($element){
		return $this->search($element)!=NULL;
	}

	function remove($element){
		$key=$this->hashCode($element);
		$i=$this->hash($key);
		$index=$this->table[$i]->indexOf($element);
		if($index>=0){
			$this->table[$i]->remove($index);
			return true;
		}else{
			return false;
		}
	}
}

?>