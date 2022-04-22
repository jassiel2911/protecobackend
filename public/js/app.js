window.addEventListener('load', function(){	
	// Carousel de seccion de cursos:
	new Glider(document.querySelector('.carousel__lista'), {
		slidesToShow: 1,
		slidesToScroll: 1,
		dots: '.carousel__indicadores',
		arrows: {
			prev: '.carousel__anterior',
			next: '.carousel__siguiente'
		},
		responsive: [
			{
			  breakpoint: 1200,
			  settings: {
				slidesToShow: 3,
				slidesToScroll: 2
			  }
			},{
			  breakpoint: 1500,
			  settings: {
				slidesToShow: 3,
				slidesToScroll: 3
			  }
			}
		]
	});


});

// Carousel Owl
	$(document).ready(function(){
	  $(".owl-carousel").owlCarousel();
	});

	$('.carousel-logos').owlCarousel({
	    loop:true,
	    autoplay:true,
	    lazyLoad:true,
	    dots:false,
	    nav:false,
	    responsiveClass:true,
	    responsive:{
	        0:{
	            items:3,
	        },
	        600:{
	            items:5,
	        },
	        1000:{
	            items:8,
	        }
	    }
	});
	$(".owl-carousel.carousel-talleres").owlCarousel({
	          autoplay:false,
	          nav: true,
	          lazyLoad:true,
	          loop:true,
	          dots:true,
	          items: 1,
	          responsiveClass:true,
	          responsive:{
	              600:{
	              	nav:true,
	                items:2,
	                dots:true,
	              }
	          }
	});

// Navbar
	addEventListener('DOMContentLoaded', () => {
		// Menu desplegable:
		const btn__menu = this.document.querySelector('.btn__menu');
		if (btn__menu){
			btn__menu.addEventListener('click', () => {
				const menu__items = this.document.querySelector('.menu__items');
				const nav_extend = this.document.querySelector('.nav-menu-extend ');
				// Se muestra u oculta la clase 'show' dependiendo del caso
				menu__items.classList.toggle('show');
				nav_extend.items.classList.toggle('dis-des-1020');
			});
		}
	});

	// Navbar
	const navToggle = document.querySelector(".nav-toggle");
	const navMenu = document.querySelector(".nav-menu");

	navToggle.addEventListener("click", () => {
	  navMenu.classList.toggle("nav-menu_visible");

	  if (navMenu.classList.contains("nav-menu_visible")) {
	    navToggle.setAttribute("aria-label", "Cerrar menú");
	  } else {
	    navToggle.setAttribute("aria-label", "Abrir menú");
	  }
	});

// Movimiento frontal y trasero de card
// function flipCards(){
// 	const btns = document.querySelectorAll(".card__flip");

// 	btns.forEach((btn) => {
// 		btn.addEventListener('click', e => {
// 			// console.log(e.target.id);
// 			btn.parentNode.parentNode.parentNode.classList.toggle('is-flipped');
// 		});
// 	});
// }
function flipCards(){
	const btns = document.querySelectorAll(".card__flip");

	btns.forEach((btn) => {
		btn.addEventListener('click', e => {
			// console.log(e.target.id);
			btn.parentNode.parentNode.parentNode.parentNode.classList.toggle('is-flipped');
		});
	});
// 	var card = document.getElementById('card-t');
// 	card.addEventListener( 'click', function() {
// 	  card.classList.toggle('is-flipped');
// });
}

flipCards();


// Collapse
	$(".panel-heading").parent('.panel').hover(
	  function() {
	    $(this).children('.collapse').collapse('show');
	    $(this).children('.panel-body').css('background-color','pink');
	  }, function() {
	    $(this).children('.collapse').collapse('hide');
	  }
	);

// Navbar scroll to

//  Formularios de mailchimp

	function isValidEmail($form) {
	  var email = $form.find("input[type='email']").val();
	  if (!email || !email.length) {
	      return false;
	  } else if (email.indexOf("@") == -1) {
	      return false;
	  }
	  return true;
	}

	// Cursos proximamente

	ajaxMailChimpFormProx($("#form-proximamente-cursos"), $("#subscribe-result-proximamente-cursos"));

	function ajaxMailChimpFormProx($form, $resultElement){
	    $form.submit(function(e) {
	        e.preventDefault();
	        if (!isValidEmail($form)) {
	            var error =  "¡Ups! Al parecer este e-mail no es válido";
	            $resultElement.html(error);
	            $resultElement.css("color", "#E01656");
	            $resultElement.css("font-size", "1rem");
	        } 
	        else if(!datosProx($form)){
	          var error =  "Al parecer olvidaste dejar tus datos";
	          $resultElement.html(error);
	          $resultElement.css("color", "#E01656");
	          $resultElement.css("font-size", "1rem");
	          $resultElement.css("margin-top", ".5rem");
	        } 
	        
	        else {
	            submitSubscribeFormProx($form, $resultElement);
	        }

	    });
	}
	function submitSubscribeFormProx($form, $resultElement) {

	    $.ajax({

	        type: "GET",

	        url: $form.attr("action"),

	        data: $form.serialize(),

	        cache: false,

	        dataType: "jsonp",

	        jsonp: "c", // trigger MailChimp to return a JSONP response

	        contentType: "application/json; charset=utf-8",

	        error: function(error){

	            // According to jquery docs, this is never called for cross-domain JSONP requests

	        },

	        success: function(data){

	            if (data.result != "success") {

	                var message = data.msg || "Disculpa, no pudimos registrar tus datos. Intenta más tarde.";

	                $resultElement.css("color", "#E01656");

	                $resultElement.css("font-size", ".8rem");

	                if (data.msg && data.msg.indexOf("Ýa estás registrado :)") >= 0) {

	                    message = "Ya estás suscrito. ¡Gracias!";

	                    $resultElement.css("color", "#E01656");

	                    $resultElement.css("font-size", ".8rem");

	                }

	                $resultElement.html(message);

	            } else {

	                $('#submit-prox').remove();
	                $('#listo-prox').removeClass('d-none').addClass('d-block');

	            }

	        }

	    });

	}

	// Validar datos
	  function datosProx($form) {
	     var name = $form.find("input[name='FNAME']").val();
	     var email = $form.find("input[name='EMAIL']").val();
	     if (!name || !name.length) {
	         return false;
	     }else if(!email || !email.length){
	         return false;
	     }
	     return true;
	 }

// Timer
	// Set the date we're counting down to
	var countDownDate = new Date("Nov 27, 2021 12:00:00").getTime();

	// Update the count down every 1 second
	var x = setInterval(function() {

	  // Get today's date and time
	  var now = new Date().getTime();
	    
	  // Find the distance between now and the count down date
	  var distance = countDownDate - now;
	    
	  // Time calculations for days, hours, minutes and seconds
	  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
	  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
	  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
	  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
	    
	  // Output the result in an element with id="demo"
	  document.getElementById("timer").innerHTML = days + "d " + hours + "h "
	  + minutes + "m " + seconds + "s ";
	    
	  // If the count down is over, write some text 
	  if (distance < 0) {
	    clearInterval(x);
	    document.getElementById("timer").innerHTML = "EXPIRED";
	  }
	}, 1000);