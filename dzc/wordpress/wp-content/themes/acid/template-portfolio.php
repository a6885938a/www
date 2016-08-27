<?php
/*
* Template Name: Layout: Portfolio
*/
/*
 * @package acid
 * @since acid 1.0
 * @updated acid 1.1.1
 */

get_header(); 

if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }


$posts_per_page = get_option("posts_per_page");
if ($paged === 1) { $posts_per_page++; $page_offset = 0; }
else {$page_offset = 1 + ( $paged - 1 ) * $posts_per_page; }

$query = new WP_Query("post_type=portfolio&offset={$page_offset}&paged={$paged}&posts_per_page={$posts_per_page}");
?>

	<div id="scrollbar">
		<div id="primary" class="viewport" data-horizontal-scroll="on">
			<div id="content" class="overview" role="main">

		<?php if ( $query -> have_posts() ) : ?>

			<?php 
				$counter = 0;
				while ( $query -> have_posts() ) : $query -> the_post();
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
				pure_pagination($query);
				wp_reset_query();
			?>

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
</div>
<?php get_footer(); ?>