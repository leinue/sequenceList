<?php

/**
* sequenceString
* 顺序串
*/
class sequenceString{
	
	private $strValue=array();
	private $curlen;
	private $maxSize;

	function __construct($max,$str=NULL){
		$this->maxSize=$max;
		$this->strValue=$str;
		if($str==NULL){
			$this->curlen=0;
		}else{
			if(is_array($str)){
				$this->curlen=count($str);
			}else{
				$this->curlen=strlen($str);
			}
		}
	}

	function clear(){
		$this->curlen=0;
		$this->strValue=array();
	}

	function length(){
		return $this->curlen;
	}

	function isEmpty(){
		return $this->curlen==0;
	}

	function charAt($i){
		if($i<$this->length() && $i>=0){
			return $this->strValue[$i];
		}else{
			return NULL;
		}
	}

	function subString($begin,$end){
		if($begin>$end){
			return -2; //起始位置大于结束位置
		}

		if($begin<0 || $end>$this->curlen){
			return -1; //插入位置不对
		}

		for($i=$begin,$j=0;$i<$end;$i++,$j++){
			$char[$j]=$this->strValue[$i];
		}

		$newString=new sequenceString(count($char),$char);
		return $newString;
	}

	//在offset个字符之前插入str 0<=offset<=curlen
	function insert($offset,$str){
		if($offset<0 || $offset>$this->curlen){
			return -1;//范围不对
		}

		$length=strlen($str);
		$addedLength=$this->curlen+$length;
		//print($addedLength."<br>");

		//空间不足 分配空间
		if($addedLength>$this->maxSize){
			$this->allocate();
		}

		for($i=$this->curlen-1;$i>=$offset;$i--){
			$this->strValue[$length+$i]=$this->strValue[$i];
			//print($this->strValue[$i]."<br>");
		}

		for($i=0;$i<$length;$i++){
			$this->strValue[$offset+$i]=$str[$i];
			//print("offset=$offset+$i;add=".$this->strValue[$offset+1]."<br>");
		}

		$this->curlen=$addedLength;

		return true;
		//print_r($this->strValue);
	}

	function allocate(){
		$temp=$this->strValue;
		for($i=0;$i<count($this->strValue);$i++){
			$this->strValue[$i]=$temp[$i];
		}
	}

	function delete($begin,$end){
		if($begin<0 || $end>$this->curlen){
			return -1; //删除位置不对
		}

		if($begin>$end){
			return -2; //起始位置大于结束位置
		}

		for($i=0;$i<$this->curlen-$end;$i++){
			$this->strValue[$begin+$i]=$this->strValue[$end+$i];
			/*echo '<br>$begin+i='.$this->strValue[$begin+$i];
			echo '<br>';
			echo '$end+i='.$strValue[$end+$i];*/
		}

		$this->curlen=$this->curlen-($end-$begin);
		return true;
	}

	function concat($str){
		return $this->insert($this->curlen,$str);
	}

	function compareTo($str){
		$len1=$this->length();
		$len2=$str->length();
		$len1>$len2 ? $n=$len2:$n=$len1;

		$s1=$this->strValue;
		while($k<$n){
			$ch1=$s1[$k];
			$ch2=$str->charAt($k);
			if($ch1!=$ch2){
				return $ch1-$ch2;
			}
			$k++;
		}
		return $len1-$len2;
	}

	function indexOf($str,$begin){
		/*if($begin>$this->curlen){
			return -1; //超过长度
		}else{
			for($i=$begin,$j=0;$i<$this->curlen;$i++,$j++){
				$char[$j]=$this->strValue[$i];
			}
			print_r($char);
			return $char;
		}*/
	}

}

$ss=new sequenceString(5);
$ss->insert(0,"fuck");

print("charAt=".$ss->charAt(0)."<br>");

$ss->insert(4,"bitch");
print("charAt=".$ss->charAt(8));

echo '<br>char=';

for($i=0;$i<$ss->length();$i++){
	print($ss->charAt($i));
}

$ss->delete(2,5);

echo '<br>char after delete=';

for($i=0;$i<$ss->length();$i++){
	print($ss->charAt($i));
}

$a=$ss->subString(1,3);

echo '<br>new subString=';

for($i=0;$i<$a->length();$i++){
	print($a->charAt($i));
}


?>
