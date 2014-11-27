<?php

/**
* 顶点结点
*/
class VNode{

	private $data;
	private $firstArc;
	
	function __construct($data=NULL,$firstArc=NULL){
		$this->data=$data;
		$this->firstArc=$firstArc;
	}

	function getData(){
		return $this->data;
	}

	function getFirstArc(){
		return $this->firstArc;
	}

	function setData($data){
		$this->data=$data;
	}

	function setFirstArc($new){
		$this->firstArc=$new;
	}
}

/**
* 边结点类
*/
class arcNode{

	private $value;//边或弧的权值
	private $nextArc;//指向下一条弧
	private $adjVex;//改弧指向的顶点位置
	
	function __construct($value=NULL,$nextArc=NULL,$adjVex=NULL){
		$this->value=$value;
		$this->adjVex=$adjVex;
		$this->nextArc=$nextArc;
	}

	function getValue(){
		return $this->value;
	}

	function getAjdVex(){
		return $this->adjVex;
	}

	function getNextArc(){
		return $this->nextArc;
	}

	function setValue($new){
		$this->value=$new;
	}

	function setAdjVex($new){
		$this->adjVex=$new;
	}

	function setNextArc($new){
		$this->nextArc=$new;
	}
}

/**
* 邻接表类
*/
class ALGraph{
	
	private $kind;//图的种类标志
	private $vexNum,$arcNum;//图的当前顶点数和边数
	private $vexs=array();//顶点
	private $value=array();//值
	//private $arcs=array();//邻接矩阵

	function __construct($kind,$vexNum,$arcNum,$vexs,$weight,$arcs){
		$this->kind=$kind;
		$this->vexNum=$vexNum;
		$this->arcNum=$arcNum;
		$this->vexs=$vexs;
		//$this->arcs=$arcs;
		//$this->weight=$weight;
	}

	//创建图
	function createGraph(){
		switch($this->kind){
			case 'UDG':
				createUDG();
				break;
			case 'DG':
				createDG();
				break;
			case 'UDN':
				createUDN();
				break;
			case 'DN':
				createDN();
				break;
			default:
				return false;
				break;
		}
	}

	//创建无向图
	function createUDG(){

	}

	//创建有向图
	function createDG(){

	}

	//创建无向网
	function createUDN(){

	}

	//创建有向网
	function createDN(){
		//将两个顶点和权值加载到邻接矩阵中
		for($k=0;$k<$this->arcNum;$k++){
			$v=$this->locateVex($this->vexs[$k]);
			$u=$this->locateVex($this->vexs[$k+1]);
			$value=$this->value[$k];
			addArc($v,$u,$value);
		}
	}

	function addArc($v,$u,$value){
		$arc=new arcNode($value,,$u);
		$arc->setNextArc($this->vexs[$v]->getFirstArc());
		$this->vexs[$v]->setFirstArc($arc);
	}

	function getVexNum(){
		return $this->vexNum;
	}

	function getArcNum(){
		return $this->arcNum;
	}

	function getKind(){
		return $this->kind;
	}

	function getVexs(){
		return $this->vexs;
	}

	function getArcs(){
		return $this->arcs;
	}

	//给定顶点的值vex,返回其在图中的位置,如果图中不包含此顶点则返回-1
	function locateVex($vex){
		for($v=0;$v<$this->vexNum;$v++){
			if($this->vexs[$v]==$vex){
				return $v;
			}
		}
		return -1;
	}

	//返回v表示顶点的值
	function getVex($v){
		if($v<0 || $v>=$vexNum){
			return -1;
		}else{
			return $this->vexs[$v]->getData();
		}
	}

	//返回v的第一个邻接点,若v没有邻接点则返回-1,0<=v<vexNum
	function firstAdjVex($v){
		if($v<0 && $v>=$this->vexNum){
			return -2;
		}else{
			$vex=$this->vexs[$v];
			if($vex->getFirstArc()!=NULL){
				return $vex->getFirstArc()->getAjdVex();
			}else{
				return -1;
			}
		}
	}

	//返回v相对w的下一个邻接点,若w是v的最后一个邻接点,则返回-1,0<=v,w<vexNum
	function nextAdjVex($v,$w){
		if($v<0 && $v>=$this->vexNum){
			return -2;
		}

		$vex=$this->vexs[$v];
		$arcvw=NULL;

		for($arc=$vex->getFirstArc();$arc!=NULL;$arc=$vex->getNextArc()){
			if($arc->getAjdVex()==$w){
				$arcvw=$arc;
				break;
			}
		}

		if($arcvw!=NULL && $arcvw->getNextArc()!=NULL){
			return $arcvw->getNextArc()->getAjdVex();
		}else{
			return -1;
		}
	}
}

?>