(function($) {
	var togetherJSButtonClicked = function() {
		TogetherJS(this);
		return false;
	};

	$(function () {
		var $togetherJSStartButton = $("#wp-admin-bar-start_together_js_button > a");
		$togetherJSStartButton.attr("id", "start_together_js_button");
  		$togetherJSStartButton.click(togetherJSButtonClicked);
	});

	TogetherJSConfig_on = {
	  	ready: function () {
		  	$("#wp-admin-bar-start_together_js_button > a").text("End TogetherJS");
		},
	  	close: function () {
		  	$("#wp-admin-bar-start_together_js_button > a").text("Start TogetherJS");
		}
	};

})(jQuery);