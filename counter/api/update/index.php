<?php
$db = mysqli_connect('localhost', 'root', 'root', 'mydb_20191028');

$query = mysqli_query($db, 'SELECT id,pv FROM counter WHERE id = 3');



// 結果を入れる配列を作る
$rows = array();
// データベースから取得したデータ分　繰り返し取得する
while($r = mysqli_fetch_assoc($query)){
    $rows[] = $r;
    $nextPV = $r['pv'] + 1;
}

mysqli_query($db, 'UPDATE counter SET pv=' . $nextPV . ' WHERE id = 3');
