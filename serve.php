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
                    echo do_shortcode('[fe_widget]');
                    ?>
                </div>
            </div>
        </div>


        <div class="col-span-12 xl:col-span-8">
            <div class="grid grid-cols-12 gap-4 md:gap-4">

                <?php
                // WP_Query arguments
                $args = array(
                    'post_type' => array('espresso_events'),
                    'post_status' => array('publish'),
                    'nopaging' => false,
                    'order' => 'DESC',
                    'orderby' => 'date',
                    'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1,
                );

                // The Query
                $events = new WP_Query($args);

                // The Loop
                if ( $events->have_posts() ) {
                    while ( $events->have_posts() ) {
                        $events->the_post();

                        // Get the Event Espresso event object associated with the current post
                        // // https://github.com/eventespresso/event-espresso-core/blob/master/docs/G--Model-System/model-querying.md
                        $slots = EEM_Event::instance()->get_one_by_ID( get_the_ID() );

                        // If there is an associated event object
                        if ( $slots ) :
                            // Pass the event object to the template partial along with additional data
                            set_query_var( 'slots', $slots );
                            $size_select = array(
                                'column_span_class' => 'lg:col-span-6'
                            );
                            get_template_part( 'components/cards/_event-card', null, $size_select );
                        endif;
                    }
                } else { ?>
                    <h3 class="text-center font-bold">There are no upcoming events.</h3>
                <?php }

                // Restore original Post Data
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>


<?php get_footer();

