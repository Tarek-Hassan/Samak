// Sticky Header


	$(function(){

	 //   	$('.nav_menu nav > ul > li > a').click(function(){
	 //			$("html, body").animate({ scrollTop: $(this.hash).offset().top-100 }, 1000);
	 //			return false;
		//	});
		
			$('.top').click(function(){
				$("html, body").animate({ scrollTop: 0 }, 1200);
			});

	    	$('.scroll-down').click(function(){
	 			$("html, body").animate({ scrollTop: $('#about').offset().top+100 }, 1500);
	 			return false;
			});

		});
		
		
		

            $(document).ready(function(){

                $(document).scroll(function() {

                    var top = $(document).scrollTop();

                    if (top > 30) {
                        $(".top").addClass("top_show");
                        $(".head-bar").addClass("head-sticky");
                    }
                    else if (top < 30) {
                        $(".top").removeClass("top_show");
                        $(".head-bar").removeClass("head-sticky");
                    }


                });
            });






            $(document).ready(function(){

				$(document).ready(function() {
				  var owl = $('.carousel_persons');
				  owl.owlCarousel({
					rtl: false,
					margin: 40,
					nav: false,
					loop: true,
					lazyLoad : true,
					autoplay:true,
					dots: true,
					autoplayTimeout:5000,
					smartSpeed:1100,
					autoplayHoverPause:true,
					responsive: {
					  0: {
						items: 1,
						stagePadding: 50,
					  },
					  600: {
						items: 1,
						stagePadding: 120,
					  },
					  800: {
						items: 2,
						stagePadding: 120,
					  },
					  900: {
						items: 2,
						stagePadding: 150,
					  },
					  1100: {
						items: 2,
						stagePadding: 230,
					  }
					 }
				  })
				})

				$(document).ready(function() {
					var owl = $('.owl-clients');
					owl.owlCarousel({
					rtl: false,
					margin: 10,
					nav: false,
					loop: true,
					lazyLoad : false,
					autoplay:true,
					dots:true ,
					autoplayTimeout:5000,
					smartSpeed:1100,
					autoplayHoverPause:true,
					responsive: {
						  0: {
							items: 1
						  },
						  400: {
							items: 2
						  },
						  550: {
							items: 3
						  },
						  720: {
							items: 4
						  },
						  992: {
							items: 5
						  },
						  1170: {
							items: 6
						  },
						 }
						})
				    })
			
					$(document).ready(function() {
						var owl = $('.owl-slide');
						owl.owlCarousel({
						rtl: false,
						margin: 0,
						nav: false,
						loop: true,
						lazyLoad : false,
						autoplay:true,
						dots:false ,
						autoplayTimeout:5000,
						smartSpeed:1100,
						autoplayHoverPause:true,
						responsive: {
									  0: {
										items: 1
									  },
									  1170: {
										items: 1
									  },
									 }
							})
						})
			
			
			
			});









var list = $("nav>ul li > a"); //Liste de tout les liens
//Gestion du clique sur le boutton des trois bars afin d'afficher le menu dans les support avec un width <769
$("nav > a").click(function(event){
    $("nav>ul").slideToggle();
		return false;
});

//Gestion des cliques sur les liens avec élimination du comportement par défaut du a dans le cas où il existe un sous menu
list.click(function (event) {
    var submenu = this.parentNode.getElementsByTagName("ul").item(0);
    //S'il existe un sous menu sinon c'est un lien terminal
    if(submenu!=null){
        event.preventDefault();
        $(submenu).slideToggle();
    }
});
//Gestion du resize de la fenetre pour eliminer le style ajouté par la méthode .slideToggle()

$(window).resize(function () {
    if ($(window).width() > 767) {
        $("nav > ul, nav > ul  li  ul").removeAttr("style");
        $("nav").addClass("style0");
		
    }
});


if( $(window).width() < 767)
{
$("nav ul li a").click(function(event){
	$("nav>ul").slideToggle();
	return false;
});


}  



