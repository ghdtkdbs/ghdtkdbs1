// JavaScript Document

// Skip to content
$(".skip>a").click(function(){
	$("#content").focus();
	});

// 반응형 네비게이션
jQuery(function($) {
    var open = false;

    function resizeMenu() {
        if ($(this).width() < 639) {
            if (!open) {
                $(".gnb").hide();
            }
            $(".toggle_btn").show();
        }
        else if ($(this).width() >= 640) {
            if (!open) {
                $(".gnb").show();
            }
            $(".toggle_btn").hide();
        }
    }

    function setupMenuButton() {
        $(".toggle_btn").click(function(e) {
            e.preventDefault();

            if (open) {
                $(".gnb").fadeOut(0);
                $(".toggle_btn").toggleClass("selected");
            }
            else {
                $(".gnb").fadeIn(300);
                $(".toggle_btn").toggleClass("selected");
            }
            open = !open;
        });
    }

    $(window).resize(resizeMenu);

    resizeMenu();
    setupMenuButton();
});

//상단이동
jQuery(document).ready(function($){
	$(".gotoTop").hide();
	
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('.gotoTop').fadeIn();
			} else {
				$('.gotoTop').fadeOut();
			}
		});

		$('.gotoTop').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});
}); 