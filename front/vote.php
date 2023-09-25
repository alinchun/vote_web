<?php

$topic = $pdo->query("select * from `topics` where `id`='{$_GET['id']}'")->fetch(PDO::FETCH_ASSOC);
if ($topic['login'] == 1) {
    if (!isset($_SESSION['login'])) {
        $_SESSION['position'] = "/index.php?do=vote&id={$_GET['id']}";
        header("location:index.php?do=login&msg=1");
    }
}

$options = $pdo->query("select * from `options` where `subject_id`='{$_GET['id']}'")->fetchAll(PDO::FETCH_ASSOC);
?>
<style>


</style>
<link rel="stylesheet" href="./css/style.css">

<h2><?= $topic['subject']; ?></h2>
<div>

    <?php
    if (!empty($topic['img'])) {
        echo "<img src='./upload/{$topic['img']}' style='width:450px;height:300px'>";
    }
    ?>
    <form action="./api/vote.php" method="post">
        <div class="vote-option">
            <?php
            foreach ($options as $idx => $opt) {
                echo '<p class="vote-option">';
                switch ($topic['type']) {
                    case 1:
                        echo "<input type='radio' name='desc' value='{$opt['id']}'>";
                        break;
                    case 2:
                        echo "<input type='checkbox' name='desc[]' value='{$opt['id']}'>";
                        break;
                }

                echo "<span>&nbsp;&nbsp;" . ($idx + 1) . ". </span>";
                echo "<span>{$opt['description']}</span>";
                echo "</p>";
            }
            ?>
        </div>

        <div>
            <input type="hidden" name="subject_id" value="<?= $_GET['id']; ?>">
            <input type="submit" id="vote-btn" value="投票">
            <input type="reset" id="cancel-btn" value="取消">
        </div>

    </form>

</div>