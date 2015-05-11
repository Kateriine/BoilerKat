jQuery(document).ready(function($) {

  $respImg = $('.resp-image');
  $respImgBg = $('.resp-img-bg');

  if($('.video-js').length !=0){
    videojs.options.flash.swf = "video-js.swf";
  }

    /* Hack IE10 */
    if (Function('/*@cc_on return document.documentMode===10@*/')()){
        document.documentElement.className+=' ie10';
        document.documentElement.className+=' ie';     
    }
    // //Show/hide Offcanvas button effect

    // $('.uk-button-offcanvas').on('click', function(){ 
    //   $(this).toggleClass('checked');
    // })

    //Table responsive
    if($('.table-responsive').length !==0 ){ 
      var $tCont = $('.table-responsive'),
            $table = $tCont.find('table'),
            $fixedColumn;
        //Make a clone of our table

      $table.each(function(){
          var $t = $(this); 
          $t.attr({'style': '', 'width': '', 'height': ''}).addClass('uk-table');  
          $t.find('tr:first-child > td').wrapInner("<div class='td-title'></div>")  
          var w = $t.find('tbody > tr:last-child').find('td:first-child').outerWidth();
             
            $fixedColumn = $t.clone().insertBefore($t).addClass('fixed-column');

            //Remove everything except for first column
            $fixedColumn.find('th:not(:first-child),td:not(:first-child)').remove();

            //Match the height of the rows to that of the original table's
            $fixedColumn.find('tr').each(function (i, elem) {
                $(this).find('th, td').outerHeight($t.find('tr:eq(' + i + ')').find('th, td').outerHeight());
                $(this).find('th, td').innerWidth(w);
            }); 

       });
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

    Modernizr.addTest('androidStock', function () {
      var nua = navigator.userAgent;
      var is_android = ((nua.indexOf('Mozilla/5.0') > -1 && nua.indexOf('Android ') > -1 && nua.indexOf('AppleWebKit') > -1) && !(nua.indexOf('Chrome') > -1)); 
       return is_android;
    });

});

