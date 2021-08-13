<?php
    $dsn = 'mysql:dbname=tb230348db;host=localhost';
    $user = 'tb-230348';
    $password = 'RhdCT94PUm';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
?>
<?php
    error_reporting(0);
    //if($_POST["edit_num"] == $top){
        //if($check == "true"){ 
        if(!empty($_POST["edit_num"])){
            $array1 =[NULL,NULL,NULL];
            $id = $_POST['edit_num'];
            $pass = htmlspecialchars($_POST['pass2'],ENT_QUOTES,"UTF-8");
            
            $sql = 'select * from mission5 where id=:id and pass=:pass';
            $stmt = $pdo -> prepare($sql);
            
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
            $stmt -> execute();
            $results = $stmt -> fetchAll();
            
            $array1[0] = $_POST['edit_num'];
            $array1[1] = $results[0]['name'];
            $array1[2] = $results[0]['comment'];
            $array1[3] = $_POST['pass'];
        }
        //}
    //}
    //$_POST["edit_num"]
?>
<html lang ="ja">
<html>
<head>
    <meta charset="UTF-8">
    <title>mission_1-05</title>
<body>
    <form action="" method="post">
        <?php 
            if($array1[1]!=NULL){
        ?>
        <input style="height:0px" type="hidden" name="num" placeholder="編集番号" value=<?php echo $array1[0];?>>
        <input type="text" name="name2" placeholder="名前" value=<?php echo $array1[1];?>>
        <input type="text" name="comment2" placeholder="コメント" value=<?php echo $array1[2];?>>
        <input style="height:0px" type="hidden"name="pass3" value=<?php echo $array1[3];?>>
    </form>
        <?php 
            }else{
        ?>
    <form action="" method="post" style="margin:0px">
        <input type="text" name="name" placeholder="名前">
        <input type="text" name="pass" placeholder="パスワード">
        <input type="text" name="comment" placeholder="コメント" >
        <input type="submit"name="submit">
        <?php
            }
        ?>
    </form>
    <form action="" method="post">
        <input type="text" name="delete" placeholder="削除番号">
        <input type="text" name="pass1" placeholder="パスワード">
        <input type="submit"name="submit2"value="削除">
    </form>
    <form action="" method="post">
        <input type="text" name="edit_num" placeholder="編集番号">
        <input type="text" name="pass2" placeholder="パスワード">
        <input type="submit"name="submit3"value="編集">
    </form>
</body>
<?php
//パスワード機能
//$pass1は作成したpass
//$pass2は確認用のpass

//編集機能
if(!empty($_POST["num"])){
    $id = $_POST["num"];
    
    $name = $_POST["name2"];
    //echo $name;
    $comment = $_POST["comment2"];
    //echo $comment;
    $date = date("Y年m月d日 H時i分s秒");
    //echo $date;

        //echo $comment1."<br>";
        
        $sql = 'UPDATE mission5 SET name=:name,comment=:comment,date=:date WHERE id=:id';
        
        $stmt = $pdo->prepare($sql);//statementの略で状態
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        
        $stmt->execute();
}

//削除機能
if(!empty($_POST["delete"]) ){
    $id = $_POST["delete"];
    
    $pass = htmlspecialchars($_POST['pass1'],ENT_QUOTES,"UTF-8");
    echo $id.$pass."<br>";
        //if($pass1 == $pass2 || $pass1 == $pass3){//パスワードが一致
    echo "po";
    $sql = 'delete from mission5 where id=:id and pass=:pass';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
    $stmt->execute();
        //}
}

//追加機能
if(!empty($_POST["name"]) && !empty($_POST["comment"]) && !empty($_POST["pass"])){

    $name = htmlspecialchars($_POST['name'],ENT_QUOTES,"UTF-8");
    $comment = htmlspecialchars($_POST['comment'],ENT_QUOTES,"UTF-8");
    $pass = htmlspecialchars($_POST['pass'],ENT_QUOTES,"UTF-8");
    $date = date("Y年m月d日 H時i分s秒");
    
    $sql = $pdo -> prepare("INSERT INTO mission5 (name,comment,date,pass) VALUES(:name,:comment,:date,:pass)");//データをいじるときに$pdoを使う？
    $sql -> bindParam(':name', $name, PDO::PARAM_STR);
    $sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
    $sql -> bindParam(':date', $date, PDO::PARAM_STR);
    $sql -> bindParam(':pass', $pass, PDO::PARAM_STR);
    
    $sql -> execute();
    
}
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
        echo "<hr>";
    }

?>