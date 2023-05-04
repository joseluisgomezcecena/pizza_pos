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
$route['cashier/clients/add/(:any)'] = 'cashiers/addclient/$1';
$route['cashier/clients/edit/(:any)'] = 'cashiers/editclient/$1';

//view orders
$route['cashier/list'] = 'cashiers/listorders';
$route['cashier/view/(:any)'] = 'cashiers/view/$1';
$route['cashier/delete/(:any)'] = 'cashiers/delete/$1';

//orders and items
$route['cashier/order/(:any)'] = 'orders/createorder/$1';//parameter is the customer id --- generates a new order and redirects to the following route.
$route['cashier/order/items/(:any)'] = 'orders/neworder/$1'; //loads view with menu items and order details
$route['cashier/order/items/detail/(:any)/(:any)'] = 'orders/detail/$1/$2';//loads view with menu item details
$route['cashier/order/items/add/(:any)'] = 'orders/addtocart/$1';
$route['cashier/order/items/remove/(:any)/(:any)'] = 'orders/removefromcart/$1/$2';
$route['cashier/order/addtoorder/(:any)'] = 'orders/addtoorder/$1';


//items
$route['cashier/order/items/edit/(:any)/(:any)'] = 'orders/edititem/$1/$2';
$route['cashier/order/items/delete/(:any)/(:any)'] = 'orders/deleteitem/$1/$2';
$route['cashier/order/items/up/(:any)/(:any)'] = 'orders/up/$1/$2';
$route['cashier/order/items/down/(:any)/(:any)'] = 'orders/down/$1/$2';

//complete order
$route['cashier/order/items/complete/(:any)'] = 'orders/completeorder/$1';


//ajax routes
$route['ajaxprice'] = 'orders/getprice';

/* AUTHENTICATION ROUTES */
$route['auth/login'] = 'auth/login';
$route['auth/logout'] = 'auth/logout';
$route['auth/register'] = 'auth/register';



/* ADMINISTRATION OF RESTAURANT: MENU, MENU ITEMS, PRICES & CONFIG  */

//admin route.  This is the default route for the admin section
$route['admin'] = 'admins/index';
$route['admin/view/(:any)'] = 'admins/view/$1';

$route['admin/sales'] = "sales/index";

//ingredients
$route['admin/ingredients'] = 'ingredients/index';
$route['admin/ingredients/edit/(:any)'] = 'ingredients/edit/$1';
$route['admin/ingredients/delete/(:any)'] = 'ingredients/delete/$1';
//sizes
$route['admin/sizes'] = 'sizes/index';
$route['admin/sizes/edit/(:any)'] = 'sizes/edit/$1';
$route['admin/sizes/delete/(:any)'] = 'sizes/delete/$1';

//extras
$route['admin/extras'] = 'extras/index';
$route['admin/extras/edit/(:any)'] = 'extras/edit/$1';
$route['admin/extras/delete/(:any)'] = 'extras/delete/$1';

//menu items
$route['admin/items'] = 'items/index';//pizzas
$route['admin/items/edit/(:any)'] = 'items/edit/$1';//pizzas
$route['admin/items/delete/(:any)'] = 'items/delete/$1';//pizzas

//menu items
$route['admin/sides'] = 'sides/index';//sides
$route['admin/sides/edit/(:any)'] = 'sides/edit/$1';//sides
$route['admin/sides/delete/(:any)'] = 'sides/delete/$1';//sides


//shipping and deliveries
$route['admin/shipping'] = 'shipping/index';
$route['admin/shipping/edit/(:any)'] = 'shipping/edit/$1';
$route['admin/shipping/delete/(:any)'] = 'shipping/delete/$1';


/* PAGES ROUTES */
$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
