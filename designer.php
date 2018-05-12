<?php
require_once("dbconfig.php");
?>

<!doctype html>
<html>
<head>
    <?php include('head.php');?>
    <style>
/*
        #designer_flag{
            width: 20px;
            height: 20px;
            background-color: red;
            position: fixed;
            bottom: 20%;
            left:20px;
        }
        .designer_circle {
            transform: scale(0);
            transition: 0.2s;
            
        }
*/
        .designer_img:hover{
            -webkit-transition: opacity 1s ease-in-out;
              -moz-transition: opacity 1s ease-in-out;
              -ms-transition: opacity 1s ease-in-out;
              -o-transition: opacity 1s ease-in-out;
              transition: opacity 1s ease-in-out;
                    }
                    .item:hover {
              zoom: 1;
              filter: alpha(opacity=50);
              opacity: 0.5;
            }
    </style>
</head>
<body>
<header>
    <?php include('header.php');?>
</header>
<!--main start-->

<!--about.php-->

<div id="designer_wrapper">

    <div class="designer_content">
        <div class="designer_list">
            <?php
            $sql = 'select * from mb_table';
            $result = $db->query($sql);
            while($row = $result->fetch_assoc()){
                if($row['d1_name']){
                    $d1_pic = '<div class="designer_circle per_'.$row["id"].'_1">
                                <img class="designer_img pic_a" src="images/upload/'.$row["id"].'/d1_a.png" alt="designer">
                                <img class="designer_img pic_b" src="images/upload/'.$row["id"].'/d1_b.png" alt="designer">
                                <p class="designer_name">'.$row["d1_name"].'</p>
                                <p class="designer_info_hidden info_email_txt">'.$row["d1_email"].'</p>
                                <p class="designer_info_hidden info_site_txt">'.$row["d1_site"].'</p>
                                <p class="designer_info_hidden info_think_txt">'.$row["d1_think"].'</p>
                            </div>';
                    echo $d1_pic;

                    $d1_script = '
                    $( window ).scroll(function() {
                        var flag = $("#designer_flag").offset().top;
                        var per = $(".per_'.$row["id"].'_1").offset().top;
                    
                        if(per< flag){
                            $(".per_'.$row["id"].'_1").css("transform","scale(1)");
                        }else{
                            $(".per_'.$row["id"].'_1").css("transform","scale(0)");
                        }
                    });
                    ';
                }
                if($row['d2_name']){
                    $d2_pic = '<div class="designer_circle per_'.$row["id"].'_2">
                                <img class="designer_img pic_a" src="images/upload/'.$row["id"].'/d2_a.png" alt="designer">
                                <img class="designer_img pic_b" src="images/upload/'.$row["id"].'/d2_b.png" alt="designer">
                                <p class="designer_name">'.$row["d2_name"].'</p>
                                <p class="designer_info_hidden info_email_txt">'.$row["d2_email"].'</p>
                                <p class="designer_info_hidden info_site_txt">'.$row["d2_site"].'</p>
                                <p class="designer_info_hidden info_think_txt">'.$row["d2_think"].'</p>
                            </div>';
                    echo $d2_pic;

                    $d2_script = '
                    $( window ).scroll(function() {
                        var flag = $("#designer_flag").offset().top;
                        var per = $(".per_'.$row["id"].'_2").offset().top;
                    
                        if(per< flag){
                            $(".per_'.$row["id"].'_2").css("transform","scale(1)");
                        }else{
                            $(".per_'.$row["id"].'_2").css("transform","scale(0)");
                        }
                    });
                    ';
                }
                if($row['d3_name']){
                    $d3_pic = '<div class="designer_circle per_'.$row["id"].'_3">
                                <img class="designer_img pic_a" src="images/upload/'.$row["id"].'/d3_a.png" alt="designer">
                                <img class="designer_img pic_b" src="images/upload/'.$row["id"].'/d3_b.png" alt="designer">
                                <p class="designer_name">'.$row["d3_name"].'</p>
                                <p class="designer_info_hidden info_email_txt">'.$row["d3_email"].'</p>
                                <p class="designer_info_hidden info_site_txt">'.$row["d3_site"].'</p>
                                <p class="designer_info_hidden info_think_txt">'.$row["d3_think"].'</p>
                            </div>';
                    echo $d3_pic;

                    $d3_script = '
                    $( window ).scroll(function() {
                        var flag = $("#designer_flag").offset().top;
                        var per = $(".per_'.$row["id"].'_3").offset().top;
                    
                        if(per< flag){
                            $(".per_'.$row["id"].'_3").css("transform","scale(1)");
                        }else{
                            $(".per_'.$row["id"].'_3").css("transform","scale(0)");
                        }
                    });
                    ';
                }
                ?>
                <?
            }
            ?>
        </div>
        <div id="designer_search_wrapper">
            <div id="designer_search" class="designer_search">
                <img class="search_logo designer_search_btn" src="images/icon_search.png" alt="search">
                <img class="search_del designer_search_del" src="images/icon_search_del.png" alt="search_del">
                <input type='text' id='input_search_designer' placeholder='Search'>
            </div>
        </div>
        <div id="designer_sidebar">
            <div class="info_box_wrapper">
                <div class="content_wrapper_title info_box_title"><p>INFO</p></div>
                <div class="content_wrapper info_box">
                    <div id="info_output"></div>
                </div>
            </div>
            <div class="think_box_wrapper">
                <div class="content_wrapper_title think_box_title"><p>THOUGHT</p></div>
                <div class="content_wrapper think_box">
                    <div id="thought_output"></div>
                </div>
            </div>
        </div>
    </div><!--designer_content-->
</div>
<div id="designer_flag"></div>
<!--main end-->

<footer>
    <?php include('footer.php');?>
</footer>
<script>
    $( document ).ready(function() {

//        var info_output = $('#info_output');
//        var thought_output = $('#thought_output');


        <?php
        $sql = 'select * from mb_table';
        $result = $db->query($sql);
        while($row = $result->fetch_assoc()){
        ?>

        var per1 = $('.per_' + <?php echo $row['id']?> + '_1');
        var per2 = $('.per_' + <?php echo $row['id']?> + '_2');
        var per3 = $('.per_' + <?php echo $row['id']?> + '_3');

        var d1_<?php echo $row['id']?>_email = '<?php echo $row['d1_email']?>';
        var d1_<?php echo $row['id']?>_site = '<?php echo $row['d1_site']?>';
        var d1_<?php echo $row['id']?>_think = '<?php echo $row['d1_think']?>';

        var d2_<?php echo $row['id']?>_email = '<?php echo $row['d2_email']?>';
        var d2_<?php echo $row['id']?>_site = '<?php echo $row['d2_site']?>';
        var d2_<?php echo $row['id']?>_think = '<?php echo $row['d2_think']?>';

        var d3_<?php echo $row['id']?>_email = '<?php echo $row['d3_email']?>';
        var d3_<?php echo $row['id']?>_site = '<?php echo $row['d3_site']?>'
        var d3_<?php echo $row['id']?>_think = '<?php echo $row['d3_think']?>';
        

        if('<?php echo $row['d1_name']?>' != ""){
            $( window ).scroll(function() {
                var flag = $("#designer_flag").offset().top;
                var per = $(".per_<?php echo $row['id']?>_1").offset().top;

                if(per< flag){
                    $(".per_<?php echo $row['id']?>_1").css("transform","scale(1)");
                }else{
                    $(".per_<?php echo $row['id']?>_1").css("transform","scale(0)");
                }
            });
        }

        if('<?php echo $row['d2_name']?>' != ""){
            $( window ).scroll(function() {
                var flag = $("#designer_flag").offset().top;
                var per = $(".per_<?php echo $row['id']?>_2").offset().top;

                if(per< flag){
                    $(".per_<?php echo $row['id']?>_2").css("transform","scale(1)");
                }else{
                    $(".per_<?php echo $row['id']?>_2").css("transform","scale(0)");
                }
            });
        }

        if('<?php echo $row['d3_name']?>' != ""){
            $( window ).scroll(function() {
                var flag = $("#designer_flag").offset().top;
                var per = $(".per_<?php echo $row['id']?>_3").offset().top;

                if(per< flag){
                    $(".per_<?php echo $row['id']?>_3").css("transform","scale(1)");
                }else{
                    $(".per_<?php echo $row['id']?>_3").css("transform","scale(0)");
                }
            });
        }



        $(per1 ).hover(
            function() {
                $('#info_output').html(d1_<?php echo $row['id']?>_email+'<br/>' + d1_<?php echo $row['id']?>_site);
                $('#thought_output').html(d1_<?php echo $row['id']?>_think);
                $('.per_<?php echo $row['id']?>_1 .designer_img').attr('src', 'images/upload/<?php echo $row['id']?>/d1_b.png');
                $('.per_<?php echo $row['id']?>_1 > .designer_name').addClass('muteOff');
                $('#info_output').addClass('animate');
                $('#thought_output').addClass('animate');
            }, function() {
                $('.per_<?php echo $row['id']?>_1 .designer_img').attr('src', 'images/upload/<?php echo $row['id']?>/d1_a.png');
                $('.per_<?php echo $row['id']?>_1 > .designer_name').removeClass('muteOff');
                $('#info_output').removeClass('animate');
                $('#thought_output').removeClass('animate');
            }
        );
        $(per2 ).hover(
            function() {
                $('#info_output').html(d2_<?php echo $row['id']?>_email+'<br/>' + d2_<?php echo $row['id']?>_site);
                $('#thought_output').html(d2_<?php echo $row['id']?>_think);
                $('.per_<?php echo $row['id']?>_2 .designer_img').attr('src', 'images/upload/<?php echo $row['id']?>/d2_b.png');
                $('.per_<?php echo $row['id']?>_2 > .designer_name').addClass('muteOff');
                $('#info_output').addClass('animate');
                $('#thought_output').addClass('animate');
            }, function() {
                $('.per_<?php echo $row['id']?>_2 .designer_img').attr('src', 'images/upload/<?php echo $row['id']?>/d2_a.png');
                $('.per_<?php echo $row['id']?>_2 > .designer_name').removeClass('muteOff');
                $('#info_output').removeClass('animate');
                $('#thought_output').removeClass('animate');

            }
        );
        $(per3 ).hover(
            function() {
                $('#info_output').html(d3_<?php echo $row['id']?>_email+'<br/>' + d3_<?php echo $row['id']?>_site);
                $('#thought_output').html(d3_<?php echo $row['id']?>_think);
                $('.per_<?php echo $row['id']?>_3 .designer_img').attr('src', 'images/upload/<?php echo $row['id']?>/d3_b.png');
                $('.per_<?php echo $row['id']?>_3 > .designer_name').addClass('muteOff');
                $('#info_output').addClass('animate');
                $('#thought_output').addClass('animate');
            }, function() {
                $('.per_<?php echo $row['id']?>_3 .designer_img').attr('src', 'images/upload/<?php echo $row['id']?>/d3_a.png');
                $('.per_<?php echo $row['id']?>_3 > .designer_name').removeClass('muteOff');
                $('#info_output').removeClass('animate');
                $('#thought_output').removeClass('animate');

            }
        );
        <?php
        }
        ?>

    });
</script>

<!--<script>-->
<!--    TweenMax.staggerFrom(".designer_circle", 0.5, {scale:0, opacity:0}, 0.2);-->
<!--</script>-->
</body>
</html>