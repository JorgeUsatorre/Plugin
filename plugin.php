<?php
/**
 * @package JorgeUsatorre Words
 * @version 0.0.1
 */
/*
Plugin Name: JorgeUsatorre Words
Plugin URI: http://wordpress.org/plugins/jorgeusatorre-words/
Description: This plugin is a test for the WordPress plugin development course.
Author: JorgeUsatorre
Version: 0.0.1
*/

function inicioPlugin(){
    createTable();
    insertData();
}
/**
 * Carga tabla wordpresswords con las palabras malsonantes
 */
function createTable(){
    global $wpdb;
    $table_name = 'wordpresswords';
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        insulto varchar(255) NOT NULL,
        sutiles varchar(255) NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}



/**
 * Inserta o actualiza datos en la tabla
 */
function insertData() {
    global $wpdb;
    $table_name = 'wordpresswords';
    $data = array(
        array('insulto' => 'retrasado', 'sutiles' => 'incompetente'),
        array('insulto' => 'feo', 'sutiles' => 'guapo'),
        array('insulto' => 'fea', 'sutiles' => 'guapa'),
        array('insulto' => 'gilipollas', 'sutiles' => 'paleto'),
    );

    foreach ($data as $row) {
        $existing_row = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE insulto = %s", $row['insulto']));

        if ($existing_row) {
            // Si ya existe, actualiza el sutiles
            $wpdb->update($table_name, array('sutiles' => $row['sutiles']), array('id' => $existing_row->id));
        } else {
            // Si no existe, inserta un nuevo registro
            $wpdb->insert($table_name, $row);
        }
    }
}


/**
 * Whenever the word WordPress appears in the content
 * of a post or a page,
 * it will be replaced by WordPressDAM.
 * @param $text string
 * @return string
 */
function jorgeusatorre_wordpress_typo_fix( $text ) {
    global $wpdb;
    $table_name = 'wordpresswords';
    $results = $wpdb->get_results( "SELECT * FROM $table_name" );

    foreach ($results as $row) {
        $text = str_replace($row->insulto, $row->sutiles, $text);
    }

    return $text;
}

add_action('plugins_loaded', 'inicioPlugin');
add_filter('the_content', 'renym_wordpress_typo_fix');