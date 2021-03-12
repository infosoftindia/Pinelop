<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'shopping/open_Page';


$route['admin'] = 'admin';
$route['dashboard'] = 'dashboard';
$route['search-data'] = 'shopping/filter_search';

$route['quick-view/(:any)'] = 'shopping/QuickView/$1';
$route['social/google'] = 'shopping/googleResponse';

$route['(:any)'] = 'shopping/open_Page/$1';

$route['surface/(:any)'] = 'shopping/open_Page/surface/$1';
$route['product/(:any)'] = 'shopping/open_Page/product/$1';
$route['blog/(:any)'] = 'shopping/open_Page/blog/$1';
$route['best-offers/(:any)'] = 'shopping/open_Page/best-offers/$1';
$route['productss/(:any)'] = 'shopping/open_Page/products/$1';
$route['sub-category/(:any)'] = 'shopping/open_Page/sub-category/$1';
$route['category/(:any)'] = 'shopping/open_Page/category/$1';
$route['select-payment/(:num)'] = 'shopping/open_Page/select-payment/$1';

$route['404_override'] = 'shopping/e404';
$route['translate_uri_dashes'] = FALSE;




























