<?php
$dsn = 'mysql:dbname=tb230348db;host=localhost';
    $user = 'tb-230348';
    $password = 'RhdCT94PUm';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
$sql = "CREATE TABLE IF NOT EXISTS mission5"
    ." ("
    . "id INT(11) AUTO_INCREMENT PRIMARY KEY,"//AUTO_INCREMENTは自動で１ずつ追加されていく。プライマリーキーは主キー
    . "name char(32),"//char型32ビット
    . "comment TEXT,"//テキスト
    . "date char(32),"//日付
    . "pass varchar(32)"
    .");";
    
    $stmt = $pdo->query($sql);
?>