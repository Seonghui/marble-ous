<?php
require_once("dbconfig.php");
?>
<!doctype html>
<html lang="en">
<head>
    <?php include('head.php');?>
    <link rel="stylesheet" href="css/ie.css">
    <style>
        .teamImg-setting{
            width: 114px;
            padding: 10px;
        }
    </style>
</head>
<body>
<header>
    <?php include('header.php');?>
</header>
<div id="work_ie_wrapper">
    <div id="filter" class="work_ie_filter_wrapper">
            <div class="content_wrapper_title"><p>FILTER</p></div>
            <div class="content_wrapper">
                <ul id="work_ie_filter" class="filter_radio">
                    <li>
                        <input id="all" type="radio" name="ie_work" value="all" checked="checked">
                        <label for="all">All</label>
                    </li>
                    <li>
                        <input id="vr" type="radio" name="ie_work" value="vr">
                        <label for="vr">VR/AR</label>
                    </li>
                    <li>
                        <input id="physical" type="radio" name="ie_work" value="pc">
                        <label for="physical">Physical Computing</label>
                    </li>
                    <li>
                        <input id="motion" type="radio" name="ie_work" value="mg">
                        <label for="motion">Motion Graphic</label>
                    </li>
                    <li>
                        <input id="mobile" type="radio" name="ie_work" value="mobile">
                        <label for="mobile">Mobile</label>
                    </li>
                    <li>
                        <input id="web" type="radio" name="ie_work" value="web">
                        <label for="web">Web</label>
                    </li>
                </ul>
            </div>
        </div>
    <ul id="ie_filter_result" class="content_list"></ul>
    <ul class="content_list ie_content_list">
        <?php
        $sql = 'select * from mb_table';
        $result = $db->query($sql);
        while($row = $result->fetch_assoc()){
            ?>

            <li id="team_wrapper_<?php echo $row['id']?>" class="team-setting">
                <a href="project.php?id=<?php echo $row['id']?>">
                    <img class="teamImg-setting" id="team_img_<?php echo $row['id']?>" src="images/upload/<?php echo $row['id'] ?>/thumbnail.png">
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
                    <p class="ie_name_hidden"><?php echo $row['d1_name']?></p>
                    <p class="ie_name_hidden"><?php echo $row['d2_name']?></p>
                    <p class="ie_name_hidden"><?php echo $row['d3_name']?></p>
                </div>
            </li>
            <?
        }
        ?>
    </ul>
</div>
<script>

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

    <?php
    }
    ?>
</script>
<script>
    TweenMax.staggerFrom(".team-setting", 0.5, {scale:0, opacity:0}, 0.2);
</script>
</body>
</html>