<?php 
class HomeController extends Controller {
	protected function index() {
		$view_model = new HomeModel();
		$this->returnView($view_model->index());
	}
}
?>