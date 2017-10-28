<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

# Other operations routes
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['password-recovery/(:any)'] = 'institutional/password_recovery/$1';
# Dashboard routes operation in controller:
$route['account'] = 'account';
# Generic routes operations in controller:
$route['default_controller'] = 'institutional';
$route['contact'] = 'institutional/contact';
$route['items'] = 'institutional/items';
$route['account'] = 'institutional/account';
$route['login'] = 'institutional/login';
$route['API/image/(:num)'] = 'API/image/index/id/$1';
$route['API/image/register'] = 'API/image/register';
# item routes operation in controller:
$route['API/item/(:num)'] = 'API/item/index/id/$1';
$route['API/item/(:num)'] = 'API/item/index/id/$1';
$route['API/item/trade/(:num)'] = 'API/item/trade/id/$1';
$route['API/item/(:num)/trade/(:num)'] = 'API/item/trade/item_yours/$1/item_theirs/$2';
$route['API/item/(:num)/refuse/trade/(:num)'] = 'API/item/refuse_trade/item_yours/$1/item_theirs/$2';
# user routes operation in controller:
$route['API/user/login'] = 'API/user/authenticate';
$route['API/user/(:num)'] = 'API/user/index/id/$1';
$route['API/user/(:num)/wish'] = 'API/user/wish/id/$1';
$route['API/user/(:num)/wish/item/(:num)'] = 'API/user/wish/user_id/$1/item_id/$2';
$route['API/user/(:num)/like'] = 'API/user/like/id/$1';
$route['API/user/(:num)/like/item/(:num)'] = 'API/user/like/user_id/$1/item_id/$2';
$route['API/user/password-recovery'] = 'API/user/password_recovery';