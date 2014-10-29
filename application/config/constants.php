<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * 
 * CONSTANTS _SIZE_1 sao referentes largura > que altura
 * 
 * 
 * Horizontal largura > que altura
G: 600x455
T: 87x66
 
VERTICAL:
G: 455X600
T: 50X66
 * Pequena: 140x130

Grande:  550x510
*/

define('HORIZONTAL_THUMB_SIZE_1', 87);
define('VERTICAL_THUMB_SIZE_1', 66);
define('HORIZONTAL_THUMB_SIZE_2', 66);
define('VERTICAL_THUMB_SIZE_2', 87);

define('HORIZONTAL_MEDIA_SIZE_2', 351);
define('VERTICAL_MEDIA_SIZE_2', 535);
define('HORIZONTAL_MEDIA_SIZE_1', 535);
define('VERTICAL_MEDIA_SIZE_1', 351);

define('INTEGRANTE_HORIZONTAL_THUMB_SIZE_1', 89);
define('INTEGRANTE_VERTICAL_THUMB_SIZE_1', 75);
define('INTEGRANTE_HORIZONTAL_THUMB_SIZE_2', 75);
define('INTEGRANTE_VERTICAL_THUMB_SIZE_2', 89);

define('INTEGRANTE_HORIZONTAL_MEDIA_SIZE_1', 312);
define('INTEGRANTE_VERTICAL_MEDIA_SIZE_1', 266);
define('INTEGRANTE_HORIZONTAL_MEDIA_SIZE_2', 266);
define('INTEGRANTE_VERTICAL_MEDIA_SIZE_2', 312);

define('IMG_THUMB_WIDTH', 300);
define('IMG_THUMB_HEIGHT', 200);

define('IMG_MEDIA_WIDTH', 500);
define('IMG_MEDIA_HEIGHT', 400);

/*
 * Empresa nome
 */
define('EMPRESA_NOME', 'Geoportal');


/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ', 							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 					'ab');
define('FOPEN_READ_WRITE_CREATE', 				'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 			'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/* End of file constants.php */
/* Location: ./system/application/config/constants.php */