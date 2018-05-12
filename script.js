var num = 42;
$( document ).ready(function() {

    $('.sidebar_loading').hide();

    $(document).animateScroll();

    /* loading */
    setTimeout(function(){
        $(".loading-img").fadeOut("slow");
    }, 1500);

    /* work search */
    $('#input_search').keyup(function(){
        $('#indicator').addClass('mute');
        $('#work_map').addClass('mute');
        $('#search_bg').addClass("on");
        $('.search_del').addClass("on");
        $('#search_result').addClass("animate");
        $('.content_list .teamImg-setting').addClass('off');

        $( ".search_del" ).click(function() {
            $('#input_search').val('');
            $('#search_bg').removeClass("on");
            $('#search_result').removeClass("on");
            $('#search_result').removeClass("animate");
            $('#indicator').removeClass('mute');
            $('#work_map').removeClass('mute');
            $('.search_del').removeClass("on");
            $('.content_list .teamImg-setting').removeClass('off');

        });

        $('.filter_circle_1').removeClass('on');
        $('.filter_circle_2').removeClass('on');
        $('.filter_circle_3').removeClass('on');
        $('.filter_circle_4').removeClass('on');
        $('.filter_circle_5').removeClass('on');

        $('.content_list .teamImg-setting').attr('src', 'images/dot.png');

        var radioValue = $( ":radio[name='work']:checked" ).val();
        if(radioValue!='all'){
            $("input:radio[name='work']").removeAttr('checked');
            $("input:radio[name='work']:radio[value='all']").prop("checked", true);
            $("input:radio[name='work']:checked").val();
        }

        var txt = $(this).val();
        if(txt != '') {
            $('#search_result').addClass("on");
            $('#search_result').addClass("animate");
            $.ajax({
                url:"search.php",
                method:"post",
                data:{search:txt},
                dataType:"text",
                success:function(data)
                {
                    $('#search_result').html(data);
                }
            });
        }else{
            $('#search_bg').removeClass("on");
            $('#search_result').removeClass("on");
            $('#search_result').removeClass("animate");
            $('#indicator').removeClass('mute');
            $('#work_map').removeClass('mute');
            $('.search_del').removeClass("on");
            $('.content_list .teamImg-setting').removeClass('off');
            $('#search_result').html('');
            for(var i=1; i<=num; i++){
                $('.content_list #team_img_' + i).attr('src', 'images/upload/' + i + '/team_symbol.gif');
            }
        }
    });

    /* work filter */
    $( '#work_filter input' ).on( "click", function() {
        $('#indicator').addClass('mute');
        $('#work_map').addClass('mute');
        $('#search_bg').addClass("on");
        $('.content_list .teamImg-setting').addClass('off');


        var filter = $( ":radio[name='work']:checked" ).val();
        if(filter=="all"){
            $('.filter_circle_1').removeClass('on');
            $('.filter_circle_2').removeClass('on');
            $('.filter_circle_3').removeClass('on');
            $('.filter_circle_4').removeClass('on');
            $('.filter_circle_5').removeClass('on');
        }
        if(filter=="vr"){
            $('.filter_circle_1').addClass('on');
        }else{
            $('.filter_circle_1').removeClass('on');
        }
        if(filter=="pc"){
            $('.filter_circle_2').addClass('on');
        }else{
            $('.filter_circle_2').removeClass('on');
        }
        if(filter=="mg"){
            $('.filter_circle_3').addClass('on');
        }else{
            $('.filter_circle_3').removeClass('on');
        }
        if(filter=="mobile"){
            $('.filter_circle_4').addClass('on');
        }else{
            $('.filter_circle_4').removeClass('on');
        }
        if(filter=="web"){
            $('.filter_circle_5').addClass('on');
        }else{
            $('.filter_circle_5').removeClass('on');
        }

        var searchValue =  $('#input_search').val();

        if(searchValue!=''){
            $('#input_search').val('');
        }

        if(filter=='all'){
            filter='';
        }

        if(filter != '') {
            $('#search_result').addClass("on");
            $('#search_result').delay(800).queue(function(next) {
                $(this).fadeIn(500, function() {
                    $(this).addClass("animate");
                });
                next();
            });

            $.ajax({
                url:"filter.php",
                method:"post",
                data:{filter:filter},
                dataType:"text",
                success:function(data)
                {
                    $('#search_result').html(data);
                },beforeSend:function(){
                    $('.sidebar_loading').addClass('on');
                }
                ,complete:function(){
                    // $('.sidebar_loading').removeClass('on');
                }
            });
        }else{
            $('#search_bg').removeClass("on");
            $('#search_result').delay(800).queue(function(next) {
                $(this).fadeIn(500, function() {
                    $(this).removeClass("on");
                });
                next();
            });
            $('#search_result').removeClass("animate");
            $('#indicator').removeClass('mute');
            $('#work_map').removeClass('mute');
            $('.content_list .teamImg-setting').removeClass('off');
            $('.search_list .team-setting').removeClass('animate');
            $('#search_result').html('');
            for(var i=1; i<=num; i++){
                $('.content_list #team_img_' + i).attr('src', 'images/upload/' + i + '/team_symbol.gif');
            }
        }
    });

    /* designer search */
    $('#input_search_designer').keyup(function(){
        $('.search_del').addClass("on");

        var txt = $(this).val();

        if(txt.length > 2){
            txt = $(this).val();
            $(".designer_circle > p").removeClass("muteOff");
            $(".designer_circle:contains('" + txt + "') > .pic_b").addClass("on");
            $(".designer_circle:contains('" + txt + "') > .pic_a").addClass("off");
        }else if(txt == "한원"){
            $(".designer_circle > p").removeClass("muteOff");
            $(".designer_circle:contains('" + txt + "') > .pic_b").addClass("on");
            $(".designer_circle:contains('" + txt + "') > .pic_a").addClass("off");
        }else{
            txt = '';
            $(".designer_circle > .pic_b").removeClass("on");
            $(".designer_circle:contains('" + txt + "') > .pic_a").removeClass("off");
        }
        $( ".search_del" ).click(function() {
            $('#input_search_designer').val('');
            $('.search_del').removeClass("on");
            $(".designer_circle:contains('" + txt + "') > .pic_b").removeClass("on");
            $(".designer_circle:contains('" + txt + "') > .pic_a").removeClass("off");
        });

        if(txt != '') {
            var offset = $(".designer_circle:contains('" + txt + "')").offset();
            $('html, body').animate({scrollTop : offset.top - 300}, 400);
            $(".designer_circle:contains('" + txt + "') > .designer_name").addClass("muteOff");

            var info_email = $(".designer_circle:contains('" + txt + "') > .info_email_txt").text();
            var info_site = $(".designer_circle:contains('" + txt + "') > .info_site_txt").text();
            var info_think = $(".designer_circle:contains('" + txt + "') > .info_think_txt").text();

            $('#info_output').html(info_email + '<br/>' + info_site);
            $('#thought_output').html(info_think);

        }else{
            $('.search_del').removeClass("on");
            $('#search_result').html('');
        }
    });

    $('.search_btn').click(function() {
        $('.header_search').addClass('on');
    });
    $('.header_search_del').click(function() {
        $('.header_search').removeClass('on');
        $('.ie_content_list > li').css('opacity', '1');
    });

    /* work_ie search */
    $('.index_ie_search_wrapper > .header_search > .search_inner > input').keyup(function(){

        $('.ie_content_list > li').css('opacity', '0.2');
        var txt = $(this).val();

        if(txt.length > 2){
            txt = $(this).val();
        }else{
            txt = '';
            $('.ie_content_list > li').css('opacity', '1');
        }
        $( ".header_search_del" ).click(function() {
            $('.index_ie_search_wrapper > .header_search > .search_inner > input').val('');
        });

        if(txt != '') {
            console.log(txt);
            var offset = $(".ie_content_list .team-setting:contains('" + txt + "')").offset();
            $(".ie_content_list .team-setting:contains('" + txt + "')").addClass('muteOff');
            $('html, body').animate({scrollTop: offset.top - 350}, 400);

        }else{
            $(".ie_content_list .team-setting:contains('" + txt + "')").removeClass('muteOff');
        }
    });

    /* designer_mobile_search */
    $('.designer_search_wrapper > .header_search > .search_inner > input').keyup(function(){

        var txt = $(this).val();

        if(txt.length > 2){
            txt = $(this).val();
            $(".designer_circle > p").removeClass("muteOff");
            $(".designer_circle:contains('" + txt + "') > .pic_b").addClass("on");
            $(".designer_circle:contains('" + txt + "') > .pic_a").addClass("off");
        }else if(txt == "한원"){
            $(".designer_circle > p").removeClass("muteOff");
            $(".designer_circle:contains('" + txt + "') > .pic_b").addClass("on");
            $(".designer_circle:contains('" + txt + "') > .pic_a").addClass("off");
        }else{
            txt = '';
            $(".designer_circle > .pic_b").removeClass("on");
            $(".designer_circle:contains('" + txt + "') > .pic_a").removeClass("off");
        }
        $( ".search_del" ).click(function() {
            $('.designer_search_wrapper > .header_search > .search_inner > input').val('');
            $(".designer_circle:contains('" + txt + "') > .pic_b").removeClass("on");
            $(".designer_circle:contains('" + txt + "') > .pic_a").removeClass("off");
        });

        $( ".header_search_del" ).click(function() {
            $('.designer_search_wrapper > .header_search > .search_inner > input').val('');
            $(".designer_circle:contains('" + txt + "') > .pic_b").removeClass("on");
            $(".designer_circle:contains('" + txt + "') > .pic_a").removeClass("off");
        });

        if(txt != '') {
            var offset = $(".designer_circle:contains('" + txt + "')").offset();
            $('html, body').animate({scrollTop : offset.top - 300}, 400);
            $(".designer_circle:contains('" + txt + "') > .designer_name").addClass("muteOff");

            var info_email = $(".designer_circle:contains('" + txt + "') > .info_email_txt").text();
            var info_site = $(".designer_circle:contains('" + txt + "') > .info_site_txt").text();
            var info_think = $(".designer_circle:contains('" + txt + "') > .info_think_txt").text();

            $('#info_output').html(info_email + '<br/>' + info_site);
            $('#thought_output').html(info_think);
        }
    });

    /* ie filter */
    $( '#work_ie_filter input' ).on( "click", function() {
        $('.ie_content_list').addClass('off');
        $('#ie_filter_result').addClass('on');

        var filter = $( ":radio[name='ie_work']:checked" ).val();

        console.log(filter);

        var searchValue =  $('#input_search').val();

        if(searchValue!=''){
            $('#input_search').val('');
        }

        if(filter=='all'){
            filter='';
        }

        if(filter != '') {
            $.ajax({
                url:"ie_filter.php",
                method:"post",
                data:{filter:filter},
                dataType:"text",
                success:function(data)
                {
                    $('#ie_filter_result').html(data);
                }
            });
        }else{
            $('#ie_filter_result').html('');
            $('.ie_content_list').removeClass('off');
            $('#ie_filter_result').removeClass('on');
        }
    });
});

