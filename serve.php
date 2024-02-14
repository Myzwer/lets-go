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
    <video class="header-video" src="https://foothillscollective.com/wp-content/uploads/2021/04/Res-Power-Background.mp4" autoplay loop playsinline muted></video>

    <div class="viewport-header">
        <div class="head-container">
            <div class="center add-padding">
                <h1 class="text-white text-5xl pb-5">Header Title</h1>
            </div>
            <hr class="text-white pb-5">
            <h2 class="text-white text-3xl ">Title</h2>
            <h3 class="text-white text-2xl">Subtitle</h3>
        </div>
    </div>

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
                if ($events->have_posts()) {
                    while ($events->have_posts()) {
                        $events->the_post();
                        $size_select = array(
                            'column_span_class' => 'lg:col-span-6'
                        );
                        get_template_part('components/cards/_event-card', null, $size_select);
                    }
                } else { ?>
                    <h3 class="text-center font-bold">There are no upcoming events.</h3>
                    <?php
                }
                // Restore original Post Data
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>


<?php get_footer();

