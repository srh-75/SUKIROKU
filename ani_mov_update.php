<html>
<head><title>アニメ・映画：更新結果</title></head>
<body>
<center>
<h1>SUKIROKU</h1>
<h2>アニメ・映画</h2>
<?php
$id = $_GET['id'];

$host = "localhost";
if (!$conn = mysqli_connect($host, "s1911499", "usagisan", "s1911499")){
    die("データベース接続エラー<br />");
}
mysqli_select_db($conn, "kisop");
mysqli_set_charset($conn, "utf8");

$item_work = "";
$item_ani_mov = "";


$category = $_POST['category'];
if($category != ""){
    $category = str_replace("%", "\%", mysqli_escape_string($conn, $category));
    $item_ani_mov = "category='$category'";
}

$title = $_POST['title'];
if($title != ""){
    $title = str_replace("%", "\%", mysqli_escape_string($conn, $title));
    if($item_work == ""){
        $item_work = "title='$title'";
    }else{
        $item_work .= ", title='$title'";
    }
}

$director = $_POST['director'];
if($director != ""){
    $director = str_replace("%", "\%", mysqli_escape_string($conn, $director));
    if($item_ani_mov == ""){
        $item_ani_mov = "director='$director'";
    }else{
        $item_ani_mov .= ", director='$director'";
    }
}

$day = $_POST['day'];
if($day != ""){
    $day = str_replace("%", "\%", mysqli_escape_string($conn, $day));
    if($item_work == ""){
        $item_work = "day='$day'";
    }else{
        $item_work .= ", day='$day'";
    }
}

$evaluation = $_POST['evaluation'];
if($evaluation != ""){
    $evaluation = str_replace("%", "\%", mysqli_escape_string($conn, $evaluation));
    if($item_work == ""){
        $item_work = "evaluation='$evaluation'";
    }else{
        $item_work .= ", evaluation='$evaluation'";
    }
}


if($item_work == "" && $item_ani_mov == ""){
    print("何も更新しませんでしたね。<a href=\"ani_mov_search.php\">こちら</a>で確認してください。");
}elseif($item_work != "" && $item_ani_mov == ""){
    $sql1 = "UPDATE work SET ".$item_work." WHERE id='$id'";
    mysqli_query($conn, $sql1)
        or die("更新できませんでした");
    print("更新しました。<a href=\"ani_mov_search.php\">こちら</a>で確認してください。");
}elseif($item_work == "" && $item_ani_mov != ""){
    $sql2 = "UPDATE ani_mov SET ".$item_ani_mov." WHERE id='$id'";
    mysqli_query($conn, $sql2)
        or die("更新できませんでした");
    print("更新しました。<a href=\"ani_mov_search.php\">こちら</a>で確認してください。");
}elseif($item_work != "" && $item_ani_mov != ""){
    $sql1 = "UPDATE work SET ".$item_work." WHERE id='$id'";
    $sql2 = "UPDATE ani_mov SET ".$item_ani_mov." WHERE id='$id'";
    mysqli_query($conn, $sql1)
        or die("更新できませんでした");
    mysqli_query($conn, $sql2)
        or die("更新できませんでした");
    print("更新しました。<a href=\"ani_mov_search.php\">こちら</a>で確認してください。");
}
?>
</center>
</body>
</html>
