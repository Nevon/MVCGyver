<?php 
class HomeModel extends Model {
	public function __construct() {
		//Run the parent constructor to make sure that we get access to
		//the database and the "global" data array.
		parent::__construct();
	}
	public function index() {
		return $this->data;
	}
}
?>