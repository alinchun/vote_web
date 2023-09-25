<style>
    .del-vote{
        font-size: 30px;
    }
    #del-btn,#cancel-btn{
        font-size: 20px;
            background-color: transparent;
            color: blue;
            border: 2px solid #7B85D4;
            border-radius: 12px;
            appearance: none;
            margin-bottom: 20px;

    }
    #cancel-btn{
        font-size: 20px;
            background-color: transparent;
            color: green;
            border: 2px solid #7B85D4;
            border-radius: 12px;
            appearance: none;
            margin-bottom: 20px;

    }
    </style>
<?php  
$row=$pdo->query("select * from `topics` where id='{$_GET['id']}'")->fetch(PDO::FETCH_ASSOC);
?>

<h3>你確定要刪除以下這個投票主題及相關的資料嗎?</h3>
<div class="del-vote"><?=$row['subject'];?></div>

<div>
    <button id="del-btn" onclick="location.href='./api/del_vote.php?id=<?=$_GET['id'];?>'">確定刪除</button>
    <button id="cancel-btn" onclick="location.href='./backend.php'">取消</button>
</div>