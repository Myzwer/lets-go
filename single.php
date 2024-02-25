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

    <!-- Start Particles-->
<!--        <div id="particles-js"></div>-->
    <!-- End particles -->


    <div class="bg-white text-black relative">
        <div class="grid grid-cols-12 lg:max-w-7xl mx-auto gap-4 px-5 z-5 relative pt-10 md:pt-20">
            <div class="col-span-12 md:col-span-8">
                <h2 class="text-black text-3xl md:text-5xl font-bold uppercase pb-3"><?php echo get_the_title(); ?></h2>
                <!-- Desc-show hides everything but the description.  -->
                <div class="desc-show">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-12 lg:max-w-7xl mx-auto gap-4 pb-10 px-5 z-5 relative ">
            <div class="col-span-12 md:col-span-8">
                <div class="mt-5">
                    <div class="desc-hide">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>


        <div class="grid grid-cols-12 lg:max-w-7xl mx-auto gap-4 pb-10 px-5 z-5 relative ">
            <div class="col-span-12 md:col-span-8">
                <div class="mt-5">
                    <?php
                    // Add the "Don't bring too many people" announcement
                    get_template_part( 'components/blocks/_announcement' );
                    ?>
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


    <!-- START DETAILS -->
    <div class="bg-blue relative md:-mt-20 z-10">
        <div class="grid grid-cols-12 lg:max-w-7xl gap-4 relative z-10 mx-6 xl:mx-auto">

            <!-- Title -->
            <div class="col-span-12 md:col-span-8">
                <div class="drop-shadow">
                    <h1 class="text-3xl md:text-5xl uppercase druk text-white">Event Details</h1>
                </div>
            </div>

            <!-- Icons + Content -->
            <div class="col-span-12 mt-3">
                <div class="flex items-center text-white">
                    <i class="fa-solid fa-location-dot text-4xl flex-none w-12"></i>
                    <p class="ml-5 text-lg text-white font-bold"><?php the_field('address'); ?></p>
                </div>
            </div>

            <div class="col-span-12 mt-3">
                <div class="flex items-center text-white">
                    <i class="fa-solid fa-family text-4xl flex-none w-12"></i>
                    <p class="ml-5 text-lg text-white font-bold"><?php the_field('children_restrictions'); ?></p>
                </div>
            </div>

            <div class="col-span-12 mt-3">
                <div class="flex items-center text-white">
                    <i class="fa-solid fa-clouds-sun text-4xl flex-none w-12"></i>
                    <p class="ml-5 text-lg text-white font-bold"><?php the_field('weather'); ?></p>
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
