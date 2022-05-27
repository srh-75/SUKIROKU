<html>
<head><title>書籍：データの削除</title></head>
<body>
<center>
<h1>SUKIROKU</h1>
<h2>書籍</h2>
<?php
$id = $_GET['id'];

$host = "localhost";
if (!$conn = mysqli_connect($host, "s1911499", "usagisan", "s1911499")){
    die("データベース接続エラー.<br />");
}
mysqli_select_db($conn, "kisop");
mysqli_set_charset($conn, "utf8");

$sql1 = "DELETE FROM book WHERE id='$id'";
$sql2 = "DELETE FROM work WHERE id='$id'";
mysqli_query($conn, $sql1)
    or die("削除できませんでした");
mysqli_query($conn, $sql2)
    or die("削除できませんでした");
print("削除しました。<a href=\"book_search.php\">こちら</a>で確認してください。");
?>
</center>
</body>
</html>
