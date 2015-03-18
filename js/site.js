jQuery(document).ready(function($) {

  $respImg = $('.resp-image');
  $respImgBg = $('.resp-img-bg');

    /* Hack IE10 */
    if (Function('/*@cc_on return document.documentMode===10@*/')()){
        document.documentElement.className+=' ie10';
        document.documentElement.className+=' ie';     
    }

    resizeSite();

    function resizeSite(){
            
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

