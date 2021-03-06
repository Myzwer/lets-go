<?php
/**
 * Template Name: Event Template
 *
 * The Contact Page of the Let's Go Theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Let's Go
 * @since 1.0.0
 */

$eventId = get_event_id();
get_header(); ?>

    <div class="full-width main-background">
        <div class="grid-container">
            <div class="grid-x grid-padding-x ">
                <div class="small-12 cell">
                    <div class="margin-bottom">
                        <a href="/frontpage">
                            <button class="btn btn-v1 register-button"><< Back to Homepage</button>
                        </a>
                    </div>
                </div>

                <div class="small-12 cell">
                    <h1 class = "light-color-invert xl-title"><?php the_field('organization_name', $eventId); ?></h1>
                    <p class = "no-spacing">Scroll down to see event specific details.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="full-width main-background">
        <div class="grid-container">
            <div class="grid-x grid-padding-x padding-outer">
                <div class="small-12 cell">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="full-width">
        <div class="grid-x ">
            <div class="small-12 cell">
                <img class="waves" src="https://letsgoserve.com/wp-content/uploads/2021/02/Vector-Top-Small.png" alt="">
            </div>
        </div>
    </div>

    <div class="blue-background serve-margin-pull full-width">
        <div class="grid-x grid-container">
            <div class="small-12 cell">
                <h2 class="dark-color-invert small-font-mobile">Details</h2>
            </div>
            <div class="small-12 cell padding-bottom">
                <p class = "dark-color-invert no-spacing"><?php the_field('event_description', $eventId); ?></p>
            </div>

            <div class="small-12 cell margin-bottom">
                <div class="grid-x grid-container">
                    <div class="small-2 cell relative">
                        <div class="icon-center">
                            <img class = "icons" src="https://letsgoserve.com/wp-content/uploads/2021/02/Pin-Marker.png"/>
                        </div>
                    </div>
                    <div class="small-10 cell">
                        <h4 class = "dark-color-invert"><?php the_field('address', $eventId); ?></h4>
                    </div>
                </div>
            </div>

            <div class="small-12 cell margin-bottom">
                <div class="grid-x grid-container">
                    <div class="small-2 cell relative">
                        <div class="icon-center">
                            <img class = "icons" src="https://letsgoserve.com/wp-content/uploads/2021/02/Family-Friendly.png"/>
                        </div>
                    </div>
                    <div class="small-10 cell">
                        <h4 class = "dark-color-invert"><?php the_field('child_information', $eventId); ?></h4>
                    </div>
                </div>
            </div>

            <div class="small-12 cell margin-bottom">
                <div class="grid-x grid-container">
                    <div class="small-2 cell relative">
                        <div class="icon-center">
                            <img class = "icons" src="https://letsgoserve.com/wp-content/uploads/2021/02/Mask.png"/>
                        </div>
                    </div>
                    <div class="small-10 cell">
                        <h4 class = "dark-color-invert"><?php the_field('mask_information', $eventId); ?></h4>
                    </div>
                </div>
            </div>

            <div class="small-12 cell margin-bottom padding-bottom">
                <div class="grid-x grid-container">
                    <div class="small-2 cell relative">
                        <div class="icon-center">
                            <img class = "icons" src="https://letsgoserve.com/wp-content/uploads/2021/02/Weather.png"/>
                        </div>
                    </div>
                    <div class="small-10 cell">
                        <h4 class = "dark-color-invert"><?php the_field('weather_information', $eventId); ?></h4>
                        <?php print_r($transaction_details); ?>
                    </div>
                </div>
            </div>

            <div class="small-12 cell margin-bottom">
                <h5 class = "dark-color-invert center">Spot you wanted full? <a class = "underline" href="https://foothillschurch.churchcenter.com/people/forms/222318">Choose your own adventure instead!</a></h5>
            </div>
        </div>
    </div>

<!--    <div class="full-width">
        <div class="grid-x ">
            <div class="small-12 low-z-index cell">
                <img class="waves" src="https://letsgoserve.com/wp-content/uploads/2021/02/Header-Small.png" alt="">
            </div>
        </div>
    </div>-->







<?php get_footer();
