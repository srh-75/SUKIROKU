<html>
<head><title>書籍：記録結果</title></head>
<body>
<center>
<h1>SUKIROKU</h1>
<h2>書籍：記録結果</h2>
<?php
$title = $_POST['title'];
$author = $_POST['author'];
$day = $_POST['day'];
$evaluation = $_POST['evaluation'];
if ($title == "" || $author == "" || $day == "" || $evaluation == ""){
    exit ("<a href=\"book_home.php\">タイトル・著者・記録日・評価を入力してください!</a>");
}

$host = "localhost";
if (!$conn = mysqli_connect($host, "s1911499", "usagisan", "s1911499")){
    die("データベース接続エラー.<br />");
}

mysqli_select_db($conn, "kisop");
mysqli_set_charset($conn, "utf8");
    
$sql1 = "INSERT INTO work(title, day, evaluation) VALUES('$title', '$day', '$evaluation')";

mysqli_query($conn, $sql1)
   or die("タイトル・記録日・評価を登録できませんでした");

$sql2 = "SELECT MAX(id) FROM work";

$id = mysqli_query($conn, $sql2);
$id_result = mysqli_fetch_array($id);
$id_result2 = $id_result["MAX(id)"];
$sql3 = "INSERT INTO book(id, author) VALUES('$id_result2', '$author')";

mysqli_query($conn, $sql3)
   or die("著者を登録できませんでした");

   print("記録を完了しました!<a href=\"book_search.php\">こちら</a>で確認してください。");
?>
</center>
</body>
</html>
