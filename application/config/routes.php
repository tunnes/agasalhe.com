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

# Dashboard routes operation in controller:
$route['account'] = 'account';

# Generic routes operations in controller:
$route['default_controller'] = 'institutional';
$route['contact'] = 'institutional/contact';
$route['about'] = 'institutional/about';

# item routes operation in controller:
$route['item'] = 'item/show_all';
$route['item/new'] = 'item/register';
$route['item/(:num)'] = 'item/show/$1';


# User routes, cause of your statement ":any" will always be 
# the last declaration routes, otherwise conflict of routes:
// $route['login'] = 'user/login';
// $route['logout'] = 'user/logout';
// $route['register'] = 'user/register';
// $route['user'] = 'user/show_all';
// $route['user/interest'] = 'user/item_interest';
// $route['user/(:num)/item'] = 'item/show_by_user/$1';
// $route['(:any)'] = 'user/show_profile/$1';



$route['API/user/(:num)'] = 'API/user/index/id/$1'; 


$route['API/example/users/(:num)'] = 'API/example/users/id/$1'; // Example 4
$route['API/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'API/example/users/id/$1/format/$3$4'; // Example 8


