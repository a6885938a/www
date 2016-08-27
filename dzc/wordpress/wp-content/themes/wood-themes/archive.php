<?php get_header(); ?>
<div class="maim_pages">
  
  
  
   <div class="main3"> 

  <ul class="all_nav2">
     	<?php if (have_posts()) : ?>
            <h2 class="ar_bt">找到分类:<?php single_cat_title(); ?></h2>
 			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

			<?php /* If this is a category archive */ if (is_category()) { ?>
				<p>找到分类:<?php single_cat_title(); ?></p>

			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<p>找到标签：<?php single_tag_title(); ?></p>

		

			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<p>Blog Archives</p>
			
			<?php } ?>

			<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

     </ul>

    <div class="leftmain5">
    <div class="news_show">
  
    
      <div class="about_wen2">

  
    
    <ul>
    
    
	<?php while (have_posts()) : the_post(); ?>

		<li>
             <a class="bt" href="<?php the_permalink() ?>"> <h1><?php the_title(); ?> </h1></a>
             <a class="time"><?php the_time('m-d-y') ?></a>
         
         </li>
				


		<?php endwhile; ?>



	<?php else : ?>

		<h1>非常抱歉，没有找到您想要的结果</h1>

	<?php endif; ?>
         
    </ul>
            
             
    <div class="pager">   <?php par_pagenavi(); ?>  </div>
  
  

         
     </div>
            

   </div>
    
    
    </div>
    
    
    
    <div class="rightmain2">
    <?php include_once("sidebar.php"); ?>
    </div>
   
   
   
   </div>
    <img class="shadow_2" src="<? bloginfo('template_url'); ?>/images/pages/shadouw.png" />
</div>




<?php get_footer(); ?>
