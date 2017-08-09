<?php
/**
 *
 */
class LearntheQuranMaincontroller extends app_ltq_controlers {

	function __construct() {
		parent::__construct();
		add_action('admin_menu', array($this, 'ltq_admin_menu'));
	}

	function ltq_admin_menu() {
		add_options_page('Islamic Content Archive For Learning the Quran ', 'Islamic Content Archive For Learn the Quran', 'manage_options', OPICLTQ_Page_SLUG, array($this, 'ltqsettings_page'));
	}

	function ltqsettings_page() {
		if(isset($_GET['tab'])){
			$tab = strip_tags($_GET['tab']);
		}else{
			$tab = '';
		}
		switch ($tab) {
			case 'options':
				$this->loadController('options');
				break;
			case 'language':
				$this->loadController('language');
				break;
			case 'categories':
				echo $this->loadController('categories');
				break;
			default:
				$this->loadController('options');
				break;
		}
	}

}
new LearntheQuranMaincontroller();
?>