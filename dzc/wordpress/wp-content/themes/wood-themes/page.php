<?php  
/* 
Template Name:aboutus
*/  
?> 


<?php get_header(); ?>
   
<div class="maim_pages">

   
   <div class="main3"> 

    <ul class="all_nav2">
        <li><a href="<?php  bloginfo('url');?>">首页</a> &nbsp;> &nbsp;</li>
        <li><a href=" <?php 
$cat=get_category_by_slug('company-news'); //获取分类别名为 wordpress 的分类数据


                      echo get_category_link( $cat );?>">关于我们</a> &nbsp;> &nbsp;<a><?php the_title(); ?></a></li>
     </ul>
    <div class="leftmain5">
    <div class="news_show">
  
    
      <div class="about_wen2">

    
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
       
     <?php the_content(); ?>
    
      
           <?php endwhile; ?> 
          
      



	<?php else : ?>
        

 <?php  endif; ?>   

         
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
