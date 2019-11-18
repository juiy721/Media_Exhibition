<?php
ini_set('display_errors', 1);
var_dump($_POST);
$name = uniqid(mt_rand());

$data = $_POST['base64'];
if (preg_match('/^data:image\/(\w+);base64,/', $data, $type)) {
    $data = substr($data, strpos($data, ',') + 1);
    $type = strtolower($type[1]); // jpg, png, gif
    if (!in_array($type, [ 'jpg', 'jpeg', 'gif', 'png' ])) {
        throw new \Exception('invalid image type');
    }
    $data = base64_decode($data);
    if ($data === false) {
        throw new \Exception('base64_decode failed');
    }
 } else {
    throw new \Exception('did not match data URI with image data');
 }
 file_put_contents("{$name}.{$type}", $data);
 

 
$green = mysqli_connect('localhost', 'root', 'root', 'mygreen') or 
die(mysqli_connect_error());
mysqli_set_charset($green, 'utf8');

$sql = sprintf('INSERT INTO my_items SET screen_name="%s", 
                                         sex="%s", 
                                         age=%d,
                                         img="%s"',
    mysqli_real_escape_string($green, $_POST['screen_name']),
    mysqli_real_escape_string($green, $_POST['sex']),
    mysqli_real_escape_string($green, $_POST['age']),
    mysqli_real_escape_string($green, "{$name}")
);
mysqli_query($green, $sql) or die(mysqli_error($green));
?>

<?php
$green = mysqli_connect('localhost', 'root', 'root', 'mygreen') or 
die(mysqli_connect_error());
mysqli_set_charset($green, 'utf8');
?>