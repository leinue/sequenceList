<?php

require('linkStack.php');
require("linklist.php"); //引入linkList中的node类

/**
* linkQueue
*/
class linkQueue{
	
	private $front;
	private $rear;

	function __construct(){
		$this->front=$this->rear=new node();
	}

	function clear(){
		$this->front=$this->rear=NULL;
	}

	function length(){
		if($this->isEmpty()){
			return NULL;
		}else{
			$p=$this->front;
			$length=0;
			while($p!=NULL){
				$p=$p->getNext();
				$length++;
			}
			return $length-1;
		}
	}

	function offer($x){
		$p=new node($x);
		if($this->front!=NULL){
			$this->rear->setNext($p);
			$this->rear=$p;
		}else{
			$this->fron=$this->rear=$p;
		}
	}

	function poll(){
		print($this->front->getData());
		if($this->front!=NULL){
			$p=$this->front;
			$this->front=$this->front->getNext()->getNext();
			return $p->getNext()->getData();
		}else{
			return NULL;
		}
	}

	function peek(){
		if($this->isEmpty()){
			return NULL;
		}else{
			return $this->front->getNext()->getData();
		}
	}

	function isEmpty(){
		return $this->front==NULL;
	}

	function display(){
		if($this->isEmpty()){
			print("NULL");
		}else{
			$p=$this->front;
			while($p!=NULL){
				print($p->getData()."  ");
				$p=$p->getNext();
			}
		}
	}
}
/**
* biTreeNode
* 二叉链表结构存储
*/
class biTreeNode{
	
	private $data;
	private $lchild;
	private $rchild;

	function __construct($data=NULL,biTreeNode $lchild=NULL,biTreeNode $rchild=NULL){
		$this->data=$data;
		$this->lchild=$lchild;
		$this->rchild=$rchild;
	}

	function getData(){
		return $this->data;
	}

	function getLchild(){
		return $this->lchild;
	}

	function getRchild(){
		return $this->rchild;
	}

	function setData($new){
		$this->data=$new;
	}

	function setLchild($new){
		$this->lchild=$new;
	}

	function setRchild($new){
		$this->rchild=$new;
	}
}

/**
* 二叉链式存储结构下二叉树类
*/
class biTree{

	private $root;
	private $index=0;
	
	//method=0,由先根遍历和中根遍历建立一棵二叉树
	//method=1,由标明空子树的先根遍历建立一棵二叉树
	function __construct(
		$method=0,$preOrder=NULL,$inOrder=NULL,$preIndex=NULL,$inIndex=NULL,$count=NULL,$preStr=NULL){
		switch ($method) {
			case 0:
				if($count>0){
					$r=$preOrder[0];
					$i=0;
					for(;$i<$count;$i++){
						if($r==$inOrder[$i+$inIndex]){
							break;
						}
					}
					$root=new biTreeNode($r);
					$root->setLchild(new biTree(0,$preOrder,$inOrder,$preIndex+1,$inIndex,$i)->getRoot());
					$root->setLchild(new biTree(0,$preOrder,$inOrder,$preIndex+1+$i,$inIndex+$i+1,$count-$i-1)->getRoot());
				}
				break;
			case 1:
				$c=$preStr[$this->index++];
				if($c!='#'){
					$this->root=new biTreeNode($c);
					$this->root->setLchild(new biTreeNode(1,NULL,NULL,NULL,NULL,NULL,$preStr)->getRoot());
					$this->root->setRchild(new biTreeNode(1,NULL,NULL,NULL,NULL,NULL,$preStr)->getRoot());
				}else{
					$this->root=NULL;
				}
				break;
			default:
				return NULL;
				break;
		}

	}

	function createBiTree($sqBiTree,$index){
		$this->root=NULL;
		if($index>strlen($sqBiTree){
			$this->root=new biTreeNode($$sqBiTree[$index]);
			$this->root->setLchild(createBiTree($sqBiTree,2*$index+1));
			$this->root->setRchild($sqBiTree,2*$index+2);
		}
	}

	function getRoot(){
		return $this->root;
	}

	function setRoot($new){
		$this->root=$new;
	}

	/*
	//先根遍历递归算法
	function preRootTraverse(biTreeNode $T){
		if($T!=NULL){
			print($T->getData());
			preOrderTraverse($T->getLchild());
			preOrderTraverse($T->getRchild());
		}
	}

	//中根遍历递归算法
	function inRootTraverse(biTreeNode $T){
		if($T!=NULL){
			inOrderTraverse($T->getLchild());
			print($T->getData());
			inOrderTraverse($T->getRchild());
		}		
	}

	//后根遍历递归算法
	function postRootTraverse(biTreeNode $T){
		if($T!=NULL){
			postOrderTraverse($T->getLchild());
			postOrderTraverse($T->getRchild());
			print($T->getData());
		}		
	}*/

	//先根遍历非递归算法
	function preRootTraverse(){
		$T=$this->root;

		if($T!=NULL){
			$stack=new linkStack();
			$stack->push($T);
			while(!$stack->isEmpty()){
				$T=$stack->pop();
				print($T->getData());
				while($T!=NULL){
					if($T->getLchild()!=NULL){
						print($T->getLchild()->getData());
					}
					if($T->getRchild()!=NULL){
						$stack->push($T->getRchild());
					}
					$T=$T->getLchild();
				}
			}
		}
		
	}

	//中根遍历非递归算法
	function inRootTraverse(){
		$T=$this->root;
		if($T!=NULL){
			$s=new linkStack();
			$s->push($T);
			while(!$s->isEmpty()){
				while($s->peek()!=NULL){
					$s->push($s->peek()->getLchild());
				}
				$s->pop();
				if(!$s->isEmpty()){
					$T=$s->pop();
					print($T->getData());
					$s->push($T->getRchild());
				}
			}
		}
	}

	//后根遍历非递归算法
	function postRootTraverse(){
		$T=$this->root;
		if($T!=NULL){
			$s=new linkStack();
			$s->push($T);
			$flag=NULL;
			$p=NULL;
			while(!$s->isEmpty()){
				while($s->peek()!=NULL){
					$s->push($s->peek()->getLchild());
				}
				$s->pop();
				while(!$s->isEmpty()){
					$T=$s->peek();
					if($T->getRchild()==NULL || $T->getRchild()==$p){
						print($T->getData());
						$s->pop();
						$p=$T;
						$flag=true;
					}else{
						$s->push($T->getRchild());
						$flag=false;
					}
					if(!$flag){
						break;
					}
				}
			}
		}
	}

	//层次遍历算法
	function levelTraverse(){
		$T=$this->root;
		if($T!=NULL){
			$l=linkQueue();
			$l->offer($T);
			while(!$l->isEmpty()){
				print($T->getData());
				if($T->getLchild()!=NULL){
					$l->offer($T);
				}
				if($T->getRchild()!=NULL){
					$l->offer($T);
				}
			}
		}
	}

	function searchNode($T,$x){
		if($T!=NULL){
			if($T->getData()==$x){
				return $T;
			}else{
				$lresult=searchNode($T->getLchild(),$x);
				return $lresult!=NULL?$lresult:searchNode($T->getRchild(),$x);
			}
		}
	}

	function countNode($T){
		$count=0;
		if($T!=NULL){
			++$count;
			$count=$count+countNode($T->getLchild());
			$count=$count+countNode($T->getRchild());
		}
		return $count;
	}

	//使用层次遍历
	function countNodeWithQueue($T){
		$count=0;
		if($T!=NULL){
			$l=new linkQueue();
			$l->offer($T);
			while(!$l->isEmpty()){
				$T=$l->poll();
				++$count;
				if($T->getLchild()!=NULL){
					$l->offer($T->getLchild());
				}
				if($T->getRchild()!=NULL){
					$l->offer($T->getRchild());
				}
			}
		}
		return $count;
	}

	function getDepth($T){
		if($T!=NULL){
			$depth1=getDepth($T);
			$depth2=getDepth($T);
			return 1+($depth1>$depth2?$depth1:$depth2);
		}else{
			return 0;
		}
	}

	function isEqual($T1,$T2){
		if($T1=NULL && $T2=NULL){
			return true;
		}

		if($T1!=NULL && $T2!=NULL){
			if($T1->getData()==$T2->getData()){
				if(isEqual($T1->getLchild(),$T2->getLchild())){
					if(isEqual($T1->getRchild(),$T2->getRchild())){
						return true;
					}
				}
			}
		}

		return false;
	}

}


?>