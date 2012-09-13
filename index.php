<?php //Require the general classes
require("config.php");
require("autoloader.php");
require("classes/router.php");
require("classes/controller.php");
require("classes/model.php");

//Create the controller and execute the action
$router = new Router($_GET);
try {
	$controller = $router->createController();
} catch (Exception $e) {
	die($e);
}
$controller->executeAction();

?>