<?php get_header(); ?>
<div class="maim_pages">
  
  
  
   <div class="main3"> 
    <div class="chicun2">
    <?php if (get_option('mytheme_lx_title')!=""): ?>
   <img src="<?php echo get_option('mytheme_lx_title'); ?>" />
    <?php else : ?>   
   <img src="<? bloginfo('template_url'); ?>/images/pages/news-list_07.gif" />
     <?php endif; ?>
     </div>
    <ul class="all_nav2">
        <li><a href="<?php  bloginfo('url');?>">首页</a> &nbsp;> &nbsp;</li>
        <li><a href=" <?php 
$cat=get_category_by_slug('company-news'); //获取分类别名为 wordpress 的分类数据


                      echo get_category_link( $cat );?>">新闻动态</a></li>
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
         <li>
             <a class="bt" href="#"> <h1>奢华风吹艳长沙婚庆市场 </h1></a>
             <a class="time" href="#">2012-5-30</a>
         
         </li>
         
          <li>
             <a class="bt" href="#"> <h1>奢华风吹艳长沙婚庆市场 </h1></a>
             <a class="time" href="#">2012-5-30</a>
         
         </li>
         
            <li>
             <a class="bt" href="#"> <h1>奢华风吹艳长沙婚庆市场 </h1></a>
             <a class="time" href="#">2012-5-30</a>
         
         </li>
         
            <li>
             <a class="bt" href="#"> <h1>奢华风吹艳长沙婚庆市场 </h1></a>
             <a class="time" href="#">2012-5-30</a>
         
         </li>
         
            <li>
             <a class="bt" href="#"> <h1>奢华风吹艳长沙婚庆市场 </h1></a>
             <a class="time" href="#">2012-5-30</a>
         
         </li>
         
                <li>
             <a class="bt" href="#"> <h1>奢华风吹艳长沙婚庆市场 </h1></a>
             <a class="time" href="#">2012-5-30</a>
         
         </li>
         
         
                <li>
             <a class="bt" href="#"> <h1>奢华风吹艳长沙婚庆市场 </h1></a>
             <a class="time" href="#">2012-5-30</a>
         
         </li>
         
         
                <li>
             <a class="bt" href="#"> <h1>奢华风吹艳长沙婚庆市场 </h1></a>
             <a class="time" href="#">2012-5-30</a>
         
         </li>
         
         
                <li>
             <a class="bt" href="#"> <h1>奢华风吹艳长沙婚庆市场 </h1></a>
             <a class="time" href="#">2012-5-30</a>
         
         </li>
         
         
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
