<?php
require_once("dbconfig.php");

$id = $_GET['id'];
$sql = 'select id, title, title_eng, content, content_eng, vimeo, filter_h, filter_w, isMobile, isWeb, isPc, isMg, isVr, d1_name, d1_name_eng, d1_email, d1_site, d1_think, d2_name, d2_name_eng, d2_email, d2_site, d2_think, d3_name, d3_name_eng, d3_email, d3_site, d3_think, co_x, co_y from mb_table where id='.$id;
$result = $db->query($sql);
$row = $result->fetch_assoc();

if($row['d1_name']){
    $d1 = '
            <div class="designers per1">
                <img class="designer_pic per1_pic" src="images/upload/'.$row["id"].'/d1_a.png" alt="designer">
                <div class="designer_txt">
                    <p class="per1_name strong">
                        <span class="name_kor">'.$row["d1_name"].'</span>
                        <span class="name_eng">'.$row["d1_name_eng"].'</span>
                    </p>
                    <p class="per_email per1_email">'.$row["d1_email"].'</p>
                    <p class="per_site per1_site">'.$row["d1_site"].'</p>
                </div>
            </div>
            ';
};
if($row['d2_name']){
    $d2 = '
            <div class="designers per2">
                <img class="designer_pic per2_pic" src="images/upload/'.$row["id"].'/d2_a.png" alt="designer">
                <div class="designer_txt">
                    <p class="per2_name strong">
                        <span class="name_kor">'.$row["d2_name"].'</span>
                        <span class="name_eng">'.$row["d2_name_eng"].'</span>
                    </p>
                    <p class="per_email per2_email">'.$row["d2_email"].'</p>
                    <p class="per_site per2_site">'.$row["d2_site"].'</p>
                </div>
            </div>
            ';
};
if($row['d3_name']){
    $d3 = '
            <div class="designers per3">
                <img class="designer_pic per3_pic" src="images/upload/'.$row["id"].'/d3_a.png" alt="designer">
                <div class="designer_txt">
                    <p class="per3_name strong">
                        <span class="name_kor">'.$row["d3_name"].'</span>
                        <span class="name_eng">'.$row["d3_name_eng"].'</span>
                    </p>
                    <p class="per_email per3_email">'.$row["d3_email"].'</p>
                    <p class="per_site per3_site">'.$row["d3_site"].'</p>
                </div>
            </div>
            ';
};
for($i = 0; $i<5; $i++){
    $filepath = "images/upload/".$row['id']."/con" . $i . ".jpg";
    if(file_exists($filepath))
    {
        $silder_li .= "<li><img src='images/upload/".$row['id']."/con" . $i . ".jpg' alt='slide image'></li>";
    }
}

$prev;
$next;

if($id == 1) {
    $prev = 42;
}else{
    $prev = $id - 1;
}
if($id==42) {
    $next = 1;
}else{
    $next = $id + 1;
}
?>

<!doctype html>
<html>
<head>
    <?php include('head.php');?>
</head>
<body>
<header>
    <?php include('header.php');?>
</header>
<!--main start-->

<!--project.php-->
<div id="project_wrapper">
    <div id="slide_inner">
        <div id="project_slide_weapper">
            <ul class="project_slide">
                <?php echo $silder_li ?>
            </ul>
        </div>
    </div>
    <div id="project_inner" class="clearfix">
        <div id="project_left" >
            <div class="project_titles">
                <span class="title_kor"><?php echo $row['title']?></span>
                <span class="title_eng"><?php echo $row['title_eng']?></span>
            </div>
            <div class="project_desc">
                <p class="inner_title">DESCRIPTION</p>
                <p class="desc_kor"><?php echo $row['content']?></p>
                <p class="desc_eng"><?php echo $row['content_eng']?></p>
            </div>
            <div class="project_designer">
                <p class="inner_title">DESIGNERS</p>
                <?php echo $d1 ?>
                <?php echo $d2 ?>
                <?php echo $d3 ?>
            </div>
        </div>
        <div id="project_right">
            <div class="project_right_boxes clearfix">
                <div id="project_character">
                    <div class="content_wrapper_title">
                        <p>CHARACTER</p>
                    </div>
                    <div class="content_wrapper align_center">
                        <img class="project_symbol" src="images/upload/<?php echo $row['id'] ?>/team_symbol.gif" alt="">
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
                </div><!--project_character-->
                <div id="project_platform">
                    <div class="content_wrapper_title">
                        <p>PLATFORM</p>
                    </div>
                    <div class="content_wrapper align_center content_circle">
                        <div class="circle_wrapper cw_<?php echo $row['id']?> on">
                            <div class="project_circle_bg"></div>
                            <svg version="1.1" id="project_circle" width="180px" height="180px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 150 150" style="enable-background:new 0 0 150 150;" xml:space="preserve">
                        <path class="svg_circle filter_circle_1" d="M34.5,19.1c0,0,15.7-13.1,40.4-13.1s40.4,13.1,40.4,13.1"/>
                                <path class="svg_circle filter_circle_2" d="M115.3,19.1c0,0,17,10.4,25,34.1c8,23.7,0,42.7,0,42.7"/>
                                <path class="svg_circle filter_circle_3" d="M140.3,96c0,0-4.7,19.5-24.8,34.4c-20.1,14.9-40.6,13.2-40.6,13.2"/>
                                <path class="svg_circle filter_circle_4" d="M74.9,143.6c0,0-23.2,0.4-40.7-13.3S12.2,104,9.5,96.1"/>
                                <path class="svg_circle filter_circle_5" d="M9.5,96.1c0,0-7.5-20,0.1-42.8s25-34.1,25-34.1"/>
                    </svg>
                        </div>
                        <div class="circle_inner">
                            <p class="circle_inner_text"></p>
                        </div>
                    </div>
                </div><!--project_platform-->
            </div>
        </div>
    </div>
</div>
<div id="project_footer" class="footer">
    <div class="footer_inner">
        <div class="footer_text clearfix">
            <div class="footer_prev_btn">
                <img src="images/arrow_left.png" alt="">
                <a class="footer_link" href="http://hongikdmd.com/marble-ous/project.php?id=<?php echo $prev?>">Prev</a>
            </div>
            <div class="footer_next_btn">
                <a class="footer_link" href="http://hongikdmd.com/marble-ous/project.php?id=<?php echo $next?>">Next</a>
                <img src="images/arrow_right.png" alt="">
            </div>
        </div>
        <div class="copyright clearfix">
            <hr class="footer_hr">
            <p class="copyright_text">
                2016 Hongik Univ. Digital Media Design Graduatiton Exhibition
            </p>
            <img class="copyright_logo" src="images/logo_w.png" alt="">
        </div>
    </div>
</div>

<!--main end-->

<script>
//    $( document ).ready(function() {
        var isMobile = <?php echo $row['isMobile']?>;
        var isWeb = <?php echo $row['isWeb']?>;
        var isPc = <?php echo $row['isPc']?>;
        var isMg = <?php echo $row['isMg']?>;
        var isVr = <?php echo $row['isVr']?>;

        if(isVr ==1){
            $('.cw_<?php echo $row['id']?> .filter_circle_1').addClass('on');
            $('.circle_inner_text').append('VR / AR<br/>');
        }
        if(isPc ==1){
            $('.cw_<?php echo $row['id']?> .filter_circle_2').addClass('on');
            $('.circle_inner_text').append('Physical Computing<br/>');
        }
        if(isMg ==1){
            $('.cw_<?php echo $row['id']?> .filter_circle_3').addClass('on');
            $('.circle_inner_text').append('Motion Graphics<br/>');
        }
        if(isMobile == 1){
            $('.cw_<?php echo $row['id']?> .filter_circle_4').addClass('on');
            $('.circle_inner_text').append('Mobile<br/>');
        }
        if(isWeb ==1){
            $('.cw_<?php echo $row['id']?> .filter_circle_5').addClass('on');
            $('.circle_inner_text').append('Web<br/>');
        }

        var co_x = <?php echo $row['co_x']?>;
        var co_y = <?php echo $row['co_y']?>;
        var indi_bar_size = 180/10;
        var indi_1_location = indi_bar_size * co_y;
        var indi_2_location = indi_bar_size * co_x;

        $('.indi_1 > .indi_tri').css('left', indi_1_location);
        $('.indi_2 > .indi_tri').css('left', indi_2_location);

        if('<?php echo $row['vimeo']?>' != ''){
            $('.project_slide').prepend('<li><iframe src="<?php echo $row['vimeo']?>" width="1600" height="900" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></li>');
        }
        $('.project_slide').bxSlider({
            video: true,
            useCSS: false,
            auto: true
        });
//    });
</script>
<script>
//    TweenMax.fromTo("#slide_inner", 0.6, {opacity:0}, {opacity:1});

TweenMax.fromTo("#project_inner", 1.2, {opacity:0, y:200}, {opacity:1,y:0});
TweenMax.fromTo("#slide_inner", 1.5, {opacity:0}, {opacity:1});
</script>
</body>
</html>