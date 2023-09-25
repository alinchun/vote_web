<?php include_once "./db.php";
$do = '';
if (isset($_GET['do'])) {
    $do = $_GET['do'];
} else {
    if (isset($_SESSION['pr'])) {
        $do = $_SESSION['pr'];
    } else {
        $do = "error";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VOTE</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="../style_front.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div>
        <div class="index_br">
            <a href="index.php"><img src="./image/vote_br.jpg" height="400px"></a>
        </div>
        <nav>
            <div class="navbar-bg-93b4ea">
                <ul class="menu">
                    <li class="hello_text ">
                        <?php
                        if (isset($_SESSION['login']) && $_SESSION['pr']) {
                            echo $_SESSION['login'];
                            echo "-";
                            echo $_SESSION['pr'];
                        }
                        ?>
                        歡迎您
                    </li>
                    <li>
                        <a href="index.php">首頁</a>
                    </li>
                    <li>
                        <a href="index.php?do=result_list">投票結果</a>
                    </li>
                    <li class="nav-bar">
                        <?php
                        if (!isset($_SESSION['login'])) {
                        ?>
                            <a href="index.php?do=login">登入</a>
                            <a href="index.php?do=reg">註冊</a>
                        <?php
                        } else {
                        ?>
                            <a href="./api/logout.php">登出</a>
                        <?php
                            switch ($_SESSION['pr']) {
                                case "super":
                                    echo "<a href='backend.php?do=super'>系統管理</a>";
                                    break;
                                case "member":
                                    echo "<a href='backend.php?do=member'>會員中心</a>";
                                    break;
                                case "admin":
                                    echo "<a href='backend.php?do=admin'>管理</a>";
                                    break;
                            }
                        }
                        ?>



                    </li>
                    
                    <li>
                        <input class="search-bar" type="search" name="search" id="search" placeholder="請輸入關鍵字">
                        <button class="search-btn">Search</button>

                    </li>
                   

                </ul>
            </div>

        </nav>
    </div>
    <div class="main">
        <main>
            <?php


            $do = $_GET['do'] ?? 'list';

            $file = "./front/" . $do . ".php";

            if (file_exists($file)) {
                include $file;
            } else {
                include "./front/list.php";
            }
            ?>


        </main>
    </div>



</body>

</html>






<footer>

    All pictures are used from Freepik.

</footer>

</body>

</html>