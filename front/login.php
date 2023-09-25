<style>
    h1 {
        text-align: center;
    }

    .container {
        width: 400px;
    }
</style>


<h1>會員登入</h1>
<?php
if (isset($_GET['error'])) {
    echo "<span style='color:red'>";
    echo "帳號或密碼錯誤";
    echo "</span>";
}
if (isset($_GET['msg'])) {
    echo "<span style='color:orange'>";
    echo $msg[$_GET['msg']];
    echo "</span>";
}

?>
<div class="login">
    <div class="container">
        <form action="./api/login.php" method="post">
            <div class="row g-3 align-items-center">
                <div class="form-floating mb-3">
                    <input type="number" name="acc" class="form-control" id="floatingInput acc" placeholder="請輸入您的電話號碼"  >
                    <label for="floatingInput acc">帳號(請輸入您的電話號碼)</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword pw" name="pw" placeholder="請輸入英文字母及數字組合">
                    <label for="floatingPassword">密碼(請輸入英文字母及數字組合)</label>
                </div>

                <div>
                    <input type="submit" id="edit-self-btn" class="btn btn-outline-primary" value="登入">

                </div>
        </form>
    </div>
</div>