<?php
ini_set('display_errors', 1);
header('Content-Type: application/json; charset=UTF8');

$host = '127.0.0.1';
$user = 'root';
$password = 'NZU@789xyz';
$db = 'green-letter';

$get = array();
$response = array();

// GETに値が付与されているか
if(!empty($_GET)) {
    foreach($_GET as $key => $value) {
        // HTMLの文字列を無害化する
		$get[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
	}
} else {
    $response['status'] = 0;
    $response['message'] = "GET is null.";
    echo json_encode($response);
    exit();
}

// プリントIDとファイル名があるか
if (
    (isset($_GET['print-id']) && !empty($_GET['print-id'])) &&
    (isset($_GET['file-name']) && !empty($_GET['file-name']))
) {
    // データベースに接続
    $link = mysqli_connect($host, $user, $password, $db);
    
    if (!$link) {
        $response['status'] = 0;
        $response['message'] =
            "Error: Unable to connect to MySQL." . PHP_EOL
            . "Debugging errno: " . mysqli_connect_errno();
        echo json_encode($response);
        exit();
    }

    mysqli_set_charset($link, 'utf8');

    $sql = sprintf(
        'UPDATE my_items SET print_id = "%s" WHERE my_items.img = "%s"',
        mysqli_real_escape_string($link, $get['print-id']),
        mysqli_real_escape_string($link, $get['file-name'])
    );

    $result = mysqli_query($link, $sql);

    if ($result) {
        $response['status'] = 1;
        echo json_encode($response);
    } else {
        $response['status'] = 0;
        $response['message'] = "Error: " . mysqli_error($link);
        echo json_encode($response);
    }

    mysqli_close($link);
}
