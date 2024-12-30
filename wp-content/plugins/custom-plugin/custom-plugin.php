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


define("EMS_PLUGIN_PATH", plugin_dir_path(__FILE__));

define("EMS_PLUGIN_URL", plugin_dir_url(__FILE__));

//  Calling action hook to add menu
add_action('admin_menu', 'ems_add_admin_menu');

//  Add menu
function ems_add_admin_menu()
{
    add_menu_page("Employee System | Employee Management System", "Employee System", "manage_options", "employee-system", "ems_crud_system", "dashicons-admin-home", 23);

    // Add submenus
    add_submenu_page('employee-system', "Add Employee", "Add Employee", "manage_options", 'employee-system', 'ems_crud_system');

    add_submenu_page('employee-system', "List Employee", "List Employee", "manage_options", 'ems-list-employee', 'ems_list_employee');

}

//  Menu handle Callback
function ems_crud_system()
{
    include_once(EMS_PLUGIN_PATH . "pages/add-employee.php");
}

function ems_list_employee()
{
    include_once(EMS_PLUGIN_PATH . "pages/list-employee.php");
}

// Create Dynamic table on plugin activation

register_activation_hook(__FILE__, 'ems_create_table');

function ems_create_table()
{
    global $wpdb;
    $table_prefix = $wpdb->prefix;
    $table_name = $table_prefix . 'ems_form_data';

    $sql = "CREATE TABLE $table_name (
        id INT(11) NOT NULL AUTO_INCREMENT,
        name VARCHAR(120) DEFAULT NULL,
        email VARCHAR(80) DEFAULT NULL,
        phoneNo VARCHAR(50) DEFAULT NULL,
        gender ENUM('male', 'female', 'other') DEFAULT NULL,
        designation VARCHAR(50) DEFAULT NULL,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

    dbDelta($sql);


}

// Plugin Deactivation

register_deactivation_hook(__FILE__, 'ems_drop_table');

function ems_drop_table()
{
    global $wpdb;
    $table_prefix = $wpdb->prefix;
    $table_name = $table_prefix . 'ems_form_data';
    $sql = "DROP TABLE IF EXISTs $table_name";
    $wpdb->query($sql);
}
// Add CSS / JS to Plugin
add_action('admin_enqueue_scripts', 'ems_add_plugin_assets');

function ems_add_plugin_assets()
{
    // Define the plugin URL if not already defined
    if (!defined('EMS_PLUGIN_URL')) {
        define('EMS_PLUGIN_URL', plugin_dir_url(__FILE__));
    }

    // Enqueue styles
    wp_enqueue_style('ems-bootstrap-css', EMS_PLUGIN_URL . 'css/bootstrap.min.css', array(), '1.0.0');
    wp_enqueue_style('ems-dataTables-css', EMS_PLUGIN_URL . 'css/dataTables.min.css', array(), '1.0.0');
    wp_enqueue_style('ems-custom-css', EMS_PLUGIN_URL . 'css/custom.css', array(), '1.0.0');

    // Enqueue scripts
    wp_enqueue_script('ems-bootstrap-js', EMS_PLUGIN_URL . 'js/bootstrap.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('ems-dataTables-js', EMS_PLUGIN_URL . 'js/dataTables.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('ems-validate-js', EMS_PLUGIN_URL . 'js/jquery.validate.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('ems-script-js', EMS_PLUGIN_URL . 'js/custom.js', array('jquery'), '1.0.0', true);


    // If you need a specific version of jQuery, you can deregister the default one and register your own
    // wp_deregister_script('jquery');
    // wp_register_script('jquery', EMS_PLUGIN_URL . 'js/jquery.min.js', array(), '1.0.0', true);
    // wp_enqueue_script('jquery');
}
