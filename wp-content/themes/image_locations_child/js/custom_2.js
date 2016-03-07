
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

jQuery('p:empty').remove();
jQuery("<p> </p>").remove();

var owl2 = jQuery('.owl-carousel.droppable-slider');
var viewport = jQuery(window).width();


jQuery(window).load(function () {
  match_same_contact_box();
  
});

jQuery(window).resize(function () {
  match_same_contact_box();
});

jQuery(function () {

  var bLazy = new Blazy();

  jQuery('.menu-text-link').click(function () {
    jQuery('.toggle-burger-menu').trigger('click');
  });

  jQuery('.navbar_toggle_2').click(function () {
    jQuery('#bs-example-navbar-collapse-2').slideToggle('slow');
  });


  (function ($) {
    $.each(['show', 'hide'], function (i, ev) {
      var el = $.fn[ev];
      $.fn[ev] = function () {
        this.trigger(ev);
        return el.apply(this, arguments);
      };
    });
  })(jQuery);

  jQuery.fn.center = function (parent) {
    if (parent) {
      parent = this.parent();
    } else {
      parent = window;
    }


    var top_var = (((jQuery(parent).height() - this.outerHeight()) / 2));
    var left_var = (((jQuery(parent).width() - this.outerWidth()) / 2));

    if (top_var <= 100) {
      top_var = 100;
    }

    // console.log(left_var);

    this.css({
      "position": "fixed",
      "text-align": "center",
      "top": top_var + "px",
      "left": left_var + "px",
      "z-index": 999999
    });
    return this;
  }

  //jQuery("#sharing_email").center(false);
  //jQuery("#sharing_email").css('display', 'block');

  jQuery('#sharing_email').on('show', function () {
    jQuery("#sharing_email").center(false)
    jQuery(".overlay").show()
  });
  jQuery('#sharing_email').on('hide', function () {
    jQuery(".overlay").hide()
  });


// swiper initialize


  jQuery(document).on('click', '.share-custom-copylink', function () {

    jQuery('.share-custom-copylink.sd-button').attr('style', 'border:1px solid #FF4040 !important;');

    setTimeout(function () {
      jQuery('.share-custom-copylink.sd-button').removeAttr('style');
    }, 2000);

    var copyTextarea = document.querySelector('.js-copytextarea');
    copyTextarea.select();
    var successful = document.execCommand('copy');
    return false;
  });


  if (jQuery('.swiper-container.moodboard-swiper').size() > 0)
  {	  
      var swiper = new Swiper('.swiper-container.moodboard-swiper', {
        pagination: null,
        nextButton: '.swiper-container.moodboard-swiper .swiper-button-next',
        prevButton: '.swiper-container.moodboard-swiper .swiper-button-prev',
        slidesPerView: 'auto',
        centeredSlides: false,
        paginationClickable: true,
        spaceBetween: 3,
        scrollbar: '.swiper-container.moodboard-swiper .swiper-scrollbar',
        scrollbarHide: false,
        scrollbarDraggable: true,
        scrollbarSnapOnRelease: false,
        preloadImages: true,
        paginationHide: true,
        observer: true,
        freeMode: true,
        mousewheelControl: true,
        mousewheelReleaseOnEdges: false,
        onSetTranslate: function (swiperObj, translate) {        
			if(jQuery('.swiper-container.moodboard-swiper .swiper-scrollbar-drag').hasClass('scrollbar-default-width')){
				jQuery('.swiper-container.moodboard-swiper .swiper-scrollbar-drag').removeClass('scrollbar-default-width');
			}
			jQuery('.swiper-container.moodboard-swiper .lazy-slides').each(function () {
									
			   var total_images = 2;
			   var i = 0;
				
			   var temp_src = jQuery(this).data('lazy_src');
			   var a_id = jQuery(this).data('a_id');
			   var drag_image = jQuery(this).data('drag_image');
			   var thumb_id = jQuery(this).data('thumb_id');
				
			   jQuery(this).remove();
			   
			   if (i < total_images) {
				   
				   if (temp_src != "") {
					   
					   jQuery('.image_container').append('<img src="' + temp_src + '" class="new_image" width="100" />')

					   jQuery('.image_container').find('.new_image').removeClass('new_image');

					   jQuery('.image_container').imagesLoaded(function () {
						   swiperObj.appendSlide('<div class="swiper-slide"><img id="' + drag_image + '" data-thumb="' + thumb_id + '" class="swiper-lazy1 img-responsive" src="' + temp_src + '" /><a data-id="' + a_id + '" class="btn btn-add-moodboard" style="display: none;"></a></div>');														
					   });
					   
				   }			   
			   
			   }
			   i++;
			});		
			
		},
      });

    jQuery(document).on('dblclick', '.moodboard-swiper .swiper-wrapper .swiper-slide img', function () {
      if (jQuery(this).parent().find('.btn-add-moodboard').hasClass('open-div'))
      {
        jQuery(this).parent().find('.btn-add-moodboard').trigger('click');
      }
    });

    if (jQuery('.dropdown-menu.quick-navigation').size() > 0) {
      jQuery('.dropdown-menu.quick-navigation a').on('click', function () {
        var slide_index = jQuery(this).data('slide_id');
        swiper.slideTo(slide_index, 2000);
      });
    }

  }

  if (jQuery('.swiper-container.single-similar-locations').size() > 0)
  {
    var swiper2 = new Swiper('.swiper-container.single-similar-locations', {
      pagination: null,
      nextButton: '.swiper-container.single-similar-locations .swiper-button-next',
      prevButton: '.swiper-container.single-similar-locations .swiper-button-prev',
      slidesPerView: 'auto',
      paginationClickable: true,
      spaceBetween: 3,
      freeMode: true,
      grabCursor: true,
      preloadImages: true,
      paginationHide: true,
	  mousewheelControl: true,
    });
  }

  if (jQuery('.swiper-container.advance-search-result').size() > 0)
  {
    jQuery('.swiper-container.advance-search-result').each(function (index, element) {

      var swiper6 = new Swiper('.swiper-container.advance-search-result-' + index, {
        pagination: null,
        scrollbar: '.swiper-container.advance-search-result .swiper-scrollbar-' + index,
        scrollbarHide: false,
        scrollbarDraggable: true,
        scrollbarSnapOnRelease: true,
        nextButton: '.swiper-container.advance-search-result .swiper-button-next-' + index,
        prevButton: '.swiper-container.advance-search-result .swiper-button-prev-' + index,
        slidesPerView: 'auto',
        paginationClickable: true,
        spaceBetween: 3,
        freeMode: true,
        grabCursor: true,
        preloadImages: true,
        paginationHide: true,
        updateOnImagesReady: true,
        observer: true,
		mousewheelControl: true,
        /*onTransitionStart: function (swiperObj) {
         
         jQuery('.swiper-container.advance-search-result-' + index + ' .lazy-slides').each(function () {
         
         var temp_src = jQuery(this).data('lazy_src');
         var temp_href = jQuery(this).data('lazy_href');
         if (temp_src != "") {
         jQuery('.swiper-container.advance-search-result-' + index + ' .empty:first').html('<a href="' + temp_href + '"><img class="img-responsive" src="' + temp_src + '" /></a>');
         jQuery('.swiper-container.advance-search-result-' + index + ' .empty:first').removeClass('empty');
         jQuery(this).remove();
         }
         });
         
         }*/

        onReachEnd: function (swiperObj) {

          var total_images = 10;
          var i = 0;

          jQuery('.swiper-container.advance-search-result-' + index + ' .lazy-slides').each(function () {

            if (i < total_images) {
              var temp_src = jQuery(this).data('lazy_src');
              var temp_href = jQuery(this).data('lazy_href');
              if (temp_src != "") {
                swiperObj.appendSlide('<div class="swiper-slide"><a href="' + temp_href + '"><img class="swiper-lazy1 img-responsive" src="' + temp_src + '" /></a></div>');
                jQuery(this).remove();
              }

            }

            i++;

          });

        }

      });

      /*
       document.querySelector('.append-slide').addEventListener('click', function (e) {
       e.preventDefault();
       swiper6.appendSlide('<div class="swiper-slide"><img class="swiper-lazy1 img-responsive" src="http://imageloctions.staging.wpengine.com/wp-content/uploads/locations/0x100/37/original(5)-775x581.jpg" /></div>');
       }); */

    });
  }

  if (jQuery('.swiper-container.home-location').size() > 0)
  {
    jQuery('.swiper-container.home-location').each(function (index, element) {

      var swiper3 = new Swiper('.swiper-container.home-location-' + index, {
        pagination: null,
        nextButton: '.swiper-container.home-location .swiper-button-next-' + index,
        prevButton: '.swiper-container.home-location .swiper-button-prev-' + index,
        slidesPerView: 1,
        paginationClickable: true,
        spaceBetween: 3,
        freeMode: true,
        grabCursor: true,
        preloadImages: true,
        paginationHide: true,
        updateOnImagesReady: true,
        observer: true,
		mousewheelControl: true,
        onReachEnd: function (swiperObj) {

          var total_images = 10;
          var i = 0;

          jQuery('.swiper-container.home-location-' + index + ' .lazy-slides').each(function () {

            if (i < total_images) {
              var temp_src = jQuery(this).data('lazy_src');
              var temp_href = jQuery(this).data('lazy_href');
              if (temp_src != "") {
                swiperObj.appendSlide('<div class="swiper-slide"><a href="' + temp_href + '"><img class="swiper-lazy1 img-responsive" src="' + temp_src + '" /></a></div>');
                jQuery(this).remove();
              }

            }

            i++;

          });

        }

      });
    });
  }

  if (jQuery('.swiper-container.category-all').size() > 0)
  {
    jQuery('.swiper-container.category-all').each(function (index, element) {

      var swiper6 = new Swiper('.swiper-container.category-all-' + index, {
        pagination: null,
        scrollbar: '.swiper-container.category-all .swiper-scrollbar-' + index,
        scrollbarHide: false,
        scrollbarDraggable: true,
        scrollbarSnapOnRelease: true,
        nextButton: '.swiper-container.category-all .swiper-button-next-' + index,
        prevButton: '.swiper-container.category-all .swiper-button-prev-' + index,
        slidesPerView: 'auto',
        paginationClickable: true,
        spaceBetween: 3,
        freeMode: true,
        grabCursor: true,
        preloadImages: true,
        paginationHide: true,
        updateOnImagesReady: true,
        observer: true,
		mousewheelControl: true,
        /*onTransitionStart: function (swiperObj) {
         
         jQuery('.swiper-container.category-all-' + index + ' .lazy-slides').each(function () {
         
         var temp_src = jQuery(this).data('lazy_src');
         var temp_href = jQuery(this).data('lazy_href');
         if (temp_src != "") {
         jQuery('.swiper-container.category-all-' + index + ' .empty:first').html('<a href="' + temp_href + '"><img class="img-responsive" src="' + temp_src + '" /></a>');
         jQuery('.swiper-container.category-all-' + index + ' .empty:first').removeClass('empty');
         jQuery(this).remove();
         }
         });
         
         }*/

        onReachEnd: function (swiperObj) {

          var total_images = 10;
          var i = 0;

          jQuery('.swiper-container.category-all-' + index + ' .lazy-slides').each(function () {

            if (i < total_images) {
              var temp_src = jQuery(this).data('lazy_src');
              var temp_href = jQuery(this).data('lazy_href');
              if (temp_src != "") {
                swiperObj.appendSlide('<div class="swiper-slide"><a href="' + temp_href + '"><img class="swiper-lazy1 img-responsive" src="' + temp_src + '" /></a></div>');
                jQuery(this).remove();
              }

            }

            i++;

          });

        }

      });

      /*
       document.querySelector('.append-slide').addEventListener('click', function (e) {
       e.preventDefault();
       swiper6.appendSlide('<div class="swiper-slide"><img class="swiper-lazy1 img-responsive" src="http://imageloctions.staging.wpengine.com/wp-content/uploads/locations/0x100/37/original(5)-775x581.jpg" /></div>');
       }); */

    });
  }

  if (jQuery('.swiper-container.category-new').size() > 0)
  {
    jQuery('.swiper-container.category-new').each(function (index, element) {

      var swiper6 = new Swiper('.swiper-container.category-new-' + index, {
        pagination: null,
        scrollbar: '.swiper-container.category-new .swiper-scrollbar-' + index,
        scrollbarHide: false,
        scrollbarDraggable: true,
        scrollbarSnapOnRelease: true,
        nextButton: '.swiper-container.category-new .swiper-button-next-' + index,
        prevButton: '.swiper-container.category-new .swiper-button-prev-' + index,
        slidesPerView: 'auto',
        paginationClickable: true,
        spaceBetween: 3,
        freeMode: true,
        grabCursor: true,
        preloadImages: true,
        paginationHide: true,
        updateOnImagesReady: true,
        observer: true,
		mousewheelControl: true,
        /*onTransitionStart: function (swiperObj) {
         
         jQuery('.swiper-container.category-new-' + index + ' .lazy-slides').each(function () {
         
         var temp_src = jQuery(this).data('lazy_src');
         var temp_href = jQuery(this).data('lazy_href');
         if (temp_src != "") {
         jQuery('.swiper-container.category-new-' + index + ' .empty:first').html('<a href="' + temp_href + '"><img class="img-responsive" src="' + temp_src + '" /></a>');
         jQuery('.swiper-container.category-new-' + index + ' .empty:first').removeClass('empty');
         jQuery(this).remove();
         }
         });
         
         }*/

        onReachEnd: function (swiperObj) {

          var total_images = 10;
          var i = 0;

          jQuery('.swiper-container.category-new-' + index + ' .lazy-slides').each(function () {

            if (i < total_images) {
              var temp_src = jQuery(this).data('lazy_src');
              var temp_href = jQuery(this).data('lazy_href');
              var temp_width = jQuery(this).data('lazy_href');
              var temp_height = jQuery(this).data('lazy_href');

              if (temp_src != "") {
                swiperObj.appendSlide('<div class="swiper-slide"><a href="' + temp_href + '"><img height="' + temp_height + '" width="' + temp_width + '" class="swiper-lazy1 img-responsive" src="' + temp_src + '" /></a></div>');
                jQuery(this).remove();
              }

            }

            i++;

          });

        }

      });

      /*
       document.querySelector('.append-slide').addEventListener('click', function (e) {
       e.preventDefault();
       swiper6.appendSlide('<div class="swiper-slide"><img class="swiper-lazy1 img-responsive" src="http://imageloctions.staging.wpengine.com/wp-content/uploads/locations/0x100/37/original(5)-775x581.jpg" /></div>');
       }); */

    });
  }

  if (jQuery('.swiper-container.category-exclusive').size() > 0)
  {
	
	if(jQuery('.exclusives_banner_image_1').size() > 0 && viewport <= 768){
		jQuery('.exclusives_banner_image_1').addClass('hide');
	}
	
    jQuery('.swiper-container.category-exclusive').each(function (index, element) {

      var swiper6 = new Swiper('.swiper-container.category-exclusive-' + index, {
        pagination: null,
        scrollbar: '.swiper-container.category-exclusive .swiper-scrollbar-' + index,
        scrollbarHide: false,
        scrollbarDraggable: true,
        scrollbarSnapOnRelease: true,
        nextButton: '.swiper-container.category-exclusive .swiper-button-next-' + index,
        prevButton: '.swiper-container.category-exclusive .swiper-button-prev-' + index,
        slidesPerView: 'auto',
        paginationClickable: true,
        spaceBetween: 3,
        freeMode: true,
        grabCursor: true,
        preloadImages: true,
        paginationHide: true,
        updateOnImagesReady: true,
        observer: true,
		mousewheelControl: true,
        /*onTransitionStart: function (swiperObj) {
         
         jQuery('.swiper-container.category-exclusive-' + index + ' .lazy-slides').each(function () {
         
         var temp_src = jQuery(this).data('lazy_src');
         var temp_href = jQuery(this).data('lazy_href');
         if (temp_src != "") {
         jQuery('.swiper-container.category-exclusive-' + index + ' .empty:first').html('<a href="' + temp_href + '"><img class="img-responsive" src="' + temp_src + '" /></a>');
         jQuery('.swiper-container.category-exclusive-' + index + ' .empty:first').removeClass('empty');
         jQuery(this).remove();
         }
         });
         
         }*/

        onReachEnd: function (swiperObj) {

          var total_images = 10;
          var i = 0;

          jQuery('.swiper-container.category-exclusive-' + index + ' .lazy-slides').each(function () {

            if (i < total_images) {
              var temp_src = jQuery(this).data('lazy_src');
              var temp_href = jQuery(this).data('lazy_href');
              if (temp_src != "") {
                swiperObj.appendSlide('<div class="swiper-slide"><a href="' + temp_href + '"><img class="swiper-lazy1 img-responsive" src="' + temp_src + '" /></a></div>');
                jQuery(this).remove();
              }

            }

            i++;

          });

        }


      });

      /*
       document.querySelector('.append-slide').addEventListener('click', function (e) {
       e.preventDefault();
       swiper6.appendSlide('<div class="swiper-slide"><img class="swiper-lazy1 img-responsive" src="http://imageloctions.staging.wpengine.com/wp-content/uploads/locations/0x100/37/original(5)-775x581.jpg" /></div>');
       }); */

    });
  }

  if (jQuery('.swiper-container.single-project').size() > 0)
  {
    jQuery('.swiper-container.single-project').each(function (index, element) {

      var swiper6 = new Swiper('.swiper-container.single-project-' + index, {
        pagination: null,
        scrollbar: '.swiper-container.single-project .swiper-scrollbar-' + index,
        scrollbarHide: false,
        scrollbarDraggable: true,
        scrollbarSnapOnRelease: true,
        nextButton: '.swiper-container.single-project .swiper-button-next-' + index,
        prevButton: '.swiper-container.single-project .swiper-button-prev-' + index,
        slidesPerView: 'auto',
        paginationClickable: true,
        spaceBetween: 3,
        freeMode: true,
        grabCursor: true,
        preloadImages: true,
        paginationHide: true,
        updateOnImagesReady: true,
        observer: true,
		mousewheelControl: true,
        /*onTransitionStart: function (swiperObj) {
         
         jQuery('.swiper-container.single-project-' + index + ' .lazy-slides').each(function () {
         
         var temp_src = jQuery(this).data('lazy_src');
         var temp_href = jQuery(this).data('lazy_href');
         if (temp_src != "") {
         jQuery('.swiper-container.single-project-' + index + ' .empty:first').html('<a href="' + temp_href + '"><img class="img-responsive" src="' + temp_src + '" /></a>');
         jQuery('.swiper-container.single-project-' + index + ' .empty:first').removeClass('empty');
         jQuery(this).remove();
         }
         });
         
         }*/

        onReachEnd: function (swiperObj) {

          var total_images = 10;
          var i = 0;

          jQuery('.swiper-container.single-project-' + index + ' .lazy-slides').each(function () {

            if (i < total_images) {
              var temp_src = jQuery(this).data('lazy_src');
              var temp_href = jQuery(this).data('lazy_href');
              if (temp_src != "") {
                swiperObj.appendSlide('<div class="swiper-slide"><a href="' + temp_href + '"><img class="swiper-lazy1 img-responsive" src="' + temp_src + '" /></a></div>');
                jQuery(this).remove();
              }

            }

            i++;

          });

        }

      });

    });
  }

  if (jQuery('.swiper-container.single-permits').size() > 0)
  {
    jQuery('.swiper-container.single-permits').each(function (index, element) {

      var swiper6 = new Swiper('.swiper-container.single-permits-' + index, {
        pagination: null,
        scrollbar: '.swiper-container.single-permits .swiper-scrollbar-' + index,
        scrollbarHide: false,
        scrollbarDraggable: true,
        scrollbarSnapOnRelease: true,
        nextButton: '.swiper-container.single-permits .swiper-button-next-' + index,
        prevButton: '.swiper-container.single-permits .swiper-button-prev-' + index,
        slidesPerView: 'auto',
        paginationClickable: true,
        spaceBetween: 3,
        freeMode: true,
        grabCursor: true,
        preloadImages: true,
        paginationHide: true,
        updateOnImagesReady: true,
        observer: true,
		mousewheelControl: true,
        /*onTransitionStart: function (swiperObj) {
         
         jQuery('.swiper-container.single-permits-' + index + ' .lazy-slides').each(function () {
         
         var temp_src = jQuery(this).data('lazy_src');
         var temp_href = jQuery(this).data('lazy_href');
         if (temp_src != "") {
         jQuery('.swiper-container.single-permits-' + index + ' .empty:first').html('<a href="' + temp_href + '"><img class="img-responsive" src="' + temp_src + '" /></a>');
         jQuery('.swiper-container.single-permits-' + index + ' .empty:first').removeClass('empty');
         jQuery(this).remove();
         }
         });
         
         }*/

        onReachEnd: function (swiperObj) {

          var total_images = 10;
          var i = 0;

          jQuery('.swiper-container.single-permits-' + index + ' .lazy-slides').each(function () {

            if (i < total_images) {
              var temp_src = jQuery(this).data('lazy_src');
              var temp_href = jQuery(this).data('lazy_href');
              if (temp_src != "") {
                swiperObj.appendSlide('<div class="swiper-slide"><a href="' + temp_href + '"><img class="swiper-lazy1 img-responsive" src="' + temp_src + '" /></a></div>');
                jQuery(this).remove();
              }

            }

            i++;

          });

        }

      });

    });
  }


  if (owl2.size() > 0)
  {
    owl2.owlCarousel({
      margin: 3,
      loop: false,
      items: 5,
      nav: true,
      responsive: {
        0: {
          items: 1
        },
        320: {
          items: 3
        },
        480: {
          items: 3
        },
        767: {
          items: 4
        },
        992: {
          items: 4
        },
        1000: {
          items: 5,
        },
        1150: {
          items: 5,
        }
      }
    })
  }




  jQuery('.form-parlsey').parsley();
  jQuery('.form-parlsey-2').parsley();

  jQuery('.btn-download-zip').click(function () {

    jQuery('#AjaxLoaderDivForZip').fadeIn('slow');

    var images = '';

    var url = object_name.stylesheet_directory_url;
    var path = object_name.stylesheet_directory;

    var imgCounter = 0;

    jQuery('.moodboard-swiper .swiper-slide-gallery').each(function ()
    {
      if (jQuery(this).find('img').size() > 0)
      {
        images += jQuery(this).find('img').attr('src') + ',';
        imgCounter++;

        // console.log(jQuery(this).find('img').attr('src'));
      }

    });

    jQuery('.moodboard-swiper .swiper-slide-gallery-lazy').each(function ()
    {
      images += jQuery(this).data('lazy_src') + ',';
      // console.log(jQuery(this).data('lazy_src'));
      imgCounter++;
    });

    // return false;

    jQuery('#zip-frm #images').val(images);
    jQuery('#zip-frm #zip_url').val(url);
    jQuery('#zip-frm #zip_path').val(path);
    jQuery('#zip-frm').attr('action', object_name.stylesheet_directory_uri + '/makezip.php');

    setTimeout(function () {
      jQuery('#zip-frm').submit();
      jQuery('#AjaxLoaderDivForZip').fadeOut('slow');
    }, 700);

  });

  var bLazy = new Blazy({});

  jQuery(document).on('click', '.name_abcd ul li a', function (event) {
    event.preventDefault();
    var target = "#" + jQuery(this).data('target');
    jQuery('html, body').animate({
      scrollTop: jQuery(target).offset().top
    }, 2000);
  });


  jQuery('.list_your_home_sec input[type="file"]').change(function () {
    jQuery(this).parent().parent().find('.form-control').val(jQuery(this).val());
  });

  jQuery('.open_advance_search_area_sec').click(function () {
    jQuery('#advance_search_area_sec').slideToggle('slow');
  });

  jQuery('#advance_search_area_sec .md-close').click(function () {
    jQuery('#advance_search_area_sec').slideUp('slow');
  });


  jQuery(".dropdown").hover(
          function () {
            jQuery(this).addClass('open')
          },
          function () {
            jQuery(this).removeClass('open')
          }
  );
  jQuery('select').selectpicker();


  /* Location single project list [start] */

  if (jQuery('.portfolio_item_fancybox').size() > 0) {
    jQuery('.portfolio_item_fancybox').fancybox();
  }

  jQuery('#project_item_button').on('click', function () {
    jQuery('.portfolio_item_fancybox:first').trigger('click');
  });

  /* Location single project list [end] */





  if (jQuery('.owl-carousel.category-exclusive').size() > 0)
  {
    jQuery('.owl-carousel.category-exclusive').owlCarousel({
      margin: 3,
      loop: false,
      autoWidth: true,
      items: 1,
      nav: true,
    });
  }


  if (jQuery('.owl-carousel.category-new').size() > 0)
  {
    jQuery('.owl-carousel.category-new').owlCarousel({
      margin: 3,
      loop: false,
      autoWidth: true,
      items: 1,
      nav: true,
    });
  }


  if (jQuery('.owl-carousel.advance-search-result').size() > 0)
  {
    jQuery('.owl-carousel.advance-search-result').owlCarousel({
      margin: 3,
      loop: false,
      autoWidth: true,
      items: 1,
      nav: true,
    });
  }


  jQuery('.owl-carousel.project_preview_popup_slider').owlCarousel({
    margin: 3,
    loop: false,
    autoWidth: false,
    items: 1,
    nav: true,
  });


  jQuery('.owl-carousel.moodboard-carousel').owlCarousel({
    margin: 5,
    loop: false,
    autoWidth: true,
    nav: true,
    touchDrag: true,
    mouseDrag: true,
    items: 1
  });

  if (jQuery('.homepage-owl-carousel').size() > 0) {

    var homepage_owl_carousel = jQuery('.homepage-owl-carousel');
    homepage_owl_carousel.owlCarousel({
      margin: 3,
      loop: false,
      autoWidth: true,
      items: 1,
      nav: true,
    });

    jQuery(window).resize(function () {
      homepage_owl_carousel.trigger('refresh.owl.carousel');
    });

  }

  var homepage_featured_location_img = jQuery('#homepage_featured_location_img');
  var homepage_featured_location_info = jQuery('#homepage_featured_location_info'); // red BG slider
  var homepage_featured_right_slider = jQuery('#homepage_featured_right_slider');
  var change_flag = false;


  homepage_featured_location_img.owlCarousel({
    loop: false,
    autoWidth: false,
    items: 1,
    nav: true,
    autoplay: true,
    lazyLoad: true,
  });

  // make disabled arrows on reached first/last item of carousel [start]
  jQuery('#homepage_featured_location_img').find('.owl-prev').addClass('disabled');

  homepage_featured_location_img.on('changed.owl.carousel', function (event) {
    jQuery('#homepage_featured_location_img').find('.owl-prev').removeClass('disabled');
    jQuery('#homepage_featured_location_img').find('.owl-next').removeClass('disabled');
    console.log(event.item.count + '==' + event.item.index);
    if ((event.item.count - 1) == event.item.index) {
      jQuery('#homepage_featured_location_img').find('.owl-next').addClass('disabled');
    }
    if (0 == event.item.index) {
      jQuery('#homepage_featured_location_img').find('.owl-prev').addClass('disabled');
    }
  });
  // make disabled arrows on reached first/last item of carousel [end]


  homepage_featured_right_slider.owlCarousel({
    loop: false,
    autoWidth: false,
    items: 1,
    nav: true,
    dots: true,
    autoplay: true,
    lazyLoad: true,
    responsive: {
      0: {
        items: 1
      },
      480: {
        items: 2
      },
      768: {
        items: 3
      },
      992: {
        items: 1
      }
    }
  });

  homepage_featured_location_img.on('changed.owl.carousel', function (event) {
    homepage_featured_location_info.trigger('to.owl.carousel', [event.item.index, 200, true])
  });

  homepage_featured_location_info.on('changed.owl.carousel', function (event) {
    homepage_featured_location_img.trigger('to.owl.carousel', [event.item.index, 200, true])
  });


  homepage_featured_location_info.owlCarousel({
    loop: false,
    autoWidth: false,
    items: 1,
    nav: false,
    dots: true,
    autoplay: true
  });


  jQuery('p:empty').remove();

  jQuery("#abcd").sticky({topSpacing: 0});

  /*********** on dropdown selection change URL ********/

  if (typeof (jQuery('#city_selection_dropdown')) != 'undefined') {
    jQuery('#city_selection_dropdown').change(function () {
      var selectedOption = this.value;
      window.location.href = selectedOption;
    });
  }

});


/*--------------------------------------------------------*/

jQuery(function () {

  jQuery(document).on('click', '.location-hash-link', function (event) {
    event.preventDefault();

    jQuery('.location-hash-link').removeClass('red_text');

    jQuery(this).addClass('red_text');

    /*if (jQuery(this).data('target') == "all_ctegories_anchor")
    {
      var viewport = jQuery(window).width();
      if (viewport <= 420)
      {
        jQuery('.link_left.categories_sm_links').slideToggle('slow');
        return false;
      }
    }
	*/
    var target = "#" + jQuery(this).data('target');
    jQuery('html, body').animate({
      scrollTop: jQuery(target).offset().top
    }, 2000);
  });


  jQuery('.open-moodboard').click(function () {
    jQuery('.droptarget').animate({bottom: 0}, 'fast');
    jQuery('.btn-add-moodboard').addClass('open-div');
  });

  jQuery('.fancybox').fancybox({
    'afterLoad': function(){
      // For Video Popup only.
      jQuery(window).trigger('resize');
    }
  });

  jQuery('.btn-open-fancybox').click(function () {
    $id = jQuery(this).data('id');
    jQuery('#comman-link').attr('href', $id);
    jQuery('#comman-link').trigger('click');

    if ($id == '#location_pdf_moodboard_popup1') {
      jQuery('#mood_board_popup_close').trigger('click');
    }

  });



  jQuery('.close').click(function () {
    jQuery('.droptarget').animate({bottom: -340}, 'fast');
    jQuery('.btn-add-moodboard').hide();
    jQuery('.btn-add-moodboard').removeClass('open-div');
  });

  jQuery(document).on('click', '.photo_close', function () {
    jQuery(this).parent().remove();
    resetMoodboardSlider();
  });

  jQuery(document).on('click', '.btn-delete-img', function () {
    $id = jQuery(this).data('id');
    jQuery('.owl-carousel.droppable-slider .item[data-id="' + $id + '"]').remove();

    var imageHtml = '';
    jQuery('.owl-carousel.droppable-slider .owl-item .item').each(function () {
      imageHtml += '<div class="item" data-id="' + jQuery(this).data('id') + '">';
      imageHtml += '<a class="btn btn-danger btn-xs btn-delete-img" data-id="' + jQuery(this).data('id') + '"><i class="fa fa-times"></i></a><img src="' + jQuery(this).find('img.mood-img').attr('src') + '" class="img-responsive mood-img"/>';
      imageHtml += '</div>';
    });

    jQuery('.owl-carousel.droppable-slider').html('');
    jQuery('.owl-carousel.droppable-slider').html(imageHtml);
    resetMoodboardSlider();

  });
  jQuery(document).on('click', '.btn-add-moodboard', function () {

    // alert(jQuery('.owl-carousel.droppable-slider .owl-item .item').size())
    var imageHtml = '';
    jQuery('.owl-carousel.droppable-slider .owl-item .item').each(function () {
      imageHtml += '<div class="item" data-id="' + jQuery(this).data('id') + '">';
      imageHtml += '<a class="btn btn-danger btn-xs btn-delete-img" data-id="' + jQuery(this).data('id') + '"><i class="fa fa-times"></i></a><img src="' + jQuery(this).find('img.mood-img').attr('src') + '" class="img-responsive mood-img"/>';
      imageHtml += '</div>';
    });

    jQuery('.owl-carousel.droppable-slider').html('');
    jQuery('.owl-carousel.droppable-slider').html(imageHtml);


    $id = jQuery(this).data('id');
    $image = jQuery('#drag_image_' + $id).attr('src');

    //console.log($id);
    //console.log($image);

    if (jQuery('.owl-carousel.droppable-slider img[src="' + $image + '"]').size() > 0)
    {
      // do nothing
      // return false;
    }
    else
    {

      $html = '<div class="item" data-id="' + $id + '">';
      $html += '<a class="btn btn-danger btn-xs btn-delete-img" data-id="' + $id + '"><i class="fa fa-times"></i></a><img src="' + $image + '" class="mood-img img-responsive"/>';
      $html += '</div>';



      jQuery('.owl-carousel.droppable-slider').append($html);
    }

    resetMoodboardSlider();

  });

//    jQuery('.select_multiple').multiselect({
//        includeSelectAllOption: true
//    });

})

function match_same_contact_box()
{
  // console.log(jQuery('.container .contact_sec .view.view-sixth:first').css('height'))
  jQuery('.container .contact_sec .green_bg').css('height', (parseInt(jQuery('.container .contact_sec .view.view-sixth:first').css('height')) - 1) + "px");
}

function resetMoodboardSlider()
{


  jQuery('.btn-add-moodboard').removeClass('added');

  jQuery('.item').each(function () {
    $id = jQuery(this).data('id');

    if (jQuery('.btn-add-moodboard[data-id="' + $id + '"]').size() > 0)
    {
      jQuery('.btn-add-moodboard[data-id="' + $id + '"]').addClass('added');
    }
  });



  if (jQuery('.owl-carousel.droppable-slider').size() > 0)
  {
    jQuery('.owl-carousel.droppable-slider').data('owlCarousel').destroy();
    jQuery('.owl-carousel.droppable-slider').trigger('destroy.droppable-slider');

    jQuery('.owl-carousel.droppable-slider').owlCarousel({
      margin: 3,
      loop: false,
      items: 5,
      nav: true,
      responsive: {
        0: {
          items: 1
        },
        320: {
          items: 3
        },
        480: {
          items: 3
        },
        767: {
          items: 4
        },
        992: {
          items: 4
        },
        1000: {
          items: 5,
        },
        1150: {
          items: 5,
        }
      }
    })
  }


}

function dragStart(event)
{
  // event.dataTransfer.setData("Text", event.target.id);
  // event.dataTransfer.setData("Text", jQuery(event.target).attr('src'));
  // console.log("Start Dragg...." + event.target.id);

  // jQuery('.droptarget').animate({bottom: 0}, 'fast');
}

function dragging(event)
{
  // console.log("Start Dragg 1");
  // document.getElementById("demo").innerHTML = "The p element is being dragged";
}

function allowDrop(event)
{
  event.preventDefault();
  // console.log("Allow Dropped => " + event.target.id);
}

/*function drop(event) {
 event.preventDefault();
 var data = event.dataTransfer.getData("Text");
 event.target.appendChild(document.getElementById(data));
 document.getElementById("demo").innerHTML = "The p element was dropped";
 }*/

function drop(ev)
{
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");
  // alert(data)

  /* If you use DOM manipulation functions, their default behaviour it not to 
   copy but to alter and move elements. By appending a ".cloneNode(true)", 
   you will not move the original element, but create a copy. */
  // var nodeCopy = document.getElementById(data).cloneNode(true);
  // nodeCopy.id = "newId"; /* We cannot use the same ID */

  if (jQuery('.photo_mood img[src="' + data + '"]').size() > 0)
  {
    // do nothing
    return false;
  }
  else
  {
    $html = '<div class="photo_mood">';
    $html += '<a href="javascript:void(0);" class="photo_close"><img src="' + object_name.templateUrl + '/images/img_close_icon.png" width="10" height="10"></a>';
    $html += '<img src="' + data + '" width="100%" height="60" class="item_img"/>';
    $html += '<div class="clearfix"></div>';
    $html += '</div>';
    jQuery(ev.target).append($html);
  }


}

