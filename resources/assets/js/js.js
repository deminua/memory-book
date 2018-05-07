$(function() {
  
$('.carousel').carousel({
  interval: 4000
});



		$(window).scroll(function() {
			if($(this).scrollTop() != 0) {
				$("#toTop").addClass("show");	
			} else {
				$("#toTop").removeClass("show");
			}
		});
		
		$("#toTop").click(function() {
			$("body,html").animate({scrollTop:0},800);
		});


			var	headerTopHeight = $("#header-top").outerHeight(),
			headerHeight = $("#header").outerHeight();
			
			$(window).scroll(function() {
			if(($(this).scrollTop() > headerTopHeight+headerHeight) && ($(window).width() > 767)) {
				$("body").addClass("onscroll");
				if (($("#site-name").length > 0) && ($("#logo").length > 0)) {
					$(".onscroll #logo").addClass("hide");
				}

				if ($("#banner").length > 0) { 
 					$("#banner").css("marginTop", (headerHeight)+"px");
				} else if ($("#page-intro").length > 0) {
					$("#page-intro").css("marginTop", (headerHeight)+"px");
				} else {
					$("#page").css("marginTop", (headerHeight)+"px");
				}
			} else {
				$("body").removeClass("onscroll");
				$("#logo").removeClass("hide");
				$("#page,#banner,#page-intro").css("marginTop", (0)+"px");
			}
			});


			$("#header-top nav").meanmenu({
				meanScreenWidth: "767",
				meanRemoveAttrs: true,
				meanMenuContainer: "#header-top-inside",
				meanMenuClose: ""
			});

			$("#mm nav").meanmenu({
				meanScreenWidth: "767",
				meanRemoveAttrs: true,
				meanMenuContainer: "#mminside",
				meanMenuClose: ""
			});

/*
			$("#header-top .content>ul.menu").wrap("<div class='header-top-meanmenu-wrapper'></div>");
			$("#header-top .content .header-top-meanmenu-wrapper").meanmenu({
				meanScreenWidth: "767",
				meanRemoveAttrs: true,
				meanMenuContainer: "#header-top-inside",
				meanMenuClose: ""
			});

			$("#main-navigation .sf-menu, #main-navigation .content>ul.menu, #main-navigation ul.main-menu").wrap("<div class='meanmenu-wrapper'></div>");
			$("#main-navigation .meanmenu-wrapper").meanmenu({
				meanScreenWidth: "767",
				meanRemoveAttrs: true,
				meanMenuContainer: "#header-inside",
				meanMenuClose: ""
			});*/






/*			$("#header-top .sf-menu, #header-top .content>ul.menu").wrap("<div class='header-top-meanmenu-wrapper'></div>");
			$("#header-top .header-top-meanmenu-wrapper").meanmenu({
				meanScreenWidth: "767",
				meanRemoveAttrs: true,
				meanMenuContainer: "#header-top-inside",
				meanMenuClose: ""
			});*/


});