(function(iniframe){

    window.CustomizerForceUpdate = true;

    window.less = { env: "development" };

    document.writeln('<script src="vendor/holder.js"></script>');
    document.writeln('<script src="vendor/less.js"></script>');
    document.writeln('<script src="vendor/jquery.less.js"></script>');
    document.writeln('<script src="vendor/jquery.rtl.js"></script>');
    document.writeln('<script src="../js/core.js"></script>');
    document.writeln('<script src="../js/component.js"></script>');
    document.writeln('<script src="../js/utility.js"></script>');
    document.writeln('<script src="../js/alert.js"></script>');
    document.writeln('<script src="../js/button.js"></script>');
    document.writeln('<script src="../js/dropdown.js"></script>');
    document.writeln('<script src="../js/grid.js"></script>');
    document.writeln('<script src="../js/modal.js"></script>');
    document.writeln('<script src="../js/nav.js"></script>');
    document.writeln('<script src="../js/offcanvas.js"></script>');
    document.writeln('<script src="../js/scrollspy.js"></script>');
    document.writeln('<script src="../js/smooth-scroll.js"></script>');
    document.writeln('<script src="../js/touch.js"></script>');
    document.writeln('<script src="../js/switcher.js"></script>');
    document.writeln('<script src="../js/tab.js"></script>');
    document.writeln('<script src="../js/tooltip.js"></script>');
    document.writeln('<script src="../js/toggle.js"></script>');
    document.writeln('<link rel="stylesheet" href="../../dist/css/uikit.min.css" data-compiled-css>');
    document.writeln('<style>body{ visibility: hidden; }</style>');

    var tests = [
            "alert",
            "animation",
            "article",
            "badge",
            "base",
            "breadcrumb",
            "button",
            "close",
            "comment",
            "description-list",
            "dropdown",
            "form",
            "grid",
            "icon",
            "list",
            "modal",
            "nav",
            "navbar",
            "normalize",
            "offcanvas",
            "overlay",
            "pagination",
            "panel",
            "progress",
            "scrollspy",
            "smooth-scroll",
            "subnav",
            "switcher",
            "tab",
            "table",
            "text",
            "thumbnail",
            "toggle",
            "tooltip",
            "utility"
        ],
        themes = {
            "Default":"../../themes/default/default/uikit.less",
            "Almost Flat":"../../themes/default/almost-flat/uikit.less",
            "Gradient":"../../themes/default/gradient/uikit.less"
        },
        theme      = localStorage["uikit.theme"] || 'Default',
        direction  = localStorage["uikit.direction"] || 'ltr';


    $(function(){


        var incustomizer = (iniframe && !window.parent.themes);

        themes = $.extend(themes, window.parent.themes ? window.parent.themes:{});
        theme  = themes[theme] ? theme : 'Default';

        var testfolder = $("script[src$='_test.js']").attr("src").replace("_test.js", ""),

            testselect = $('<select><option value="">- Select Test -</option><option value="overview.html">Overview</option></select>').css("margin", "20px 5px"),
            optgroup   = $('<optgroup label="Components"></optgroup>').appendTo(testselect);


        $.each(tests.sort(), function(){
            var value = this, name  = value.charAt(0).toUpperCase() + value.slice(1);

            optgroup.append('<option value="'+value+'.html">'+name+'</option>');
        });

        testselect.val(testselect.find("option[value='"+location.href.split("/").slice(-1)[0]+"']").attr("value")).on("change", function(){
                if(testselect.val()) location.href = testfolder+testselect.val();
        });

        $(".uk-container").prepend(testselect);

        if(incustomizer) {
            $("body").css("visibility", "visible");
            return;
        }

        // themes

        $.get("../../themes/themes.json", {nocache:Math.random()}).always(function(data, type){

            if (type==="success") {

                themes = {
                    "UIkit": "../less/uikit.less"
                };

                data.forEach(function(item){
                    themes[item.name] = '../'+item.url;
                });
            }

            theme  = localStorage["uikit.theme"] || 'Default';
            theme  = themes[theme] ? theme : 'Default';

            render();
        });

        function render() {

               

                // less

                $.less.getCSS('@import "'+(themes[theme])+'";', {imports:true}).done(function(css) {

                    if (direction == 'rtl') {
                        css = $.rtl.convert2RTL(css);
                        $('html').prop('dir', 'rtl');
                    }

                    $("[data-compiled-css]").replaceWith('<style data-compiled-css>'+css+'</style>');

                    setTimeout(function() { $("body").css("visibility", "visible"); $(window).trigger("resize"); }, 50);

                }).fail(function(e) {
                    $(".uk-container").prepend('<div style="border: 1px solid rgb(238, 0, 0);background:rgb(238, 238, 238); border-radius: 5px; color: rgb(238, 0, 0); padding: 15px; margin-bottom: 15px;">'+e.message+" in file "+e.filename+'</div>');
                    $("body").css("visibility", "visible");
                });
        }
    });

})(window !== window.parent);