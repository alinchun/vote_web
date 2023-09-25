<div class="container mt-3">
    <br>
  <h2 mt-3>管理投票項目</h2>
              
  <table class="table table-hover">
    <thead>
      <tr>
        <th>主題</th>
        <th>狀態</th>
        <th>期間</th>
        <th>投票數</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody mt-3>
    <?php
    $sql="SELECT `topics`.*,
            sum(`options`.`total`) as '總計'
          FROM `topics`,`options` 
          WHERE `topics`.`id`=`options`.`subject_id` 
          GROUP BY `topics`.`id`;";

    $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    

    foreach($rows as $row){
?>
      <tr>
        <td><?=$row['subject'];?></td>
        <td>
        <?php
                $now=strtotime('now');
                $open=strtotime($row['open_time']);
                $close=strtotime($row['close_time']);

                if($now<$open){
                    echo "<div class='await'>未開始</div>";
                }else if($now >= $open && $now <=$close){
                    echo "<div class='in-process'>投票中</div>";
                }else{
                    echo "<div class='finish'>己截止</div>";
                }

            ?>
        </td>
        <td><?=$row['open_time']?>
            至
            <?=$row['close_time'];?></td>
        <td><?=$row['總計'];?></td>
        <td><button type="button" class="btn btn-outline-primary" onclick="location.href='./backend.php?do=edit_vote&id=<?=$row['id'];?>'">編輯</button>
            <button type="button" class="btn btn-outline-warning" onclick="location.href='./backend.php?do=del_vote&id=<?=$row['id'];?>'">刪除</button>
            <button type="button" class="btn btn-outline-success" onclick="location.href='./back/open.php?id=<?=$row['id'];?>'">立即上線</button>
            <button type="button" class="btn btn-outline-secondary" onclick="location.href='./back/close.php?id=<?=$row['id'];?>'">立即結束</button></td>
      </tr>
      <?php
    }
?>
      
    </tbody>
    
  </table>
