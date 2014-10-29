<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/

$hook['pre_controller'][] = array(
  'class' => 'App_hook',
  'function' => 'index',
  'filename' => 'app_hook.php',
  'filepath' => 'hooks'
); 


/* End of file hooks.php */
/* Location: ./system/application/config/hooks.php */