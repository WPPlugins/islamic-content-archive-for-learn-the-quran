<?php
/**
Plugin Name: Islamic Content Archive For Learn the Quran
Plugin URI: http://www.learning-quran.com/
Description: Learn the Quran intends to be one of the main online sources of information and a professional training platform for those eager to learn how to recite the Quran correctly, commit it to their hearts, understand its verses well, and receive its message right.
Version: 1.0
Author: EDC Team (E-Da`wah Committee)
Author URI: http://www.islam.com.kw/DawahApps
License: Free
*/

define('OPICLTQ_PLUGIN_PATH',plugin_dir_path( __FILE__ ));
define('OPICLTQ_PLUGIN_URL',plugin_dir_url( __FILE__ ));
define('OPICLTQ_Page_SLUG','islamic_content_archive_for_learning_the_quran');
define('OPICLTQ_Input_SLUG','opicltq_');
define('LTQLIB','lib');
define('LTQDS','/');
define('LTQCONTROLLERS','controllers');
define('LTQMODELS','models');
define('LTQDBTable', 'opicltq_categories');
define('LTQBootstrappath',OPICLTQ_PLUGIN_PATH.'style'.LTQDS);
define('LTQLogourl',OPICLTQ_PLUGIN_URL.'style'.LTQDS.'images'.LTQDS.'logo'.LTQDS);
define('LTQIconpath',OPICLTQ_PLUGIN_PATH.'style'.LTQDS.'images'.LTQDS.'icons'.LTQDS);
define('LTQIconurl',OPICLTQ_PLUGIN_URL.'style'.LTQDS.'images'.LTQDS.'icons'.LTQDS);
define('LTQFlagspath',OPICLTQ_PLUGIN_PATH.'style'.LTQDS.'images'.LTQDS.'flags'.LTQDS);
define('LTQFlagsurl',OPICLTQ_PLUGIN_URL.'style'.LTQDS.'images'.LTQDS.'flags'.LTQDS);
define('LTQControlerspath',OPICLTQ_PLUGIN_PATH.'controllers'.LTQDS);
define('LTQModelspath',OPICLTQ_PLUGIN_PATH.'models'.LTQDS);
define('LTQViewspath',OPICLTQ_PLUGIN_PATH.'views'.LTQDS);
define('LTQLayoutpath',OPICLTQ_PLUGIN_PATH.'views'.LTQDS.'layout'.LTQDS);
define('LTQLangpath',OPICLTQ_PLUGIN_PATH.'views'.LTQDS.'lang'.LTQDS);

function OPICLTQ_plugin_install(){
	$default_lang = 'eng';
	$source = 'Soucre Link';
	add_option(OPICLTQ_Input_SLUG.'language', $default_lang);
	add_option(OPICLTQ_Input_SLUG.'source', $source);
	add_option(OPICLTQ_Input_SLUG.'cronjobtime', 'everyhour');
	add_option(OPICLTQ_Input_SLUG.'version', '1.0');
}

function OPICLTQ_plugin_uninstall(){
	$options = get_option(OPICLTQ_Input_SLUG.'language');
 	if( is_array($options) && $options['uninstall'] === true){
		delete_option(OPICLTQ_Input_SLUG.'language');
		delete_option(OPICLTQ_Input_SLUG.'source');
		delete_option(OPICLTQ_Input_SLUG.'cronjobtime');
		delete_option(OPICLTQ_Input_SLUG.'version');
	}
}

register_activation_hook(plugin_basename(__FILE__),'OPICLTQ_plugin_install'); 
register_deactivation_hook(plugin_basename(__FILE__), 'OPICLTQ_plugin_uninstall');

function OPICLTQ_table(){
	global $wpdb;
	$wpdb->query("DROP TABLE IF EXISTS ". $wpdb->prefix.LTQDBTable);
}
	
register_uninstall_hook(__FILE__,'OPICLTQ_table');
register_deactivation_hook(__FILE__,'OPICLTQ_table');

include_once(OPICLTQ_PLUGIN_PATH.'load.php');
?>