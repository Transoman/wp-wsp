'use strict';

global.jQuery = require('jquery');
let svg4everybody = require('svg4everybody'),
  popup = require('jquery-popup-overlay'),
  iMask = require('imask'),
  Swiper = require('swiper'),
  noUiSlider = require('nouislider'),
  tabslet = require('tabslet'),
  fancybox = require('@fancyapps/fancybox');

jQuery(document).ready(function($) {
  // Toggle nav menu
  let toggleNav = function () {
    let toggle = $('.nav-toggle');
    let nav = $('.nav');
    let closeNav = $('.nav__close');
    let overlay = $('.nav-overlay');

    toggle.on('click', function (e) {
      e.preventDefault();
      nav.toggleClass('open');
      overlay.toggleClass('active');
    });

    closeNav.on('click', function (e) {
      e.preventDefault();
      nav.removeClass('open');
      overlay.removeClass('active');
    });

    overlay.on('click', function (e) {
      e.preventDefault();
      nav.removeClass('open');
      $(this).removeClass('active');
    });
  };

  // Modal
  let initModal = function() {
    $('.modal').popup({
      transition: 'all 0.3s',
      onclose: function() {
        $(this).find('label.error').remove();
        $(this).find('.wpcf7-response-output').hide();
      }
    });
  };

  // Input mask
  let inputMask = function() {
    let phoneInputs = $('input[type="tel"]');
    let maskOptions = {
      mask: '+{7} (000) 000-0000'
    };

    if (phoneInputs) {
      phoneInputs.each(function(i, el) {
        IMask(el, maskOptions);
      });
    }
  };

  new Swiper('.calculator-materials', {
    slidesPerView: 1,
    spaceBetween: 30,
    navigation: {
      nextEl: '.calculator-materials-wrap .swiper-button-next',
      prevEl: '.calculator-materials-wrap .swiper-button-prev',
    },
    breakpoints: {
      577: {
        slidesPerView: 2
      },
      768: {
        slidesPerView: 3
      },
      1131: {
        slidesPerView: 4
      }
    }
  });

  new Swiper('.testimonial-slider', {
    slidesPerView: 1,
    spaceBetween: -10,
    centeredSlides: true,
    loop: true,
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
    },
    breakpoints: {
      768: {
        slidesPerView: 1.5
      },
      1131: {
        slidesPerView: 2.5,
      },
      1400: {
        slidesPerView: 3,
      },
    }
  });

  new Swiper('.certifications-slider', {
    slidesPerView: 1,
    spaceBetween: 75,
    watchOverflow: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      577: {
        slidesPerView: 2
      },
      768: {
        slidesPerView: 3
      },
      1131: {
        slidesPerView: 4
      }
    }
  });

  let gallery = new Swiper('.gallery-slider', {
    slidesPerView: 1,
    watchOverflow: true,
    speed: 1000,
    loop: true,
    centeredSlides: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      768: {
        slidesPerView: 2
      },
      1131: {
        slidesPerView: 4.8
      }
    }
  });

  $().fancybox({
    selector: '[data-fancybox="gallery"]',
    hash: false,
    loop: true,
    backFocus: false
  });

  let range = document.querySelector('.calculator-depth');

  if (range) {
    noUiSlider.create(range, {
      start: [50],
      range: {
        'min': [1],
        'max': [200]
      },
      tooltips: true,
      connect: 'lower',
      format: {
        to: function(v) {
          return Math.round(parseInt(v));
        },
        from: function(v) {
          return Math.round(parseInt(v));
        },
      }
    });
  }

  function addSpaces(nStr) {
    nStr += '';
    let x = nStr.split('.');
    let x1 = x[0];
    let x2 = x.length > 1 ? '.' + x[1] : '';
    let rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
      x1 = x1.replace(rgx, '$1' + ' ' + '$2');
    }
    return x1 + x2;
  }

  let calculator = function() {
    let material = $('.calculator-materials__item');
    let materialBtn = material.find('.btn');
    let price = 0;
    let result = $('.calculator__result span');
    let resultBtn = $('.calculator__result-wrap .btn');
    let depth = 0;

    if (range) {
      depth = range.noUiSlider.get();
    }

    materialBtn.click(function(e) {
      e.preventDefault();

      material.removeClass('check');
      $(this).parent().addClass('check');

      price = parseInt($(this).data('price'), 10);
      result.text(addSpaces(price * depth));
    });

    if (range) {
      range.noUiSlider.on('update', function (values, handle) {
        depth = values[handle];
        result.text(addSpaces(price * values[handle]));
      });
    }

    resultBtn.click(function() {
      let name = $('.calculator-materials__item.check').find('.calculator-materials__descr').text()
      let area = $('#area').val();
      let sum = result.text();

      $('#calculator input[name="your-material"]').val(name);
      $('#calculator input[name="your-area"]').val(area);
      $('#calculator input[name="your-depth"]').val(depth);
      $('#calculator input[name="your-sum"]').val(sum);

    });

  };

  $('.advantages-tabs').tabslet();

  $('.equipment-modal_open').click(function() {
    let name = $(this).parent().find('.equipment-list__descr').text();

    $('#equipment input[name="your-serv"]').val(name);
  });

  $('.consultation_open').click(function() {
    let name = $(this).data('theme');

    $('#consultation input[name="your-theme"]').val(name);
  });

  $('a[href*="#"]')
  // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .not('[href^="#advantages"]')
    .click(function(event) {
      // On-page links
      if (
        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
        &&
        location.hostname == this.hostname
      ) {
        // Figure out element to scroll to
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        // Does a scroll target exist?
        if (target.length) {
          // Only prevent default if animation is actually gonna happen
          event.preventDefault();

          $('.nav').removeClass('open');
          $('.nav-toggle').removeClass('active');
          $('.nav-overlay').removeClass('active');

          $('html, body').animate({
            scrollTop: target.offset().top
          }, 1000);
        }
      }
    });


  toggleNav();
  initModal();
  inputMask();
  calculator();

  // SVG
  svg4everybody({});
});