<?php
/**
 * Announcement Block Template Partial
 *
 * This file contains the ACF field for announcements found in the options menu.
 *
 * It places an orange block with "please note" as a header, followed by whatever is in the acf field.
 *
 * Usage: get_template_part( 'components/blocks/_announcement' );
 *
 * @package WordPress
 * @subpackage Lets_Go_BBY
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */
?>


    <div class="col-span-12 md:col-span-8 bg-orange text-center text-white rounded-2xl shadow-xl">
        <div class="p-5">
            <h2 class="druk text-2xl uppercase">Please Note</h2>
            <p class = "font-bold text-lg text-left md:text-center"><?php the_field('announcement', 'options'); ?></p>
        </div>
    </div>
