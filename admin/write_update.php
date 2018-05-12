<?php
require_once("../dbconfig.php");

if(isset($_POST['id'])) {
    $id = $_POST['id'];
}

$title = $_POST['title'];
$title_eng = $_POST['title_eng'];
$content = $_POST['content'];
$content_eng = $_POST['content_eng'];
$vimeo = $_POST['vimeo'];
$filter_h = isset($_POST['filter_h']) ? $_POST['filter_h'] : false;
$filter_w = isset($_POST['filter_w']) ? $_POST['filter_w'] : false;
$isMobile = 0;
$isWeb = 0;
$isPc = 0;
$isMg = 0;
$isVr = 0;
$co_x = $_POST['co_x'];
$co_y = $_POST['co_y'];

$d1_name = $_POST['d1_name'];
$d1_name_eng = $_POST['d1_name_eng'];
$d1_email = $_POST['d1_email'];
$d1_site = $_POST['d1_site'];
$d1_think = $_POST['d1_think'];

$d2_name = $_POST['d2_name'];
$d2_name_eng = $_POST['d2_name_eng'];
$d2_email = $_POST['d2_email'];
$d2_site = $_POST['d2_site'];
$d2_think = $_POST['d2_think'];

$d3_name = $_POST['d3_name'];
$d3_name_eng = $_POST['d3_name_eng'];
$d3_email = $_POST['d3_email'];
$d3_site = $_POST['d3_site'];
$d3_think = $_POST['d3_think'];

foreach($_POST['platform'] as $p){
    switch ($p){
        case 'mobile': $isMobile = 1; break;
        case 'web': $isWeb = 1; break;
        case 'pc': $isPc = 1; break;
        case 'mg': $isMg = 1; break;
        case 'vr': $isVr = 1; break;
    }
}



//sql
if(isset($id)){
    $sql = 'update mb_table set title="' . $title . '", title_eng="' . $title_eng . '", content="' . $content . '", content_eng="' . $content_eng . '", vimeo="' . $vimeo . '", filter_h="' . $filter_h . '", filter_w="' . $filter_w . '", isMobile=' . $isMobile . ', isWeb=' . $isWeb . ', isPc="' . $isPc . '", isMg="' . $isMg . '", isVr="' . $isVr . '", co_x="' . $co_x . '", co_y="' . $co_y . '", d1_name="' . $d1_name . '", d1_name_eng="' . $d1_name_eng . '", d1_email="' . $d1_email . '", d1_site="' . $d1_site . '", d1_think="' . $d1_think . '", d2_name="' . $d2_name . '", d2_name_eng="' . $d2_name_eng . '", d2_email="' . $d2_email . '", d2_site="' . $d2_site . '", d2_think="' . $d2_think . '", d3_name="' . $d3_name . '", d3_name_eng="' . $d3_name_eng . '", d3_email="' . $d3_email . '", d3_site="' . $d3_site . '", d3_think="' . $d3_think . '" where id='.$id;
    $msgState = '수정 완료';
}else{
    $sql = 'insert into mb_table (title, title_eng, content, content_eng, vimeo, filter_h, filter_w, isMobile, isWeb, isPc, isMg, isVr, d1_name, d1_name_eng, d1_email, d1_site, d1_think, d2_name, d2_name_eng, d2_email, d2_site, d2_think, d3_name, d3_name_eng, d3_email, d3_site, d3_think, co_x, co_y) values ("' . $title . '", "' . $title_eng . '", "' . $content . '", "' . $content_eng . '","' . $vimeo . '", "' . $filter_h . '", "' . $filter_w . '", ' . $isMobile . ', ' . $isWeb . ', ' . $isPc . ', ' . $isMg . ', ' . $isVr . ', "' . $d1_name . '", "' . $d1_name_eng . '", "' . $d1_email . '", "' . $d1_site . '", "' . $d1_think . '", "' . $d2_name . '", "' . $d2_name_eng . '", "' . $d2_email . '", "' . $d2_site . '", "' . $d2_think . '", "' . $d3_name . '", "' . $d3_name_eng . '", "' . $d3_email . '", "' . $d3_site . '", "' . $d3_think . '", ' . $co_x . ', ' . $co_y . ')';
    $msgState = '등록 완료';
}

$result = $db->query($sql);
if($result){
    $msg = "정상적으로 글이 ".$msgState."되었습니다.";
    if(empty($id)) {
        $id = $db->insert_id;
    }
    $replaceURL = 'view.php?id=' . $id;
} else {
    $msg = "글을 ".$msgState."하지 못했습니다.";
    ?>
    <script>
        alert("<?php echo $msg?>");
        history.back();
    </script>
    <?php
    exit;
}

?>
<script>
    alert("<?php echo $msg?>");
    location.replace("<?php echo $replaceURL?>");
</script>
