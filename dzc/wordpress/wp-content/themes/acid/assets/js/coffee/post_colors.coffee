jQuery ($) ->

	get_direction = (selector) ->
		if selector is "prev-post"
			return "right"
		else
			return "left"

	# Fixes a little textWidth() bug when there is no text
	get_width = (selector) ->
		if $(selector).textWidth() isnt $(window).width()
		then $(selector).textWidth()
		else 0


	gutter_width = 0

	setup_gutter_width = ->
		# Calculate Content Position and Gutter Width
		contentPosition = $("#main").offset()
		gutter_width = contentPosition.left #+ ( $("#main").width() - $("#content").width() )
		gutter_width

	setup_meta_position = ->
		$("#prev-post .meta").css
			"right": gutter_width
			"position": "absolute"
		
		$("#next-post .meta").css
			"left": gutter_width
			"position": "absolute"


	$(window).on "throttledresize", ->
		setup_gutter_width()
		setup_meta_position()
		$(".js--post-link").css
			width: gutter_width

	$(document).ready ->
		setup_gutter_width() # Setup Gutter Width
		setup_meta_position() # Setup Meta Position
		hoverEnabled = false # Disable Hover until the opening Animation is complete

		longestWidth =
			if get_width("#prev-post") > get_width("#next-post")
			then get_width("#prev-post")
			else get_width("#next-post")
		longestWidth = longestWidth + 90
		


		setTimeout(->
			$("#next-post").stop().animate
				width: gutter_width
			, 
				duration: 800
				queue: false
				easing: "easeInOutQuint"
				always: -> 
					$(this).css overflow: "visible"
					hoverEnabled = true
					return

			$("#prev-post").stop().animate
				width: gutter_width
			, 
				duration: 800
				queue: false
				easing: "easeInOutQuint"
				always: -> 
					$(this).css overflow: "visible"
					hoverEnabled = true
					return
		, 250)


		$(".js--post-link").hoverIntent
			over: -> 
				if hoverEnabled is true
					$(this).css
						backgroundColor: $(this).data("color")
				
					$(this).find(".meta").animate width: longestWidth,
						duration: 400
						easing: "easeOutBack"

			out: ->
				if hoverEnabled is true
					$(this).css
						backgroundColor: $("#content").data("color")
					$(this).find(".meta").animate width: 0,
						duration: 175
						easing: "easeInExpo"
			timeout: 100
			interval: 150


		$(".js--post-link").click ->
			goTo = $(this).find(".adjacent-title a").attr("href")
			if goTo?
				window.location = goTo
				return







