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


/**
 * Get the Event ID of an Espress Event.
 * If the current post is an Event, it will return null.
 * If it can't find an event, or the necessary classes, it will return null.
 * If it can find the event, and it's not the current post, it will return the ID.
 *
 * @return int|null
 */

function get_event_id(): ?int {
    // if the current post is an event, no further logic is needed
    if (get_post_type() === 'espresso_events') {
        return null; // using null as the id will use the current post
    }

    // is the Espresso Events Registry class registered
    if (!class_exists('EE_Registry')) {
        // we can't find an event ID because the event class can't be found.
        // This shouldn't happen, but a good thing to check.
        return null;
    }

    // create a new instance of registry
    $instance = EE_Registry::instance();

    // make sure the current page is one of Registration or Thank You pages
    if (!(
        is_page( $instance->CFG->core->reg_page_id ) ||
        is_page( $instance->CFG->core->thank_you_page_id)
    )) {
        // if not, then return null, because the following code won't work
        return null;
    }

    // create a new instance of the checkout class
    $checkout = $instance->SSN->checkout();
    $transaction = null; // declare the variable so it exists

    // make sure it has been instantiated correctly
    if ($checkout instanceof EE_Checkout) {
        // get transaction from checkout instance
        $transaction = $checkout->transaction;
    } else if ($checkout === null && isset($_GET['e_reg_url_link'])) {
        // if checkout isn't instantiated, see if we have the URL param e_reg_url_link
        // this url param is used to find the transaction on the thank you page
        $txnModel = EE_Registry::instance()->load_model('Transaction');
        $transaction = $txnModel->get_transaction_from_reg_url_link($_GET['e_reg_url_link']);
    }

    // make sure a transaction was found
    if ($transaction instanceof EE_Transaction) {
        // a transaction can in theory have multiple registrations
        foreach ($transaction->registrations() as $registration) {
            if ($registration instanceof EE_Registration) {
                $event = $registration->event();
                // make sure the event is a valid event instance
                if ( $event instanceof EE_Event ) {
                    // return the first event ID we find.
                    // we do this because we only allow 1 event per registration
                    return $event->ID();
                }
            }
        }
    }
    // fallback if no events were found
    return null;
}
