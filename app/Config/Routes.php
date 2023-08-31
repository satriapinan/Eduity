<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');

$routes->add('/user/registration', 'User::registration');
$routes->add('/user/login', 'User::login');
$routes->get('/user/logout', 'User::logout');

$routes->get('/course', 'Course::index');
$routes->get('/course/display/(:any)', 'Course::display/$1');
$routes->get('/course/detail/(:any)', 'Course::detail/$1');

$routes->get('/about', 'About::index');

$routes->get('/contact', 'Contact::index');

$routes->get('/subscription', 'Subscription::index');
$routes->get('/subscription/payment/(:num)', 'Subscription::payment/$1');
$routes->add('/subscription/payment/promo', 'Subscription::promo');

$routes->get('/admin', 'Admin::index');
$routes->get('/admin/home', 'Admin::index');

$routes->get('/admin/home/course', 'Admin::index');
$routes->get('/admin/home/course/delete/(:num)', 'Admin::delete_course/$1');
$routes->get('/admin/home/course/display/(:any)', 'Admin::display_course/$1');
$routes->get('/admin/home/course/order/(:any)', 'Admin::order_course/$1');

$routes->get('/admin/home/subscription', 'Admin::home_subscription');
$routes->add('/admin/home/subscription/delete/(:num)', 'Admin::delete_subscription/$1');
$routes->get('/admin/home/subscription/order/(:any)', 'Admin::order_subscription/$1');

$routes->get('/admin/member', 'Admin::member');
$routes->get('/admin/member/order/(:any)', 'Admin::order_member/$1');
$routes->add('/admin/home/form/course/save', 'Admin::save_course');
$routes->add('/admin/home/form/course/save/(:num)', 'Admin::save_course/$1');
$routes->add('/admin/home/form/course/edit/(:num)', 'Admin::form_course/$1');
$routes->get('/admin/member/report', 'Admin::exportPDF');

$routes->get('/admin/home/form/course', 'Admin::form_course');
$routes->get('/admin/home/form/subscription', 'Admin::form_subscription');
$routes->add('/admin/home/form/subscription/edit/(:num)', 'Admin::form_subscription/$1');
$routes->add('/admin/home/form/subscription/save', 'Admin::save_subscription');
$routes->add('/admin/home/form/subscription/save/(:num)', 'Admin::save_subscription/$1');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
