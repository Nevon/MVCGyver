<?php 
class Router {
	private $controller;
	private $action;
	private $url_values;

	//Store the URL values on object creation
	public function __construct($url_values) {
		global $config;

		$this->url_values = $url_values;
		
		//Find the controller and method from the url.
		//If they are not found, use default values.
		if ($this->url_values['controller'] === '') {
			$this->controller = $config['default_controller'];
		} else {
			$this->controller = $this->url_values['controller'];
		}

		$this->controller .= 'Controller';

		if ($this->url_values['action'] === '') {
			$this->action = $config['default_action'];
		} else {
			$this->action = $this->url_values['action'];
		}
	}

	//Create requested controller object
	public function createController() {
		//Check if the class exists
		try {
			//The Reflection API for getParentClass is hilariously bad
			$rc = new ReflectionClass($this->controller);
			$parent = (array) $rc->getParentClass();

			//Does it extend the controller class?
			if (array_key_exists('name', $parent) && $parent['name'] === 'Controller') {
				//Does it have the requested method?
				if ($rc->hasMethod($this->action)) {
					return $rc->newInstance($this->action, $this->url_values);
				} else {
					throw new Exception("Method doesn't exist: ".print_r($this->url_values, false));
				}
			} else {
				throw new Exception("Controller doesn't extend the controller class". print_r($this->url_values, false));
			}
		} catch (ReflectionException $e) {
			throw new Exception("Controller doesn't exist: ".print_r($this->url_values, false));
		}
	}
}
?>