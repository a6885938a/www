<?php
/*添加主题选项*/
add_action('admin_menu', 'mytheme_page');
 
function mytheme_page (){
 
	if ( count($_POST) > 0 && isset($_POST['mytheme_settings']) ){
 
		$options = array (
		'keywords',
		'description',
		'analytics',
		
		'about_title',
		'about_cititle',
		
		'about_title1',
		'about_cititle1',
		
		'about_title2',
		'about_cititle2',
		
		'news_title',
		'news_cititle',
		
		'case_title',
		'case_cititle',
		
		'lx_title',
		'lx_cititle',
		
		'xianshi',

		'xiangce_bimg',
		'xiangce_img',
		'xiangce_url',
		'xiangce_tit',
		'xiangce_text',
		
		'about_img1',
		'about_url1',
		'about_tit1',
		'about_text1',
		
		'about_img2',
		'about_url2',
		'about_tit2',
		'about_text2',
		
		'about_img3',
		'about_url3',
		'about_tit3',
		'about_text3',
		
		'about_img4',
		'about_url4',
		'about_tit4',
		'about_text4',
		
		'about_img5',
		'about_url5',
		'about_tit5',
		'about_text5',
		
		'about_img6',
		'about_url6',
		'about_tit6',
		'about_entit6',
		'about_text6',
		
		'about_img7',
		'about_url7',
		'about_tit7',
	    'about_entit7',
		'about_text7',
		
		'about_img8',
		'about_url8',
		'about_tit8',
		 'about_entit8',
		'about_text8',
		
		'about_img9',
		'about_url9',
		'about_tit9',
		 'about_entit9',
		'about_text9',
		
		'about_img0',
		'about_url0',
		'about_tit0',
		 'about_entit0',
		'about_text0',
		
		'beian',
		'dizhi',
		'tell',
		'fax',
		'mail',
		'qq',
		
	
		
		'ditu_tit',
		'ditu_cont',
		'ditu_zuob',
	
		'ditu_zuob3',
		
		'logo',
	
		
		
		);
 
		foreach ( $options as $opt ){
 
			delete_option ( 'mytheme_'.$opt, $_POST[$opt] );
 
			add_option ( 'mytheme_'.$opt, $_POST[$opt] );	
 
		}
 
	}
 
	add_theme_page(__('主题选项'), __('主题选项'), 'edit_themes', basename(__FILE__), 'mytheme_settings');
 
}
 //加载upload.js文件   
            wp_enqueue_script('my-upload', get_bloginfo( 'stylesheet_directory' ) . '/js/upload.js');   
            //加载上传图片的js(wp自带)   
            wp_enqueue_script('thickbox');   
            //加载css(wp自带)   
            wp_enqueue_style('thickbox');  
 
function mytheme_settings(){?>
 
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/xuanxiang.css" type="text/css" />
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/upload.js"></script> 
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.3.1.js"></script> 
     <script type="text/javascript">
// 收缩展开效果
$(document).ready(function(){

	$(".box h1").click(function(){
		$(this).next(".text").slideToggle("slow");
	})

	
});

$(document).ready(function(){

	$(".jiao_div h2").click(function(){
		$(this).nextAll("li").slideToggle("slow");
	})

	
});
</script>	
<div class="wrap">
 
<h2>主题选项</h2>
 <p>主题名称：木纹背景的精致主题<br/>
主题版本：2.0<br/>
本主题由web主题公园倾力打造，感谢您使用web主题公园的主题，更多主题请访问：<a href="http://www.themepark.com.cn">http://www.themepark.com.cn</a><br/>
BUG提交，请进入web主题公园网站，在相关主题下留言即可，我们收到留言即将对bug进行评估并更新，感谢您的支持!<br />
优化后台"主题选项"的功能，现在可以在后台上传图片了，优化另外一些细节，希望你能喜欢。
</p>
 
 <ul>
 
 <li class="box"> <h1>首选项</h1>
 <div class="text" style="display:none">
<form method="post" action="">
 
	<fieldset>
 
	<legend><strong>LOGO的图片地址</strong></legend>
 
              
         
				<div class="up">
           <input type="text" size="80"  name="logo" id="logo" value="<?php echo get_option('mytheme_logo'); ?>"/>   
            <input type="button" name="upload_button" value="上传" id="upbottom"/>   
    </div>        

 
				<em>请上传logo图片，图片格式为PNG（216像素 X45像素） logo主题为浅色最佳</em>
 

 
	<legend><strong>公司联系方式（显示在首页和联系我们页面）</strong></legend>
 
              
         <legend><strong>地址</strong></legend>
				<textarea name="dizhi" id="dizhi" rows="1" cols="70"><?php echo get_option('mytheme_dizhi'); ?></textarea><br />
 
				<em>示例：中华人民共和国北京市朝阳区星峰大厦</em>
      
       <legend><strong>电话</strong></legend>
				<textarea name="tell" id="tell" rows="1" cols="70"><?php echo get_option('mytheme_tell'); ?></textarea><br />
 
				<em>示例：中华人民共和国北京市朝阳区星峰大厦</em>
                
                       <legend><strong>传真</strong></legend>
				<textarea name="fax" id="fax" rows="1" cols="70"><?php echo get_option('mytheme_fax'); ?></textarea><br />
 
				<em>示例：中华人民共和国北京市朝阳区星峰大厦</em>
		
		       <legend><strong>电子邮件</strong></legend>
				<textarea name="mail" id="mail" rows="1" cols="70"><?php echo get_option('mytheme_mail'); ?></textarea><br />
 
				<em>示例：中华人民共和国北京市朝阳区星峰大厦</em>
                
                       <legend><strong>	qq</strong></legend>
				<textarea name="qq" id="qq" rows="1" cols="70"><?php echo get_option('mytheme_qq'); ?></textarea><br />
 
				<em>示例：中华人民共和国北京市朝阳区星峰大厦</em>
         
				 <legend><strong>备案号</strong></legend>
				<textarea name="beian" id="beian" rows="1" cols="70"><?php echo get_option('mytheme_beian'); ?></textarea><br />
 
                  
				<em>示例：京 8888-888</em>
				


	</fieldset>
 <fieldset>

     	<fieldset>
 
	<legend><strong>百度地图引用</strong></legend>
 <ul class="jiao_div">

  <li>
			<a>名称</a>	<textarea class="jiao" name="ditu_tit" id="ditu_tit" rows="1" cols="50"><?php echo get_option('mytheme_ditu_tit'); ?></textarea>
 </li>
 <li>
		<a>具体地址</a>	<textarea class="jiao" name="ditu_cont" id="ditu_cont" rows="1" cols="50"><?php echo get_option('mytheme_ditu_cont'); ?></textarea>
 </li>
  <li>
		<a>坐标X</a>	<textarea class="jiao" name="ditu_zuob" id="ditu_zuob" rows="1" cols="50"><?php echo get_option('mytheme_ditu_zuob'); ?></textarea>
        <a>坐标Y</a>	<textarea class="jiao" name="ditu_zuob3" id="ditu_zuob3" rows="1" cols="50"><?php echo get_option('mytheme_ditu_zuob3'); ?></textarea>
       
				
 </li>
 
   <li>
		
       
 </li>
 </ul>
              
			
         

 
				<em style="float:left; margin-top:60px;">默认为天安门地图，坐标获得方法：
                 <br /> 1.点击进入<A target="_blank" href="http://api.map.baidu.com/lbsapi/creatmap/index.html/">百度地图制作</A><br />2.点击侧边栏"定位中心点"，找到公司所在位置
               <br /> 3.点击"添加标注"，在地图上标注公司具体位置<br />
              <br />  4.回到定位中心点，如下图所示获取经纬度坐标，x、y对应填入对话框中保存即可:
              <br />  <img style="float:left; border:#F00 solid 2px;" src="<?php bloginfo('template_url'); ?>/images/shuoming.jpg" />
                

            
                </em>
 

	</fieldset>

    
  	<p class="submit">
 
		<input type="submit" name="Submit" class="button-primary" value="保存设置" />
 
		<input type="hidden" name="mytheme_settings" value="save" style="display:none;" />
 
	</p>
 


 


</div>

</li>
 
  <li class="box"> <h1>焦点图组件选项</h1>
  
 
 <div class="text" style="display:none">
 	<fieldset class="jiao_e">
 <legend><strong>焦点图选项</strong></legend>
 <br />
 
 <p> 
  <a>选项位置提示图片</a>
 <img src="<? bloginfo('template_url'); ?>/images/5465.jpg"  /></p><br />
 <ul class="jiao_div">
  <h2>焦点图1 <a>+点击开关</a>  </h2>
  <li>
 <p>效果预览：</p>
            <div class="jiao_img" title="<?php echo get_option('mytheme_about_entit6'); ?>">
            <?php if (get_option('mytheme_about_img6')!=""): ?>
             <div class="imgplay_wen"> 
            <h5><?php echo get_option('mytheme_about_entit6'); ?></h5>
              <a href="<?php echo get_option('mytheme_about_url6'); ?>"><h5><?php echo get_option('mytheme_about_tit6'); ?></h5></a>
              <p> <?php echo mb_strimwidth(strip_tags(get_option('mytheme_about_text6')), 0,180,"..."); ?></p>
           </div>
            <?php else : ?>  
 <?php endif; ?>
            <img  src="<?php echo get_option('mytheme_about_img6'); ?>" />
            </div>
            <br />
			<a>图片地址</a>	
            <div class="up">
           <input type="text" size="80"  name="about_img6" id="about_img6" value="<?php echo get_option('mytheme_about_img6'); ?>"/>   
            <input type="button" name="upload_button" value="上传" id="upbottom"/>   
                </div>
            
             <em>请上传图片( 尺寸：950*412 [像素] )</em>
 </li>
 <li>
		<a>链接</a>	<textarea class="jiao" name="about_url6" id="about_url6" rows="1" cols="100"><?php echo get_option('mytheme_about_url6'); ?></textarea>
         <em>填写您想要这张图片链接的网页地址</em>
 </li>
  <li>
		<a>英文标题</a>	<textarea class="jiao" name="about_entit6" id="about_entit6" rows="1" cols="100"><?php echo get_option('mytheme_about_entit6'); ?></textarea>
         <em>焦点图下方的英文标题</em>
 </li>
  <li>
		<a>文字标题</a>	<textarea class="jiao" name="about_tit6" id="about_tit6" rows="1" cols="100"><?php echo get_option('mytheme_about_tit6'); ?></textarea>
         <em>文字下方的标题</em>
 </li>
  <li>
		<a>描述文字</a>	<textarea class="jiao" name="about_text6" id="about_text6" rows="2" cols="100"><?php echo get_option('mytheme_about_text6'); ?></textarea>
         <em>描述的文字</em>
 </li>
 <li class="submit">
 
		<input type="submit" name="Submit" class="button-primary" value="保存设置" />
 
		<input type="hidden" name="mytheme_settings" value="save" style="display:none;" />
 
	</li>
 </ul>
 
 <ul class="jiao_div">
  <h2>焦点图2<a>+点击开关</a> </h2>
  <li>
        <p>效果预览：</p>
            <div class="jiao_img" title="<?php echo get_option('mytheme_about_entit7'); ?>">
            <?php if (get_option('mytheme_about_img7')!=""): ?>
             <div class="imgplay_wen"> 
            <h5><?php echo get_option('mytheme_about_entit7'); ?></h5>
              <a href="<?php echo get_option('mytheme_about_url7'); ?>"><h5><?php echo get_option('mytheme_about_tit7'); ?></h5></a>
              <p> <?php echo mb_strimwidth(strip_tags(get_option('mytheme_about_text7')), 0,180,"..."); ?></p>
           </div>
            <?php else : ?>  
 <?php endif; ?>
            <img  src="<?php echo get_option('mytheme_about_img7'); ?>" />
            </div>
            <br />
			<a>图片地址</a>	
            <div class="up">
           <input type="text" size="80"  name="about_img7" id="about_img7" value="<?php echo get_option('mytheme_about_img7'); ?>"/>   
            <input type="button" name="upload_button" value="上传" id="upbottom"/>   
                </div>
            
             <em>请上传图片( 尺寸：950*412 [像素] )</em>
 </li>
 <li>
          
		<a>链接</a>	<textarea class="jiao" name="about_url7" id="about_url7" rows="1" cols="100"><?php echo get_option('mytheme_about_url7'); ?></textarea>
         <em>填写您想要这张图片链接的网页地址</em>
 </li>
    <li>
		<a>英文标题</a>	<textarea class="jiao" name="about_entit7" id="about_entit7" rows="1" cols="100"><?php echo get_option('mytheme_about_entit7'); ?></textarea>
         <em>焦点图下方的英文标题</em>
 </li>
  <li>
		<a>文字标题</a>	<textarea class="jiao" name="about_tit7" id="about_tit7" rows="1" cols="100"><?php echo get_option('mytheme_about_tit7'); ?></textarea>
         <em>文字下方的标题</em>
 </li>
  <li>
		<a>描述文字</a>	<textarea class="jiao" name="about_text7" id="about_text7" rows="2" cols="100"><?php echo get_option('mytheme_about_text7'); ?></textarea>
         <em>描述的文字</em>
 </li>
 <li class="submit">
 
		<input type="submit" name="Submit" class="button-primary" value="保存设置" />
 
		<input type="hidden" name="mytheme_settings" value="save" style="display:none;" />
 
	</li>
 </ul>

  <ul class="jiao_div">
  <h2>焦点图3<a>+点击开关</a> </h2>
  
  <li>
             <p>效果预览：</p>
            <div class="jiao_img" title="<?php echo get_option('mytheme_about_entit8'); ?>">
            <?php if (get_option('mytheme_about_img8')!=""): ?>
             <div class="imgplay_wen"> 
            <h5><?php echo get_option('mytheme_about_entit8'); ?></h5>
              <a href="<?php echo get_option('mytheme_about_url8'); ?>"><h5><?php echo get_option('mytheme_about_tit8'); ?></h5></a>
              <p> <?php echo mb_strimwidth(strip_tags(get_option('mytheme_about_text8')), 0,180,"..."); ?></p>
           </div>
            <?php else : ?>  
 <?php endif; ?>
            <img  src="<?php echo get_option('mytheme_about_img8'); ?>" />
            </div>
            <br />
			<a>图片地址</a>	
            <div class="up">
           <input type="text" size="80"  name="about_img8" id="about_img8" value="<?php echo get_option('mytheme_about_img8'); ?>"/>   
            <input type="button" name="upload_button" value="上传" id="upbottom"/>   
                </div>
            
             <em>请上传图片( 尺寸：950*412 [像素] )</em>
 </li>
 <li> 
         
		<a>链接</a>	<textarea class="jiao" name="about_url8" id="about_url8" rows="1" cols="100"><?php echo get_option('mytheme_about_url8'); ?></textarea>
         <em>填写您想要这张图片链接的网页地址</em>
 </li>
  <li>
		<a>英文标题</a>	<textarea class="jiao" name="about_entit8" id="about_entit8" rows="1" cols="100"><?php echo get_option('mytheme_about_entit8'); ?></textarea>
         <em>焦点图下方的英文标题</em>
 </li>
  <li>
		<a>文字标题</a>	<textarea class="jiao" name="about_tit8" id="about_tit8" rows="1" cols="100"><?php echo get_option('mytheme_about_tit8'); ?></textarea>
         <em>文字下方的标题</em>
 </li>
  <li>
		<a>描述文字</a>	<textarea class="jiao" name="about_text8" id="about_text8" rows="2" cols="100"><?php echo get_option('mytheme_about_text8'); ?></textarea>
         <em>描述的文字</em>
 </li>
 <li class="submit">
 
		<input type="submit" name="Submit" class="button-primary" value="保存设置" />
 
		<input type="hidden" name="mytheme_settings" value="save" style="display:none;" />
 
	</li>
 </ul>
 
 
   <ul class="jiao_div">
  <h2>焦点图4<a>+点击开关</a> </h2>
  <li>
             <p>效果预览：</p>
            <div class="jiao_img" title="<?php echo get_option('mytheme_about_entit9'); ?>">
            <?php if (get_option('mytheme_about_img9')!=""): ?>
             <div class="imgplay_wen"> 
            <h5><?php echo get_option('mytheme_about_entit9'); ?></h5>
              <a href="<?php echo get_option('mytheme_about_url9'); ?>"><h5><?php echo get_option('mytheme_about_tit9'); ?></h5></a>
              <p> <?php echo mb_strimwidth(strip_tags(get_option('mytheme_about_text9')), 0,180,"..."); ?></p>
           </div>
            <?php else : ?>  
 <?php endif; ?>
            <img  src="<?php echo get_option('mytheme_about_img9'); ?>" />
            </div>
            <br />
			<a>图片地址</a>	
            <div class="up">
           <input type="text" size="80"  name="about_img9" id="about_img9" value="<?php echo get_option('mytheme_about_img9'); ?>"/>   
            <input type="button" name="upload_button" value="上传" id="upbottom"/>   
                </div>
            
             <em>请上传图片( 尺寸：950*412 [像素] )</em>
 </li>
 <li>
		<a>链接</a>	<textarea class="jiao" name="about_url9" id="about_url9" rows="1" cols="100"><?php echo get_option('mytheme_about_url9'); ?></textarea>
         <em>填写您想要这张图片链接的网页地址</em>
 </li>
   <li>
		<a>英文标题</a>	<textarea class="jiao" name="about_entit9" id="about_entit9" rows="1" cols="100"><?php echo get_option('mytheme_about_entit9'); ?></textarea>
         <em>焦点图下方的英文标题</em>
 </li>
  <li>
		<a>文字标题</a>	<textarea class="jiao" name="about_tit9" id="about_tit9" rows="1" cols="100"><?php echo get_option('mytheme_about_tit9'); ?></textarea>
         <em>文字下方的标题</em>
 </li>
  <li>
		<a>描述文字</a>	<textarea class="jiao" name="about_text9" id="about_text9" rows="2" cols="100"><?php echo get_option('mytheme_about_text9'); ?></textarea>
         <em>描述的文字</em>
 </li>
 <li class="submit">
 
		<input type="submit" name="Submit" class="button-primary" value="保存设置" />
 
		<input type="hidden" name="mytheme_settings" value="save" style="display:none;" />
 
	</li>
 </ul>
 
    <ul class="jiao_div">
  <h2>焦点图5<a>+点击开关</a> </h2>
  <li> 
             <p>效果预览：</p>
            <div class="jiao_img" title="<?php echo get_option('mytheme_about_entit0'); ?>">
            <?php if (get_option('mytheme_about_img0')!=""): ?>
             <div class="imgplay_wen"> 
            <h5><?php echo get_option('mytheme_about_entit0'); ?></h5>
              <a href="<?php echo get_option('mytheme_about_url0'); ?>"><h5><?php echo get_option('mytheme_about_tit0'); ?></h5></a>
              <p> <?php echo mb_strimwidth(strip_tags(get_option('mytheme_about_text8')), 0,180,"..."); ?></p>
           </div>
            <?php else : ?>  
 <?php endif; ?>
            <img  src="<?php echo get_option('mytheme_about_img0'); ?>" />
            </div>
            <br />
			<a>图片地址</a>	
            <div class="up">
           <input type="text" size="80"  name="about_img0" id="about_img0" value="<?php echo get_option('mytheme_about_img0'); ?>"/>   
            <input type="button" name="upload_button" value="上传" id="upbottom"/>   
                </div>
            
             <em>请上传图片( 尺寸：950*412 [像素] )</em>
 </li>
 <li>
		<a>链接</a>	<textarea class="jiao" name="about_url0" id="about_url0" rows="1" cols="100"><?php echo get_option('mytheme_about_url0'); ?></textarea>
         <em>填写您想要这张图片链接的网页地址</em>
 </li>
  <li>
		<a>英文标题</a>	<textarea class="jiao" name="about_entit0" id="about_entit0" rows="1" cols="100"><?php echo get_option('mytheme_about_entit0'); ?></textarea>
         <em>焦点图下方的英文标题</em>
 </li>
  <li>
		<a>文字标题</a>	<textarea class="jiao" name="about_tit0" id="about_tit0" rows="1" cols="100"><?php echo get_option('mytheme_about_tit0'); ?></textarea>
         <em>文字下方的标题</em>
 </li>
  <li>
		<a>描述文字</a>	<textarea class="jiao" name="about_text0" id="about_text0" rows="2" cols="100"><?php echo get_option('mytheme_about_text0'); ?></textarea>
         <em>描述的文字</em>
 </li>
 
 <li class="submit">
 
		<input type="submit" name="Submit" class="button-primary" value="保存设置" />
 
		<input type="hidden" name="mytheme_settings" value="save" style="display:none;" />
 
	</li>
   
 </ul>
  </div>
</fieldset>

 
 
  <li class="box"> <h1>首页显示的简介</h1>
 <div class="text" style="display:none">

 
	<fieldset>

				
				


 <div style="100%"><strong>首页焦点图下的简介</strong> </div>


<legend><strong>首页焦点图下的简介，分为三块，填写您的公司简介或者优势以及其他您想要放在首页上的介绍文字</strong></legend>
 <ul class="jiao_div">
  <li>
 
		<a>简介1 标题</a>	
        <textarea class="jiao" name="about_title" id="about_title" rows="1" cols="70"><?php echo get_option('mytheme_about_title'); ?></textarea>
        <a>简介1 简介</a>	
        <textarea class="jiao" name="about_cititle" id="about_cititle" rows="3" cols="100"><?php echo get_option('mytheme_about_cititle'); ?></textarea>
        
        <a style=" color:#999">在这里输入您的简介标题和简介</a>	
 </li>
 

 </ul>
 
  <ul class="jiao_div">
  <li>
 
		<a>简介2 标题</a>	
        <textarea class="jiao" name="about_title1" id="about_title1" rows="1" cols="70"><?php echo get_option('mytheme_about_title1'); ?></textarea>
        <a>简介2 简介</a>	
        <textarea class="jiao" name="about_cititle1" id="about_cititle1" rows="3" cols="100"><?php echo get_option('mytheme_about_cititle1'); ?></textarea>
        
        <a style=" color:#999">在这里输入您的简介标题和简介</a>	
 </li>
 

 </ul>
 
  <ul class="jiao_div">
  <li>
 
		<a>简介3 标题</a>	
        <textarea class="jiao" name="about_title2" id="about_title2" rows="1" cols="70"><?php echo get_option('mytheme_about_title2'); ?></textarea>
        <a>简介3 简介</a>	
        <textarea class="jiao" name="about_cititle2" id="about_cititle2" rows="3" cols="100"><?php echo get_option('mytheme_about_cititle2'); ?></textarea>
        
        <a style=" color:#999">在这里输入您的简介标题和简介</a>	
 </li>
 

 </ul>



 
	</fieldset>
 
 
  	<p class="submit">
 
		<input type="submit" name="Submit" class="button-primary" value="保存设置" />
 
		<input type="hidden" name="mytheme_settings" value="save" style="display:none;" />
 
	</p>
 

    
 


 


</div>
</li>
 
 
 
 <li class="box"> <h1>SEO以及统计选项</h1>
 <div class="text" style="display:none">

 
	<fieldset>
 
	<legend><strong>SEO 代码添加</strong></legend>
 

 
				<textarea name="keywords" id="keywords" rows="1" cols="134"><?php echo get_option('mytheme_keywords'); ?></textarea><br />
 
				<em>网站关键词（Meta Keywords），中间用半角逗号隔开,如：主题公园，网站模板，wordpress主题</em>
 
		
				<textarea name="description" id="description" rows="3" cols="134"><?php echo get_option('mytheme_description'); ?></textarea>
 
				<em>网站描述（Meta Description），针对搜索引擎设置的网页描述，如：主题公园是专注于高端网站主题，高端网站模板的设计和制作...</em>
 
	
 
	</fieldset>
 
 
 
	<fieldset>
 
	<legend><strong>统计代码添加</strong></legend>
 
		
 
				<textarea name="analytics" id="analytics" rows="5" cols="134"><?php echo stripslashes(get_option('mytheme_analytics')); ?></textarea>
 

      	</fieldset>  
    
 


 
	<p class="submit">
 
		<input type="submit" name="Submit" class="button-primary" value="保存设置" />
 
		<input type="hidden" name="mytheme_settings" value="save" style="display:none;" />
 
	</p>

</div>
</li>
<li class="box"> <h1>关于我们的页面选项</h1>
 <div class="text" style="display:none">

	<fieldset>

				
				

 <div style="margin-top:20px;">
 
 
 <div style="100%">
 <strong>关于我们的图片</strong>
    
	
<p> 
<a>位置提示图片：</a>
<img src="<? bloginfo('template_url'); ?>/images/saddsadasdsadsa.jpg"  /></p>
 <br />			
				
   
              </div>
<ul class="jiao_div">

 <div><legend><strong>关于我们的图片，这里您可以制作一些关于我们的图片，如团队的照片，办公环境等等</strong></legend>
  <a style=" color:#F00; display:block; width:500px; float:left;">注意：请使至少上传3张图片，以保持设计美观，如果没有资料，请填写相同的内容。 </a>

 </div>

  

  <li>
   <p>预览：</p>
  <p><img src="<?php echo get_option('mytheme_about_tit1'); ?>" /></p>
		<a>关于我们的配图1</a>	
          <div class="up">
           <input type="text" size="80"  name="about_tit1" id="about_tit1" value="<?php echo get_option('mytheme_about_tit1'); ?>"/>   
            <input type="button" name="upload_button" value="上传" id="upbottom"/>   
                </div>      
        <a style=" color:#999">关于我们页面中，显示在关于我们文字旁边的图片，图片尺寸为：369*480[像素]</a>	
 </li>
 
  <li>
   <p>预览：</p>
    <p><img src="<?php echo get_option('mytheme_about_text1'); ?>" /></p>
		<a>关于我们的其他图片1</a>	
        <div class="up">
           <input type="text" size="80"  name="about_text1" id="about_text1" value="<?php echo get_option('mytheme_about_text1'); ?>"/>   
            <input type="button" name="upload_button" value="上传" id="upbottom"/>   
                </div> 
            <a style=" color:#999">关于我们页面中，全副的图片（文字左右移动的图片）图片尺寸为：950*480[像素]</a>	
 </li>
 
   <li>
    <p>预览：</p>
    <p><img src="<?php echo get_option('mytheme_about_img1'); ?>" /></p>
		<a>关于我们的其他图片2</a>	
         <div class="up">
           <input type="text" size="80"  name="about_img1" id="about_img1" value="<?php echo get_option('mytheme_about_img1'); ?>"/>   
            <input type="button" name="upload_button" value="上传" id="upbottom"/>   
                </div> 
            <a style=" color:#999">关于我们页面中，全副的图片（文字左右移动的图片）图片尺寸为：950*480[像素]</a>	
 </li>
 
    <li>
    <p>预览：</p>
    <p><img src="<?php echo get_option('mytheme_about_url1'); ?>" /></p>
		<a>关于我们的其他图片3</a>	
         <div class="up">
           <input type="text" size="80"  name="about_url1" id="about_url1" value="<?php echo get_option('mytheme_about_url1'); ?>"/>   
            <input type="button" name="upload_button" value="上传" id="upbottom"/>   
                </div> 
            <a style=" color:#999">关于我们页面中，全副的图片（文字左右移动的图片）图片尺寸为：950*480[像素]</a>	
 </li>
 </ul>
 


  </div>
	</fieldset>
 
 
  	<p class="submit">
 
		<input type="submit" name="Submit" class="button-primary" value="保存设置" />
 
		<input type="hidden" name="mytheme_settings" value="save" style="display:none;" />
 
	</p>
 

    
 


 


</div>
</li>













<li class="box"> <h1>其他选项</h1>
 <div class="text" style="display:none">

	<fieldset>

<p>  <a>位置提示图片：</a>
<img src="<? bloginfo('template_url'); ?>/images/dsadasdasdasdsa.jpg"  /></p>
 
	<legend><strong>提供下载的资料</strong></legend>
 
                <div class="up">
           <input type="text" size="80"  name="news_title" id="news_title" value="<?php echo get_option('mytheme_news_title'); ?>"/>   
            <input type="button" name="upload_button" value="上传" id="upbottom"/>   
                </div> 
				<em>下载的资料（在媒体库上载 .zip .pdf .rar等文件，获取地址填写到这里</em>
 
		
			
         
				
				

	</fieldset>
    
   
 
 
     	<fieldset>
 
	<legend><strong>新闻页面显示的图片</strong></legend>
<div style="float:left; padding-bottom:20px; border-bottom:1px solid #999; margin-bottom:10px;">
 <p>位置提示图片：</p>
<p> <img src="<? bloginfo('template_url'); ?>/images/1233333333333.jpg"  /></p><br /><br /><br />
 </div>
 
 <div style="float:left; padding-bottom:20px; border-bottom:1px solid #999; margin-bottom:10px;">       
          <p>预览：</p>   
         <p> <img src="<?php echo get_option('mytheme_lx_title'); ?>" /></p>
            <div class="up">
           <input type="text" size="80"  name="lx_title" id="lx_title" value="<?php echo get_option('mytheme_lx_title'); ?>"/>   
            <input type="button" name="upload_button" value="上传" id="upbottom"/>   
                </div> 
				<em>新闻页面显示的图片 不填写则显示默认图像</em>
                
 
		<legend><strong>案例（产品）页面显示的图片</strong></legend>
         <p>预览：</p>   
           <p> <img src="<?php echo get_option('mytheme_lx_cititle'); ?>" /></p>
            
              <div class="up">
           <input type="text" size="80"  name="lx_cititle" id="lx_cititle" value="<?php echo get_option('mytheme_lx_cititle'); ?>"/>   
            <input type="button" name="upload_button" value="上传" id="upbottom"/>   
                </div> 
			
 
			<em>案例（产品）页面显示的图片 不填写则显示默认图像</em>
         
	</div>			
				

	</fieldset>

    
 

 	<p class="submit">
 
		<input type="submit" name="Submit" class="button-primary" value="保存设置" />
 
		<input type="hidden" name="mytheme_settings" value="save" style="display:none;" />
 
	</p>
 

</form>
</div>
</li>
 </ul>

</div>

 
<?php }
echo $after_widget;
/*添加主题选项over*/
?>