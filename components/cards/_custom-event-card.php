<?php
/**
 * Custom Event Card Template Partial
 *
 * This file generates a card for the serve page that shows a "choose where you serve" option
 * It doesn't go through event espresso so it has to be generated from ACF (found on the serve page fields)
 *
 *
 * Usage: get_template_part( 'components/cards/_custom-event-card' );
 *
 * @package WordPress
 * @subpackage Lets_Go_BBY
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */
?>


<!-- Start Card Outer -->
<div class="custom-card bg-white col-span-12 md:col-span-6 mx-5 mb-8 bg-gray-light shadow-xl relative flex flex-col">

    <!-- Thumbnail Image  -->
        <img class="rounded-t-lg" src="<?php the_field('card_image'); ?>"
             alt="Choose Serve Image">

    <!-- Start Card Content -->
    <div class="px-10 py-5 flex-grow -mt-10">
        <h2 class="text-xl md:text-xl font-bold uppercase druk pt-3"><?php the_field('card_title'); ?></h2>
        <h2 class="text-sm font-bold capitalize druk">
            <i class="fa-solid fa-location-dot"></i>
            <?php the_field('card_location'); ?>
        </h2>
        <p class="pb-3"><?php the_field('card_description'); ?></p>
    </div>


    <div class="grid grid-cols-12 rounded-bl-xl z-5 pb-5">
        <div class="col-span-12 text-center bg-gray-dark rounded-b-xl block pb-5">
            <a class="fab-main inline-block" href="<?php the_field('serve_link', 'options'); ?>"><?php the_field('button_text'); ?></a>
        </div>
    </div>
</div>