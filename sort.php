<?php

/**
* 顺序表记录类
*/
class recordNode{
	
	private $key;//关键字
	private $element;//数据元素

	function __construct($key,$element=NULL){
		$this->key=$key;
		$this->element=$element;
	}

	function getKey(){
		return $this->key;
	}

	function getElement(){
		return $this->element;
	}

	function setKey($key){
		$this->key=$key;
	}

	function setElement($element){
		$this->element=$element;
	}
}

/**
* 记录关键字类
*/
class keyType{
	
	private $key;

	function __construct($key=NULL){
		$this->key=$key;
	}

	function getKey(){
		return $this->key;
	}

	function setKey($key){
		$this->key=$key;
	}

	function toString(){
		return $key+" ";
	}

	function compareTo(keyType anotherType){
		$thisVal=$this->key;
		$anotherVal=$anotherType->getKey();
		return ($thisVal<$anotherVal ? -1 : ($thisVal==$anotherVal ? 0:1));
	}
}

/**
* 顺序表记录结点类
*/
class elementType{
	
	private $data;

	function getData(){
		return $this->data;
	}

	function setData($data){
		$this->data=$data;
	}

	function toString(){
		return $data;
	}

	function __construct($data=NULL){
		$this->data=$data;
	}
}

/**
* 顺序表类
*/
class seqList{
	
	private $r;//顺序表记录结点数组
	private $curLen;//顺序表长度,即记录个数
	private $maxSize;//存储空间容量

	function __construct($max){
		$this->maxSize=$max;
		$this->curLen=0;
	}

	function getRecord(){
		return $this->r;
	}

	function setRecord($new){
		$this->r=$new;
	}

	function insert($index,recordNode $x){
		if($this->curLen==$this->maxSize){
			return -1; //序列表已满
		}

		if($index<0 || $index>$this->curLen){
			return -2; //index不合法
		}

		for($i=$this->curLen;$i>$index;$i--){ 
			$this->r[$i]=$this->r[$i-1];
		}

		$this->r[$index]=$x;
		$this->curLen+=1;
	}

	function insertSortWithGuard(){
		for($i;$i<$this->curLen;$i++){
			$this->r[0]=$this->r[$i];
			for($j=$i-1;$this->r[0]->getKey()->compareTo($this->r[$j]->getKey());$j--){
				$this->r[$j+1]=$this->r[$j];
			}
			$this->r[$j+1]=$this->r[0];
		}
	}

	function shellSort($d){ //d为增量数组
		//控制增量,增量减半,若干趟扫描
		for($k=0;$k<count($d);$k++){
			$dk=$d[$k];
			for($i=$dk;$i<$this->curLen;$i++){
				$this->r[0]=$this->r[$i];
				for($j=$i-$dk;$this->r[0]->getKey()->compareTo($this->r[$j]->getKey());$j-=$dk){
					$this->r[$j+$dk]=$this->r[$j];
				}
				$this->r[$j+$dk]=$this->r[0];
			}
		}
	}

	function bubbleSort(){
		for($i=1;$i<$this->curLen;$i++){
			for($j=0;$j<$this->curLen-$i;$j++){
				if($this->r[$j]->getKey()->compareTo($this->r[$j+1]->getKey())>0){
					$tmp=$this->r[$j];
					$this->r[$j]=$this->r[$j+1];
					$this->r[$j+1]=$tmp;
				}
			}
		}
	}

	//快速排序算法

	//一趟排序
	function partition($i,$j){
		$pivot=$this->r[$i];
		while($i<$j){
			while($i<$j && $pivot->getKey()->compareTo($this->r[$j]->getKey())<=0){
				$j--;
			}
			if($i<$j){
				$this->r[$i]=$this->r[$j];
			}
			while($i<$j && $pivot->getKey()->compareTo($this->r[$i]->getKey())>=0){
				$i++;
			}
			if($i<$j){
				$this->r[$j]=$this->r[$i];
				$j--;
			}
		}
		$this->r[$i]=$pivot;
		return $i;
	}

	function qSort($low,$high){
		if($low<$high){
			$pivotLoc=$this->partition($low,$high);
			$this->qSort($low,$pivotLoc-1);
			$this->qSort($pivotLoc+1,$high);
		}
	}

	function quickSort(){
		$this->qSort(0,$this->curLen-1);
	}

	//选择排序

	function selectSort(){
		for($i=0;$i<$this->curLen-1;$i++){
			$min=$i;
			for($j=$i+1;$j<$this->curLen-1;$j++){
				if($this->r[$j]->getKey()->compareTo($this->r[$min]->getKey())<0){
					$min=$j;
				}
			}
			if($min!=$i){
				$tmp=$this->r[$i];
				$this->r[$i]=$this->r[$min];
				$this->r[$min]=$tmp;
			}
		}
	}

	//归并2个有序序列

	function merge($r,$order,$h,$m,$t){
		$i=$h;
		$j=$m+1;
		$k=$h;

		while($i<=$m && $j<=$t){
			if($r[$i]->getKey()->compareTo($r[$j]->getKey())<=0){
				$order[$k++]=$r[$i++];
			}else{
				$order[$k++]=$r[$j++];
			}
		}

		while($i<=$m){
			$order[$k++]=$r[$i++];
		}

		while($j<=$t){
			$order[$k++]=$r[$j++];
		}
	}

	function mergepass($r,$order,$s,$n){
		$p=0;//p为每一对待合并表的第一个元素的下标,初始值为0
		while($p+2*$s-1<=$n-1){
			$this->merge($r,$order,$p,$p+$s-1,$p+2*$s-1);
			$p+=2*$s;
		}
		if($p+$s-1<$n-1){
			$this->merge($r,$order,$p,$p+$s-1,$n-1);
		}else{
			for($i=$p;$i<=$n-1;$i++){
				$order[$i]=$r[$i];
			}
		}
	}

	function mergeSort(){
		$s=1;
		$n=$this->curLen;

		$tmp=new recordNode($n);
		while($s<$n){
			$this->mergepass($this->r,$tmp,$s,$n);
			$s*=2;
			$this->mergepass($tmp,$this->r,$s,$n);
			$s*=2;
		}
	}

}


?>