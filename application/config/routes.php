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
|	https://codeigniter.com/userguide3/general/routing.html
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

/* CASHIER AND FRONT OF HOUSE ROUTES  */
$route['cashier'] = 'cashiers/index';

//clients
$route['cashier/clients/add'] = 'cashiers/addclient';

//orders and items
$route['cashier/order/(:any)'] = 'orders/createorder/$1';
$route['cashier/order/items/(:any)'] = 'orders/neworder/$1';
$route['cashier/order/items/detail/(:any)/(:any)'] = 'orders/detail/$1/$2';
$route['cashier/order/items/add/(:any)'] = 'orders/addtocart/$1';
$route['cashier/order/items/(:any)/remove/(:any)'] = 'orders/removefromcart/$1/$2';
$route['cashier/order/addtoorder/(:any)'] = 'orders/addtoorder/$1';

//ajax routes
$route['ajaxprice'] = 'orders/getprice';

/* ADMINISTRATION OF RESTAURANT: MENU, MENU ITEMS, PRICES & CONFIG  */

//admin route.  This is the default route for the admin section
$route['admin'] = 'admins/index';

//ingredients
$route['admin/ingredients'] = 'ingredients/index';

//sizes
$route['admin/sizes'] = 'sizes/index';



$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
