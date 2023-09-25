<?php
$topic = $pdo->query("select * from `topics` where `id`='{$_GET['id']}'")
    ->fetch(PDO::FETCH_ASSOC);

$options = $pdo->query("select * from `options` where `subject_id`='{$_GET['id']}'")
    ->fetchAll(PDO::FETCH_ASSOC);

?>

<style>
    h2 {
        text-align: center;
    }

    p {
        text-align: left
    }

    .edit-vite {
        display: flex;
        text-align: right;
        padding: 5px;
    }

    .edit-vite>label {
        float: left;
        text-align: right;
        margin: 5px;


    }

    #subject,
    #open_time,
    #close_time,
    #img,
    #description-input {
        font-size: 20px;
        background-color: transparent;
        border: 2px solid #CCC;
        border-radius: 12px;
        appearance: none;
        margin-bottom: 5px;
    }

    #subject,
    #open_time,
    #close_time,
    #img,
    #description-input {
        background-color: white;
    }

    #radio {
        font-size: 20px;
    }

    #submit-btn {
        font-size: 20px;
        background-color: transparent;
        color: blue;
        border: 2px solid #7B85D4;
        border-radius: 12px;
        appearance: none;
        margin-bottom: 20px;
        text-align: center;

    }
</style>
<link rel="stylesheet" href="./css/style.css">

<body>


    <h1>編輯主題</h1>
    <div class=edit-vite>
        <form action="./api/edit_vote.php" method="post" enctype="multipart/form-data">
            <p>
                <label for="subject">主題說明</label>
                <input type="text" name="subject" id="subject" class="subject-input" width="400px" value="<?= $topic['subject']; ?>">
            </p>
            <div class="time-set">

                <p class="time-item">
                    <label for="open_time">開放時間</label>
                    <input type="datetime-local" name="open_time" id="open_time" value="<?= $topic['open_time']; ?>">
                </p>
                <p class="time-item">
                    <label for="close_time">關閉時間</label>
                    <input type="datetime-local" name="close_time" id="close_time" value="<?= $topic['close_time']; ?>">
                </p>
                </p>

                <p>
                    <label for="type">單複選：</label>
                    <input type="radio" name="type" id="radio" value="1" <?= ($topic['type'] == 1) ? 'checked' : ''; ?>>單選&nbsp;&nbsp;
                    <input type="radio" name="type" id="radio" value="2" <?= ($topic['type'] == 2) ? 'checked' : ''; ?>>複選
                </p>

                <p>
                    <label for="img">上傳圖檔：</label>
                    <input type="file" name="img" id="img">
                </p>               

                <div class="options">
                    <?php
                    foreach ($options as $opt) {

                    ?>
                        <p>
                            <label for="description">選項</label>
                            <input type="text" name="description[]" class="description-input" id="description-input" value="<?= $opt['description'] ?>">
                            <span onclick="addoption()">
                                <img src="./image/add.png" width="30px" height="30px">
                            </span>
                            <span onclick="removeoption(this)">
                                <img src="./image/minus.png" width="30px" height="30px">
                            </span>
                            <input type="hidden" name="opt_id[]" value="<?= $opt['id']; ?>">
                        </p>
                    <?php
                    }
                    ?>
                </div>


                <div>
                    <input type="hidden" name="subject_id" value="<?= $topic['id']; ?>">
                    <input type="submit" id="submit-btn" value="編輯">
                </div>

        </form>
    </div>

</body>

</html>

<script>
    function addoption() {
        let opt = `<p class="options">
                <label for="description">選項</label>
                <input type="text" name="description[]"  class="description-input" value=>
                <span onclick="addoption()">
                <img src="./image/add.png" width="30px" height="30px">
                </span>
                <span onclick="removeoption(this)">
                <img src="./image/minus.png" width="30px" height="30px">
                </span>
            </p>`
        $(".options").append(opt);
    }

    function removeoption(el) {
        let dom = $(el).parent()
        $(dom).remove();

    }
</script>