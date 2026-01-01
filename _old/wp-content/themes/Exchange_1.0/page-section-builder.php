<?php
/**
 * Template Name: Section Builder
 *
 * @package WordPress
 * @subpackage Exchange_1.0
 * @since 1.0
 */
 
 get_header(); ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php get_template_part( 'template-parts/content-builder', 'page' ); ?>

    <?php endwhile; endif; ?>

<?php get_footer(); ?>
