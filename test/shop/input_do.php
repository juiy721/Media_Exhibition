<?php
ini_set('display_errors', 1);
var_dump($_POST);
$db = mysqli_connect('localhost', 'root', 'root', 'mydb') or 
die(mysqli_connect_error());
mysqli_set_charset($db, 'utf8');

require('dbconnect.php');

$sql = sprintf('INSERT INTO my_items SET maker_id=%d, 
                                        item_name="%s", 
                                        price=%d, 
                                        keyword="%s"',
    mysqli_real_escape_string($db, $_POST['maker_id']),
    mysqli_real_escape_string($db, $_POST['item_name']),
    // mysqli_real_escape_string($db, 'いぬ'),
    mysqli_real_escape_string($db, $_POST['price']),
    mysqli_real_escape_string($db, $_POST['keyword'])
);
mysqli_query($db, $sql) or die(mysqli_error($db));
?>
<?php
$db = mysqli_connect('localhost', 'root', 'root', 'mydb') or 
die(mysqli_connect_error());
mysqli_set_charset($db, 'utf8');
?>
<p>商品を登録しました</p>



<?php
// $db = mysqli_connect('localhost', 'root', 'root', 'mydb') or
// die(mysqli_connect_error());
// mysqli_set_charset($db, 'utf8');
// $request = "' OR '";
// $safeSql = sprintf("SELECT * FROM test_table WHERE password='' OR ''=''",
// mysqli_real_escape_string($db, $request));
// print($safeSql);
?>