<?php 
class HomeModel extends Model {
	public function __construct() {
		parent::__construct();
	}
	public function index() {
		return $this->data;
	}
}
?>