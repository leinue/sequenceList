<?php

require('graph.php');

/*
* 辅助记录从顶点集U到V-U的代价的最小的边
*/
class CloseEdge{
	
	var $adjVex;
	var $lowCost;

	function __construct($adjVex,$lowCost){
		$this->adjVex=$adjVex;
		$this->lowCost=$lowCost;
	}
}

/**
* 用普利姆算法构造最小生成树的类描述
*/
class miniSpanTree_PRIM{

	private $closeEdge;

	function __construct(CloseEdge $ce){
		$this->closeEdge=$ce;
	}

	function PRIM(MGraph $G,$u){
		$tree=array();
		$count=0;
		$this->closeEdge=new CloseEdge($G->getVexNum());
		$k=$G->locateVex($u);
		for($j=0;$j<$G->getVexNum();$j++){
			if($j!=$k){
				$this->closeEdge[$j]=new CloseEdge($u,$G->getArcs()[$k][$j]);
			}
		}
		$this->closeEdge[$k]=new CloseEdge($u,0);
		for($i=0;$i<$G->getVexNum();$i++){
			$k=getMinMum($this->closeEdge);
			$tree[$count][0]=$this->closeEdge[$k]->adjVex;
			$tree[$count][1]=$G->getVexs()[$k];
			$count++;
			$this->closeEdge[$k]->lowCost=0;
			for($j=0;$j<$G->getVexNum();$j++){
				if($G->getArcs()[$k][$j]<$this->closeEdge[$j]->lowCost){
					$this->closeEdge[$j]=new CloseEdge($G->getVexs($k),$G->getArcs()[$k][$j]);
				}
			}
		}
		return $tree;
	}

	function getMinMum(){
		$min=2147483647;
		$v=-1;
		for($i=0;$i<count($this->closeEdge);$i++){
			if($this->closeEdge->lowCost!=0 && $this->closeEdge[$i]->lowCost<$min){
				$min=$this->closeEdge[$i]->lowCost;
				$v=$i;
			}
		}
	}
}

?>