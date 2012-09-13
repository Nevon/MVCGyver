<?php 
abstract class Model {
	protected $db;
	public $data;

	public function __construct() {
		global $config;
		$this->db = new PDO("mysql:host=".$config['database']['host'].";dbname=".$config['database']['dbname'], $config['database']['username'], $config['database']['password']);
	
		$this->data = array(
			'page_title' => $config['site_title'],
			'base_url' => $config['base_url']
		);
	}
}
?>