<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$admin = getenv('admin').'/';


$route[$admin.'dashboard'] = 'dashboard';

// $route[$admin.'pages/manage'] = 'pages/manage';
// $route[$admin.'pages/create'] = 'pages/create';
// $route[$admin.'pages/edit/(:num)'] = 'pages/edit/$1';
// $route[$admin.'pages/delete/(:num)'] = 'pages/delete/$1';

$route[$admin.'blogs/manage'] = 'blogs/manage';
$route[$admin.'blogs/create'] = 'blogs/create';
$route[$admin.'blogs/edit/(:num)'] = 'blogs/edit/$1';
$route[$admin.'blogs/delete/(:num)'] = 'blogs/delete/$1';
$route[$admin.'blogs/categories'] = 'blogs/categories';
$route[$admin.'blogs/categories/edit/(:num)'] = 'blogs/categories_edit/$1';
$route[$admin.'blogs/categories/update/(:num)'] = 'blogs/categories_update/$1';
$route[$admin.'blogs/categories/delete/(:num)'] = 'blogs/categories_delete/$1';
$route[$admin.'blogs/tags'] = 'blogs/tags';
$route[$admin.'blogs/tags/edit/(:num)'] = 'blogs/tags_edit/$1';
$route[$admin.'blogs/tags/update/(:num)'] = 'blogs/tags_update/$1';
$route[$admin.'blogs/tags/delete/(:num)'] = 'blogs/tags_delete/$1';



$route[$admin.'comments'] = 'comments';
$route[$admin.'comments/approve/(:num)'] = 'comments/approve/$1';
$route[$admin.'comments/edit/(:num)'] = 'comments/edit/$1';
$route[$admin.'comments/delete/(:num)'] = 'comments/delete/$1';
$route[$admin.'comments/save_reply/(:num)'] = 'comments/save_reply/$1';
$route[$admin.'comments/reply/(:num)'] = 'comments/reply/$1';

$route[$admin.'products/manage'] = 'products/manage';
$route[$admin.'products/create'] = 'products/create';
$route[$admin.'products/categories'] = 'products/categories';
$route[$admin.'products/edit-category/(:num)'] = 'products/edit_category/$1';
$route[$admin.'products/delete-category/(:num)'] = 'products/delete_category/$1';
$route[$admin.'products/edit/(:num)'] = 'products/edit/$1';
$route[$admin.'products/attributes/(:num)'] = 'products/attributes/$1';
$route[$admin.'products/edit-attribute/(:num)'] = 'products/edit_Attributes/$1';
$route[$admin.'products/delete-attribute/(:num)'] = 'products/delete_Attributes/$1';
$route[$admin.'products/attribute/add-variant/(:num)'] = 'products/add_Variant/$1';
$route[$admin.'products/attributes/delete-variant-image/(:num)'] = 'products/delete_Variant_Image/$1';



$route[$admin.'orders/pendings'] = 'orders/pendings';
$route[$admin.'orders/manage'] = 'orders/manage';
$route[$admin.'orders/view/(:num)'] = 'orders/view/$1';
$route[$admin.'orders/reject-order/(:num)'] = 'orders/reject_order/$1';
$route[$admin.'orders/save-return-thread/(:num)'] = 'orders/save_return_thread/$1';


$route[$admin.'coupons/manage'] = 'coupons/manage';
$route[$admin.'coupons/edit-coupon/(:num)'] = 'coupons/edit_coupon/$1';
$route[$admin.'coupons/delete-coupon/(:num)'] = 'coupons/delete_coupon/$1';
$route[$admin.'coupons/update-coupon/(:num)'] = 'coupons/update_Coupon/$1';

$route[$admin.'payment/pending'] = 'payment/pending';
$route[$admin.'payment/completed'] = 'payment/completed';
$route[$admin.'payment/completed-edit/(:num)'] = 'payment/completed_edit/$1';
$route[$admin.'payment/update-payment/(:num)'] = 'payment/update_Payment/$1';
$route[$admin.'payment/pending-edit/(:num)'] = 'payment/pending_edit/$1';

$route[$admin.'sliders/manage'] = 'sliders/manage';
$route[$admin.'sliders/add-slider'] = 'sliders/add_slider';
$route[$admin.'sliders/edit/(:num)'] = 'sliders/edit/$1';
$route[$admin.'sliders/edit-slider/(:num)'] = 'sliders/edit_slider/$1';

$route[$admin.'testimonials/manage'] = 'testimonials/manage';
$route[$admin.'testimonials/add'] = 'testimonials/add';
$route[$admin.'testimonials/add-testimonial'] = 'testimonials/add_testimonial';
$route[$admin.'testimonials/edit/(:num)'] = 'testimonials/edit/$1';
$route[$admin.'testimonials/edit-testimonial/(:num)'] = 'testimonials/edit_testimonial/$1';
$route[$admin.'testimonials/delete/(:num)'] = 'testimonials/delete_testimonial/$1';


$route[$admin.'contacts/manage'] = 'contacts/manage';
$route[$admin.'contacts/view/(:num)'] = 'contacts/view/$1';

$route[$admin.'users/create'] = 'users/create';
$route[$admin.'users/manage'] = 'users/manage';
$route[$admin.'users/view/(:num)'] = 'users/view/$1';
$route[$admin.'users/edit/(:num)'] = 'users/edit/$1';
$route[$admin.'users/status/(:num)/(:num)'] = 'users/status/$1/$2';

$route[$admin.'offers/daily-deals'] = 'offers/daily_deals';
$route[$admin.'offers/best-offers'] = 'offers/best_offers';
$route[$admin.'offers/edit-best-offers/(:num)'] = 'offers/edit_best_offers/$1';
$route[$admin.'offers/delete-best-offers/(:num)'] = 'offers/delete_best_offers/$1';
$route[$admin.'offers/save-daily-deals'] = 'offers/save_daily_deals';
$route[$admin.'offers/save-best-offers/(:num)'] = 'offers/save_best_offers/$1';
$route[$admin.'offers/save-trending-categories'] = 'offers/save_trending_categories';








$route[$admin.'plugins/manage'] = 'plugins/manage';
$route[$admin.'plugins/delete/(:any)'] = 'plugins/delete/$1';
$route[$admin.'plugins/new'] = 'plugins/new';

$route[$admin.'tools/backup'] = 'tools/backup';
$route[$admin.'tools/seo'] = 'tools/seo';

$route[$admin.'settings/general'] = 'settings/general';
$route[$admin.'settings/email'] = 'settings/email';
$route[$admin.'settings/reading'] = 'settings/reading';
$route[$admin.'settings/captcha'] = 'settings/captcha';
$route[$admin.'settings/media'] = 'settings/media';
$route[$admin.'settings/site-legal'] = 'settings/site_legal';

$route[$admin.'login'] = 'login';
$route[$admin.'login.php'] = 'login/login_script';
$route[$admin.'logout.php'] = 'login/logout';
$route[$admin.'user/register.php'] = 'login/user_register_script';
$route[$admin.'user/register-vendor.php'] = 'login/vendor_register_script';
$route[$admin.'user/login.php'] = 'login/user_login_script';
$route[$admin.'user/forgot-password.php'] = 'login/forgot_password_script';
$route[$admin.'user/password.php'] = 'login/reset_password';

$route[$admin.'profile'] = 'login/profile';
$route[$admin.'profile/update'] = 'login/update_profile';
$route[$admin.'profile/change-password'] = 'login/change_password';

$route[$admin.'contacts/manage'] = 'contacts/manage';
$route[$admin.'contacts/view/(:num)'] = 'contacts/view/$1';
