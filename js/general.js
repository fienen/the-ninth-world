// Automatically adds GA tracking to all footer links (initialized by GA code)
function initAutoGA() {
	// Tracking footer links with analytics
	jQuery("footer .blogroll a").each(function() {
		var href = jQuery(this).attr("href");
		var text = jQuery(this).text();
		jQuery(this).click(function(event) { 
			event.preventDefault(); 
			ga('send', 'event', 'Footer Links', 'click', text);
			setTimeout(function() { 
				window.open(href,'_self'); 
			},300);
		});
	});
}

jQuery(document).ready(function(){
	// Formatting help for definition lists 
	jQuery('.detail-list dt').each(function() { 
		jQuery(this).next('dd').css('min-height',jQuery(this).height()); 
	});
});