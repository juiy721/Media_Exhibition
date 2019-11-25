<?php
ini_set('display_errors', 1);

$db = mysqli_connect('localhost', 'root', 'root', 'mygreen') or 
die(mysqli_connect_error());
mysqli_set_charset($db, 'utf8');

// $sql = 'SELECT * FROM `my_items` LIMIT 5 OFFSET 0';
$sql = sprintf('SELECT * FROM `my_items` LIMIT 5 OFFSET %d',
// $sql = sprintf('SELECT * FROM `my_items` ORDER BY screen_id DESC LIMIT 0,10',
mysqli_real_escape_string($db, $_GET['offset']));

// SQLを実行、結果を$resultという名前の変数に入れる
$result = mysqli_query($db, $sql) or die(mysqli_error($db));

// SQLで取得したデータを保存する変数
$myArray = array();

if($result) {
    // SQLが正常に処理された時の処理
    while($row = mysqli_fetch_assoc($result)) {
        //データベースから取得したデータを配列に突っ込む
        $myArray[] = $row;
    }
}

// JSON形式でブラウザに返す
header('Content-Type: application/json; charset=UTF8');
echo json_encode($myArray);