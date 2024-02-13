<?php
/**
 * Simple Header Partial
 *
 * This file generates a card for use on the site. Its pretty straight forward, needs customization.
 * It's also going to fill whatever its parent container is, so make sure you set that when you link it.
 * You'll also have to make this dynamic via ACF.
 *
 * REQUIRED ACF FIELDS:
 * simple_title (text field)
 *
 *
 * Usage: get_template_part( 'components/cards/_simple' );
 *
 * @package WordPress
 * @subpackage Lets_Go_BBY
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */
?>

<div class="bg-white-gradient h-52 relative">
    <div class="content-middle text-center">
        <h2 class="text-black text-xl md:text-5xl font-bold uppercase"><?php echo get_the_title(); ?></h2>
    </div>
</div>