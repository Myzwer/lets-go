<?php
/**
 * Template Name: Custom - Thank You
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


    <!-- START SECTION 3 -->
    <div class="bg-blue relative -mt-1 z-10">

        <div class="grid grid-cols-12 lg:max-w-7xl gap-4 relative z-10 mx-6 xl:mx-auto">

            <!-- Title -->
            <div class="col-span-12 md:col-span-8">
                <div class="drop-shadow">
                    <h1 class="text-3xl md:text-5xl uppercase druk text-white">Event Details</h1>
                </div>
            </div>

            <!-- Content -->
            <div class="col-span-12 mt-5">
                <div class="grid grid-cols-12">
                    <div class="col-span-2 mt-5 text-4xl">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>

                    <div class="col-span-8 mt-5">
                        <p class="pt-2 text-lg text-white font-bold text-left"><?php the_field('address'); ?></p>
                    </div>
                </div>
            </div>

            <div class="col-span-12 mt-5">
                <div class="pb-5">
                    <div class="drop-shadow">
                        <h2 class="text-2xl druk text-white">Family Restrictions</h2>
                    </div>
                    <p class="pt-2 text-lg text-white font-bold"><?php the_field('children_restrictions', $post->ID); ?></p>
                </div>
            </div>

            <div class="col-span-12 mt-5">
                <div class="pb-5">
                    <div class="drop-shadow">
                        <h2 class="text-2xl druk text-white">Weather Details</h2>
                    </div>
                    <p class="pt-2 text-lg text-white font-bold"><?php the_field('weather', $post->ID); ?></p>
                </div>
            </div>

            <!-- Button-->
            <div class="col-span-12 mb-5">
                <a href="<?php the_field('serve_link', 'options'); ?>" target="_blank">
                    <button class="ghost-white">
                        <?php the_field("button_text"); ?>
                    </button>
                </a>
            </div>
        </div>

        <!-- The Wave -->
        <div class="bg-no-repeat bg-scroll bg-cover relative z-5"
             style="background:
                 url('<?php echo get_template_directory_uri(); ?>/assets/src/img/black-wave.png') center center no-repeat;
                 height: 20vh; background-size: cover;">
        </div>
    </div>
    <!-- END SECTION 3 -->



<?php
get_footer();
