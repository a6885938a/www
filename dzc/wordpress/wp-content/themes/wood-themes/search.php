<?php get_header(); ?>
<div class="maim_pages">
  
  
  
   <div class="main3"> 
   
  <ul class="all_nav2">
        <li><a href="#">首页</a>></li>
        <li><a href="#">搜索结果</a></li>
     </ul>

    <div class="leftmain5">
    <div class="news_show">
  
    
      <div class="about_wen2">

  
    
    <ul>
    
     <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
       <li>
             <a class="bt" href="<?php the_permalink() ?>"> <h1><?php the_title(); ?> </h1></a>
             <a class="time" href="#"><?php the_time('m-d-y') ?></a>
         
         </li>
      
       <?php endwhile; ?>     
          
      



	<?php else : ?>
      <p>SORRY,没有找到您搜索的内容</p>
        <?php  endif; ?>   

         
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
