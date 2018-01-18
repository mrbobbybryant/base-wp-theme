<?php
/**
 * The main template file
 *
 * @package <%= projectName %>
 * @since 0.1.0
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
    <section>
		<?php while ( have_posts() ): the_post(); ?>
            <h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		<?php endwhile; ?>
    </section>
<?php endif; ?>

<?php get_footer();