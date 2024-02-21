<?php
/**
 * Template Name: Custom - Checkout
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Lets_Go_BBY
 * @since 1.0.0
 */

get_header(); ?>

<?php get_template_part( 'components/headers/_simple' );  ?>



    <div class="bg-white text-black relative">
        <div class="grid grid-cols-12 gap-4 pb-10 px-5">
            <div class="col-span-12 md:col-span-10 lg:col-start-3 lg:col-span-8">
                <div class="mt-5">
                    <div class="table-auto">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>




<?php
get_footer();
