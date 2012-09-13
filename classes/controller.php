<?php 
abstract class Controller {
	protected $url_values;
	protected $action;

	public function __construct($action, $url_values) {
		$this->action = $action;
		$this->url_values = $url_values;
	}

	public function executeAction() {
		return $this->{$this->action}();
	}

	protected function returnView($view_model, $full_view = true) {
		//Strip out the "Controller" part from the controller name and 
		//use that to find the corresponding view.
		$view_location = strtolower('views/'.str_replace('Controller', '', get_class($this)).'/'.$this->action.'.php');

		if ($full_view) {
			require('views/maintemplate.php');
		} else {
			require($view_location);
		}
	}
}
?>