<?php
// echo $_GET['id'];
// MYSQLに接続する
$green = mysqli_connect('localhost', 'root', 'root', 'mygreen');
//SQLを実行する
$result = mysqli_query($green, 'SELECT * FROM counter WHERE screen_id = ' . $_GET['screen_id']);
// 結果を入れる配列を作る
$rows = array();
// データベースから取得したデータ分　繰り返し取得する
while($r = mysqli_fetch_assoc($result)){
    $rows[] = $r;
}

// var_dump($rows);

header("Content-Type: application/json; charset=UTF-8");
echo json_encode($rows);