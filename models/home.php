<?php 
class HomeModel extends Model {
	public function __construct() {
		//Run the parent constructor to make sure that we get access to
		//the database and the "global" data array.
		parent::__construct();
	}
	public function index() {
		//Any data you want available in the view should be added to the
		//data array. It will be available as $view_model
		return $this->data;
	}
}
?>