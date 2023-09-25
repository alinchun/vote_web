<?php

include_once "../db.php";

$opt = $_POST['desc'];





$subject_id = $_POST['subject_id'];
if (isset($_SESSION['login'])) {
    $mem_id = $pdo->query("select `id` from `members` where `acc`='{$_SESSION['login']}'")->fetchColumn();
    $subject_repeat = $pdo->query("select count(*) from `logs` where `mem_id`='$mem_id' And `topic_id`='$subject_id'")->fetchColumn();
    if ($subject_repeat > 0) {
        echo "<script>alert('此主題已投票，請重新選擇主題'); location.href ='../index.php';</script>";
        exit();
    }
}
$subject_type = $pdo->query("select `type` from `topics` where `id`='$subject_id'")->fetchColumn();

switch ($subject_type) {
    case 1:
        $pdo->exec("update `options` set `total`=`total`+1 where `id`='$opt'");
        break;
    case 2:
        foreach ($opt as $opt_id) {
            $pdo->exec("update `options` set `total`=`total`+1 where `id`='$opt_id'");
        }
        break;
}


if (isset($_SESSION['login'])) {
    $mem_id = $pdo->query("select `id` from `members` where `acc`='{$_SESSION['login']}'")->fetchColumn();
} else {
    $mem_id = 0;
}

$topic_id = $_POST['subject_id'];
$vote_time = date("Y-m-d H:i:s");



$records = serialize([$_POST['subject_id'] => $opt]);

$sql = "insert into `logs`(`mem_id`,`topic_id`,`vote_time`,`records`) 
                  values('$mem_id','$topic_id','$vote_time','$records')";
$pdo->exec($sql);





header("location:../index.php?do=result&id=$subject_id");
