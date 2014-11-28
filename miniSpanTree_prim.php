<?php

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

	function __construct(){
		
	}
}

?>