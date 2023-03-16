/*preloader*/(function ($) {
	'use strict';	
	var WidgetPreLoader = function($scope, $) {
		var container = $scope.find('.eprel-loader-wrapper'),
		data = container.data('plec'),
		post_load_opt = container.data('post_load_opt'),
		post_load_exclude_class = data['post_load_exclude_class'];
		
		if($( "#eprel-img-loader" ).length){
			var heightimg = $("#eprel-img-loader .eprel-preloader-logo-img").height(),
			widthimg = $("#eprel-img-loader .eprel-preloader-logo-img").width();
			$(".eprel-img-loader-wrap .eprel-img-loader-wrap-in").css("width",widthimg).css("height",heightimg);			
		}		
		
		$(document).ready(function(){
			
			if(post_load_opt==='disablepostload'){
				$("body").removeClass("effective-pre-loader-preloader");
			}			
			setTimeout(function(){
				
			}, 20);
			if($('body').hasClass('effective-pre-loader-preloader')){
				if(post_load_exclude_class != undefined && post_load_exclude_class !=''){
					$(document).on("click", post_load_exclude_class, function(e) {
						if ((e.shiftKey || e.ctrlKey || e.metaKey || '_blank' == $.trim($(this).attr('target')))) {
							return;
						}					
						$('body').removeClass('eprel-loaded').addClass('eprel-out-loaded');
						
						if($('body.eprel-out-loaded').find(".eprel-loader-wrapper").hasClass("eprel-preload-transion4")){
							$("body").find(".eprel-loader-wrapper.eprel-preload-transion4 .eprel-preload-reveal-layer-box").css("transform","");
							var transform, direction='';
							if( $( ".eprel-out-loaded .eprel-4-postload-topleft" ).length || $( ".eprel-out-loaded .eprel-4-postload-topright" ).length  || $( ".eprel-out-loaded .eprel-4-postload-bottomleft" ).length  || $( ".eprel-out-loaded .eprel-4-postload-bottomright" ).length  ) {	
								var winsize = {width: window.innerWidth, height: window.innerHeight};
								var crosswh = Math.sqrt(Math.pow(winsize.width, 2) + Math.pow(winsize.height, 2));
								
								if( $( ".eprel-out-loaded .eprel-4-postload-topleft" ).length ) {
									transform = 'translate3d(-50%,-50%,0) rotate3d(0,0,1,135deg) translate3d(0,' + crosswh + 'px,0)';
								}
								else if( $( ".eprel-out-loaded .eprel-4-postload-topright" ).length ) {
									transform = 'translate3d(-50%,-50%,0) rotate3d(0,0,1,-135deg) translate3d(0,' + crosswh + 'px,0)';
								}
								else if( $( ".eprel-out-loaded .eprel-4-postload-bottomleft" ).length ) {
									transform = 'translate3d(-50%,-50%,0) rotate3d(0,0,1,45deg) translate3d(0,' + crosswh + 'px,0)';
								}
								else if(  $( ".eprel-out-loaded .eprel-4-postload-bottomright" ).length  ) {
									transform = 'translate3d(-50%,-50%,0) rotate3d(0,0,1,-45deg) translate3d(0,' + crosswh + 'px,0)';
								}
							}else if( $( ".eprel-out-loaded .eprel-4-postload-left" ).length || $( ".eprel-4-postload-right" ).length ) {
								direction='right';
								if($( ".eprel-out-loaded .eprel-4-postload-left" ).length){
									direction='left';
								}
								transform = 'translate3d(-50%,-50%,0) rotate3d(0,0,1,' + (direction === 'left' ? 90 : -90) + 'deg) translate3d(0,100%,0)';
							}else if( $( ".eprel-out-loaded .eprel-4-postload-top" ).length || $( ".eprel-out-loaded .eprel-4-postload-bottom" ).length ) {
								direction='bottom';
								if($( ".eprel-out-loaded .eprel-4-postload-top" ).length){
									direction='top';
								}
								transform = direction === 'top' ? 'rotate3d(0,0,1,180deg)' : 'none';
							}
							if( $( ".eprel-out-loaded .eprel-4-postload-topleft" ).length || $( ".eprel-out-loaded .eprel-4-postload-topright" ).length  || $( ".eprel-out-loaded .eprel-4-postload-bottomleft" ).length  || $( ".eprel-out-loaded .eprel-4-postload-bottomright" ).length  || $( ".eprel-out-loaded .eprel-4-postload-left" ).length || $( ".eprel-out-loaded .eprel-4-postload-right" ).length || $( ".eprel-out-loaded .eprel-4-postload-top" ).length || $( ".eprel-out-loaded .eprel-4-postload-bottom" ).length ) {
								$( ".eprel-out-loaded .eprel-loader-wrapper .eprel-preload-reveal-layer-box" ).css("transform",transform).css("-webkit-transform",transform);
							}
						}
						
						/*setTimeout(function(){
							$('body').removeClass('eprel-out-loaded').addClass('eprel-loaded');
						}, 4000);*/
					});
				}else{
					$(document).on("click", 'a:not(.ajax_add_to_cart,.button-toggle-link,.noajax,.post-load-more,.slick-slide, .woocommerce a, .btn, .button,[data-slick-index],[data-month], .popup-gallery, .popup-video, [href$=".png"], [href$=".jpg"], [href$=".jpeg"], [href$=".svg"], [href$=".mp4"], [href$=".webm"], [href$=".ogg"], [href$=".mp3"], [href^="#"],[href*="#"], [href^="mailto:"],[data-lity=""], [href=""], [href*="wp-login"], [href*="wp-admin"], .dot-nav-noajax, .pix-dropdown-arrow,[data-toggle="dropdown"],[role="tab"]),button:not(.lity-close,[type="button"],.single_add_to_cart_button,.pswp__button.pswp__button--close,.pswp__button--fs,.pswp__button--zoom,.pswp__button--arrow--left,.pswp__button--arrow--right)', function(e) {
						if ((e.shiftKey || e.ctrlKey || e.metaKey || '_blank' == $.trim($(this).attr('target')))) {
							return;
						}					
						$('body').removeClass('eprel-loaded').addClass('eprel-out-loaded');
						if($('body.eprel-out-loaded').find(".eprel-loader-wrapper").hasClass("eprel-preload-transion4")){
							$("body").find(".eprel-loader-wrapper.eprel-preload-transion4 .eprel-preload-reveal-layer-box").css("transform","");
							var transform, direction='';
							if( $( ".eprel-out-loaded .eprel-4-postload-topleft" ).length || $( ".eprel-out-loaded .eprel-4-postload-topright" ).length  || $( ".eprel-out-loaded .eprel-4-postload-bottomleft" ).length  || $( ".eprel-out-loaded .eprel-4-postload-bottomright" ).length  ) {	
								var winsize = {width: window.innerWidth, height: window.innerHeight};
								var crosswh = Math.sqrt(Math.pow(winsize.width, 2) + Math.pow(winsize.height, 2));
								
								if( $( ".eprel-out-loaded .eprel-4-postload-topleft" ).length ) {
									transform = 'translate3d(-50%,-50%,0) rotate3d(0,0,1,135deg) translate3d(0,' + crosswh + 'px,0)';
								}
								else if( $( ".eprel-out-loaded .eprel-4-postload-topright" ).length ) {
									transform = 'translate3d(-50%,-50%,0) rotate3d(0,0,1,-135deg) translate3d(0,' + crosswh + 'px,0)';
								}
								else if( $( ".eprel-out-loaded .eprel-4-postload-bottomleft" ).length ) {
									transform = 'translate3d(-50%,-50%,0) rotate3d(0,0,1,45deg) translate3d(0,' + crosswh + 'px,0)';
								}
								else if(  $( ".eprel-out-loaded .eprel-4-postload-bottomright" ).length  ) {
									transform = 'translate3d(-50%,-50%,0) rotate3d(0,0,1,-45deg) translate3d(0,' + crosswh + 'px,0)';
								}
							}else if( $( ".eprel-out-loaded .eprel-4-postload-left" ).length || $( ".eprel-4-postload-right" ).length ) {
								direction='right';
								if($( ".eprel-out-loaded .eprel-4-postload-left" ).length){
									direction='left';
								}
								transform = 'translate3d(-50%,-50%,0) rotate3d(0,0,1,' + (direction === 'left' ? 90 : -90) + 'deg) translate3d(0,100%,0)';
							}else if( $( ".eprel-out-loaded .eprel-4-postload-top" ).length || $( ".eprel-out-loaded .eprel-4-postload-bottom" ).length ) {
								direction='bottom';
								if($( ".eprel-out-loaded .eprel-4-postload-top" ).length){
									direction='top';
								}
								transform = direction === 'top' ? 'rotate3d(0,0,1,180deg)' : 'none';
							}
							if( $( ".eprel-out-loaded .eprel-4-postload-topleft" ).length || $( ".eprel-out-loaded .eprel-4-postload-topright" ).length  || $( ".eprel-out-loaded .eprel-4-postload-bottomleft" ).length  || $( ".eprel-out-loaded .eprel-4-postload-bottomright" ).length  || $( ".eprel-out-loaded .eprel-4-postload-left" ).length || $( ".eprel-out-loaded .eprel-4-postload-right" ).length || $( ".eprel-out-loaded .eprel-4-postload-top" ).length || $( ".eprel-out-loaded .eprel-4-postload-bottom" ).length ) {
								$( ".eprel-out-loaded .eprel-loader-wrapper .eprel-preload-reveal-layer-box" ).css("transform",transform).css("-webkit-transform",transform);
							}
						}
						/*setTimeout(function(){							
							$('body').removeClass('eprel-out-loaded').addClass('eprel-loaded');
						}, 4000);*/
					});
				}
			}
		});		
	};
	$(window).on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction('frontend/element_ready/eprel-pre-loader.default', WidgetPreLoader);
	});

})(jQuery);


jQuery( window ).load(function() {
	var width = 100,
    performancedata = window.performance.timing,
    estimatedloadtime = -(performancedata.loadEventEnd - performancedata.navigationStart),
    time = parseInt((estimatedloadtime/1000)%60)*100;
	
	var containerload = jQuery('.eprel-loader-wrapper');
	if(typeof elementorFrontend !== 'undefined' && !elementorFrontend.isEditMode() && containerload.length){
		var data = containerload.data('plec'),		
		loadtime = data['loadtime'],
		loadmaxtime = data['loadmaxtime'],
		loadmintime = data['loadmintime'],		
		csttimemax1000 = loadmaxtime*1000,
		csttimemin1000 = loadmintime*1000;
						
		if(csttimemax1000 != undefined && csttimemax1000 < time && loadtime!=undefined && loadtime=='loadtimemax'){
			time = csttimemax1000;
		}
		
		if(csttimemin1000 != undefined && csttimemin1000 > time && loadtime!=undefined && loadtime=='loadtimemin'){
			time = csttimemin1000;
		}
	}	
	//console.log(time);
	if(width > 1){
		jQuery(".eprel-percentage").addClass("eprel-percentage-load");
	}
	var eprel_preloader = 'eprel-preloader-wrap',
		eprel_loadbar = 'eprel-loadbar',
		eprel_percentagelayout = 'percentagelayout',
		eprel_plcper = 'plcper',
		eprel_logo_width = 'eprel-loader-wrapper .eprel-img-loader-wrap',
		eprel_text_loader = 'eprel-loader-wrapper .eprel-text-loader .eprel-text-loader-inner',
		eprel_pre_5 ='eprel-pre-5-in';
		
	if( jQuery("."+eprel_loadbar).length || jQuery("."+eprel_percentagelayout).length || jQuery("."+eprel_preloader+"4-in").length || jQuery("."+eprel_preloader+"5."+eprel_plcper+"5 ."+eprel_pre_5+"3").length || jQuery("."+eprel_preloader+"5."+eprel_plcper+"5 ."+eprel_pre_5+"4").length ||  jQuery("."+eprel_logo_width).length ||  jQuery("."+eprel_text_loader).length){
		jQuery("."+eprel_loadbar+",."+eprel_percentagelayout+",."+eprel_preloader+"4-in,."+eprel_preloader+"5."+eprel_plcper+"5 ."+eprel_pre_5+"3, ."+eprel_preloader+"5."+eprel_plcper+"5 ."+eprel_pre_5+"4,."+eprel_logo_width+",."+eprel_text_loader).animate({
		  width: width + "%"
		}, time);
	}
	
	if( jQuery("."+eprel_preloader+"5."+eprel_plcper+"5 ."+eprel_pre_5+"1").length || jQuery("."+eprel_preloader+"5."+eprel_plcper+"5 ."+eprel_pre_5+"2").length){
		jQuery("."+eprel_preloader+"5."+eprel_plcper+"5 ."+eprel_pre_5+"1, ."+eprel_preloader+"5."+eprel_plcper+"5 ."+eprel_pre_5+"2").animate({
			height : width + "%"
		}, time);
	}

var percwrap = jQuery("#eprel-precent,#eprel-precent3,#eprel-precent4"),
	start = 0,
	end = 100,
	durataion = time;
	if(percwrap){
		animationoueprelut(percwrap, start, end, durataion);
	}		
		
function animationoueprelut(id, start, end, duration) {
  
	var range = end - start,
		current = start,
		increment = end > start? 1 : -1,
		stepfortime = Math.abs(Math.floor(duration / range)),
		obj = jQuery(id);
    
	var timer = setInterval(function() {
		current += increment;
		jQuery(obj).text(current + "%");
		setProgress(current);
		if (current == end) {
			clearInterval(timer);
		}
	}, stepfortime);
}


var circle = document.querySelector('.progress-ring1');
if(circle){
	var radius = circle.r.baseVal.value;
	var circumference = radius * 2 * Math.PI;

	circle.style.strokeDasharray = `${circumference} ${circumference}`;
	circle.style.strokeDashoffset = `${circumference}`;
}
function setProgress(percent) {
	if(circle){
		const offset = circumference - percent / 100 * circumference;
		circle.style.strokeDashoffset = offset;
	}
}


setTimeout(function(){
  jQuery('body').addClass('eprel-loaded');
	if(jQuery('body').find(".eprel-loader-wrapper").hasClass("eprel-preload-transion4")){
		setTimeout(function(){
			jQuery("body").find(".eprel-loader-wrapper.eprel-preload-transion4").addClass("eprelprein");
			jQuery("body").find(".eprel-loader-wrapper.eprel-preload-transion4").addClass("eprelpreinout");
			setTimeout(function(){
				jQuery("body").find(".eprel-loader-wrapper.eprel-preload-transion4").removeClass("eprelprein");
				jQuery("body").find(".eprel-loader-wrapper.eprel-preload-transion4").addClass("eprelpreout");
			}, 1500);						
		}, 20);
	}
  jQuery('.eprel-preloader-wrap,.percentagelayout,.eprel-preloader-wrap4.plcper4,.eprel-preloader-wrap6').fadeOut(300);
}, time+1000);

});