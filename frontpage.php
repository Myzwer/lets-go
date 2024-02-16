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

    <!-- Start Particles-->
    <div id="particles-js"></div>
    <!-- End particles -->


    <!-- START SECTION 1 -->
    <div class="bg-white-gradient relative pt-10 md:pt-20">

        <!-- DECOR IMAGE -->
        <div class="absolute block -top-20 md:top-0 -left-2">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/src/img/triangle-1.png" alt="">
        </div>

        <div class="grid grid-cols-12 lg:max-w-7xl mx-auto pt-5 gap-4 md:gap-14 relative z-10">
            <!-- Lets Go Logo-->
            <div class="col-span-12 md:col-span-8 lg:col-span-5 mx-5">
                <img src="<?php the_field('main_brand'); ?>" alt="">
            </div>

            <!-- Content -->
            <div class="col-span-12 lg:col-span-7 mx-5">

                <!-- Big Ass Text-->
                <h1 class="text-3xl md:text-5xl 2xl:text-7xl uppercase druk"><?php the_field('main_text'); ?></h1>

                <!-- Button-->
                <?php if (have_rows('primary_cta')): ?>
                    <?php while (have_rows('primary_cta')): the_row(); ?>
                        <a href="<?php the_sub_field("button_link"); ?>">
                            <button class="fab-main mt-3">
                                <i class="fa-solid fa-circle-arrow-right"></i> <?php the_sub_field("button_text"); ?>
                            </button>
                        </a>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>

        <!-- ORANGE WAVE -->
        <div class="bg-no-repeat bg-scroll bg-cover relative z-3"
             style="background:
                     url('<?php echo get_template_directory_uri(); ?>/assets/src/img/orange-wave.png') center center no-repeat;
                     height: 20vh; background-size: cover;">
        </div>
    </div>
    <!-- END SECTION 1 -->

    <!-- START SECTION 2 -->
    <div class="bg-orange relative -mt-1 overflow-hidden">

        <!-- Decor Image -->
        <div class="hidden xl:inline-block absolute -right-28 -top-20 z-4">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/src/img/circle-decor.png" alt="">
        </div>


        <div class="grid grid-cols-12 lg:max-w-7xl gap-4 relative z-10 pb-10 mx-6 xl:mx-auto">

            <!-- Title -->
            <div class="col-span-12 md:col-span-8">
                <div class="drop-shadow">
                    <h1 class="text-3xl md:text-5xl uppercase druk text-white"><?php the_field('section_2_title'); ?></h1>
                </div>
            </div>

            <!-- STEPS -->
            <div class="col-span-12 md:col-span-8 mt-5">
                <?php if (have_rows('sign_up_steps')): ?>
                    <?php while (have_rows('sign_up_steps')): the_row(); ?>
                        <div class="pb-5">
                            <div class="drop-shadow">
                                <h2 class="text-2xl druk text-white"><?php the_sub_field('step_title'); ?></h2>
                            </div>
                            <p class="pt-2 text-lg text-white font-bold"><?php the_sub_field('step_instructions'); ?></p>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>

            <!-- Button-->
            <div class="col-span-12 mb-5">
                <?php if (have_rows('primary_cta_2')): ?>
                    <?php while (have_rows('primary_cta_2')): the_row(); ?>
                        <a href="<?php the_sub_field("button_link"); ?>">
                            <button class="fab-main-blue">
                                <i class="fa-solid fa-circle-arrow-right"></i> <?php the_sub_field("button_text"); ?>
                            </button>
                        </a>
                    <?php endwhile; ?>
                <?php endif; ?>
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
        <!-- Decor Image -->
        <div class="hidden xl:inline-block absolute right-0 -top-40 z-5">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/src/img/triangle-2.png" alt="">
        </div>


        <div class="grid grid-cols-12 lg:max-w-7xl gap-4 relative z-10 mx-6 xl:mx-auto">

            <!-- Title -->
            <div class="col-span-12 md:col-span-8">
                <div class="drop-shadow">
                    <h1 class="text-3xl md:text-5xl uppercase druk text-white"><?php the_field('section_3_title'); ?></h1>
                </div>
            </div>

            <!-- Content -->
            <div class="col-span-12 md:col-span-8 mt-5">
                <?php if (have_rows('sign_up_steps_2')): ?>
                    <?php while (have_rows('sign_up_steps_2')): the_row(); ?>
                        <div class="pb-5">
                            <div class="drop-shadow">
                                <h2 class="text-2xl druk text-white"><?php the_sub_field('step_title'); ?></h2>
                            </div>
                            <p class="pt-2 text-lg text-white font-bold"><?php the_sub_field('step_instructions'); ?></p>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
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

<?php get_footer();