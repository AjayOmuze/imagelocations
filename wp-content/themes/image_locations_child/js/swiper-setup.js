// intilize swippers

if (jQuery('.swiper-container.moodboard-swiper').size() > 0)
{
  var swiper = new Swiper('.swiper-container.moodboard-swiper', {
	pagination: null,
	scrollbar: '.swiper-container.moodboard-swiper .swiper-scrollbar-moodboard',
	scrollbarHide: false,
	scrollbarDraggable: true,
	scrollbarSnapOnRelease: true,
	nextButton: '.swiper-container.moodboard-swiper .swiper-button-next',
	prevButton: '.swiper-container.moodboard-swiper .swiper-button-prev',
	slidesPerView: 'auto',
	paginationClickable: true,
	spaceBetween: 3,
	freeMode: true,
	grabCursor: true,
	preloadImages: true,
	paginationHide: true,
	updateOnImagesReady: true,
	observer: true,
	onReachEnd: function (swiperObj) {

	  var total_images = 10;
	  var i = 0;

	  jQuery('.swiper-container.moodboard-swiper .lazy-slides').each(function () {

		if (i < total_images) {

		  var temp_src = jQuery(this).data('lazy_src');
		  var a_id = jQuery(this).data('a_id');
		  var drag_image = jQuery(this).data('drag_image');
		  var thumb_id = jQuery(this).data('thumb_id');

		  if (temp_src != "") {
			swiperObj.appendSlide('<div class="swiper-slide"><img id="' + drag_image + '" data-thumb="' + thumb_id + '" class="swiper-lazy1 img-responsive" src="' + temp_src + '" /><a data-id="' + a_id + '" class="btn btn-add-moodboard" style="display: none;"></a></div>');
			jQuery(this).remove();
		  }

		}

		i++;

	  });

	}

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
  });
}

if (jQuery('.swiper-container.advance-search-result').size() > 0)
{
  jQuery('.swiper-container.advance-search-result').each(function (index, element) {

	var swiper6 = new Swiper('.swiper-container.advance-search-result-' + index, {
	  pagination: null,
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

if (jQuery('.swiper-container.category-new').size() > 0)
{
  jQuery('.swiper-container.category-new').each(function (index, element) {

	var swiper3 = new Swiper('.swiper-container.category-new-' + index, {
	  pagination: null,
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
	  onReachEnd: function (swiperObj) {

		var total_images = 10;
		var i = 0;

		jQuery('.swiper-container.category-new-' + index + ' .lazy-slides').each(function () {

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

if (jQuery('.swiper-container.category-exclusive').size() > 0)
{
  jQuery('.swiper-container.category-exclusive').each(function (index, element) {

	var swiper4 = new Swiper('.swiper-container.category-exclusive-' + index, {
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
  });
}

if (jQuery('.swiper-container.single-project').size() > 0)
{
  jQuery('.swiper-container.single-project').each(function (index, element) {

	var swiper4 = new Swiper('.swiper-container.single-project-' + index, {
	  pagination: null,
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

	var single_swiper = new Swiper('.swiper-container.single-permits-' + index, {
	  pagination: null,
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
