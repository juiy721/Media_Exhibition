<?php
$db = mysqli_connect('localhost', 'root', 'root', 'mydb_20191028');

$query = mysqli_query($db, 'SELECT * FROM my_items WHERE 1');



// 結果を入れる配列を作る
$rows = array();
// データベースから取得したデータ分　繰り返し取得する
while($r = mysqli_fetch_assoc($query)){
    $rows[] = $r;
}

mysqli_query($db, 'UPDATE counter SET pv=' . $nextPV . ' WHERE id = 3');
