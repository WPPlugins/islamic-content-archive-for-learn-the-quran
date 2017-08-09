<?php
class OPICLTQ_plugin {
	
	function __construct(){ }
	static function loaded(){
		
	}
	
	public static function createTable(){
		global $wpdb;
		$table_name = $wpdb->prefix . LTQDBTable;
		
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {

		$sql = "CREATE TABLE IF NOT EXISTS `$table_name` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`opic_key` varchar(99) NOT NULL,
			`opic_value` longtext NOT NULL,
			PRIMARY KEY (`id`)
			);";
	
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta( $sql );
		
		}
	}
}

add_action( 'plugins_loaded', array( 'OPICLTQ_plugin', 'loaded' ));
add_action( 'plugins_loaded', array( 'OPICLTQ_plugin', 'createTable' ) );



function OPICLTQ_plugin_styles() {
	$ulr =  OPICLTQ_PLUGIN_URL.'style/css/style.css';
	echo "<link rel='stylesheet' href='$ulr' type='text/css' media='all' />";
}
add_action( 'admin_head', 'OPICLTQ_plugin_styles' );
 

?>