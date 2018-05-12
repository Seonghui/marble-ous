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
    $(function() {
        setInterval(function(){
            //indicator
            var marginW = $('.content_bg').outerWidth(true);
            var marginH = $('.content_bg').outerHeight(true);

            var spaceW = (marginW-2200)/2;
            var spaceH = (marginH-2200)/2;

            $( ".grid_wrapper" ).on( "mousemove", function( event ) {
                var mouseX = event.pageX;
                var mouseY = event.pageY;

                var indiX = mouseX - spaceW;
                var indiY = mouseY - spaceH;

                $('.indi_1 > .indi_tri').css('left', (indiY/12)-10);
                $('.indi_2 > .indi_tri').css('left', (indiX/12)-10);

                $('.mini_navi').css('top', Math.ceil((indiY/12)));
                $('.mini_navi').css('left', Math.ceil((indiX/12)));
            });

            //up-leftFlag
            var upLeftX = $('#up-leftFlag').offset().left;
            var upLeftY = $('#up-leftFlag').offset().top;
            //up-rightFlag
            var upRightX = $('#up-rightFlag').offset().left;
            var upRightY = $('#up-rightFlag').offset().top;
            //down-leftFlag
            var downLeftY = $('#down-leftFlag').offset().top;

            var width = $( window ).width();
            var upLeftX_left = parseInt($('#up-leftFlag').css('left'),10);
            var upLeftX_top = parseInt($('#up-leftFlag').css('top'),10);
            var downLeftX_top = parseInt($('#down-leftFlag').css('top'),10);

            var mini_width = (width - (upLeftX_left * 2 )) / 10;
            var mini_height = (downLeftX_top - upLeftX_top) / 10;

            $('.mini_navi').css('width', Math.ceil(mini_width/1.8));
            $('.mini_navi').css('height', Math.ceil(mini_height/1.8));

            for(var i=1; i<=num; i++){
                var team = $('#team_wrapper_' + i);
                var teamY = team.offset().top + team.height()/2;
                var teamX = team.offset().left + team.width()/2;
                if(upLeftX<=teamX && teamX<=upRightX && upLeftY<=teamY && teamY<=downLeftY){
                    $('.content_list #team_img_' + i).css('width','134px');
                    $('.content_list #team_wrapper_' + i + ' .team_txt').css('opacity','1');
                    $('.content_list #team_img_' + i).attr('src', 'images/upload/'+ i +'/team_symbol.gif');
                    $('.content_list .cw_' + i).delay(800).queue(function(next) {
                        $(this).fadeIn(500, function() {
                            $(this).addClass("on");
                        });
                        next();
                    });
                }else{
                    $('.content_list #team_img_' + i).css('width','23px');
                    $('.content_list #team_wrapper_' + i + ' .team_txt').css('opacity','0');
                    $('.content_list #team_img_' + i).attr('src', 'images/thumb_dummy.png');
                    $('.content_list .cw_' + i).fadeOut(10, function() {
                        $(this).removeClass('on');
                    });

                };
            }
        },2500);
    });



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

            // $('#preloader_wrapper').delay( 4000 ).fadeOut( 2000 , function(){
            //     $('#work_wrapper').delay(4000).removeClass('blur');
            // });
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
        loading_logotype.fadeIn(500, function () {
            $('#preloader_wrapper').addClass('blur');
        });
    }
});

/* mouse move */