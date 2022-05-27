<html>
<head><title>書籍：更新</title></head>
<body>
<center>
<h1>SUKIROKU</h1>
<h2>書籍：データ更新ページ</h2>
<h3>更新フォーム</h3>
<form action="book_update.php?id=<?php print( $_GET['id'] ); ?>" method="post">
<table border="1" cellspacing="0">
<tr>
<td>タイトル</td>
<td><input type="text" name="title"></td>
</tr>
<tr>
<td>著者</td>
<td><input type="text" name="author"></td>
</tr>
<tr>
<td>記録日</td>
<td><input type="date" name="day"></td>
</tr>
<tr>
<td>評価</td>
<td><input type="number" name="evaluation" placeholder="0~5.0" step="0.1" min="0" max="5"></td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="submit" name="submit" value="更新"></td>
</tr>
</table>
</form>
<p>更新する項目を入力したら更新ボタンを押してください!</p>
<br>
<a href=book_search.php>戻る</a>
</center>
</body>
</html>
