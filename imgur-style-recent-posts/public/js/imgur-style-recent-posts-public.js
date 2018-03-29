(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

})( jQuery );

jQuery(document).ready(function ($) { 

	var jsonurl = $(".imgurRecentPostsWidgetWrapper").data("jsonurl");
	console.log(jsonurl);

	$.getJSON(jsonurl,function(data) {
		console.log(data);
		$.each (data, function (index, itemData) {
			//console.log (itemData);
			//console.log(itemData.featured_image_urls.thumbnail)
			$(".imgurRecentPostsWidgetFixed").append('<div class="isrpItem"><a href="' + itemData.link + '"><img class="isrpImg" src="' + itemData.featured_image_urls.thumbnail + '" alt="' + itemData.title.rendered + '" height="90" width="90"></a><a href="' + itemData.link + '"><div class="isrpItemTitle">' + itemData.title.rendered + '</div>/<a></div>');
		});			

	});

	$('.menu-grid').click( function() {
		$(".imgurRecentPostsWidgetFixed").addClass(".grid-container").css('display', 'grid');
	} );

	$('.menu-list').click( function() {
		$(".imgurRecentPostsWidgetFixed").removeClass(".grid-container").css('display', 'block');
	} );
})
