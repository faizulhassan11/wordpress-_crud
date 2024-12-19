<?php

/*
 * Plugin Name:       Employee Management System
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       This is a CRUD Employee Management System
 * Version:           1.10.3
 * Requires PHP:      7.2
 * Author:            author
 * Author URI:        https://author.example.com/
 */


 define("EMS_PLUGIN_PATH",plugin_dir_path(__FILE__));

//  Calling action hook to add menu
add_action('admin_menu', 'ems_add_admin_menu');

//  Add menu
function ems_add_admin_menu()
{
    add_menu_page("Employee System | Employee Management System", "Employee System", "manage_options", "employee-system", "ems_crud_system", "dashicons-admin-home", 23);

    // Add submenus
    add_submenu_page('employee-system', "Add Employee", "Add Employee", "manage_options", 'employee-system','ems_crud_system');

    add_submenu_page('employee-system', "List Employee", "List Employee", "manage_options", 'ems-list-employee','ems_list_employee');

}

//  Menu handle Callback
function ems_crud_system()
{
   include_once (EMS_PLUGIN_PATH."pages/add-employee.php");
}

function ems_list_employee(){
    include_once (EMS_PLUGIN_PATH."pages/list-employee.php");
}

