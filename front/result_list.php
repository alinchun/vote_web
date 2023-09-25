<?php 

$subjects=$pdo->query("SELECT `topics`.`id`,
                              `topics`.`subject`,
                                sum(`options`.`total`) as '總計'
                       FROM `topics`,`options` 
                       WHERE `topics`.`id`=`options`.`subject_id` 
                       GROUP BY `topics`.`id`;")->fetchAll(PDO::FETCH_ASSOC);

?>

<style>
  .container{
    width: 500px;
  }
</style>
<div class="container mt-3 result-list-self">
  <h2>選擇投票主題</h2>  
  <div class="container">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>序號</th>
        <th>主題</th>
        <th>票數</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    foreach($subjects as $idx => $subject){
    ?>
      <tr>
        <td><?=$idx+1;?>.</td>
        <td><a href="index.php?do=result&id=<?=$subject['id'];?>">
                <?=$subject['subject'];?>
            </a>
        </td>
        <td><?=$subject['總計'];?></td>
      </tr>
      <?php
    }
    ?>
      
    </tbody>
  </table>
  </div>
</div>



    




