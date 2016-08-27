$ = jQuery

class _Abstract_Toggler  
	constructor: ( options ) -> 	
		# Merge Defaults with Provided Options
		@selectors = options

		# Some Private class Variables
		@_URL = false
		@_loaded_URL = false
		
		# Select the core selectors only once, store them in class variable @iface
		@iface = 
			window: $(window)
			body: $("html,body")
			preview: @selectors.preview # Cache the Container

 	# Pull content in with AJAX
	load: (URL) => 
		load = $.get(URL)
		
		load.done (data) =>
			$data = $(data)
			content = $data.find @selectors.content

			@cache_data content
			@on_load_complete(content)

		return load

	# Yeah...
	on_load_complete: (data) ->
		@cache_url(@_URL)
		@open(data)
		return

	# Core Functiontality
	open: ->
		@is_open = true
		@iface.preview.container.show()
	
	close: ->
		@is_open = false
		@iface.preview.container.hide()
	
	toggle: (URL) =>
		@_URL = URL

		if @is_open isnt true or @is_new_url(@_URL)
		then @reopen(URL)
		else @close()
	
	reopen: (URL) ->
		@close() if @is_open is true
		if @is_new_url(@_URL)
		then @load(URL)
		else do @open


	is_new_url: (URL) ->
		if URL isnt @_loaded_URL then true else false
	
	cache_url: (URL) ->
		@_loaded_URL = URL
		@_URL = false
		return

	cache_data: (data) ->
		@_cached = data.clone().hide()
		return
	
	get_cached_data: ->
		@_cached.clone().show()


class Toggler extends _Abstract_Toggler

	open: (data) ->
		$data = $(data)
		@iface.preview.content.html data
		
		@iface.preview.container.css top: ""

		# Get Height
		@iface.preview.overlay.css
			visibility: "none"
			display: "block"

		height = @iface.preview.content.outerHeight()
		
		@iface.preview.overlay
			.css
				visibility: ""
				display: ""
			.fadeIn()

		@iface.preview.content.css height: height
		@iface.preview.content.hide()
		
		@iface.preview.content.slideDown
			easing: "easeOutBack"
			complete: => 
				@is_open = true
				return

	close: ->
		@iface.preview.container.animate top: 0,
			easing: "easeInSine"
			duration: 400
			queue: false

		@iface.preview.content.slideUp
			easing: "easeOutQuint"
			complete: => 
				@iface.preview.overlay.fadeOut()
				@is_open = false
				return



# /* -----------------------------------*/
# /* 		Document Manipulation
# /* -----------------------------------*/
$(window).load ->
	toggler_settings = 
		preview:
			overlay: $("#overlay")
			content: $("#ajax-popup-content")
			container: $("#ajax-popup")
		content: '#content .entry-content'
	
	toggler = new Toggler( toggler_settings )

	# Setup Variables
	$ajax_links = $(".sf-menu .with-ajax > a, .acid-ajax-link > a, a.acid-ajax-link")
	$arrow = $("#popup-arrow")

	# Listen for a click
	$ajax_links.click (e) ->
		# Don't go anywhere
		e.preventDefault()

		# Get the click target, 
		$target = $(e.srcElement || e.target)

		# Position the arrow
		$arrow.css
			left: $target.offset().left

		# Get the URL
		URL = $target.attr("href")
		
		# Open 
		toggler.toggle URL
	

	# A click on the overlay means close
	$("#overlay").click (e) ->
		$target = $(e.srcElement || e.target)
		if $target.attr('id') is 'overlay'
			toggler.close()
	
	$(document).on "keyup", (e) ->
		if e.keyCode is 27 # The ESC key
			toggler.close() if toggler.is_open

