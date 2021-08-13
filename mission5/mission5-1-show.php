<?php
$dsn = 'mysql:dbname=tb230348db;host=localhost';
    $user = 'tb-230348';
    $password = 'RhdCT94PUm';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
$sql = 'select * from mission5';
    $stmt = $pdo->query($sql);
    $results = $stmt->fetchAll();
    foreach ($results as $row){
        //$rowの中にはテーブルのカラム名が入る
        echo $row['id'].',';
        echo $row['name'].',';
        echo $row['comment'].',';
        echo $row['date'].',';
        echo $row['pass'].'<br>';
    }
?>