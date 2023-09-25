<?php
$sql="select * from `members`";
$mems=$pdo->query($sql)->fetchAll();
?>




<div class="container  bg-self-height">
<h2 class="text-center mt-3">會員權限設定</h2>
</div>

<div class="container bg-self-height">           
  
  <table class="table table-hover  ">
  <form action="../api/change_pr.php" method="post">
    <thead>
      <tr>
        <th>會員</th>
        <th>權限</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody>
    <?php
    foreach($mems as $mem){
    ?>
      <tr>
        <td><?=$mem['acc'];?></td>
        <td><select name="pr">
                <option value="super" <?=($mem['pr']=='super')?'selected':'';?>>超級管理員</option>
                <option value="admin" <?=($mem['pr']=='admin')?'selected':'';?>>管理員</option>
                <option value="member" <?=($mem['pr']=='member')?'selected':'';?>>會員</option>
            </select>
        </td>
        <td><input type="hidden" name="id" value="<?=$mem['id'];?>">
            <button type="submit" class="btn  btn-outline-primary">編輯</button>
            <button type="button" class="btn  btn-outline-warning">刪除</button>
            
  <?php
}
?>
        </td> 
    </tr>
    </tbody>
  </form>

  </table>

  


