<?php
if (isset($_GET['error'])) {
    echo "<span style='color:red'>";
    echo "帳號或密碼不可為空";
    echo "</span>";
}

?>

<style>
    h1 {
        text-align: center;
    }
    .container{
        width: 400px;
    }
    </style>


<div class="wrap_reg">
    <h1>會員註冊</h1>
    <br>
    <div class="reg">

        <form action="./api/reg.php" method="post">
            <div class="container">
                <div class="row g-3 align-items-center">
                    <div class="form-floating mb-3">
                        <input type="number" name="acc" class="form-control" required placeholder="請輸入您的電話號碼" id="floatingInput acc" >
                        <label for="floatingInput acc">帳號(請輸入您的電話號碼)</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword pw" name="pw" placeholder="請輸入英文字母及數字組合">
                        <label for="floatingPassword">密碼(請輸入英文字母及數字組合)</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput name" name="name">
                        <label for="floatingInput name">姓名</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput address" name="address">
                        <label for="floatingPassword addr">地址</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" name="email" id="email">
                        <label for="floatingInput email">電子郵件</label>
                    </div>
                    <div>

                        <input type="submit" id="edit-self-btn" class="btn btn-outline-primary" value="註冊">
                    </div>

                </div>


        </form>
    </div>
</div>