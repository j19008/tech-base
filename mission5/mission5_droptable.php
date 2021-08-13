<?php
    // DB接続設定
    $dsn = 'mysql:dbname=tb230348db;host=localhost';
    $user = 'tb-230348';
    $password = 'RhdCT94PUm';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
    $sql = 'DROP TABLE mission5';
    $stmt = $pdo->query($sql);
?>