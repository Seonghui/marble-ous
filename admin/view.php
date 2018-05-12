<?php
require_once("../dbconfig.php");

$id = $_GET['id'];
$sql = 'select title, title_eng, content, content_eng, vimeo, filter_h, filter_w, isMobile, isWeb, isPc, isMg, isVr, d1_name, d1_name_eng, d1_email, d1_site, d1_think, d2_name, d2_name_eng, d2_email, d2_site, d2_think, d3_name, d3_name_eng, d3_email, d3_site, d3_think, co_x, co_y from mb_table where id='.$id;
$result = $db->query($sql);
$row = $result->fetch_assoc();
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/reset.css">
    <style>
        
        table {
            margin: 20px 10px 60px;
            width: 70%;
        }
        
        th {
            padding: 12px 12px;
            font-size: 20px;
            font-weight: bold;
            text-align: left;
        }
        
        td {
            padding: 10px 12px;
            line-height: 160%;
            letter-spacing: -0.3px;
        }
        
        tr:nth-child(even) {
            background: #f0f0f0;
        }
        tr:nth-child(odd) {
            background: #FFF;
        }
        
    </style>
</head>
<body>
<div id="admin_view">
    <table>
        <tr>
            <th colspan="2">작품</th>
        </tr>
        <tr>
            <td width="15%">작품명:</td>
            <td><?php echo $row['title']?></td>
        </tr>
        <tr>
            <td>작품명(영문):</td>
            <td><?php echo $row['title_eng']?></td>
        </tr>
        <tr>
            <td>작품 내용:</td>
            <td><?php echo $row['content']?></td>
        </tr>
        <tr>
            <td>작품 내용(영문):</td>
            <td><?php echo $row['content_eng']?></td>
        </tr>
        <tr>
            <td>Vimeo URL</td>
            <td><?php echo $row['vimeo']?></td>
        </tr>
        <tr>
            <td>x좌표:</td>
            <td><?php echo $row['co_x']?></td>
        </tr>
        <tr>
            <td>y좌표:</td>
            <td><?php echo $row['co_y']?></td>
        </tr>
        <tr>
            <td>practical<br>/experimental:</td>
            <td><?php echo $row['filter_h']?></td>
        </tr>
        <tr>
            <td>fun<br>/insightful:</td>
            <td><?php echo $row['filter_w']?></td>
        </tr>
        <tr>
            <td>플랫폼:</td>
            <td><?php echo $row['isMobile']; echo $row['isWeb']; echo $row['isPc']; echo $row['isMg']; echo $row['isVr'];?></td>
        </tr>
    </table>
    <table>
        <tr>
            <th width="10%">분류</th>
            <th width="30%">디자이너1</th>
            <th width="30%">디자이너2</th>
            <th width="30%">디자이너3</th>
        </tr>
        <tr>
            <td nowrap>이름:</td>
            <td><?php echo $row['d1_name']?></td>
            <td><?php echo $row['d2_name']?></td>
            <td><?php echo $row['d3_name']?></td>
        </tr>
        <tr>
            <td nowrap>이름(영문):</td>
            <td><?php echo $row['d1_name_eng']?></td>
            <td><?php echo $row['d2_name_eng']?></td>
            <td><?php echo $row['d3_name_eng']?></td>
        </tr>
        <tr>
            <td nowrap>이메일:</td>
            <td><?php echo $row['d1_email']?></td>
            <td><?php echo $row['d2_email']?></td>
            <td><?php echo $row['d3_email']?></td>
        </tr>
        <tr>
            <td nowrap>개인 사이트:</td>
            <td><?php echo $row['d1_site']?></td>
            <td><?php echo $row['d2_site']?></td>
            <td><?php echo $row['d3_site']?></td>
        </tr>
        <tr>
            <td nowrap>개인 소감:</td>
            <td><?php echo $row['d1_think']?></td>
            <td><?php echo $row['d2_think']?></td>
            <td><?php echo $row['d3_think']?></td>
        </tr>
    </table>
</div>
<div class="btnSet">
    <a href="write.php?id=<?php echo $id?>">수정</a>
    <a href="index.php">목록</a>
</div>
</body>
</html>