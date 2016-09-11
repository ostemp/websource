<?php
// include the model
include_once("model/model.php");  

class Controller{
	public $model;

	public function __construct(){
		$this->model = new Model();
	}

}