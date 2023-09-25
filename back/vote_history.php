<style>
    .vote-history{
        text-align: center;
        font-size: 30px;
        

    }
    a{
        text-decoration: none;
    }
</style>
<br>
<h1>投票紀錄</h1>
<div class="vote-history">




<?php

$user=$pdo
        ->query("select * from `members` where `acc`='{$_SESSION['login']}'")
        ->fetch(PDO::FETCH_ASSOC);

$logs=$pdo
        ->query("select * from `logs` where `mem_id`='{$user['id']}'")
        ->fetchAll(PDO::FETCH_ASSOC);
       

foreach($logs as $log){
    $topic=$pdo
            ->query("select `id`, `subject` from `topics` where `id`='{$log['topic_id']}'")
            ->fetch(PDO::FETCH_ASSOC);
    echo "<div><a href='?do=vote_detail&log_id={$log['id']}&sub_id={$topic['id']}'>";
    echo $topic['subject'];
    echo "</a>" ;
    echo "&nbsp;" ;
    echo $log['vote_time'];
    echo "</div>";
}


?>
</div>
