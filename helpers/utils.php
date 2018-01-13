<?php 

if(!function_exists('pageSize')){
	function pageSize(){
		return [10, 20, 30, 50];
	}
}

if(!function_exists('genPass')){
	function genPass($p){
		return bcrypt($p);
	}
}
if(!function_exists('clArea')){
	function clArea($r){
		return $r*$r*3.1415926536;
	}
}

 ?>