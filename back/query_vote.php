<style>
    .quert-vote{
        text-align: center;
        font-size: 30px;
        

    }
    a{
        text-decoration: none;
    }
</style>
<br>
<h1>投票明細管理</h1>
<br>
<div class="quert-vote">

<?php
$subjects=$pdo->query("select * from `topics`");

$logs=$pdo
        ->query("select * from `logs`")
        ->fetchAll(PDO::FETCH_ASSOC);
        // echo "<pre>";
        // print_r($logs);
        // echo "</pre>";

foreach($subjects as $sub){
    echo "<div>";
    echo    "<a href='?do=vote_items&sub_id={$sub['id']}'>";
    echo        $sub['subject'];
    echo    "</a>";
    echo "</div>";
}




?>
</div>