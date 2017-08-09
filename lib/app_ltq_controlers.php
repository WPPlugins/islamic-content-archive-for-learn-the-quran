<?php
/**
 * APP Controllers
 */
class app_ltq_controlers {
	
	var $Controller;
	var $Model;
	var $layout = 'default';
	var $fileview;
	var $NewCrontime;

	function __construct() {
		$this->UpdateOptions();
	}
	
	public function UpdateOptions()
	{
		if(!empty($_POST)){
			foreach ($_POST as $key => $value) {
				// if post name start wthi OPIC_
				
				if(substr($key, 0, strlen(OPICLTQ_Input_SLUG) ) === OPICLTQ_Input_SLUG){
					 
					$this->_UpdateOptions($key,$value);
				}
			}
		}
	}
	
	private function _UpdateOptions($key,$value = null)
	{
		if($key){
			$old_option = get_option($key);
			if($old_option !== false){
				// update
				update_option($key,$value,true);
			}else{
				// add
				add_option($key,$value); 
			}
		}
	}
	public function loadModel($modelname='')
	{
		$modelname = $this->preloadfilename($modelname,'model');
		$this->Model = str_replace('.php','',$modelname);
		$path = LTQModelspath.$modelname;
		if (file_exists($path)) {
			include_once $path;
			$this->Model = new $this->Model();
		} else {
			echo sprintf("Model <b>%s</b> not found in path <b>%s</b>",$modelname,LTQModelspath);
		}
	}
	
	public function loadController($controllername='')
	{
		
		$controllername = $this->preloadfilename($controllername);
		$this->Controller = str_replace('.php','',$controllername);
		$path = LTQControlerspath.$controllername;
		if (file_exists($path)) {
			include_once $path;
			 $this->Controller = new $this->Controller();
		} else {
			echo sprintf("Controller <b>%s</b> not found in path <b>%s</b>",$controllername,LTQControlerspath);
		}
	}
	public function loadView($filename='')
	{
		$LTQlayoutpath = LTQLayoutpath.LTQDS.str_replace('.php','',$this->layout).'.php';
		if(file_exists($LTQlayoutpath)){
			$this->fileview = str_replace('.php','',$filename);
			$mainViewFile = $this->inziliation_view_file($filename);
			if(!file_exists($mainViewFile)){
				echo sprintf("View File <b>%s</b> not found in path <b>%s</b>",$filename.'.php',LTQViewspath);
			}else{
				
				include_once $LTQlayoutpath;
			}
		}else{
			echo sprintf("Layout <b>%s</b> not found in path <b>%s</b>",$this->layout,LTQLayoutpath);
		}

	}
    public function inziliation_view_file($fileview='')
	{
		if($fileview){
			$fileview = str_replace('.php','',$fileview).'.php';
			$path = LTQViewspath.$fileview;
			return $path;
		}
		return ;
	}	
	private function preloadfilename($name='',$type='controller')
	{
		return  str_replace('.php','',$name).'_ltq_'.$type.'.php';
	}

}

?>