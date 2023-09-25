<?php
include_once "../db.php";



$sql = "update `members` 
       set  `acc`='{$_POST['acc']}',
            `pw`='{$_POST['pw']}',
            `name`='{$_POST['name']}',
            `address`='{$_POST['address']}',
            `email`='{$_POST['email']}'
     where `id`='{$_POST['id']}'";

$pdo->exec($sql);
echo "<script>alert('修改成功');</script>";
header("location:../index.php");
