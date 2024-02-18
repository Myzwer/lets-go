<?php
/**
 * Quick Functions
 *
 * This file contains a quick function to alphabetize page templates in a WordPress theme.
 *
 * Usage: Include this file in functions.php to apply the alphabetization filter to page templates.
 *
 * @package WordPress
 * @subpackage Lets_Go_BBY
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */

function alphabetize_page_templates($templates)
{
    asort($templates);
    return $templates;
}

add_filter('theme_page_templates', 'alphabetize_page_templates');


/**
 * Assigns the "hide" term to the event post if the number of slots remaining is greater than zero,
 * or removes the "hide" term if the slots count is zero.
 * I realize that's backwards since anything with the term "hide" is actually shown,
 * but that's how it had to be for the filter plugin frontend to make sense.
 * When users click "hide" it doesn't remove the ones with 0 slots, it only SHOWS the ones with slots.
 *
 * @param int|WP_Post $post_id The ID of the event post or the event post object.
 * @param object      $slots   The Event Espresso event object containing slot information.
 * @return void
 */
function assign_hide_term_to_event($post_id, $slots) {
    // Define the term based on the number of slots
    $term = ($slots->spaces_remaining() > 0) ? 'hide' : '';

    // Assign the term to the post
    if (!empty($term)) {
        $term_obj = get_term_by('slug', $term, 'event_capacity'); // Event_capacity is the custom taxonomy I created
        if (!empty($term_obj) && !is_wp_error($term_obj)) {
            wp_set_post_terms($post_id, $term_obj->term_id, 'event_capacity');
        }
    } else {
        // No term if slots count is zero
        wp_remove_object_terms($post_id, 'hide', 'event_capacity'); // Event_capacity is the custom taxonomy I created
    }
}

