<?php
/**
 * @package Acid
 * @since Acid 1.0
 */

$post_hover_color = get_post_color($post->ID);
?>
    <div class="box" data-follower-color="<?php echo $post_hover_color; ?>" style="background-color: <?php echo $post_hover_color;?>;">
        <a class="box__link js--link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">       
			<?php if ( has_post_thumbnail()) : ?>
			   <?php the_post_thumbnail("pure_thumbnail"); ?>
			<?php endif; ?>

            <div class="box__content <?php if( ! has_post_thumbnail() ) echo "visible" ?>">
                    <div class="entry-date">
                        <div class="month"><?php the_time("M");?></div>
                        <div class="date"><?php the_time("d");?></div>
                        <div class="year"><?php the_time("Y");?></div>
                    </div>
                <h2 class="entry-title"><?php the_title();?></h2>
            </div>


        </a>
        
    </div>