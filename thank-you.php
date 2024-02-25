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


    <div class="bg-white text-black relative">
        <div class="grid grid-cols-12 gap-4 py-10 px-5">
            <div class="col-span-12 text-center">
                <h1 class="text-black text-3xl md:text-5xl font-bold uppercase">Registration Confirmed</h1>
                <h3 class="text-black text-2xl font-bold uppercase pt-5">Let's Go Serve!</h3>

            </div>

            <div class="col-span-12 md:col-span-10 lg:col-start-3 lg:col-span-8">
                <div class="mt-5">
                    <div class="thank-you">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-12 lg:max-w-7xl mx-auto gap-4 pb-10 px-5 z-5 relative ">
            <div class="col-span-12 md:col-span-6 md:col-start-4">
                <div class="mt-5">
                    <?php
                    // Add the "Don't bring too many people" announcement
                    get_template_part( 'components/blocks/_announcement' );
                    ?>
                </div>
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
