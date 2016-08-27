<?php get_header(); ?>
<div class="maim_pages">
   <div class="main3"> 
   <img src="<? bloginfo('template_url'); ?>/images/pages/news-list_07.gif" />
    <ul class="all_nav2">
         <li><a href="<?php  bloginfo('url');?>">首页</a> &nbsp;> &nbsp;</li>
        <li><a href=" <?php 
$cat=get_category_by_slug('company-news'); //获取分类别名为 wordpress 的分类数据


                      echo get_category_link( $cat );?>">新闻动态</a> &nbsp;> &nbsp;<a><?php the_title(); ?></a></li>
     </ul>
    <div class="leftmain5">
    <div class="news_show">
  
    
      <div class="about_wen2">

   <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
         <div class="sing_bt">
			<h1><?php the_title(); ?></h1>
		     <a><?php the_time('m-d-y') ?></a>
         </div>
			<div class="entry">
				
				<?php the_content(); ?>

			
				
			<ul class="wen_di">	
            <li><p><?php the_tags( 'Tags: ', ', ', ''); ?></p></li>
            <li>
            <!-- Baidu Button BEGIN -->
    <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
        <span class="bds_more">分享到：</span>
        <a class="bds_qzone"></a>
        <a class="bds_tsina"></a>
        <a class="bds_tqq"></a>
        <a class="bds_renren"></a>
		<a class="shareCount"></a>
    </div>
<script type="text/javascript" id="bdshare_js" data="type=tools" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
	document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
</script>
<!-- Baidu Button END -->
            
            
            </li>

		
			</ul>

			
		</div>



	<?php endwhile; endif; ?>
    
   

  
  

         
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
