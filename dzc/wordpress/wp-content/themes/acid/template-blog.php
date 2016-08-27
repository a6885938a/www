<?php
/*
* Template Name: Layout: Blog
*/

get_header(); 

$page = get_current_page();

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
					<div class="box-column hscol large">
						<?php get_template_part( 'parts/box-large', get_post_format() ); ?>
					</div>
				<?php else: ?>				
						
						<?php if ($counter === 1): ?>
							<div class="hscol box-column">
						<?php endif; ?>

						<?php get_template_part( 'parts/box', get_post_format() ); ?>

						<?php if ($counter === 2): ?>
							</div>
						<?php $counter = 0; endif; ?>

				<?php 
					endif;
					$counter++;
					endwhile; 
				?>

				<?php pure_pagination() ?>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'index' ); ?>

			<?php endif; ?>

			</div><!-- #content -->
		</div> <!-- #primary -->

		<div class="scrollbar">
			<div class="track">
				<div class="thumb"></div>
			</div>
		</div>

	</div> <!-- #scrollbar -->
<?php get_footer(); ?>