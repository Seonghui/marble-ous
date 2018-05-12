<?php
require_once("dbconfig.php");

$isValue = "";

switch($_POST["filter"]){
    case 'all' : $isValue='all'; break;
    case 'mobile' : $isValue='isMobile'; break;
    case 'web' : $isValue='isWeb'; break;
    case 'pc' : $isValue='isPc'; break;
    case 'mg' : $isValue='isMg'; break;
    case 'vr' : $isValue='isVr'; break;
}

$sql = "SELECT * FROM mb_table WHERE ".$isValue." = 1 ";

$result = $db->query($sql);
$output.= '<div class="sidebar_loading"><img src="images/sidebar_loading.svg" /></div>';
$output.= '<ul class="search_list">';

while($row = $result->fetch_assoc())
{
    $output.= '  
                
                    <li id="team_wrapper_'.$row["id"].'" class="team-setting">
                        <a href="project.php?id='.$row["id"].'">
                            <img class="teamImg-setting" id="team_img_'.$row["id"].'" src="images/upload/'.$row["id"].'/team_symbol.gif">
                            <div class="circle_wrapper cw_'.$row["id"].'">
                                <svg version="1.1" id="Layer_1" width="150px" height="150px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                         viewBox="0 0 150 150" style="enable-background:new 0 0 150 150;" xml:space="preserve">
                                <path class="svg_circle circle_1" d="M34.5,19.1c0,0,15.7-13.1,40.4-13.1s40.4,13.1,40.4,13.1"/>
                                <path class="svg_circle circle_2" d="M115.3,19.1c0,0,17,10.4,25,34.1c8,23.7,0,42.7,0,42.7"/>
                                <path class="svg_circle circle_3" d="M140.3,96c0,0-4.7,19.5-24.8,34.4c-20.1,14.9-40.6,13.2-40.6,13.2"/>
                                <path class="svg_circle circle_4" d="M74.9,143.6c0,0-23.2,0.4-40.7-13.3S12.2,104,9.5,96.1"/>
                                <path class="svg_circle circle_5" d="M9.5,96.1c0,0-7.5-20,0.1-42.8s25-34.1,25-34.1"/>
                            </div>
                        </a>
                        <div class="team_txt muteOff">
                            <p class="title">'.$row["title"].'</p>
                            <p class="description">'.$row["d1_name"].' '.$row["d2_name"].' '.$row["d3_name"].'</p>
                        </div>
                    </li>
           ';
}
$output.='</ul>';
echo $output;
?>

<?php
$sql = 'select * from mb_table';
$result = $db->query($sql);
while($row = $result->fetch_assoc()){
    ?>
    <script>
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

        $('.search_list .team-setting').fadeIn(500, function(){
            $(this).addClass('animate');
        });
        $('.search_list .cw_<?php echo $row['id']?>').delay(800).queue(function(next) {
            $(this).fadeIn(500, function() {
                $(this).addClass("on");
            });
            next();
        });

        $("#team_wrapper_<?php echo $row['id']?>").hover(
            function() {
                $(".team-setting #team_img_<?php echo $row['id']?>").attr('src','images/upload/<?php echo $row['id'] ?>/thumbnail.png');
                $(".team-setting #team_img_<?php echo $row['id']?>").css('width', '114px');
                $(".team-setting #team_img_<?php echo $row['id']?>").css('padding', '10px');
            }, function() {
                $(".team-setting #team_img_<?php echo $row['id']?>").attr('src','images/upload/<?php echo $row['id'] ?>/team_symbol.gif');
                $(".team-setting #team_img_<?php echo $row['id']?>").css('width', '134px');
                $(".team-setting #team_img_<?php echo $row['id']?>").css('padding', '0');
            }
        );
    </script>
    <?php
}
?>