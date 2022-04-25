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
  
// cards
    $(".flip").click(function () {                  
        $(this).siblings(".panel").slideToggle("slow");
    });

