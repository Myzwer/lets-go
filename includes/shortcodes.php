<?php
/**
 * Shortcodes
 *
 * Defines custom shortcodes for various buttons and social icons.
 * Last function defines shortcode for email templates in Event Espresso.
 *
 * Usage: These shortcodes are linked in the main functions.php file and can be used in the content or widgets.
 *
 * @package WordPress
 * @subpackage Lets_Go_BBY
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */

//******************** FAB (Floating Action) *********************

/*
 * MAIN BUTTON
 * Defaults to "#" if no value is given
 * If "cc='y'" is added to the shortcode it will open the church center modal.
 * Usage: [main_button text="Learn More" url="https://example.com" cc="Y"]
*/

function main_button_shortcode($atts, $content = null)
{
    $button_text = isset($atts['text']) ? $atts['text'] : 'Learn More';
    $button_url = isset($atts['url']) ? $atts['url'] : '#';
    $open_in_cc_modal = isset($atts['cc']) && strtolower($atts['cc']) === 'y' ? ' data-open-in-church-center-modal="true"' : '';
    return '<a href="' . esc_url($button_url) . '"' . $open_in_cc_modal . '><button class="fab-main mt-3"><i class="fa-solid fa-circle-arrow-right"></i> ' . esc_html($button_text) . '</button></a>';
}

add_shortcode('main_button', 'main_button_shortcode');



//******************** SOCIALS *********************
/*
 * FACEBOOK ICON
 * Defaults to the FC Facebook if no url is given
 * You can feed it any size between 1 and 10. Defaults to 2.
 * Usage:  [facebook url = "https://example.com" size = "1-10"]
*/
function facebook_shortcode($atts, $content = null)
{
    $button_size = isset($atts['size']) ? $atts['size'] : 2;
    $button_url = isset($atts['url']) ? $atts['url'] : 'https://www.facebook.com/foothillschurchTN';
    return '<a href="' . esc_url($button_url) . '"><i class="text-' . esc_html($button_size) . 'xl pr-1 fa-brands fa-facebook"></i></a>';
}

add_shortcode('facebook', 'facebook_shortcode');

/*
 * INSTAGRAM ICON
 * Defaults to the FC Instagram if no url is given
 * You can feed it any size between 1 and 10. Defaults to 2.
 * Usage:  [instagram url = "https://example.com" size = "1-10"]
*/
function instagram_shortcode($atts, $content = null)
{
    $button_size = isset($atts['size']) ? $atts['size'] : 2;
    $button_url = isset($atts['url']) ? $atts['url'] : 'https://www.instagram.com/foothillschurchtn/';
    return '<a href="' . esc_url($button_url) . '"><i class="text-' . esc_html($button_size) . 'xl pr-1 fa-brands fa-instagram"></i></a>';
}

add_shortcode('instagram', 'instagram_shortcode');

/*
 * X ICON
 * Defaults to the FC X account if no url is given
 * You can feed it any size between 1 and 10. Defaults to 2.
 * Usage:  [x url = "https://example.com" size = "1-10"]
*/
function x_shortcode($atts, $content = null)
{
    $button_size = isset($atts['size']) ? $atts['size'] : 2;
    $button_url = isset($atts['url']) ? $atts['url'] : 'https://twitter.com/foothillschurch';
    return '<a href="' . esc_url($button_url) . '"><i class="text-' . esc_html($button_size) . 'xl pr-1 fa-brands fa-x-twitter"></i></a>';
}

add_shortcode('x', 'x_shortcode');

/*
 * WEBSITE ICON
 * Defaults to the fc site if no url is given
 * You can feed it any size between 1 and 10. Defaults to 2.
 * Usage:  [website url = "https://example.com" size = "1-10"]
*/
function website_shortcode($atts, $content = null)
{
    $button_size = isset($atts['size']) ? $atts['size'] : 2;
    $button_url = isset($atts['url']) ? $atts['url'] : 'https://foothillschurch.com/';
    return '<a href="' . esc_url($button_url) . '"><i class="text-' . esc_html($button_size) . 'xl pr-1 fa-solid fa-link-simple"></i></a>';
}

add_shortcode('website', 'website_shortcode');

// Allows WP to inject shortcodes via a wysiwyg editor
add_filter('widget_text', 'do_shortcode');
add_filter('the_content', 'do_shortcode');


/**
 * Registers additional shortcodes for Event Espresso events to retrieve data from ACF fields.
 *
 * @link https://support.eventespresso.com/article/347-messages-system-how-to-add-custom-message-shortcodes
 * @link https://gist.github.com/Pebblo/e87cc8e30c4848dcdfe2
 * @param array          $shortcodes An array of existing shortcodes.
 * @param EE_Shortcodes $lib        The EE_Shortcodes object representing the current shortcode library.
 * @return array An array of shortcodes including the new ones.
 */
function register_additional_shortcodes( $shortcodes, EE_Shortcodes $lib ) {
    if ( $lib instanceof EE_Event_Shortcodes ) {
        $shortcodes['[GET_ADDRESS]'] = _('This shortcode displays the address of the event.');
        $shortcodes['[GET_CHILDREN]'] = _('This shortcode displays the children restrictions of the event.');
        $shortcodes['[GET_WEATHER]'] = _('This shortcode displays the weather for the event.');
        $shortcodes['[GET_SPECIAL_NOTES]'] = _('This shortcode displays the special notes for the event.');
    }
    return $shortcodes;
}
add_filter( 'FHEE__EE_Shortcodes__shortcodes', 'register_additional_shortcodes', 10, 2 );

/**
 * Parses additional shortcodes to retrieve data from ACF fields for Event Espresso events.
 *
 * @param string         $parsed      The parsed content.
 * @param string         $shortcode   The current shortcode being parsed.
 * @param mixed          $data        The current data available (event object).
 * @param mixed          $extra_data  Additional data available in the message system.
 * @param EE_Shortcodes $lib         The EE_Shortcodes object representing the current shortcode library.
 * @return string The parsed content including the retrieved data.
 */
function register_additional_shortcodes_parser( $parsed, $shortcode, $data, $extra_data, EE_Shortcodes $lib ) {
    // Check if the shortcode library is EE_Event_Shortcodes
    if ( $lib instanceof EE_Event_Shortcodes ) {
        // Check if the current shortcode is [GET_ADDRESS]
        if ( $shortcode == '[GET_ADDRESS]' ) {
            // Get the event object from the data
            $event = $data instanceof EE_Event ? $data : null;
            // If event object is not available, try to retrieve it from extra_data
            if ( empty( $event ) ) {
                $aee = $data instanceof EE_Messages_Addressee ? $data : NULL;
                $aee = $extra_data instanceof EE_Messages_Addressee ? $extra_data : $aee;
                $event = $aee instanceof EE_Messages_Addressee && $aee->reg_obj instanceof EE_Registration ? $aee->reg_obj->event() : NULL;
            }
            // If event object is available, retrieve and return the address field value
            if ( !empty( $event ) ) {
                $event_id = $event->ID();
                $address = '<a href="http://maps.google.com/?q=' . get_field('address', $event_id) . '">' . get_field('address', $event_id) . ' </a>';
                return $address;
            }
        }

        // Similar checks and retrieval for [GET_CHILDREN], [GET_WEATHER], and [GET_SPECIAL_NOTES] shortcodes
        if ( $shortcode == '[GET_CHILDREN]' ) {
            // Get the event object from the data
            $event = $data instanceof EE_Event ? $data : null;
            // If event object is available, retrieve and return the children_restrictions field value
            if ( !empty( $event ) ) {
                $event_id = $event->ID();
                $children_restrictions = get_field('children_restrictions', $event_id);
                return $children_restrictions;
            }
        }

        if ( $shortcode == '[GET_WEATHER]' ) {
            // Get the event object from the data
            $event = $data instanceof EE_Event ? $data : null;
            // If event object is available, retrieve and return the weather field value
            if ( !empty( $event ) ) {
                $event_id = $event->ID();
                $weather = get_field('weather', $event_id);
                return $weather;
            }
        }

        if ( $shortcode == '[GET_SPECIAL_NOTES]' ) {
            // Get the event object from the data
            $event = $data instanceof EE_Event ? $data : null;
            // If event object is available, retrieve and return the special_notes field value
            if ( !empty( $event ) ) {
                $event_id = $event->ID();
                $special_notes = '<h4 style="font-size: 1.1em;margin: 0;padding: 0 0 10px 0"><strong>Special Notes:</strong>' . get_field('special_notes', $event_id) . '</h4>';
                return $special_notes;
            }
        }
    }
    // Return the parsed content if the shortcode is not found or data is not available
    return $parsed;
}
add_filter( 'FHEE__EE_Shortcodes__parser_after', 'register_additional_shortcodes_parser', 10, 5 );





