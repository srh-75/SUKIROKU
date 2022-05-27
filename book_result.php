<html>
<head><title>書籍：キーワード検索結果</title></head>
<body>
<center>
<h1>SUKIROKU</h1>
<h2>書籍：キーワード検索結果</h2>
<?php
$host = "localhost";
if (!$conn = mysqli_connect($host, "s1911499", "usagisan", "s1911499")){
    die("データベース接続エラー.<br />");
}
mysqli_select_db($conn, "kisop");
mysqli_set_charset($conn, "utf8");

$condition = "WHERE work.id=book.id";

if(isset($_POST["title"]) && ($_POST["title"] != "")){
    $title = mysqli_escape_string($conn, $_POST["title"]);
    $title = str_replace("%", "\%", $title);
    $condition = "WHERE work.id=book.id and work.title LIKE \"%".$title."%\"";
}

if(isset($_POST["author"]) && ($_POST["author"] != "")){
    $author = mysqli_escape_string($conn, $_POST["author"]);
    $author = str_replace("%", "\%", $author);
    if ($condition == ""){
        $condition = "WHERE work.id=book.id AND book.author LIKE \"%".$author."%\"";
    } else{
        $condition .= " AND book.author LIKE \"%".$author."%\"";
    }
}

$sql = "SELECT work.id, work.title, book.author, work.day, work.evaluation FROM work, book ".$condition."";
$res = mysqli_query($conn, $sql);

print("<table border=\"1\">");
print("<tr><td>タイトル</td><td>著者</td><td>記録日</td><td>評価</td><td>更新</td><td>削除</td></tr>");
while($row = mysqli_fetch_array($res)) {
    print("<tr>");
    print("<td>".$row["title"]."</td>");
    print("<td>".$row["author"]."</td>");
    print("<td>".$row["day"]."</td>");
    print("<td>".$row["evaluation"]."</td>");
    print("<td><a href= \"book_update_form.php?id=".$row["id"]."\">更新</a></td>");
    print("<td><a href= \"book_delete.php?id=".$row["id"]."\">削除</a></td>");
    print("</tr>");
}
print("</table>");
mysqli_free_result($res);
?>
<a href=book_search.php>検索ページへ戻る</a>
</center>
</body>
</html>
