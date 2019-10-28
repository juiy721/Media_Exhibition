<?php
// echo $_GET['id'];
// MYSQLに接続する
$db = mysqli_connect('localhost', 'root', 'root', 'mydb_20191028');
//SQLを実行する
$result = mysqli_query($db, 'SELECT * FROM counter WHERE id = ' . $_GET['id']);
// 結果を入れる配列を作る
$rows = array();
// データベースから取得したデータ分　繰り返し取得する
while($r = mysqli_fetch_assoc($result)){
    $rows[] = $r;
}

// var_dump($rows);

header("Content-Type: application/json; charset=UTF-8");
echo json_encode($rows);
