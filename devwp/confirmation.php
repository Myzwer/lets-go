<?php
/**
 * Template Name: Confirmation Template
 *
 * The Confirmation Page of the Let's Go Theme
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
                    <h1 class="light-color-invert xl-title">Success</h1>
                </div>

                <div class="small-12 cell">
                    <p class="no-spacing">You have successfully registered. You should receive an email confirmation
                        with any additional instructions regarding your serve slot. </p>
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
                <h2 class="dark-color-invert padding-bottom small-font-mobile">FAQ</h2>
            </div>

            <div class="small-12 cell">
                <div class="margin-bottom">
                    <h4 class="dark-color-invert no-spacing">I need to make a change to my serving time.</h4>
                    <p class="no-spacing dark-color-invert"><?php the_field('answer_1', $eventId); ?></p>
                </div>
            </div>

            <div class="small-12 cell">
                <div class="margin-bottom">
                    <h4 class="dark-color-invert no-spacing">I have a friend who wants to come last minute, is that
                        ok?</h4>
                    <p class="no-spacing dark-color-invert"><?php the_field('answer_2', $eventId); ?></p>
                </div>
            </div>

            <div class="small-12 cell">
                <div class="margin-bottom">
                    <h4 class="dark-color-invert no-spacing">What should I wear?</h4>
                    <p class="no-spacing dark-color-invert"><?php the_field('answer_3', $eventId); ?></p>
                </div>
            </div>

            <div class="small-12 cell">
                <div class="margin-bottom">
                    <h4 class="dark-color-invert no-spacing">Where do I park?</h4>
                    <p class="no-spacing dark-color-invert"><?php the_field('answer_4', $eventId); ?></p>
                </div>
            </div>

            <div class="small-12 cell">
                <div class="margin-bottom">
                    <h4 class="dark-color-invert no-spacing">I have more questions.</h4>
                    <p class="no-spacing dark-color-invert"><?php the_field('answer_5', $eventId); ?></p>
                </div>
            </div>

        </div>
    </div>

<?php get_footer();