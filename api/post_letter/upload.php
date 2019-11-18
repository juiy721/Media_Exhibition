<?php 
 require 'aws/aws-autoloader.php';

 use Aws\S3\S3Client;
 use Aws\Exception\AwsExpection;
 use Aws\S3\ObjectUploader;

// S3Clientインスタンスの作成
$array_ini_file = parse_ini_file('credentials.ini', true);
​
$s3client = S3Client::factory([
    'credentials' => [
        'key' => $array_ini_file['ACCESS_KEY'],
        'secret' => $array_ini_file['SECRET_ACCESS_KEY'],
    ],
    'region' => 'ap-northeast-1',
    'version' => 'latest',
]);
​
// ローカルにファイル作成
$file = date('YmdHis') . '.txt';
​
$content = <<< EOF
hoge
ふが
EOF;
​
file_put_contents($file, $content);
​
// S3にアップロード
$result = $s3client->putObject([
    'ACL' => 'public-read',
    'Bucket' => $array_ini_file['BUCKET_NAME'],
    'Key' => 'upload/test.txt',
    'SourceFile' => $file,
    'ContentType' => mime_content_type($file),
]);
​
// 結果を表示
echo('<pre>');
var_dump($result);
echo('</pre>');
折りたたむ



