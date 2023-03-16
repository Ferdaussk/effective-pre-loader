/*preloader*/(function ($) {
	'use strict';
	$( document ).ready(function() {
		var widthVal, heightVal, transform, direction='';
		if( $( ".eprel-4-preload-topleft" ).length || $( ".eprel-4-preload-topright" ).length  || $( ".eprel-4-preload-bottomleft" ).length  || $( ".eprel-4-preload-bottomright" ).length  ) {	
			var winsize = {width: window.innerWidth, height: window.innerHeight};
			var crosswh = Math.sqrt(Math.pow(winsize.width, 2) + Math.pow(winsize.height, 2));
			widthVal = heightVal = crosswh + 'px';
			
			if( $( ".eprel-4-preload-topleft" ).length ) {
				transform = 'translate3d(-50%,-50%,0) rotate3d(0,0,1,135deg) translate3d(0,' + crosswh + 'px,0)';
			}
			else if( $( ".eprel-4-preload-topright" ).length ) {
				transform = 'translate3d(-50%,-50%,0) rotate3d(0,0,1,-135deg) translate3d(0,' + crosswh + 'px,0)';
			}
			else if( $( ".eprel-4-preload-bottomleft" ).length ) {
				transform = 'translate3d(-50%,-50%,0) rotate3d(0,0,1,45deg) translate3d(0,' + crosswh + 'px,0)';
			}
			else if(  $( ".eprel-4-preload-bottomright" ).length  ) {
				transform = 'translate3d(-50%,-50%,0) rotate3d(0,0,1,-45deg) translate3d(0,' + crosswh + 'px,0)';
			}
		}else if( $( ".eprel-4-preload-left" ).length || $( ".eprel-4-preload-right" ).length ) {
			widthVal = '100vh'
			heightVal = '100vw';
			direction='right';
			if($( ".eprel-4-preload-left" ).length){
				direction='left';
			}
			transform = 'translate3d(-50%,-50%,0) rotate3d(0,0,1,' + (direction === 'left' ? 90 : -90) + 'deg) translate3d(0,100%,0)';
		}else if( $( ".eprel-4-preload-top" ).length || $( ".eprel-4-preload-bottom" ).length ) {
			widthVal = '100vw';
			heightVal = '100vh';
			direction='bottom';
			if($( ".eprel-4-preload-top" ).length){
				direction='top';
			}
			transform = direction === 'top' ? 'rotate3d(0,0,1,180deg)' : 'none';
		}
		if( $( ".eprel-4-preload-topleft" ).length || $( ".eprel-4-preload-topright" ).length  || $( ".eprel-4-preload-bottomleft" ).length  || $( ".eprel-4-preload-bottomright" ).length  || $( ".eprel-4-preload-left" ).length || $( ".eprel-4-preload-right" ).length || $( ".eprel-4-preload-top" ).length || $( ".eprel-4-preload-bottom" ).length ) {
			$( ".eprel-loader-wrapper .eprel-preload-reveal-layer-box" ).css("width",widthVal).css("height",heightVal).css("transform",transform).css("-webkit-transform",transform).css("opacity",1);
		}
});
})(jQuery);
