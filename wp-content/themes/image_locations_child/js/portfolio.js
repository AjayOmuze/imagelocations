/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


jQuery(window).load(function () {

  (function ($) {
    $.fn.imagesLoaded = function (options) {
      var images = this.find("img"),
              loadedImages = [],
              options = options;

      images.each(function (i, image) {
        function loaded() {
          loadedImages.push(this);
          if (options.imageLoaded) {
            options.imageLoaded(this);
          }
          if (loadedImages.length == images.length) {
            if (options.complete) {
              options.complete(loadedImages);
            }
          }
        }

        if (image.complete) {
          loaded.call(image);
        } else {
          $(image).load(loaded);
        }
      });
    }
  })(jQuery);


  function Counter() {
    this.ItemCounter = 0;
    this.options = [
      ['recent-projects', 0],
      ['magazines', 0],
      ['motion-pictures', 0],
      ['fashion', 0],
      ['television', 0],
      ['advertising', 0],
      ['music', 0],
      ['web-series', 0],
      ['2015', '2015'],
      ['2014', '2014'],
      ['2013', '2013'],
      ['2012', '2012'],
      ['2011', '2011'],
      ['2010', '2010'],
    ];
    this.OptionsTotal = options.length

  }

  var ItemCounter = 0;

  var options = [
    ['recent-projects', 0],
    ['magazines', 0],
    ['motion-pictures', 0],
    ['fashion', 0],
    ['television', 0],
    ['advertising', 0],
    ['music', 0],
    ['web-series', 0],
    ['2015', '2015'],
    ['2014', '2014'],
    ['2013', '2013'],
    ['2012', '2012'],
    ['2011', '2011'],
    ['2010', '2010'],
  ];

  var OptionsTotal = options.length;

  var counterVar = new Counter();

  function get_category_posts_html(project_category, age) {

    //alert(project_category + ' - ' + age);

    if (jQuery('.loading-div-' + project_category).size() > 0) {
      jQuery('.loading-div-' + project_category).show();
    }

    // This does the ajax request

    var ajax_path = object_name.siteurl + '/wp-admin/admin-ajax.php';

    jQuery.ajax({
      global: false,
      url: ajax_path,
      type: 'post',
      data: {
        'action': 'portfolio_ajax_request',
        'project_category': project_category,
        'age': age
      },
      success: function (data) {
        jQuery('.' + project_category).html(data);

        jQuery('.' + project_category).imagesLoaded({
          complete: function (images) {
            jQuery('#' + project_category).waterfall();
            jQuery('#' + project_category).show();

            // hide loader
            if (jQuery('.loading-div-' + project_category).size() > 0) {
              jQuery('.loading-div-' + project_category).hide();
            }


            ItemCounter++;
            counterVar.ItemCounter++;

            //alert(counterVar.ItemCounter + ' - ' + counterVar.OptionsTotal);

            //alert ('Here - ' + ItemCounter + ' < ' + OptionsTotal)
            if (counterVar.ItemCounter < counterVar.OptionsTotal)
            {
              setTimeout(function () {
                get_category_posts_html(counterVar.options[counterVar.ItemCounter][0], counterVar.options[counterVar.ItemCounter][1])
              }, 500);

            }

          }
        });




      },
      error: function (errorThrown) {
        console.log(errorThrown);
        alert(errorThrown);
      }
    });
  }

  get_category_posts_html(options[0][0], options[0][1]);
  //get_category_posts_html(options[1][0], options[1][1]);



  // waterfall script [end]
  jQuery('.faq_sec').show();

})
