<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Menu {
	
	public $menus = array();
	
	public function __construct(){
		$modules = array_diff(scandir('./application/admin/'), array('..', '.'));
		foreach($modules as $module){
			if($module != '.' && $module != '..' && is_dir('./application/admin/'.$module)){
				$folder = './application/admin/'.$module.'/config/';
				$lists = glob($folder."*.php");
				foreach ($lists as $list) {
					require($list);
					if(isset($menus)){
						$this->setMenu($menus);
					}
				}
			}
		}
	}
	
	public function setMenu($menu){
		
		$menus['menu'] = $menu['menu'];
		$menus['position'] = $menu['position'];
		$menus['role'] = $menu['role'];
		$this->menus[] = $menus;
		$menus = [];
		// $this->menus['prc'.$menu['position'].rand()] = [$menu['menu'], @$menu['role']];
	}

	public function getMenu(){
		// header('Content-Type: application/json');
		usort($this->menus, 'compareByName');
		// echo json_encode($this->menus);
		// die;
		// ksort($this->menus);
		// print_r($this->menus);
		return $this->menus;
	}
}