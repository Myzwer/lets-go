<?php
/**
 * Template Name: Custom - Serving Ops (All)
 *
 * This page is used to display all of Event Espresso's current opportunities
 *
 * Usage: Use in WP-Admin, select "Form Success" from page template.
 *
 * @package WordPress
 * @subpackage Lets_Go_BBY
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */

get_header(); ?>


    <!-- Start Body Section -->
    <div class="bg-white-gradient">
    <div class="2xl:w-9/12 max-w-screen-2xl mx-auto grid grid-cols-12 pt-5 xl:p-5 gap-4 xl:gap-10">
        <div class="col-span-12 xl:col-span-4 xl:col-span-4 mx-5">
            <div class="bg-white p-5 rounded-xl shadow-xl">
                <h3 class="capitalize font-bold text-3xl pb-3">Filter Events</h3>
                <div id="primary">
                    <?php
//                    echo do_shortcode('[fe_widget]');
                    ?>
                </div>
            </div>
        </div>


        <div class="col-span-12 xl:col-span-8">
            <div class="grid grid-cols-12 gap-4 md:gap-4">

                <?php
                // https://github.com/eventespresso/event-espresso-core/blob/master/docs/G--Model-System/model-querying.md
                $events = EEM_Event::instance()->get_all();

                foreach( $events as $event ) {
                    // Pass the $event variable to the template partial
                    set_query_var( 'event', $event );

                    // Call the card
                    get_template_part('components/cards/_event-card');

                }

                ?>
            </div>
        </div>
    </div>


<?php get_footer();

