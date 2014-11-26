<?php

/**
* 图的邻接矩阵
*/
class MGraph{
	
	private $kind;//图的种类标志
	private $vexNum,$arcNum;//图的当前顶点数和边数
	private $vexs=array();//顶点
	private $weight=array();//权值
	private $arcs=array();//邻接矩阵

	function __construct($kind,$vexNum,$arcNum,$vexs,$weight,$arcs){
		$this->kind=$kind;
		$this->vexNum=$vexNum;
		$this->arcNum=$arcNum;
		$this->vexs=$vexs;
		$this->arcs=$arcs;
		$this->weight=$weight;
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
		/*for($v=0;$v<$this->vexNum;$v++){
			for($u=0;$u<$vexNum;$u++){
				$this->arcs[$v][$u]=2147483647;
			}
		}*/

		for($k=0;$k<$this->arcNum;$k++){
			$v=$this->locateVex($this->vexs[$k]);
			$u=$this->locateVex($this->vexs[$k+1]);
			$this->arcs[$v][$u]=$this->arcs[$u][$v]=$this->weight[$k];
		}
	}

	//创建有向网
	function createDN(){

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
			return $this->vexs[$v];
		}
	}

	//返回v的第一个邻接点,若v没有邻接点则返回-1,0<=v<vexNum
	function firstAdjVex($v){

	}

	//返回v相对w的下一个邻接点,若w是v的最后一个邻接点,则返回-1,0<=v,w<vexNum
	function nextAdjVex($v,$w){

	}
}

?>