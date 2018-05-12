<?php
require_once("../dbconfig.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
}
if(isset($id)){
    $sql = 'select title, title_eng, content, content_eng, vimeo, filter_h, filter_w, isMobile, isWeb, isPc, isMg, isVr, d1_name, d1_name_eng, d1_email, d1_site, d1_think, d2_name, d2_name_eng, d2_email, d2_site, d2_think, d3_name, d3_name_eng, d3_email, d3_site, d3_think, co_x, co_y from mb_table where id='.$id;
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h3>admin 글쓰기</h3>
<div id="admin_write">
    <form action="write_update.php" method="post">
        <?php
        if(isset($id)){
            echo '<input type="hidden" name="id" value="' . $id . '">';
        }
        ?>
        <table>
            <tbody>
            <tr>
                <th scope="row"><label for="title">작품명</label></th>
                <td class="title"><input type="text" name="title" id="title" value="<?php echo isset($row['title'])?$row['title']:null?>"></td>
            </tr>
            <tr>
                <th scope="row"><label for="title_eng">작품명(영문)</label></th>
                <td class="title_eng"><input type="text" name="title_eng" id="title_eng" value="<?php echo isset($row['title_eng'])?$row['title_eng']:null?>"></td>
            </tr>
            <tr>
                <th scope="row"><label for="content">작품 내용</label></th>
                <td class="content"><textarea name="content" id="content"><?php echo isset($row['content'])?$row['content']:null?></textarea></td>
            </tr>
            <tr>
                <th scope="row"><label for="content_eng">작품 내용(영문)</label></th>
                <td class="content_eng"><textarea name="content_eng" id="content_eng"><?php echo isset($row['content_eng'])?$row['content_eng']:null?></textarea></td>
            </tr>
            <tr>
                <th scope="row"><label for="vimeo">Vimeo URL</label></th>
                <td class="vimeo"><input type="text" name="vimeo" id="vimeo" value="<?php echo isset($row['vimeo'])?$row['vimeo']:null?>"></td>
            </tr>
            <tr>
                <th scope="row"><label for="co_x">x좌표</label></th>
                <td class="co_x"><input type="text" name="co_x" id="co_x" value="<?php echo isset($row['co_x'])?$row['co_x']:null?>"></td>
            </tr>
            <tr>
                <th scope="row"><label for="co_y">x좌표</label></th>
                <td class="co_y"><input type="text" name="co_y" id="co_y" value="<?php echo isset($row['co_y'])?$row['co_y']:null?>"></td>
            </tr>
            <tr>
                <th scope="row">practical / experimental</th>
                <td class="filter_h">
                    <label for="practical">practical</label>
                    <input type="radio" name="filter_h" value="practical" id="practical" <?php echo ($row['filter_h'] == 'practical')?"checked='checked'":null?>>
                    <label for="experimental">experimental</label>
                    <input type="radio" name="filter_h" value="experimental" id="experimental" <?php echo ($row['filter_h'] == 'experimental')?"checked='checked'":null?>>
            </tr>
            <tr>
                <th scope="row">fun / insightful</th>
                <td class="filter_w">
                    <label for="fun">fun</label>
                    <input type="radio" name="filter_w" value="fun" id="fun" <?php echo ($row['filter_w'] == 'fun')?"checked='checked'":null?>>
                    <label for="insightful">insightful</label>
                    <input type="radio" name="filter_w" value="insightful" id="insightful" <?php echo ($row['filter_w'] == 'insightful')?"checked='checked'":null?>>
                </td>
            </tr>
            <tr>
                <th scope="row">플랫폼</th>
                <td class="platform">
                    <label for="mobile">Mobile</label>
                    <input type="checkbox" name="platform[]" value="mobile" id="mobile" <?php echo ($row['isMobile'] == 1)?"checked='checked'":null?>>
                    <label for="web">Web</label>
                    <input type="checkbox" name="platform[]" value="web" id="web" <?php echo ($row['isWeb'] == 1)?"checked='checked'":null?>>
                    <label for="pc">Physical Computing</label>
                    <input type="checkbox" name="platform[]" value="pc" id="pc" <?php echo ($row['isPc'] == 1)?"checked='checked'":null?>>
                    <label for="mg">Motion graphics</label>
                    <input type="checkbox" name="platform[]" value="mg" id="mg" <?php echo ($row['isMg'] == 1)?"checked='checked'":null?>>
                    <label for="vr">VR/AR</label>
                    <input type="checkbox" name="platform[]" value="vr" id="vr" <?php echo ($row['isVr'] == 1)?"checked='checked'":null?>>
                </td>
            </tr>
            </tbody>
        </table>
        <table>
            <tbody>
            <tr>
                <th scope="row"><label for="d1_name">디자이너 1 - 이름</label></th>
                <td class="d1_name"><input type="text" name="d1_name" id="d1_name" value="<?php echo isset($row['d1_name'])?$row['d1_name']:null?>"></td>
            </tr>
            <tr>
                <th scope="row"><label for="d1_name_eng	">디자이너 1 - 이름(영문)</label></th>
                <td class="d1_name_eng"><input type="text" name="d1_name_eng" id="d1_name_eng" value="<?php echo isset($row['d1_name_eng'])?$row['d1_name_eng']:null?>"></td>
            </tr>
            <tr>
                <th scope="row"><label for="d1_email">디자이너 1 - 이메일</label></th>
                <td class="d1_email"><input type="text" name="d1_email" id="d1_email" value="<?php echo isset($row['d1_email'])?$row['d1_email']:null?>"></td>
            </tr>
            <tr>
                <th scope="row"><label for="d1_site">디자이너 1 - 개인 사이트(ex, behance..)</label></th>
                <td class="d1_site"><input type="text" name="d1_site" id="d1_site" value="<?php echo isset($row['d1_site'])?$row['d1_site']:null?>"></td>
            </tr>
            <tr>
                <th scope="row"><label for="d1_think">디자이너 1 - 소감</label></th>
                <td class="d1_think"><textarea name="d1_think" id="d1_think"><?php echo isset($row['d1_think'])?$row['d1_think']:null?></textarea></td>
            </tr>
            </tbody>
        </table>
        <table>
            <tbody>
            <tr>
                <th scope="row"><label for="d2_name">디자이너 2 - 이름</label></th>
                <td class="d2_name"><input type="text" name="d2_name" id="d2_name" value="<?php echo isset($row['d2_name'])?$row['d2_name']:null?>"></td>
            </tr>
            <tr>
                <th scope="row"><label for="d2_name_eng	">디자이너 2 - 이름(영문)</label></th>
                <td class="d2_name_eng"><input type="text" name="d2_name_eng" id="d2_name_eng" value="<?php echo isset($row['d2_name_eng'])?$row['d2_name_eng']:null?>"></td>
            </tr>
            <tr>
                <th scope="row"><label for="d2_email">디자이너 2 - 이메일</label></th>
                <td class="d2_email"><input type="text" name="d2_email" id="d2_email" value="<?php echo isset($row['d2_email'])?$row['d2_email']:null?>"></td>
            </tr>
            <tr>
                <th scope="row"><label for="d2_site">디자이너 2 - 개인 사이트(ex, behance..)</label></th>
                <td class="d2_site"><input type="text" name="d2_site" id="d2_site" value="<?php echo isset($row['d2_site'])?$row['d2_site']:null?>"></td>
            </tr>
            <tr>
                <th scope="row"><label for="d2_think">디자이너 2 - 소감</label></th>
                <td class="d2_think"><textarea name="d2_think" id="d2_think"><?php echo isset($row['d2_think'])?$row['d2_think']:null?></textarea></td>
            </tr>
            </tbody>
        </table>
        <table>
            <tbody>
            <tr>
                <th scope="row"><label for="d3_name">디자이너 3 - 이름</label></th>
                <td class="d3_name"><input type="text" name="d3_name" id="d3_name" value="<?php echo isset($row['d3_name'])?$row['d3_name']:null?>"></td>
            </tr>
            <tr>
                <th scope="row"><label for="d3_name_eng	">디자이너 3 - 이름(영문)</label></th>
                <td class="d3_name_eng"><input type="text" name="d3_name_eng" id="d3_name_eng" value="<?php echo isset($row['d3_name_eng'])?$row['d3_name_eng']:null?>"></td>
            </tr>
            <tr>
                <th scope="row"><label for="d3_email">디자이너 3 - 이메일</label></th>
                <td class="d3_email"><input type="text" name="d3_email" id="d3_email" value="<?php echo isset($row['d3_email'])?$row['d3_email']:null?>"></td>
            </tr>
            <tr>
                <th scope="row"><label for="d3_site">디자이너 3 - 개인 사이트(ex, behance..)</label></th>
                <td class="d3_site"><input type="text" name="d3_site" id="d3_site" value="<?php echo isset($row['d3_site'])?$row['d3_site']:null?>"></td>
            </tr>
            <tr>
                <th scope="row"><label for="d3_think">디자이너 3 - 소감</label></th>
                <td class="d3_think"><textarea name="d3_think" id="d3_think"><?php echo isset($row['d3_think'])?$row['d3_think']:null?></textarea></td>
            </tr>
            </tbody>
        </table>
        <div class="btnSet">
            <button type="submit" class="btnSubmit btn">
                <?php echo isset($id)?'수정':'작성'?>
            </button>
            <a href="index.php" class="btnList btn">목록</a>
        </div>
    </form>
</div>
</body>
</html>
