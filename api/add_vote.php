<?php
include_once "../db.php";
$sql_chk_subject="select count(*) from `topics` where subject='{$_POST['subject']}'";
$chk=$pdo->query($sql_chk_subject)->fetchColumn();



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

if($chk>0){
    echo "此主題已被使用過,請修改主題內容";
    echo "<a href='../back/add_vote.php'>返回新增主題</a>";
}else{
    $sql="INSERT INTO `topics`(`subject`, `open_time`, `close_time`, `type`,`img`,`login`) 
        VALUES ('{$_POST['subject']}','{$_POST['open_time']}','{$_POST['close_time']}','{$_POST['type']}','$image','{$_POST['login']}')";
    $pdo->exec($sql);

    $sql_subject_id="select `id` from `topics` where `subject`='{$_POST['subject']}'";
    
    $subject_id=$pdo->query($sql_subject_id)->fetchColumn();

    
        foreach($_POST['description'] as $desc){
            if($desc!=''){
             $sql_option="INSERT INTO `options`(`description`,`subject_id`) 
                       VALUES ('$desc','$subject_id')";

                 echo "$sql_option"    ;
                
                $pdo->exec($sql_option);


         }
    }
}






header("location:../backend.php");