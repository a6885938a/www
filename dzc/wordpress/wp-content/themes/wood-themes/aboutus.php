<?php  
/* 
Template Name:aboutus
*/  
?> 


<?php get_header(); ?>
   <div class="about_bt">
    <div class="about_bt_ka">
      <div class="about_bt_left">
      <h1>ABOUT US</h1>
      <p>关于我们</p>
       </div>
       
       <div class="about_bt_right">
        <a href="<?php echo get_option('mytheme_news_title'); ?>"> <img src="<? bloginfo('template_url'); ?>/images/pages/aboutus_03.png" /></a>  
   
   <a href="   <?php 
                      $name = 'contact'; //page别名
                      global $wpdb;
                      $page_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '$name'");
                      echo get_page_link( $page_id );?>"><img src="<? bloginfo('template_url'); ?>/images/pages/aboutus_05.png" /></a>
   
       
       </div>
    
    </div>
  </div>
<div class="maim_pages">
 <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/xuant.js"></script>
   <div class="jiao">
   
   <DIV id=imgPlay>

<UL class=imgs id=actor>

 <LI>
   <?php if (get_option('mytheme_about_text1')!=""): ?>
   <img src="<?php echo get_option('mytheme_about_text1'); ?>"  />
   <?php else : ?>  
 <img src="<? bloginfo('template_url'); ?>/images/jiao_05.gif"  />
   <?php endif; ?>
 </LI>
 
  <LI>
 <div class="imgplay_wen"> 
 <h1>ABOUT US</h1><h1>关于我们</h1>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
       
     <?php the_content(); ?>
    
      
           <?php endwhile; ?> 
          
      



	<?php else : ?>
        

 <?php  endif; ?>   
 
 </div>
  <?php if (get_option('mytheme_about_tit1')!=""): ?>
  
   <img src="<?php echo get_option('mytheme_about_tit1'); ?>" width="369" height="480"  />
   
   <?php else : ?> 
 <img src="<? bloginfo('template_url'); ?>/images/about_07.gif" width="369" height="480"  />
  <?php endif; ?>
 </LI>
 
  <LI>
   <?php if (get_option('mytheme_about_img1')!=""): ?>
 <img src="<?php echo get_option('mytheme_about_img1'); ?>"  />
    <?php else : ?>  
    <img src="<? bloginfo('template_url'); ?>/images/jiao_06.gif"  />
   <?php endif; ?>
 </LI>
 
  <LI>
  <?php if (get_option('mytheme_about_url1')!=""): ?>
 <img src="<?php echo get_option('mytheme_about_url1'); ?>"  />
  <?php else : ?>
   <img src="<? bloginfo('template_url'); ?>/images/jiao_05.gif"  />  
   <?php endif; ?>
 </LI>
 
 

</UL>


<DIV class=prev><img src="<? bloginfo('template_url'); ?>/images/prev.png" /></DIV>
<DIV class=next><img src="<? bloginfo('template_url'); ?>/images/next.png" /></DIV></DIV>
   
   
   </div>
   
   
   
</DIV>
 

<?php get_footer(); ?>
