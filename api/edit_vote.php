<?php
include_once "../db.php";

$sql="update `topics` 
        set `subject`='{$_POST['subject']}',
            `open_time`='{$_POST['open_time']}',
            `close_time`='{$_POST['close_time']}',
            `type`='{$_POST['type']}',
            `img`='{$_FILES['img']['name']}'
        where `id`='{$_POST['subject_id']}'";

$pdo->exec($sql);

$options=$pdo->query("select `id` from `options` where `subject_id`='{$_POST['subject_id']}' ")
             ->fetchAll(PDO::FETCH_ASSOC);

if(!empty($options)){
    if(isset($_POST['opt_id'])){
     
        foreach($options as $opt){
            if(!in_array($opt['id'],$_POST['opt_id'])){
                $pdo->exec("delete from `options` where `id`='{$opt['id']}'");
            }
        }
    }else{
        
        $pdo->exec("delete from `options` where `subject_id`='{$opt['subject_id']}'");
    }

}


if(isset($_POST['opt_id'])){
    foreach($_POST['opt_id'] as $idx => $id){
       $pdo->exec("update `options` set `description`='{$_POST['description'][$idx]}' where `id`='$id'");
       unset($_POST['description'][$idx]);
    }

}


if(!empty($_POST['description'])){
    foreach($_POST['description'] as $desc){
        $pdo->exec("insert into `options` (`description`,`subject_id`) values('$desc','{$_POST['subject_id']}')");
    }
}

$image='';
if(!empty($_FILES['img']['tmp_name'])){
    if(in_array($_FILES['img']['type'],['image/jpeg','image/jpg','image/png','image/gif'])){
        move_uploaded_file($_FILES['img']['tmp_name'],'../upload/'.$_FILES['img']['name']);
        $image=$_FILES['img']['name'];
    }else{
        header("location:../backend.php?do=add_vote&error=非圖片格式");
        exit();
    }
}




header("location:../backend.php");
