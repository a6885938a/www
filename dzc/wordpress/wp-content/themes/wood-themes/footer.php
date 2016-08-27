		<div id="footer">
             
             <div class="footer_main">
           
                      <div class="f_m">  
                          <div class="f_xian">
                           <div class="f_bq">
                               <div class="contact_wen2">
          <p><b>电话：</b><?php echo get_option('mytheme_tell'); ?> &nbsp; &nbsp;   <b>传真：</b><?php echo get_option('mytheme_fax'); ?>&nbsp; &nbsp; 
         
          <b>电子邮件：</b><?php echo get_option('mytheme_mail'); ?>  &nbsp; &nbsp; &nbsp;  <b>QQ：</b><?php echo get_option('mytheme_qq'); ?> &nbsp; &nbsp; &nbsp; 
         
         <b>联系地址：</b><?php echo get_option('mytheme_dizhi'); ?></p>
          
          </div>
                           
                           
                           
                               <p>版权所有copy@<?php echo date("Y"); echo " "; bloginfo('name'); ?>&nbsp; &nbsp; 
                               <?php if (get_option('mytheme_beian')!=""): ?>
                              <?php echo get_option('mytheme_beian'); ?>
                              <?php else : ?>
                                湘ICP备11016964号   </p>
                              <?php endif; ?>      
                              
                            </div>
                            
   <div class="f_links">
                            
                               <li><h1>友情链接:</h1></li>
                              <?php wp_list_bookmarks('orderby=id&categorize=0&category=2&title_li='); ?>
                        
                            </div>
                             <div style="float:right;"><?php echo stripslashes(get_option('mytheme_analytics')); ?></div>   
                            </div>
                            
                       </div>
 
        
    
        
			
	



	<?php wp_footer(); ?>
	
	<!-- Don't forget analytics -->
	
</body>

</html>