<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package acid
 * @since acid 1.0
 */

get_header(); 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
?>

<div id="scrollbar">
	<div id="primary" class="viewport" data-horizontal-scroll="on">
			<div id="content" class="overview" role="main">

		<?php if ( have_posts() ) : ?>

			<?php 
				$counter = 0;
				while ( have_posts() ) : the_post();
				# Only the First of all Posts, Paginated pages don't get a large pretty thumb
				# Because they're mostly loaded through AJAX Anyway
				if ($paged !== 1 && $counter === 0) $counter = 1;

				if ($counter === 0):
			 ?>
				<div class="hscol box-column large">
					<?php get_template_part( 'parts/box-large', get_post_type() ); ?>
				</div>
			<?php else: ?>				
					
					<?php if ($counter === 1): ?>
						<div class="hscol box-column">
					<?php endif; ?>

					<?php get_template_part( 'parts/box', get_post_type() ); ?>

					<?php if ($counter === 2): ?>
						</div>
					<?php $counter = 0; endif; ?>

			<?php 
				endif;
				$counter++;
				endwhile; 
				wp_reset_query();
			?>

			<?php pure_pagination() ?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'index' ); ?>

		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

		<div class="scrollbar">
		<div class="track">
			<div class="thumb"></div>
		</div>
	</div>

</div> <!-- #scrollbar -->
<?php get_footer(); ?>