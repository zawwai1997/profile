$(document).ready(function () {
	        $(".hh_sf").next().addClass("collapsed").slideUp();

	        $(".hh_main").on('click', '.hh_sf', function (event) {
	            event.preventDefault();
	            var currentClass = $(this).next().prop('class');
	            if (currentClass == "hh_inner expanded") {
	                $(this).next().removeClass("expanded");
	                $(this).next().addClass("collapsed");
	                $(this).next().slideUp();
	            } else {
	                $(".expanded").slideUp().addClass("collapsed").removeClass("expanded");

	                $(this).next().removeClass("collapsed");
	                $(this).next().addClass("expanded");
	                $(this).next().slideDown();
	            }

	        });


	        $(".icon_side").click(function() {
			   $(".sidebar").toggleClass("side_out");
			   $(".icon_search").toggleClass("icon_right");
			});
 });