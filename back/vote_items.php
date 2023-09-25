<?php

$sql="select * from `logs` where `topic_id`='{$_GET['sub_id']}'";
$logs=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$subject=$pdo
            ->query("select `subject` from `topics` where `id`='{$_GET['sub_id']}'")
            ->fetchColumn();
?>
<style>
  

.vote-items{
    border-collapse: collapse;
    width:600px;
    margin:auto;
    font-size: 30px;
}
#vote-items-btn{
    font-size: 20px;
            background-color: transparent;
            color: blue;
            border: 2px solid #7B85D4;
            border-radius: 12px;      
}


</style>
<br>
<h1><?=$subject;?></h1>
<div>
<br>
<table class="vote-items">
    <tr>
        <td>會員</td>
        <td>投票時間</td>
        <td>操作</td>
    </tr>
    <?php
    foreach($logs as $log){
        $sql_name="select `acc` from `members` where `id`='{$log['mem_id']}'";
        $acc=$pdo->query($sql_name)->fetchColumn();
        if($acc==''){
            $acc="訪客";
        }
    ?>
    <form action="./api/del_log.php" method="post">
        <tr>
            <td><?=$acc;?></td>
            <td><?=$log['vote_time'];?></td>
            <td>
                <input type="hidden" name="topic_id" value="<?=$log['topic_id'];?>">
                <input type="hidden" name="id" value="<?=$log['id'];?>">
                <button type="submit" id="vote-items-btn">刪除</button>
            </td>
        </tr>
    </form>
    <?php
    }
    ?>
</table>

</div>