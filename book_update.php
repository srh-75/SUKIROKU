<html>
<head><title>書籍：更新結果</title></head>
<body>
<center>
<h1>SUKIROKU</h1>
<h2>書籍</h2>
<?php
$id = $_GET['id'];

$host = "localhost";
if (!$conn = mysqli_connect($host, "s1911499", "usagisan", "s1911499")){
    die("データベース接続エラー<br />");
}
mysqli_select_db($conn, "kisop");
mysqli_set_charset($conn, "utf8");

$item_work = "";
$item_book = "";

$title = $_POST['title'];
if($title != ""){
    $title = str_replace("%", "\%", mysqli_escape_string($conn, $title));
    $item_work = "title='$title'";
}

$author = $_POST['author'];
if($author != ""){
    $author = str_replace("%", "\%", mysqli_escape_string($conn, $author));
    if($item_book == ""){
        $item_book = "author='$author'";
    }else{
        $item_book .= ", author='$author'";
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

if($item_work == "" && $item_book == ""){
    print("何も更新しませんでしたね。<a href=\"book_search.php\">こちら</a>で確認してください。");
}elseif($item_work != "" && $item_book == ""){
    $sql1 = "UPDATE work SET ".$item_work." WHERE id='$id'";
    mysqli_query($conn, $sql1)
        or die("更新できませんでした");
    print("更新しました。<a href=\"book_search.php\">こちら</a>で確認してください。");
}elseif($item_work == "" && $item_book != ""){
    $sql2 = "UPDATE book SET ".$item_book." WHERE id='$id'";
    mysqli_query($conn, $sql2)
        or die("更新できませんでした");
    print("更新しました。<a href=\"book_search.php\">こちら</a>で確認してください。");
}elseif($item_work != "" && $item_book != ""){
    $sql1 = "UPDATE work SET ".$item_work." WHERE id='$id'";
    $sql2 = "UPDATE book SET ".$item_book." WHERE id='$id'";
    mysqli_query($conn, $sql1)
        or die("更新できませんでした");
    mysqli_query($conn, $sql2)
        or die("更新できませんでした");
    print("更新しました。<a href=\"book_search.php\">こちら</a>で確認してください。");
}
?>
</center>
</body>
</html>
