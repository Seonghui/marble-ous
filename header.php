<?php
?>
<div class="loading-img"></div>
<div id="header_bar" class="clearfix">
    <div id="nav">
        <a href="index.php"><img id="logo" src="images/logo_w.png" alt=""></a>
        <ul id="menus">
            <li class="header_search_wrapper only_pc">
                <img class="search_logo search_btn" src="images/mobile_searchicon.png" alt="search">
                <div class="header_search">
                    <div class="search_inner">
                        <img class="search_logo header_search_logo" src="images/icon_search.png" alt="search">
                        <input type='text' id='input_header_search' placeholder='Search' onkeyup='{search();return false}' onkeypress='javascript:if(event.keyCode==13){ search(); return false;}'>
                        <img class="search_del header_search_del" src="images/icon_search_del.png" alt="search_del">
                    </div>
                </div>
            </li>
            <li class="work"><a href="index.php">WORK</a></li>
            <li class="designer"><a href="designer.php">DESIGNER</a></li>
            <li class="about"><a href="about.php">ABOUT</a></li>
        </ul>
    </div>
</div>
<div id="mobileHeader_wrapper">
    <div id="mobileHeader">
        <a href="index.php"><img id="mobilelogo" src="images/logo_w.png" alt=""></a>
        <div id="mobileNav_btn">
            <img id="phone_menu" src="images/phone_menu.png" alt="">
        </div>
        <div id="mobileNav_close_btn">
            <img id="phone_menu_xBtn" src="images/phone_menu_xBtn.png" alt="">
        </div>
        <div class="header_search_wrapper only_mobile">
            <img class="search_logo search_btn" src="images/mobile_searchicon.png" alt="search">
            <div class="header_search">
                <div class="search_inner">
                    <img class="search_logo header_search_logo" src="images/icon_search.png" alt="search">
                    <input type='text' id='input_header_search' placeholder='Search' onkeyup='{search();return false}' onkeypress='javascript:if(event.keyCode==13){ search(); return false;}'>
                    <img class="search_del header_search_del" src="images/icon_search_del.png" alt="search_del">
                </div>
            </div>
        </div>
    </div>
</div>
<div id="mobileNav">
    <ul id="mobileNav_menus">
        <li class="m_work"><a href="index.php">WORK</a></li>
        <li class="m_designer"><a href="designer.php">DESIGNER</a></li>
        <li class="m_about"><a href="about.php">ABOUT</a></li>
    </ul>
</div>

<?php
$pageName = basename($_SERVER['PHP_SELF']);

switch($pageName){
    case 'index.php' : ?>
        <script>
            $('.work > a').addClass('menuOn');
            $('.m_work > a').addClass('muteOff');
            $('.header_search_wrapper').addClass('off');
        </script> <?php break;
    case 'index_ie.php' : ?>
        <script>
            $('.work > a').addClass('menuOn');
            $('.m_work > a').addClass('muteOff');
            $('.header_search_wrapper').css('inline-block');
            $('.header_search_wrapper').addClass('index_ie_search_wrapper');
            $('#menus').addClass('ie_menu');
        </script> <?php break;
    case 'designer.php' : ?>
        <script>
            $('.designer > a').addClass('menuOn');
            $('.m_designer > a').addClass('muteOff');
            $('.header_search_wrapper').addClass('designer_search_wrapper');
            $('#menus').addClass('designer_menu');
        </script> <?php break;
    case 'project.php' : ?>
        <script>
            $('.work > a').addClass('menuOn');
            $('.m_work > a').addClass('muteOff');
            $('.header_search_wrapper').addClass('off');
        </script> <?php break;
    case 'about.php' : ?>
        <script>
            $('.about > a').addClass('menuOn');
            $('.m_about > a').addClass('muteOff');
            $('.header_search_wrapper').addClass('off');
        </script> <?php break;
}

?>

<script>
    $( "#mobileNav_btn" ).click(function() {
        TweenMax.to("#mobileNav",1,{ease: Power4.easeOut,top:0});
        TweenMax.to("#mobileNav",0.5,{opacity:1});
        TweenMax.staggerFrom(".stagger", 0.7, {y:-560,opacity:0, delay:0.2}, 0.2);
        $('#mobileNav').css({
            position:'fixed',
            height: ($(window).height())+70,
            width : $(window).width()
        });
        $("#mobileNav_close_btn").css('display','table');
        $("#mobileNav_btn").css('display','none');
        $('#mobileNav_menus').css({
            position:'absolute',
            left: ($(window).width() - $('#mobileNav_menus').outerWidth())/2,
            top: ((($(window).height())+35) - $('#mobileNav_menus').outerHeight())/2
        });
        //disable all scrolling on mobile devices while menu is shown
        $(window).bind('touchmove', function (e) {
            e.preventDefault()
        });
        $(".header_search_wrapper").css('display','none');
        
        console.log("llalala");
    });
    $( "#mobileNav_close_btn" ).click(function() {
        TweenMax.to("#mobileNav",0.5,{ease: Power2.easeOut,top:-($(window).height())-70});
        TweenMax.to("#mobileNav",1,{opacity:0});
        $("#mobileNav_close_btn").css('display','none');
        $("#mobileNav_btn").css('display','table');
        //enable all scrolling on mobile devices when menu is closed
        $(window).unbind('touchmove');
        $(".header_search_wrapper").css('display','table');
    });
</script>
