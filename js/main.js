$( document ).ready(function() {

    var $elems = $("html, body");
    var delta = 0;
    var seta = 0;

    $('#content').on("mousemove", function(e) {
        var h = $(window).height();
        var y = e.clientY - h / 2;
        delta = y * 0.015;

        var w = $(window).width();
        var x = e.clientX - w / 2;
        seta = x * 0.015;
    });

    $(window).on("blur mouseleave", function() {
        delta = 0;
        seta = 0;
    });

    (function f() {
        if(delta) {
            $elems.scrollTop(function(i, v) {
                return v + delta;
            });
        }
        if(seta) {
            $elems.scrollLeft(function(i, v) {
                return v + seta;
            });
        }
        window.requestAnimationFrame(f);
    })();

    /* random landing
     --------------------------------------------------*/
    $(function() {
        var randomX = Math.floor((Math.random() * 2200) + 1);
        var randomY = Math.floor((Math.random() * 1200) + 1);

        $(document).scrollTop(randomX);
        $(document).scrollLeft(randomY);
    });
    /* set interval
     --------------------------------------------------*/




    var bar = new ProgressBar.Circle(loading_circle, {
        color: '#C7C7C7',
        // This has to be the same size as the maximum width to
        // prevent clipping
        strokeWidth: 2,
        trailWidth: 1,
        easing: 'easeInOut',
        duration: 1400,
        text: {
            autoStyleContainer: false
        },
        from: { color: '#F3F3F3', width: 1 },
        to: { color: '#C7C7C7', width: 2 },
        // Set default step function for all animate calls
        step: function(state, circle) {
            circle.path.setAttribute('stroke', state.color);
            circle.path.setAttribute('stroke-width', state.width);

            var value = Math.round(circle.value() * 100);
            if (value === 0) {
            } else if(value === 100 ) {
                loading_mbl.addClass('animate');
                index_loading();
            }

        }
    });
    var loading_symbol_inner = $('.loading_symbol_inner');
    var loading_logotype = $('.loading_logotype');
    var loading_mbl = $('.loading_mbl');
    var cnt = 1;
    loading_logotype.hide();

    $('#work_wrapper').addClass('blur');
    $('#work_wrapper').imagesLoaded()
        .always( function( instance ) {

            bar.animate(1.0);  // Number from 0.0 to 1.0

        })
        .done( function( instance ) {
            console.log('all images successfully loaded');

            $('#preloader_wrapper').delay( 2500 ).fadeOut( 2000 , function(){
                $('#work_wrapper').delay(2500).removeClass('blur');
            });
        })
        .fail( function() {
            console.log('all images loaded, at least one is broken');
        })
        .progress( function( instance, image ) {
            cnt++;
            var result = image.isLoaded ? 'loaded' : 'broken';
            console.log( 'image is ' + result + ' for ' + image.img.src );
            console.log(cnt);
        });

    window.onload  = function() {
        document.documentElement.style.overflow = 'hidden';	// firefox, chrome
        document.body.scroll = 'no';	// ie only
    }

    function index_loading(){

        loading_logotype.fadeIn(500, function(){
            loading_symbol_inner.animate({ "top": "48%" }, 500);
            loading_logotype.animate({ "top": "57%" }, 500);
            // loading_symbol_inner.addClass('animate');
            // loading_logotype.addClass('animate');

        });
    }
});

/* mouse move */