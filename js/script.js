$(document).ready(function() {
	
	$(".seta_rolagem, .rolagem").click(function(event){        
		event.preventDefault();
		$('html,body').animate({
			scrollTop:$(this.hash).offset().top
		}, 800);
		


	}); 

	// Efeito lampada
	$(window).scroll(function(){
		posicaoScroll = $(window).scrollTop();

		if(posicaoScroll >= 1522){
			$(".lampadaimg").css({
				"background-image": "url('img/lampadal.png')",
				"transition":"1s"
			})
		}else{
			$(".lampadaimg").css({
				"background-image": "url('img/lampadad.png')"
			})
		}

	});



// efeito descrição da  ideia
$(window).scroll(function(){
	posicaoScroll = $(window).scrollTop();

	if(posicaoScroll >= 1522){
		$(".ideia").css({
			"right": "294px",
			"opacity": 1
		});
	}
});

// esconder botao


$(window).scroll(function(){
	posicaoScroll = $(window).scrollTop();

	if(posicaoScroll >= 760){
		$("#setalink").css({
			"opacity": 0,
			"transition": "opacity 0.5s"
		});
	}else {
		$("#setalink").css({
			"opacity": 1,
			"transition": "opacity 0.5s"
		});
	}

	 //alert(posicaoScroll);
});


$(window).scroll(function(){
	posicaoScroll = $(window).scrollTop();

	if(posicaoScroll >= 1820){
		$("#setalink2").css({
			"opacity": 0,
			"transition": "opacity 0.5s"
		});
	}else {
		$("#setalink2").css({
			"opacity": 1,
			"transition": "opacity 0.5s"
		});
	}

	 //alert(posicaoScroll);
});



});

