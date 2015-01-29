jQuery(document).ready(function($) {

	//var 
  // navEvent = false,
  //   $navbar = $('.navbar'),
  //   $nav = $navbar.find('.uk-navbar-nav'),
  //   $toggleNav = $navbar.find('.uk-navbar-toggle'),
  //   menuEvent = false,
  //   menuOpen = false,
  //   $submenu = $('.uk-navbar-nav').find('.sub-menu'),
  //   $susmenu = $submenu.parent(),

  $respImg = $('.resp-image');
  $respImgBg = $('.resp-img-bg');

    /* Hack IE10 */
    if (Function('/*@cc_on return document.documentMode===10@*/')()){
        document.documentElement.className+=' ie10';
        document.documentElement.className+=' ie';     
    }

    /* Menu */

    // function downEl(){
    //     menuOpen = !menuOpen?  true : false;
    //     $(this).find('.sub-menu').slideDown();
    // }

    // function upEl(e){
    //   var $sus = $(this);
    //   if(menuOpen){ 
    //     setTimeout(function(){
    //       menuOpen = false;
    //       $sus.find('.sub-menu').slideUp();
    //     }, 1000);
    //   }
    // }


    // function fToggleNav(e){
    //     e.preventDefault();
    //     $navbar.toggleClass('open');
    // }

    resizeSite();

    function resizeSite(){
            
      /* Dropdown: please change mobile width if needed */
      // if($(window).width()>959){
      //     if(menuEvent === false){
      //         $susmenu.on('mouseenter', downEl);
      //         $susmenu.on('mouseleave', upEl);
      //         $submenu.css('display', 'none');
      //         $nav.removeClass('open');

      //         menuEvent = true;
      //     }
      //     if(navEvent === true){
      //       $toggleNav.on('click', fToggleNav); 
      //       navEvent = false;
      //     }

      //    /* IE8 keeps mobile layout*/
      //   if($('.ie8').length!==0){
      //     $toggleNav.on('click', fToggleNav);
      //     $susmenu.off('mouseenter', downEl);
      //     $susmenu.off('mouseleave', upEl);
      //     $submenu.css('display', 'block');
      //     menuEvent = false;
      //     navEvent = true;
      //   }
      // }
      // else{
      //   if(menuEvent === true){
      //     $susmenu.off('mouseenter', downEl);
      //     $susmenu.off('mouseleave', upEl);
      //     $submenu.css('display', 'block');
          
      //     menuEvent = false;
      //   }
      //   if(navEvent === false){
      //     $toggleNav.on('click', fToggleNav);
      //     navEvent = true;
      //   }
      // }

       /* SRCs */
      if($(window).width()>1024){
          $respImgBg.each(function(){
            $(this).css({
              'background-image': 'url('+$(this).attr('data-desk')+')'
            }); 
          });
          $respImg.each(function(){
            $(this).attr('src', $(this).attr('data-desk')); 
          });
        }

        
        else{
          $respImgBg.each(function(){
            $(this).css({
              'background-image': 'url('+ $(this).attr('data-smart')+')'
            }); 
          });
          $respImg.each(function(){
            $(this).attr('src', $(this).attr('data-smart')); 
          });
        }
    }

    (function($,sr){
     
      // debouncing function from John Hann
      // http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
      var debounce = function (func, threshold, execAsap) {
          var timeout;
     
          return function debounced () {
              var obj = this, args = arguments;
              function delayed () {
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
        jQuery.fn[sr] = function(fn){  return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };
     
    })(jQuery,'smartresize');
     
     
    // usage:
    $(window).smartresize(function(){
        resizeSite();
    });

});

