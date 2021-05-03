(function($){
"use strict";
	$(function(){
		$('#menu').slicknav(
				{
					label: '',
					// prependTo:'',
				}
			);
		});

	// FLEX SLIDER
	if($(".flex-slider")[0]) { 
	    $('.flex-slider').flexslider(
			{ 
				"directionNav" : true,
				"controlNav" : false,
				"animation" : "fade",
				"prevText" : "",
				"nextText" : "",
				"animationLoop"	: true,
				"animationSpeed" : 400,
				"slideshowSpeed" : 8000,
				controlsContainer: $(".hero-controls-container"),
    			customDirectionNav: $(".hero-slider-navigation a")
			}
		);
	};

	/////////////
	$('.title-on').mouseover(function(){

		var span = $(this).children('span');
		span.addClass('active-hover')
	})
	$('.title-on').mouseleave(function(){

		var span = $(this).children('span');
		span.removeClass('active-hover')
	})
	//console.log(title[0])

 //console.log("Ritsu") ;

/// Trim Ritsu Function 
 	let textA = $('.trim')
	for (let index = 0; index < textA.length; index++) {
		let textLenght = textA[index].text.length;
		let textTitle = textA[index].text;
		//console.log(textA[index].text[1]);

		if( textLenght > 14){
			let tempText = "";
			for (let i = 0; i < 14; i++) {
				 tempText += textTitle[i];
				
			}
			tempText += "...";
			textTitle = tempText;
			
		}
		textA[index].innerHTML = textTitle;
	}
 	


})(jQuery);

// SEARCH TOGGLE
function showSearchbar() {
	document.getElementById("search-bar").style.display="block";
	console.log('here')
}
function hideSearchbar() {
	document.getElementById("search-bar").style.display="none";
	console.log('clicked')
}

// Trim title


