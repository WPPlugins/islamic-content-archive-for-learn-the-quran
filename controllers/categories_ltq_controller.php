<?php
/**
 * 
 */
class categories_ltq_controller extends app_ltq_controlers {
	
	function __construct() {
		parent::__construct();
		$this->loadView('categories');
	}
}


?>