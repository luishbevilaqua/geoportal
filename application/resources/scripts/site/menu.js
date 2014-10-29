$(document).ready(function(){
		//	#animation-1 	
		$("#menu_box li a").hover(
		function(){
			$(this).animate({ textIndent: "30px" }, 75 );

		},function(){
			$(this).animate({ textIndent: "0px" }, 75 );
		});
	});