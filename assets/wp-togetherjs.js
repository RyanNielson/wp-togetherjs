(function($) {
	TogetherJSConfig_on = {
	  	ready: function () {
		  	$("#start-togetherjs").text("End TogetherJS").removeClass("togetherjs-close").addClass("togetherjs-ready");
		  	$("#wp-admin-bar-start_together_js_button").removeClass("togetherjs-close").addClass("togetherjs-ready");
		},
	  	close: function () {
		  	$("#start-togetherjs").text("Start TogetherJS").removeClass("togetherjs-ready").addClass("togetherjs-close");
		  	$("#wp-admin-bar-start_together_js_button").removeClass("togetherjs-close").addClass("togetherjs-ready");
		}
	};
})(jQuery);