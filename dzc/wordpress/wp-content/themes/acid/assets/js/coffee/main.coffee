
$(document).ready ($) ->
	# /* -----------------------------------*/
	# /*   Select (responsive) Navigation
	# /* -----------------------------------*/
	selectnav 'menu-main-menu',
		label: 'Menu',
		nested: true,
		indent: '-'
		activeclass: 'current-menu-item'
	$(".selectnav").wrapAll('<div class="selectnav-wrap">')


	# /* -----------------------------------*/
	# /* 		Footer Toggle
	# /* -----------------------------------*/	
	if Acid_Options.is_enabled("footer_toggle", true)
		$footer_content = $("#footer-content")
		$footer_arrow = $("#footer-arrow")
		$footer_arrow_span = $footer_arrow.find("span")

		$footer_arrow.click ->
			if $footer_arrow_span.text() is "+"
				$footer_arrow_span.text("–")
			else
				$footer_arrow_span.text("+")
			
			$footer_content.slideToggle
				duration: 400
				easing: "easeOutQuad"



	# /* -----------------------------------*/
	# /*         FitVids 
	# /* -----------------------------------*/
	$("#content").fitVids()

	# A Special class for logged in users
	# Should actually do this through wordpress classes, but hey...
	if $("#wpadminbar").length > 0
		$(".sf-container").addClass("offset")

	###
		Move the Logo to the center of the UL
	###
	menu_item_length =  $(".sf-menu > .menu-item").length
	if menu_item_length > 0
		singleSide = Math.ceil( menu_item_length / 2 )
		$("#logo")
			.hide().clone()
			.attr("id", "js-logo")
			.show()
			.insertAfter(".sf-menu > .menu-item:nth-child(#{singleSide})")
			.wrap('<li id="logo-container" class="menu-item"/>')
	else
		$("#logo").addClass("center-block")



	# /* -----------------------------------*/
	# /*         Superfish
	# /* -----------------------------------*/

	# Superfish itself
	$('.sf-menu').superfish
		# the class applied to hovered list items
		hoverClass:    'sfHover',          
		
		# the class you have applied to list items that lead to the current page
		# pathClass:     'current-menu-ancestor', 
		
		# the number of levels of submenus that remain open or are restored using pathClass
		pathLevels:    1              
		
		# the delay in milliseconds that the mouse can remain outside a submenu without it closing
		delay:         500               
		
		# an object equivalent to first parameter of jQuery’s .animate() method
		animation:     
			height:'toggle' 
		
		# speed of the animation. Equivalent to second parameter of jQuery’s .animate() method
		speed:         175          
		
		# if true, arrow mark-up generated automatically = cleaner source code at expense of initialisation performance
		autoArrows:    true

		#set to true to disable hoverIntent detection              
		disableHI:     false

		onShow: ->
			$(this).css "overflow", "visible"
			return

	$('.colorbox').colorbox 
		rel: "portfolio"
		maxHeight: "100%"
		maxWidth: "100%"



	control = $(".purejs__slider--control")
	slider = $(".purejs__slider")


	# Portfolio Slider
	if slider.length?
		if slider.find("li").length > 1
			# slider.find('ul').clone().appendTo(control)
			if control.length?
				control.flexslider
						animation: "slide"
						controlNav: true
						animationLoop: false
						slideshow: false
						itemWidth: 125
						itemMargin: 5
						asNavFor: slider     
						smoothHeight: false


			slider.flexslider
						animation: "swing"
						controlNav: false
						animationLoop: false
						slideshow: false
						sync: control
						smoothHeight: true
						video: true,
						itemWidth: "100%", 

		$(".purejs__slider .popup-image").colorbox
			top: 10
			rel: "portfolio"
			maxWidth: "100%"
			maxHeight: "100%"
			
	return





