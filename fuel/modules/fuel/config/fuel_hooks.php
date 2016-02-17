<?php
/*
|--------------------------------------------------------------------------
| FUEL HOOKS
|--------------------------------------------------------------------------
|
| The following are hooks used by FUEL specifically. This file is included
| in the fuel/application/config/hooks.php file
|
*/
// 在调用你的任何控制器之前调用.此时所用的基础类,路由选择和安全性检查都已完成.
$hook['pre_controller'][] = array(
	'class' => 'Fuel_hooks',
	'function' => 'pre_controller',
	'filename' => 'Fuel_hooks.php',
	'filepath' => 'hooks',
	'params' => array(),
	'module' => FUEL_FOLDER
);
// 在你的控制器实例化之后,任何方法调用之前调用.
$hook['post_controller_constructor'][] = array(
	'class' => 'Fuel_hooks',
	'function' => 'dev_password',
	'filename' => 'Fuel_hooks.php',
	'filepath' => 'hooks',
	'params' => array(),
	'module' => FUEL_FOLDER
);

$hook['post_controller_constructor'][] = array(
	'class' => 'Fuel_hooks',
	'function' => 'offline',
	'filename' => 'Fuel_hooks.php',
	'filepath' => 'hooks',
	'params' => array(),
	'module' => FUEL_FOLDER
);

$hook['post_controller_constructor'][] = array(
	'class' => 'Fuel_hooks',
	'function' => 'redirects',
	'filename' => 'Fuel_hooks.php',
	'filepath' => 'hooks',
	'params' => array(),
	'module' => FUEL_FOLDER
);
// 你的控制器完全运行之后调用.
$hook['post_controller'][] = array(
	'class' => 'Fuel_hooks',
	'function' => 'post_controller',
	'filename' => 'Fuel_hooks.php',
	'filepath' => 'hooks',
	'params' => array(),
	'module' => FUEL_FOLDER
);

/* End of file fuel_hooks.php */
/* Location: ./modules/fuel/config/fuel_hooks.php */