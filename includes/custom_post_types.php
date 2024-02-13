<?php
/**
 * Custom Post Types
 *
 * Defines custom post types and taxonomies for the site.
 * - Custom Taxonomy for Event Location
 * - Custom Taxonomy for Event Type
 *
 * Usage: These custom post types are linked in functions.php and used in WP_Admin.
 * They are used by the Event Espresso plugin, mostly for filtering reasons.
 *
 * @package WordPress
 * @subpackage Lets_Go_BBY
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */

//**************** Custom Post Type Title ******************

function custom_taxonomy_location() {

    $labels = array(
        'name'                       => _x( 'Location', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Location', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Location', 'text_domain' ),
        'all_items'                  => __( 'All Locations', 'text_domain' ),
        'parent_item'                => __( 'Parent Location', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Location:', 'text_domain' ),
        'new_item_name'              => __( 'New Location Name', 'text_domain' ),
        'add_new_item'               => __( 'Add New Location', 'text_domain' ),
        'edit_item'                  => __( 'Edit Location', 'text_domain' ),
        'update_item'                => __( 'Update Location', 'text_domain' ),
        'view_item'                  => __( 'View Location', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate locations with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove locations', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Locations', 'text_domain' ),
        'search_items'               => __( 'Search Locations', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
        'no_terms'                   => __( 'No locations', 'text_domain' ),
        'items_list'                 => __( 'Locations list', 'text_domain' ),
        'items_list_navigation'      => __( 'Locations list navigation', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite'                    => array( 'slug' => 'location' ), // Set the slug here
    );
    register_taxonomy( 'location', array( 'espresso_events' ), $args );

}
add_action( 'init', 'custom_taxonomy_location', 0 );

// Register Custom Taxonomy
function custom_taxonomy_event_type() {

    $labels = array(
        'name'                       => _x( 'Event Type', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Event Type', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Event Type', 'text_domain' ),
        'all_items'                  => __( 'All Event Types', 'text_domain' ),
        'parent_item'                => __( 'Parent Event Type', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Event Type:', 'text_domain' ),
        'new_item_name'              => __( 'New Event Type Name', 'text_domain' ),
        'add_new_item'               => __( 'Add New Event Type', 'text_domain' ),
        'edit_item'                  => __( 'Edit Event Type', 'text_domain' ),
        'update_item'                => __( 'Update Event Type', 'text_domain' ),
        'view_item'                  => __( 'View Event Type', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate event types with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove event types', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Event Types', 'text_domain' ),
        'search_items'               => __( 'Search Event Types', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
        'no_terms'                   => __( 'No event types', 'text_domain' ),
        'items_list'                 => __( 'Event types list', 'text_domain' ),
        'items_list_navigation'      => __( 'Event types list navigation', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite'                    => array( 'slug' => 'event-type' ), // Set the slug here
    );
    register_taxonomy( 'event_type', array( 'espresso_events' ), $args );

}
add_action( 'init', 'custom_taxonomy_event_type', 0 );
