<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wordpack-theme
 */

get_header();
?>

<?php get_template_part('components/headers/_simple'); ?>


    <div class="bg-white text-black relative">
        <div class="grid grid-cols-12 gap-4 pb-10 px-5">
            <div class="col-span-12 md:col-span-10 lg:col-start-3 lg:col-span-8">
                <div class="mt-5">
                    <div class="desc-hide">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- The Wave -->
        <div class="bg-no-repeat bg-scroll bg-cover relative z-10"
             style="background:
                     url('<?php echo get_template_directory_uri(); ?>/assets/src/img/blue-wave.png') center center no-repeat;
                     height: 20vh; background-size: cover;">
        </div>
    </div>
    <!-- END SECTION 2 -->

    <!-- START SECTION 3 -->
    <div class="bg-blue relative -mt-1 z-10">

        <div class="grid grid-cols-12 lg:max-w-7xl gap-4 relative z-10 mx-6 xl:mx-auto">

            <!-- Title -->
            <div class="col-span-12 md:col-span-8">
                <div class="drop-shadow">
                    <h1 class="text-3xl md:text-5xl uppercase druk text-white">Event Details</h1>
                </div>
            </div>

            <div class="col-span-12 mt-5">
                <div class="grid grid-cols-12">
                    <div class="col-span-12 mt-5 text-white ">
                        <div class="desc-show">
                        <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="col-span-12 mt-5">
                <div class="grid grid-cols-12">
                    <div class="col-span-12 mt-5 text-4xl text-white ">
                        <i class="fa-solid fa-location-dot"></i> <p class="pt-2 text-lg text-white font-bold text-lef inline"><?php the_field('address'); ?></p>
                    </div>
                </div>
            </div>

            <div class="col-span-12 mt-5">
                <div class="grid grid-cols-12">
                    <div class="col-span-12 mt-5 text-4xl text-white ">
                        <i class="fa-solid fa-family"></i> <p class="pt-2 text-lg text-white font-bold text-lef inline"><?php the_field('children_restrictions'); ?></p>
                    </div>
                </div>
            </div>

            <div class="col-span-12 mt-5">
                <div class="grid grid-cols-12">
                    <div class="col-span-12 mt-5 text-4xl text-white ">
                        <i class="fa-solid fa-clouds-sun"></i> <p class="pt-2 text-lg text-white font-bold text-lef inline"><?php the_field('weather'); ?></p>
                    </div>
                </div>
            </div>

            <div class="col-span-12 text-center mx-auto mt-5 prose text-white font-bold">
                <?php the_field('choose_serve_text', 'option'); ?>
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
