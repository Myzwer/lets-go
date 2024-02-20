<?php
/**
 * Event Card Template Partial
 *
 * This file generates cards for the frontpage based on data they it gets from the event espresso plugin.
 *
 *
 * Usage: get_template_part( 'components/cards/sample-card' );
 *
 * @package WordPress
 * @subpackage Lets_Go_BBY
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */
?>

<?php
// Get the passed variables
$slots = get_query_var('slots');

// Get the post ID for the current event
$post_id = get_the_ID();

// Assigned taxonomy term hide or not. See doc block in /includes/quick_functions.php for full details.
assign_hide_term_to_event($post_id, $slots);
?>

<!-- Start Card Outer -->
<div class="custom-card bg-white col-span-12 md:col-span-6 mx-5 mb-8 bg-gray-light shadow-xl relative flex flex-col">

    <!-- Thumbnail Image  -->
    <?php if (has_post_thumbnail()) : ?>
        <img class="rounded-t-lg" src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>"
             alt="<?php the_title_attribute(); ?>">
    <?php endif; ?>

    <!-- Slot Counter -->
    <div class="bg-white absolute right-8 top-8 p-3 slot-border shadow-xl">
        <div class="text-5xl">
            <?php
            // Uses the EE model that is passed in through serve.php.
            // https://eventespresso.com/topic/how-do-i-display-the-total-number-of-tickets-remaining-for-each-event/#post-352164
            echo $slots->spaces_remaining();
            ?>
        </div>
        <h4 class='uppercase'>Slots</h4>
    </div>

    <!-- Start Card Content -->
    <div class="px-10 py-5 flex-grow -mt-10">
        <h2 class="text-xl md:text-xl font-bold uppercase druk"><?php the_title(); ?></h2>
        <h2 class="text-sm font-bold capitalize druk">
            <i class="fa-solid fa-location-dot"></i>
            <?php
            // Get and show the location of the event
            $event_locations = get_the_terms( get_the_ID(), 'location' );

            // Check if terms are found
            if ( $event_locations && ! is_wp_error( $event_locations ) ) {
                foreach ( $event_locations as $event_location ) {
                    echo esc_html( $event_location->name );
                }
            }
            ?>
        </h2>
        <p class="pb-3"><?php the_excerpt(); ?></p>


        <?php
        // Check if the event is assigned either 'indoor' or 'outdoor' in the custom taxonomy 'espresso_event_categories'
        // and assigns the appropriate icon and text.

        // Declare the variables so they don't throw an error if my content editors forget to select a term.
        $icon = null;
        $text = null;

        if (has_term('outdoor', 'espresso_event_categories', get_the_ID())) {
            $icon = '<i class="fa-solid fa-clouds-sun"></i>';
            $text = 'Outdoor Event';
        }
        if (has_term('indoor', 'espresso_event_categories', get_the_ID())) {
            $icon = '<i class="fa-solid fa-house-chimney"></i>';
            $text = 'Indoor Event';
        }

        // Check if the event is assigned the term 'family-friendly' in the custom taxonomy 'espresso_event_categories'
        // and assign it the appropriate opacity for true or not.
        $ff = (has_term('family-friendly', 'espresso_event_categories', get_the_ID())) ? 'opacity-100' : 'opacity-0';
        ?>

        <div class="grid grid-cols-12 pt-5">
            <div class="col-span-2 text-center">
                <div class="text-4xl">
                    <?php echo $icon; ?>
                </div>
            </div>
            <div class="col-span-10 pt-2 pl-1">
                <h4><?php echo $text; ?></h4>
            </div>
        </div>

        <div class="grid grid-cols-12 pt-5 <?php echo $ff; ?>">
            <div class="col-span-2 text-center">
                <div class="text-4xl">
                    <i class="fa-solid fa-family"></i>
                </div>
            </div>
            <div class="col-span-10 pt-2 pl-1">
                <h4>Family Friendly</h4>
            </div>
        </div>
    </div>


    <div class="grid grid-cols-12 rounded-bl-xl z-5 pb-5">
        <div class="col-span-12 text-center bg-gray-dark rounded-b-xl block pb-5">
            <a class="fab-main inline-block" href="<?php the_permalink(); ?>">Register</a>
        </div>
    </div>
</div>