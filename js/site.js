jQuery(document).ready(function($) {
  var adam = {
    init: function() {
      var that = this
      if ($('.video-js').length != 0) {
        videojs.options.flash.swf = "video-js.swf";
      }

      /* Hack IE10 */
      if (Function('/*@cc_on return document.documentMode===10@*/')()) {
        document.documentElement.className += ' ie10';
        document.documentElement.className += ' ie';
      }
 //   $('.popup').on("click",function(e){
 //     e.preventDefault();
 //     var $pop = $(this);
 //     that._popupCenter($pop.attr('href'), $pop.find('.text').html(), 580, 470);
 //   });

      if($('.acf-slider').length != 0) {
        $('.acf-slider').each(function() {
          var $acfSlider = $(this),
              sToShow = $acfSlider.data('slides-to-show'), 
              idSlider = '#'+ $acfSlider.attr('id'), 
              args = {
                  infinite: true,
                  speed: 500,
                  cssEase: 'linear'
                }
              if(sToShow > 1) {
                args.slidesToShow = sToShow;
                args.centerMode = true;
                args.slidesToScroll = sToShow;
                args.responsive = [    
                  {
                    breakpoint: 767,
                    settings: {
                      slidesToShow: 2,
                      slidesToScroll: 2
                    }
                  },
                  {
                    breakpoint: 480,
                    settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1
                    }
                  }
                ];
              }
              $(idSlider).slick(args);
        })
      }
      //Table responsive
      if ($('.table-responsive').length !== 0) {
        var $tCont = $('.table-responsive'),
          $table = $tCont.find('table'),
          $fixedColumn;
        //Make a clone of our table

        $table.each(function() {
          var $t = $(this);
          $t.attr({
            'style': '',
            'width': '',
            'height': ''
          }).addClass('uk-table');
          $t.find('tr:first-child > td').wrapInner("<div class='td-title'></div>")
          var w = $t.find('tbody > tr:last-child').find('td:first-child').outerWidth();

          $fixedColumn = $t.clone().insertBefore($t).addClass('fixed-column');

          //Remove everything except for first column
          $fixedColumn.find('th:not(:first-child),td:not(:first-child)').remove();

          //Match the height of the rows to that of the original table's
          $fixedColumn.find('tr').each(function(i, elem) {
            $(this).find('th, td').outerHeight($t.find('tr:eq(' + i + ')').find('th, td').outerHeight());
            $(this).find('th, td').innerWidth(w);
          });

        });
      }
      that._resizeSite();

      // usage:
      $(window).smartresize(function() {
        that._resizeSite();
      });

    },

  //Social popup
  
    //   _popupCenter = function(url, title, w, h) {
   //   // Fixes dual-screen position                         Most browsers      Firefox
   //   var dualScreenLeft = window.screenLeft !== undefined ? window.screenLeft : screen.left;
   //   var dualScreenTop = window.screenTop !== undefined ? window.screenTop : screen.top;

   //   var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
   //   var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

   //   var left = ((width / 2) - (w / 2)) + dualScreenLeft;
   //   var top = ((height / 3) - (h / 3)) + dualScreenTop;

   //   var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

   //   // Puts focus on the newWindow
   //   if (window.focus) {
   //     newWindow.focus();
   //   }
   // },

   _resizeSite : function(){
        /* SRCs */
      // if ($(window).width() > 1024) {
      // } else {
      // }
   }

  };
  adam.init();



});

  Modernizr.addTest('androidStock', function() {
    var navU = navigator.userAgent;
    // Android Mobile
    var isAndroidMobile = navU.indexOf('Android') > -1 && navU.indexOf('Mozilla/5.0') > -1 && navU.indexOf('AppleWebKit') > -1;

    // Apple webkit
    var regExAppleWebKit = new RegExp(/AppleWebKit\/([\d.]+)/);
    var resultAppleWebKitRegEx = regExAppleWebKit.exec(navU);
    var appleWebKitVersion = (resultAppleWebKitRegEx === null ? null : parseFloat(regExAppleWebKit.exec(navU)[1]));

    // Chrome
    var regExChrome = new RegExp(/Chrome\/([\d.]+)/);
    var resultChromeRegEx = regExChrome.exec(navU);
    var chromeVersion = (resultChromeRegEx === null ? null : parseFloat(regExChrome.exec(navU)[1]));

    // Native Android Browser
    var isAndroidBrowser = isAndroidMobile && (appleWebKitVersion !== null && appleWebKitVersion < 537) || (chromeVersion !== null && chromeVersion < 37);
    return isAndroidBrowser;

  });
  (function($, sr) {

    // debouncing function from John Hann
    // http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
    var debounce = function(func, threshold, execAsap) {
        var timeout;

        return function debounced() {
          var obj = this,
            args = arguments;

          function delayed() {
            if (!execAsap)
              func.apply(obj, args);
            timeout = null;
          };

          if (timeout)
            clearTimeout(timeout);
          else if (execAsap)
            func.apply(obj, args);

          timeout = setTimeout(delayed, threshold || 800);
        };
      }
      // smartresize
    jQuery.fn[sr] = function(fn) {
      return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr);
    };

  })(jQuery, 'smartresize');
