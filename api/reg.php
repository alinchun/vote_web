<?php
include_once "../db.php";

if (!empty($_POST) && $_POST['acc'] != "" && $_POST['pw'] != "") {
   
    $acc = $_POST['acc'];
    if (strlen($acc) === 10 && ctype_digit($acc)) {
       
        $sql = "INSERT INTO `members` (`acc`, `pw`, `name`, `address`, `email`) 
            VALUES ('{$_POST['acc']}', '{$_POST['pw']}', '{$_POST['name']}', '{$_POST['address']}', '{$_POST['email']}')";
        $pdo->exec($sql);
        header("location:../index.php");
    } else {
        
        header("location:../index.php?do=reg&error=2");
    }
} else {
    header("location:../index.php?do=reg&error=1");
}
?>