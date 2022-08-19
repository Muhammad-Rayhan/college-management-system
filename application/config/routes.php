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
$route['default_controller'] = 'AuthenticationController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*==========Page View Start==========*/
//View Admin Register Page
$route['admin-register'] = 'AuthenticationController/register';
//View Admin Login Page
$route['admin-login'] = 'AuthenticationController/login';
//View Admin Dashboard
$route['dashboard'] = 'frontendControllers/adminController/dashboard';
//View College Add Page
$route['add-college'] = 'frontendControllers/adminController/viewCollege';
//View Co-Admin Add Page
$route['add-coadmin'] = 'frontendControllers/adminController/viewCoAdmin';
//View Student Add Page
$route['add-student'] = 'frontendControllers/adminController/viewStudent';
//View or Display Student Data Who Was Read Same College
$route['show-student/(:num)'] = 'frontendControllers/adminController/showStudent/$1';
/*==========Page View End==========*/


//Admin Signup / Register
$route['admin-signup'] = 'AuthenticationController/signup';
//Admin Co-Admin & User Signin / Login
$route['admin-signin'] = 'AuthenticationController/signin';
//Admin Co-Admin & User Logout
$route['logout'] = 'frontendControllers/logoutController/logout';


//ADD College
$route['college'] = 'frontendControllers/adminController/addCollege';
//ADD Coadmin
$route['co-admin'] = 'frontendControllers/adminController/addCoAdmin';
//ADD Coadmin
$route['student'] = 'frontendControllers/adminController/addStudent';
//ADD Coadmin
$route['update-student/(:num)'] = 'frontendControllers/adminController/updateStudent/$1';

/*===========Display All Data Start==========*/
//Display Multi Table Data On Dashbord
$route['display-data'] = 'frontendControllers/adminController/displayMultiTableData';
/*===========Display All Data End==========*/


/*===========Student Data Action Start==========*/
//Edit Student
$route['edit-student/(:num)'] = 'frontendControllers/adminController/editStudent/$1';
//Delete Student
$route['delete-student/(:num)'] = 'frontendControllers/adminController/deleteStudent/$1';
/*===========Student Data Action End==========*/