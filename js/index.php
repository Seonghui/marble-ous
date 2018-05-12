<?php
require_once("dbconfig.php");
?>

<!doctype html>
<html lang="en">
<head>
    <?php include('head.php');?>
    <script src="js/browserDetect.js"></script>
    <script src="js/main.js"></script>
</head>
<body>
<header>
    <?php include('header.php');?>
    <div id="preloader_wrapper">
        <div class="loading_symbol">
            <div class="loading_symbol_inner">
                <div id="loading_circle"></div>
                <img class="loading_mbl" src="images/default_logo.gif" alt="">
            </div>
        </div>
        <img class="loading_logotype" src="images/logo_w.png" alt="">
    </div>
</header>
<div id="search_bg">
    <div id="search_result">
        <div class="sidebar_loading">
            <img src="images/sidebar_loading.svg" />
        </div>
    </div>

</div>

<div id="work_wrapper">
    <div id="work_sidebar">
        <div id="work_sidebar_right">
            <div id="work_search">
                <img class="search_logo" src="images/icon_search.png" alt="search">
                <img class="search_del" src="images/icon_search_del.png" alt="search_del">
                <input type='text' id='input_search' placeholder='Search' onkeyup='{return false}' onkeypress='javascript:if(event.keyCode==13){ return false;}'>
            </div>
            <div id="filter" class="work_filter_wrapper">
                <div class="content_wrapper_title"><p>FILTER</p></div>
                <div class="content_wrapper">
                    <div id="filter_circles">
                        <div class="circle_bg"></div>
                        <svg version="1.1" id="Layer_2" width="180px" height="180px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 150 150" style="enable-background:new 0 0 150 150;" xml:space="preserve">
                            <path class="svg_circle filter_circle_1" d="M34.5,19.1c0,0,15.7-13.1,40.4-13.1s40.4,13.1,40.4,13.1"/>
                            <path class="svg_circle filter_circle_2" d="M115.3,19.1c0,0,17,10.4,25,34.1c8,23.7,0,42.7,0,42.7"/>
                            <path class="svg_circle filter_circle_3" d="M140.3,96c0,0-4.7,19.5-24.8,34.4c-20.1,14.9-40.6,13.2-40.6,13.2"/>
                            <path class="svg_circle filter_circle_4" d="M74.9,143.6c0,0-23.2,0.4-40.7-13.3S12.2,104,9.5,96.1"/>
                            <path class="svg_circle filter_circle_5" d="M9.5,96.1c0,0-7.5-20,0.1-42.8s25-34.1,25-34.1"/>
                    </div>
                    <ul id="work_filter" class="filter_radio">
                        <li>
                            <input id="all" type="radio" name="work" value="all" checked="checked">
                            <label for="all">All</label>
                        </li>
                        <li>
                            <input id="vr" type="radio" name="work" value="vr">
                            <label for="vr">VR/AR</label>
                        </li>
                        <li>
                            <input id="physical" type="radio" name="work" value="pc">
                            <label for="physical">Physical Computing</label>
                        </li>
                        <li>
                            <input id="motion" type="radio" name="work" value="mg">
                            <label for="motion">Motion Graphic</label>
                        </li>
                        <li>
                            <input id="mobile" type="radio" name="work" value="mobile">
                            <label for="mobile">Mobile</label>
                        </li>
                        <li>
                            <input id="web" type="radio" name="work" value="web">
                            <label for="web">Web</label>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!--work_sidebar_right-->
        <div id="work_sidebar_left">
            <div id="indicator">
                <div class="content_wrapper_title"><p>CHARACTER</p></div>
                <div class="content_wrapper">
                    <div class="indi_content">
                        <div class="indi_1">
                            <div class="indi_tri"></div>
                            <div class="indi_title">
                                <span class="color_fun title1">Fun</span>
                                <span class="color_ins title2">Insightful</span>
                            </div>
                        </div>
                        <div class="indi_2">
                            <div class="indi_tri"></div>
                            <div class="indi_title">
                                <span class="color_exp title1">Experimental</span>
                                <span class="color_prac title2">Practical</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="work_map">
                <div class="content_wrapper_title"><p>MINI MAP</p></div>
                <div class="content_wrapper">
                    <div id="minimap">
                        <div class="mini_navi"></div>
                        <div class="mini_hr_line"></div>
                        <div class="mini_vt_line"></div>
                        <img class="map_indi img_exp" src="images/map_E.png" alt="">
                        <img class="map_indi img_ins" src="images/map_I.png" alt="">
                        <img class="map_indi img_fun" src="images/map_F.png" alt="">
                        <img class="map_indi img_prac" src="images/map_P.png" alt="">
                        <div class="mini_dots_wrapper">
                            <?php
                            $sql = 'select * from mb_table';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc()) {
                                ?>
                                <div class="mini_dots dots_<?php echo $row['id']?>"></div>
                                <?php
                            }?>
                        </div>

                    </div>
                </div>
            </div>
        </div><!--work_sidebar_left-->
    </div>
    <div id="content">
        <div id="up-rightFlag"></div>
        <div id="up-leftFlag"></div>
        <div id="down-leftFlag"></div>

        <div id="content_grid">
            <div class="content_bg">
                <div class="grid_wrapper vertical-wrapper">
                    <div class="vertical-line"></div>
                    <div class="vertical-line"></div>
                    <div class="vertical-line"></div>
                    <div class="vertical-line"></div>
                    <div class="vertical-line"></div>
                    <div class="vertical-line"></div>
                    <div class="vertical-line"></div>
                    <div class="vertical-line"></div>
                    <div class="vertical-line"></div>
                    <div class="vertical-line"></div>
                    <div class="vertical-line vertical_line_end"></div>
                </div>
                <div class="grid_wrapper horizontal-wrapper">
                    <div class="horizontal-line horizontal_line_end"></div>
                    <div class="horizontal-line"></div>
                    <div class="horizontal-line"></div>
                    <div class="horizontal-line"></div>
                    <div class="horizontal-line"></div>
                    <div class="horizontal-line"></div>
                    <div class="horizontal-line"></div>
                    <div class="horizontal-line"></div>
                    <div class="horizontal-line"></div>
                    <div class="horizontal-line"></div>
                    <div class="horizontal-line"></div>
                </div>
                <ul class="content_list work_content_list">
                    <?php
                    $sql = 'select * from mb_table';
                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc()){
                        ?>
                        <li id="team_wrapper_<?php echo $row['id']?>" class="team-setting work_team_setting">
                            <a href="project.php?id=<?php echo $row['id']?>">
                                <img class="teamImg-setting" id="team_img_<?php echo $row['id']?>" src="images/upload/<?php echo $row['id'] ?>/team_symbol.gif">
                                <div class="circle_wrapper cw_<?php echo $row['id']?>">
                                    <svg version="1.1" id="Layer_1" width="150px" height="150px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                         viewBox="0 0 150 150" style="enable-background:new 0 0 150 150;" xml:space="preserve">
                                    <path class="svg_circle circle_1" d="M34.5,19.1c0,0,15.7-13.1,40.4-13.1s40.4,13.1,40.4,13.1"/>
                                        <path class="svg_circle circle_2" d="M115.3,19.1c0,0,17,10.4,25,34.1c8,23.7,0,42.7,0,42.7"/>
                                        <path class="svg_circle circle_3" d="M140.3,96c0,0-4.7,19.5-24.8,34.4c-20.1,14.9-40.6,13.2-40.6,13.2"/>
                                        <path class="svg_circle circle_4" d="M74.9,143.6c0,0-23.2,0.4-40.7-13.3S12.2,104,9.5,96.1"/>
                                        <path class="svg_circle circle_5" d="M9.5,96.1c0,0-7.5-20,0.1-42.8s25-34.1,25-34.1"/>
                                </div>
                            </a>
                            <div class="team_txt">
                                <p class="title"><?php echo $row['title'] ?></p>
                                <p class="description"><?php echo $row['d1_name']?> <?php echo $row['d2_name']?> <?php echo $row['d3_name']?></p>
                            </div>
                        </li>
                        <?
                    }
                    ?>
                </ul>
            </div>
        </div><!--table-->
    </div>
</div>
<footer>
    <?php include('footer.php');?>
</footer>
<script>

    /* set interval
     --------------------------------------------------*/
    var isPaused = false;
    var cnt = 0;
    $(function() {
        setInterval(setin_func ,2500);
    });
//    setInterval(setin_func ,2500);

    function setin_func(){
        if(!isPaused){
            cnt++;
            console.log(cnt);
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

        }

    }

    /* circle position
     --------------------------------------------------*/
    $(function() {
        var left = 104; //0
        var bottom = 22; //0
        <?php
        $sql = 'select * from mb_table';
        $result = $db->query($sql);
        while($row = $result->fetch_assoc()){
        ?>
        var gap_x = 219 * <?php echo $row['co_x'] ?>;
        var gap_y = 219 * <?php echo $row['co_y'] ?>;

        var isMobile = <?php echo $row['isMobile']?>;
        var isWeb = <?php echo $row['isWeb']?>;
        var isPc = <?php echo $row['isPc']?>;
        var isMg = <?php echo $row['isMg']?>;
        var isVr = <?php echo $row['isVr']?>;

        if(isVr ==1){
            $('.cw_<?php echo $row['id']?> .circle_1').addClass('on');
        }
        if(isPc ==1){
            $('.cw_<?php echo $row['id']?> .circle_2').addClass('on');
        }
        if(isMg ==1){
            $('.cw_<?php echo $row['id']?> .circle_3').addClass('on');
        }
        if(isMobile == 1){
            $('.cw_<?php echo $row['id']?> .circle_4').addClass('on');
        }
        if(isWeb ==1){
            $('.cw_<?php echo $row['id']?> .circle_5').addClass('on');
        }


        $('#team_wrapper_' + <?php echo $row['id'] ?>).css('left', left + gap_x);
        $('#team_wrapper_' + <?php echo $row['id'] ?>).css('bottom', -(bottom + gap_y));


        $('.dots_' +  <?php echo $row['id'] ?>).css('left', gap_x/15 );
        $('.dots_' +  <?php echo $row['id'] ?>).css('top', gap_y/15 );

        $("#team_wrapper_<?php echo $row['id']?>").hover(
            function() {
                $(".team-setting #team_img_<?php echo $row['id']?>").attr('src','images/upload/<?php echo $row['id'] ?>/thumbnail.png');
                $(".team-setting #team_img_<?php echo $row['id']?>").css('width', '114px');
                $(".team-setting #team_img_<?php echo $row['id']?>").css('padding', '10px');
                $('.content_list #team_wrapper_<?php echo $row['id']?> .team_txt').css('opacity','1');
            }, function() {
                $(".team-setting #team_img_<?php echo $row['id']?>").attr('src','images/upload/<?php echo $row['id'] ?>/team_symbol.gif');
                $(".team-setting #team_img_<?php echo $row['id']?>").css('width', '134px');
                $(".team-setting #team_img_<?php echo $row['id']?>").css('padding', '0');
                $('.content_list #team_wrapper_<?php echo $row['id']?> .team_txt').css('opacity','0');
            }
        );


    <?php
        }
        ?>
    });

    $('.team-setting').hover(
        function() {
            isPaused = true;
        }, function() {
            isPaused = false;
        }
    );
</script>
</body>
</html>