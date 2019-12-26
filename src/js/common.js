'use strict';

global.jQuery = require('jquery');
let svg4everybody = require('svg4everybody'),
  popup = require('jquery-popup-overlay'),
  iMask = require('imask'),
  Swiper = require('swiper'),
  noUiSlider = require('nouislider');

jQuery(document).ready(function($) {
  // Toggle nav menu
  let toggleNav = function () {
    let toggle = $('.nav-toggle');
    let nav = $('.header__nav');
    let closeNav = $('.nav__close');
    let overlay = $('.nav-overlay');

    toggle.on('click', function (e) {
      e.preventDefault();
      nav.toggleClass('open');
      overlay.toggleClass('is-active');
    });

    closeNav.on('click', function (e) {
      e.preventDefault();
      nav.removeClass('open');
      overlay.removeClass('is-active');
    });

    overlay.on('click', function (e) {
      e.preventDefault();
      nav.removeClass('open');
      $(this).removeClass('is-active');
    });
  };

  // Modal
  let initModal = function() {
    $('.modal').popup({
      transition: 'all 0.3s',
      scrolllock: true,
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

  let range = $('.calculator-depth')[0];

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
    let depth = range.noUiSlider.get();
    let result = $('.calculator__result span');

    materialBtn.click(function(e) {
      e.preventDefault();

      material.removeClass('check');
      $(this).parent().addClass('check');

      price = parseInt($(this).data('price'), 10);
      result.text(addSpaces(price * depth));
    });

    range.noUiSlider.on('update', function (values, handle) {
      depth = values[handle];
      result.text(addSpaces(price * values[handle]));
    });

  };


  toggleNav();
  initModal();
  inputMask();
  calculator();

  // SVG
  svg4everybody({});
});