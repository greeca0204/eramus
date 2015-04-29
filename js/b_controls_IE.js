
$(function(){
	/*头部不动*/
	$(window).scroll(function() {
		var topToolbar = $("#topToolbar");
		var headerH = $("#header").outerHeight();
		var scrollTop = $(document).scrollTop();
		if ($.browser.msie && ($.browser.version == "6.0") && !$.support.style) {
			if( scrollTop >= headerH ){
				topToolbar.show();
			}else if( scrollTop < headerH ){
				topToolbar.hide();
			}
		}else{
			if( scrollTop >= headerH ){
				topToolbar.stop(false,true).animate({ 'top':0 });
			}else if( scrollTop < headerH ){
				topToolbar.stop(false,true).animate({ 'top':-40 });
			}
		};
	});
	
	/*此段代码仅有IE运行*/
			$(".btn_introduce").click(function(){
				$(".btn_introduce_li").css("display","block");
				$(".btn_service_li").css("display","none");
				$(".btn_contact_li").css("display","none");
				$(".btn_jobs_li").css("display","none");
				$(".btn_h5_li").css("display","none");
				$(".btn_protfolio_li").css("display","none");
				$(".frm_con").css("display","none");
				
			});
			
			$(".btn_service").click(function(){
				$(".btn_introduce_li").css("display","none");
				$(".btn_service_li").css("display","block");
				$(".btn_contact_li").css("display","none");
				$(".btn_jobs_li").css("display","none");
				$(".btn_h5_li").css("display","none");
				$(".btn_protfolio_li").css("display","none");
				$(".frm_con").css("display","none");
			});
			
			$(".btn_contact").click(function(){
				$(".btn_introduce_li").css("display","none");
				$(".btn_service_li").css("display","none");
				$(".btn_contact_li").css("display","block");
				$(".btn_jobs_li").css("display","none");
				$(".btn_h5_li").css("display","none");
				$(".btn_protfolio_li").css("display","none");
				$(".frm_con").css("display","none");
			});
			
			$(".btn_jobs").click(function(){
				$(".btn_introduce_li").css("display","none");
				$(".btn_service_li").css("display","none");
				$(".btn_contact_li").css("display","none");
				$(".btn_jobs_li").css("display","block");
				$(".btn_h5_li").css("display","none");
				$(".btn_protfolio_li").css("display","none");
				$(".frm_con").css("display","none");
			});
			
			$(".btn_h5").click(function(){
				$(".btn_introduce_li").css("display","none");
				$(".btn_service_li").css("display","none");
				$(".btn_contact_li").css("display","none");
				$(".btn_jobs_li").css("display","none");
				$(".btn_h5_li").css("display","block");
				$(".btn_protfolio_li").css("display","none");
				$(".frm_con").css("display","none");
			});
			
			$(".btn_protfolio").click(function(){
				$(".btn_introduce_li").css("display","none");
				$(".btn_service_li").css("display","none");
				$(".btn_contact_li").css("display","none");
				$(".btn_jobs_li").css("display","none");
				$(".btn_h5_li").css("display","none");
				$(".btn_protfolio_li").css("display","block");
				$(".frm_con").css("display","none");
			});
	/*此段代码仅有IE运行*/
	
	$(".businessnav").mouseover(function(){
  		$(".subnav").css("display","block");
	});
  	
	$(".businessnav").mouseout(function(){
  		$(".subnav").css("display","none");
  	});
	
	$(".subnav").mouseover(function(){
  		$(".subnav").css("display","block");
	});
	
	$(".subnav").mouseout(function(){
  		$(".subnav").css("display","none");
  	});
	
	$(".flexslider").flexslider({});
	
	
	
	var $window = $(window),window_width = $window.width();
	$('#js_banner, #js_banner_img li').width(window_width);
	new $.Tab({
		target: $('#js_banner_img li'),
		effect: 'slide3d',
		animateTime: 1000,
		stay: 3500,
		autoPlay: true,
		merge: true,
		prevBtn: $('#js_banner_pre'),
		nextBtn: $('#js_banner_next')
	});
});

/*business*/
    function fun(id)
    {
        switch(id)
        {
            case 1:
                 $("#ad1").css("display","block");
                 $("#ad2").css("display","none");
                 $("#ad3").css("display","none");
                 $("#ad4").css("display","none");
                break;
            
            case 2:
                $("#ad1").css("display","none");
                $("#ad2").css("display","block");
                $("#ad3").css("display","none");
                $("#ad4").css("display","none");
                break;
            
            case 3:
                $("#ad1").css("display","none");
                $("#ad2").css("display","none");
                $("#ad3").css("display","block");
                $("#ad4").css("display","none");
                break;
            
            case 4:
                $("#ad1").css("display","none");
                $("#ad2").css("display","none");
                $("#ad3").css("display","none");
                $("#ad4").css("display","block");
                break;
            
            default:
                $("#ad1").css("display","block");
                $("#ad2").css("display","none");
                $("#ad3").css("display","none");
                $("#ad4").css("display","none");
                break;
        }
    }
