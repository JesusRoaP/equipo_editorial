<?php
/*
Plugin Name: Equipo Editorial
Plugin URI: 
Description: Crea un slider con los miembros del equipo editorial.
Author: Jesus Mauricio Roa Polania
Version: 1.0
Author URI: https://github.com/JesusRoaP
*/

defined('ABSPATH') or die("Acceso Denegado");

define('EE_RUTA', plugin_dir_path(__FILE__));

define('EE_NOMBRE','Equipo Editorial');

define('EE_TABLE','equipo_editorial');

include(EE_RUTA . 'includes/functions.php');

include(EE_RUTA . 'includes/options.php');

function equipo_editorial_activar() {

    /********** Creación tabla wp_equipo_editorial **********/
  
    global $wpdb;
    
    $table_name = $wpdb->prefix . EE_TABLE;
   
    $sql = "CREATE TABLE $table_name (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `nombre` varchar(300) NOT NULL,
        `cargo` varchar(300) NOT NULL,
        `cvlac` varchar(300) NOT NULL,
        `correo` varchar(300) NOT NULL,
        `foto` varchar(300) NOT NULL,
        PRIMARY KEY id (id)
    ) CHARACTER SET=utf8 COLLATE=utf8_spanish_ci;";

    // Revisión de existencia de la tabla
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

    // Creación de la tabla
    dbDelta($sql);

}
register_activation_hook(__FILE__,'equipo_editorial_activar');