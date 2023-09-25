<?php


$member = $pdo->query("select * from `members` where `acc`='{$_SESSION['login']}'")
    ->fetch(PDO::FETCH_ASSOC);
?>

<style>
    .container {
        width: 400px;
    }

    h1 {
        text-align: center;
    }

    .edit-self {
        display: flex;
        text-align: right;
        padding: 5px;


    }

    .edit-self>label {
        float: left;
        text-align: right;
        margin: 5px;


    }

    #pw,
    #acc,
    #name,
    #address,
    #email {
        font-size: 20px;
        background-color: transparent;
        border: 2px solid #CCC;
        border-radius: 12px;
        appearance: none;
        margin-bottom: 20px;
    }

    #pw,
    #acc,
    #name,
    #address,
    #email {
        background-color: white;
    }

    #edit-self-btn {
        font-size: 20px;
        background-color: transparent;
        color: blue;
        border: 2px solid #7B85D4;
        border-radius: 12px;
        appearance: none;
        margin-bottom: 20px;

    }
</style>
<div>
    <br>
    <h1>修改資料</h1>
    <br>
    <form action="./api/edit_self.php" method="post">
        <div class="container">
            <div class="row g-3 align-items-center">
                <div class="form-floating mb-3">
                    <input type="number" name="acc" class="form-control" value="<?= $member['acc']; ?>" id="floatingInput acc" readonly>
                    <label for="floatingInput acc">帳號</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword pw" name="pw" value="">
                    <label for="floatingPassword">舊密碼</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword pw" name="pw" value="">
                    <label for="floatingPassword">新密碼</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput name" name="name" value="<?= $member['name']; ?>">
                    <label for="floatingInput name">姓名</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput address" name="address" value="<?= $member['address']; ?>">
                    <label for="floatingPassword addr">地址</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" name="email" id="email" value="<?= $member['email']; ?>">
                    <label for="floatingInput email">電子郵件</label>
                </div>
                <div>
                    <input type="hidden" name="id" value="<?= $member['id']; ?>">
                    <input type="submit" id="edit-self-btn" value="編輯">
                </div>

            </div>

        </div>
    </form>
</div>






