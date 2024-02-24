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

<?php
// Get the event ID
$event_id = get_event_id();
?>


    <div class="bg-white text-black relative">
        <div class="grid grid-cols-12 gap-4 md:gap-20 pb-10 px-5 lg:max-w-7xl mx-auto">

            <div class="col-span-12 md:col-span-8">
                <div class="signup">
                    <h2 class="text-black text-xl md:text-2xl font-bold uppercase pt-10 -mb-20"><?php echo get_the_title(); ?></h2>
                    <?php the_content(); ?>
                </div>
            </div>

            <div class="col-span-12 md:col-span-4">
                <div class="details bg-blue mt-5 p-5">
                    <?php the_content(); ?>
                    <div class="grid grid-cols-12 lg:max-w-7xl gap-4 relative z-10 mx-6 xl:mx-auto">
                        <!-- Title -->
                        <div class="col-span-12 md:col-span-12">
                            <h3 class="text-xl uppercase druk text-white">Event Details</h3>
                        </div>


                        <!-- Icons + Content -->
                        <div class="col-span-12 mt-3">
                            <div class="flex items-center text-white">
                                <i class="fa-solid fa-location-dot text-4xl flex-none w-12"></i>
                                <p class="ml-5 text-lg text-white font-bold"><?php the_field('address', $event_id); ?></p>
                            </div>
                        </div>

                        <div class="col-span-12 mt-3">
                            <div class="flex items-center text-white">
                                <i class="fa-solid fa-family text-4xl flex-none w-12"></i>
                                <p class="ml-5 text-lg text-white font-bold"><?php the_field('children_restrictions', $event_id); ?></p>
                            </div>
                        </div>

                        <div class="col-span-12 mt-3">
                            <div class="flex items-center text-white">
                                <i class="fa-solid fa-clouds-sun text-4xl flex-none w-12"></i>
                                <p class="ml-5 text-lg text-white font-bold"><?php the_field('weather', $event_id); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
get_footer();
