<?php

$sub_id=$_GET['sub_id'];
$log_id=$_GET['log_id'];
$subject=$pdo->query("select `subject` from `topics` where `id`='{$sub_id}'")->fetchColumn();
$options=$pdo->query("select * from `options` where `subject_id`='{$sub_id}'")->fetchAll(PDO::FETCH_ASSOC);

$log=$pdo->query("select * from `logs` where `id`='{$log_id}'")->fetch(PDO::FETCH_ASSOC);
$records=unserialize($log['records']);
// echo "<pre>";
// print_r($records);
// echo "</pre>";
?>

<style>
    .vote-detail{
       
        
        font-size: 30px;

    }

</style>
<br>
<h1><?=$subject;?></h1>
<br>
<div class="vote-detail">

    <?php
    foreach($options as $opt){

    ?>
    <div class="vote-detail-item">
        <div>

        <?php
            if(in_array($opt['id'],$records)){
                
                echo "●";
               
            }
        ?>
        
        <?=$opt['description'];?>
        </div>
    </div>
    <?php
    }
    ?>
</div>