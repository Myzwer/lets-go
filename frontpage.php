<?php
/**
 * Template Name: Custom - Front Page
 *
 * The Frontpage of the Lets Go BBY Theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Lets_Go_BBY
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */

get_header(); ?>


    <div class="bg-white-gradient relative py-10 md:py-20">
        <div class="absolute block -top-20 md:top-0 -left-2">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/src/img/triangle-1.png" alt="">
        </div>
        
        <div class="grid grid-cols-12 lg:max-w-7xl mx-auto pt-5 gap-4 md:gap-14 relative">

            <!-- Lets Go Logo-->
            <div class="col-span-12 md:col-span-8 lg:col-span-5 mx-5">
                <img src="<?php the_field('main_brand'); ?>" alt="">
            </div>

            <!-- Content -->
            <div class="col-span-12 lg:col-span-7 mx-5">

                <!-- Big Ass Text-->
                <h1 class = "text-3xl md:text-5xl 2xl:text-7xl uppercase druk"><?php the_field('main_text'); ?></h1>

                <!-- Button-->
                <?php if( have_rows('primary_cta') ): ?>
                    <?php while( have_rows('primary_cta') ): the_row(); ?>
                        <a href="<?php the_sub_field("button_link"); ?>">
                            <button class="fab-main mt-3">
                                <i class="fa-solid fa-circle-arrow-right"></i> <?php the_sub_field("button_text"); ?>
                            </button>
                        </a>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>

        </div>
    </div>



<?php get_footer();