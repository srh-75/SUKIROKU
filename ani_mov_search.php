<html>
<head><title>アニメ・映画：キーワード検索ページ</title></head>
<body>
<center>
<h1>SUKIROKU</h1>
<h2>アニメ・映画：キーワード検索ページ</h2>
<h3>入力フォーム</h3>
<form action="ani_mov_result.php" method="post">
<table border="1" cellspacing="0">
<tr>
<td>タイトル</td>
<td><input type="text" name="title"></td>
</tr>
<tr>
<td>監督</td>
<td><input type="text" name="director"></td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="submit" name="submit" value="検索"></td>
</tr>
</table>
</form>
<p>項目を入力したら検索ボタンを押してください!</p>
<h3>現在の記録状況（アニメ・映画）</h3>
<table border="1">
<tr><td>カテゴリ</td><td>タイトル</td><td>監督</td><td>記録日</td><td>評価</td><td>更新</td><td>削除</td></tr>
<?php
$host = "localhost";
if (!$conn = mysqli_connect($host, "s1911499", "usagisan", "s1911499")){
    die("MySQL接続エラー.<br />");
}
mysqli_select_db($conn, "kisop");
mysqli_set_charset($conn, "utf8");
$sql = "SELECT work.id, ani_mov.category, work.title, ani_mov.director, work.day, work.evaluation FROM work, ani_mov where work.id=ani_mov.id";
$res = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($res)) {
    print("<tr>");
    print("<td>".$row["category"]."</td>");
    print("<td>".$row["title"]."</td>");
    print("<td>".$row["director"]."</td>");
    print("<td>".$row["day"]."</td>");
    print("<td>".$row["evaluation"]."</td>");
    print("<td><a href= \"ani_mov_update_form.php?id=".$row["id"]."\">更新</a></td>");
    print("<td><a href= \"ani_mov_delete.php?id=".$row["id"]."\">削除</a></td>");
    print("</tr>\n");
}
mysqli_free_result($res);
?>
</table>
<br>
<a href=index.html>TOPページへ戻る</a>
</center>
</body>
</html>
