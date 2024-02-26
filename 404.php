<?php
/**
 * Template Name: 404 Error
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 *
 * @package WordPress
 * @subpackage Lets_Go_BBY
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */

get_header(); ?>

    <div class="grid grid-cols-12">
        <div class="col-span-12 md:col-span-6 text-center relative">
            <div class="content-middle-medium">
                <p class="md:mt-10 text-lg">404 Error</p>
                <h1 class="uppercase text-2xl md:text-3xl ">Page Not Found - Broken Link</h1>
                <p>Don't worry, there's still plenty of opportunities to serve!</p>
            <a href="/">
                <button class="fab-main mt-3">
                    <i class="fa-solid fa-circle-arrow-right"></i> See all Opportunities
                </button>
            </a>
        </div>
    </div>

        <div class="col-span-12 md:col-span-6">
            <div class="bg-no-repeat bg-scroll bg-cover relative" style="background: linear-gradient(
				  rgba(0, 0, 0, 0.45),
				  rgba(0, 0, 0, 0.45)
				), url('https://images.unsplash.com/photo-1604079628040-94301bb21b91?q=80&w=2731&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') center center;
				 height: 80vh;">
            </div>
        </div>
    </div>

<?php get_footer();
