<?php

require 'aws/aws-autoloader.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsExpection;
use Aws\S3\ObjectUploader;

ini_set('display_errors', 1);
$name = uniqid(mt_rand());

// S3Clientインスタンスの作成
$array_ini_file = parse_ini_file('credentials.ini', true);

$s3client = S3Client::factory([
    'credentials' => [
        'key' => $array_ini_file['ACCESS_KEY'],
        'secret' => $array_ini_file['SECRET_ACCESS_KEY'],
    ],
    'region' => 'ap-northeast-1',
    'version' => 'latest',
]);

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
$fileName = "{$name}.{$type}";
 file_put_contents("images/$fileName", $data);
 
// S3にアップロード
$result = $s3client->putObject([
    'ACL' => 'public-read',
    'Bucket' => $array_ini_file['BUCKET_NAME'],
    'Key' => "upload/$fileName",
    'SourceFile' => "images/$fileName",
    'ContentType' => mime_content_type("images/$fileName"),
]);
 
$green = mysqli_connect('127.0.0.1', 'root', 'NZU@789xyz', 'green-letter') or 
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
// $green = mysqli_connect('http://18.176.91.25/', 'root', 'NZU@789xyz', 'mygreen') or 
// die(mysqli_connect_error());
// mysqli_set_charset($green, 'utf8');
?>