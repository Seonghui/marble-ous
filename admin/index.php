<?php
require_once("../dbconfig.php");
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
        
        thead tr th {
            padding: 12px 10px 10px;
            font-weight: bold;
            font-size: 18px;
        }
        
        tbody:before {
            content: "-";
            display: block;
            line-height: 5px;
            color: transparent;
        }
        
        tbody tr td {
            padding: 9px 16px 7px;
        }
        
        tbody tr:nth-child(even) {
            background: #f0f0f0;
        }
        tbody tr:nth-child(odd) {
            background: #FFF;
        }
        
    </style>
</head>
<body>
<a href="write.php">write</a>
<table>
    <thead>
        <tr>
            <th>idx</th>
            <th>title</th>
            <th>co_x</th>
            <th>co_y</th>
            <th>name1</th>
            <th>name2</th>
            <th>name3</th>
        </tr>
    </thead>
    <tbody style="border-top:1px solid #9f9f9f;">
    <?php
    $sql = 'select * from mb_table order by id desc';
    $result = $db->query($sql);
    while($row = $result->fetch_assoc()){
//    echo "id : ".$row['id']."<br/>";
//    echo "title : ".$row['title']."<br/>";
//    echo "title_eng : ".$row['title_eng']."<br/>";
//    echo "filter_h : ".$row['filter_h']."<br/>";
//    echo "filter_w : ".$row['filter_w']."<br/>";
//    echo "name1 : ".$row['d1_name']."<br/>";
//    echo "name2 : ".$row['d2_name']."<br/>";
//    echo "name3 : ".$row['d3_name']."<br/>";
//    echo "<br/><br/>";
        ?>
    
        <tr>
            <td style="text-align:center;"><?php echo $row['id'] ?></td>
            <td><a href="view.php?id=<?php echo $row['id']?>"><?php echo $row['title'] ?></a></td>
            <td style="text-align:center;"><?php echo $row['co_x'] ?></td>
            <td style="text-align:center;"><?php echo $row['co_y'] ?></td>
            <td style="text-align:center;"><?php echo $row['d1_name'] ?></td>
            <td style="text-align:center;"><?php echo $row['d2_name'] ?></td>
            <td style="text-align:center;"><?php echo $row['d3_name'] ?></td>
        </tr>
    

        <?


    }

    ?>
</tbody>
</table>
</body>
</html>