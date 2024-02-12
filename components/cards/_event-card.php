<?php
/**
 * Event Card Template Partial
 *
 * This file generates cards for the frontpage based on data they it gets from the event espresso plugin.
 *
 *
 * Usage: get_template_part( 'components/cards/sample-card' );
 *
 * @package WordPress
 * @subpackage Lets_Go_BBY
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */
?>

<div class="bg-white col-span-12 <?php echo $args['column_span_class']; ?> mx-5 mb-8 bg-gray-light shadow-xl rounded-xl relative flex flex-col">
    <?php if (has_post_thumbnail()) : ?>
        <img class="rounded-t-lg" src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>" alt="<?php the_title_attribute(); ?>">
    <?php endif; ?>
    <div class="p-5 flex-grow">
        <h2 class="text-xl md:text-2xl font-bold capitalize"><?php the_title(); ?></h2>
        <?php
        $subtitle = get_post_meta(get_the_ID(), 'subtitle_meta_key', true);
        if ($subtitle) : ?>
            <h3 class="text-lg"><?php echo esc_html($subtitle); ?></h3>
        <?php endif; ?>
        <p class="pb-3"><?php the_excerpt(); ?></p>
        <div class="grid grid-cols-12 pt-10">

            <?php
            // Check if the event is assigned the term 'family-friendly' in the custom taxonomy 'espresso_event_categories'
            // and assign it the appropriate opacity for true or not.
            $ff = (has_term('family-friendly', 'espresso_event_categories', get_the_ID())) ? 'opacity-2' : 'opacity-10';
            ?>

            <div class="col-span-4 text-center <?php echo $ff; ?>">
                <div class="text-5xl">
                    <i class="fa-solid fa-family"></i>
                </div>
                <h4>Family Friendly</h4>
            </div>

            <?php
            // Check if the event is assigned the term 'outdoor in the custom taxonomy 'espresso_event_categories' and
            // assign it the appropriate opacity for true or not.
            $outdoor = (has_term('outdoor', 'espresso_event_categories', get_the_ID())) ? 'opacity-2' : 'opacity-10';
            ?>

            <div class="col-span-4 text-center <?php echo $outdoor; ?>">
                <div class="text-5xl">
                    <i class="fa-solid fa-clouds-sun"></i>
                </div>
                <h4>Outdoor Event</h4>
            </div>


        </div>
    </div>

    <div class="grid grid-cols-12 rounded-bl-xl">
        <div class="col-span-12 text-center bg-gray-dark rounded-b-xl">
            <a class="block text-lg uppercase py-3 text-white font-bold" href="<?php the_permalink(); ?>">Register</a>
        </div>
    </div>
</div>

