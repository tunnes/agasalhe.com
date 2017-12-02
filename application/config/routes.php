<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
$route['logout'] = 'institutional/logout';

# image routes operation in controller:
$route['API/image/(:num)'] = 'API/image/index/id/$1';
$route['API/image/item/(:num)'] = 'API/image/item/$1';
$route['API/profile/image/(:num)'] = 'API/image/profile/id/$1';
$route['API/image/register'] = 'API/image/register';

# item routes operation in controller:
$route['API/item/(:num)'] = 'API/item/index/id/$1';
$route['API/item/update'] = 'API/item/update';
$route['API/user/item'] = 'API/item/user_item';
$route['API/user_profile/items/(:num)'] = 'API/item/user_profile/id/$1';
$route['API/item/trade/(:num)'] = 'API/item/trade/id/$1';
$route['API/item/(:num)/trade/(:num)'] = 'API/item/trade/item_yours/$1/item_theirs/$2';
$route['API/item/(:num)/refuse/trade/(:num)'] = 'API/item/refuse_trade/item_yours/$1/item_theirs/$2';

# user routes operation in controller:
$route['API/user/login']  = 'API/user/authenticate';
$route['API/user/(:num)'] = 'API/user/index/id/$1';
$route['API/user/update'] = 'API/user/update';
$route['API/user/(:num)/wish'] = 'API/user/wish/id/$1';
$route['API/user/(:num)/wish/item/(:num)'] = 'API/user/wish/user_id/$1/item_id/$2';
$route['API/user/(:num)/like'] = 'API/user/like/id/$1';
$route['API/user/(:num)/like/item/(:num)'] = 'API/user/like/user_id/$1/item_id/$2';
$route['API/user/password-recovery'] = 'API/user/password_recovery';
$route['API/user/token'] = 'API/user/token';

# chat routes operation in controller:
$route['API/chat/(:num)'] = 'API/chat/index/id/$1';
$route['API/chat/register'] = 'API/chat/index';

# user profile route (attention always last route):
$route['(:any)'] = 'institutional/user_profile/$1';