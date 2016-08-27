<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Acid
 * @since Acid 1.0
 */
?>

	</div><!-- #main .site-main-->
	</div> <!-- .container -->
	</div><!-- #page -->
	
	<?php if( Pure::is_enabled("footer", true) ): ?>
	<footer id="footer" class="site-footer" role="contentinfo">
		<div id="footer-arrow"><span>+</span></div>
		<div id="footer-content" class="site-info">
		<div class="grid-wrapper">
			
			<?php dynamic_sidebar( "footer-1" ); ?>

		</div>
		
		<?php if ( Pure::is_enabled("puremellow_credits", true ) ): ?>
			<span class="copyright">
			<?php printf( __( '%1$s by %2$s.', 'acid' ), 'Acid Theme', '<a href="http://themevillage.net/" rel="designer">Theme Village</a>' ); ?>
			</span>
		<?php endif; ?>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	<?php endif; ?>

	<div id="overlay">
		<div id="ajax-popup">
		<div id="popup-arrow"></div>
			<div id="ajax-popup-content">
				<div class="entry-content"></div>
			</div>
		</div>
	</div>

<?php wp_footer(); ?>
</body>
</html>
