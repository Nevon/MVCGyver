<?php
//TODO: Kill all humans. Also, figure out why PHP refuses to autoload my classes
function __autoload($class) {
	$class = strtolower($class);
	//If the classname ends with "model", load it from that directory
	if (substr($class, -strlen('model')) === 'model') {
		require_once('models/'. str_replace('model', '', $class) .'.php');
	//And if it ends with "controller", load it from that directory
	} elseif (substr($class, -strlen('controller')) === 'controller') {
		require_once('controllers/'. str_replace('controller', '', $class) .'.php');
	}
}
//spl_autoload_register();
?>