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
    <title>管理後台</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery-3.7.0.min.js"></script>
</head>

<body>
    <div class="backend_br">
        <a href="backend.php"><img src="./image/vote_bg.png" height="400px"></a>
    </div>
    <nav>
        <div class="backend_nav_bg">
            <ul class="backend_menu">
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
                <li>
                    <a href="./api/logout.php">登出</a>
                </li>

                <li><a href="backend.php">管理</a>
                    <ul>
                        <?php
                        if (isset($_SESSION['pr'])) {
                            switch ($_SESSION['pr']) {
                                case "super":
                                    echo "<li>";
                                    echo "<a href='./backend.php?do=super'>權限設定</a>";
                                    echo "<li>";
                                    echo "<li>";
                                    echo "    <a href='./backend.php?do=add_vote'>新增投票項目</a>";
                                    echo "</li>";
                                    echo "<li>";
                                    echo "    <a href='./backend.php?do=admin'>管理投票項目</a>";
                                    echo "</li>";
                                    echo "<li>";
                                    echo "    <a href='./backend.php?do=query_vote'>投票明細管理</a>";
                                    echo "</li>";                                    
                                    echo "<li>";
                                    echo "    <a href='./backend.php?do=vote_history'>投票紀錄查詢</a>";
                                    echo "</li>";
                                    echo "<li>";
                                    echo "    <a href='./backend.php?do=edit_self'>修改個人資料</a>";
                                    echo "</li>";

                                    break;
                                case "admin":
                                    echo "<li>";
                                    echo "    <a href='./backend.php?do=add_vote'>新增投票</a>";
                                    echo "</li>";
                                    echo "<li>";
                                    echo "    <a href='./backend.php?do=admin'>管理投票項目</a>";
                                    echo "</li>";
                                    echo "<li>";
                                    echo "    <a href='./backend.php?do=query_vote'>投票明細管理</a>";
                                    echo "</li>";
                                    echo "<li>";
                                    echo "    <a href='./backend.php?do=vote_history'>投票紀錄查詢</a>";
                                    echo "</li>";
                                    echo "<li>";
                                    echo "    <a href='./backend.php?do=edit_self'>修改個人資料</a>";
                                    echo "</li>";
                                    break;
                                case "member":
                                    echo "<li>";
                                    echo "    <a href='./backend.php?do=edit_self'>修改個人資料</a>";
                                    echo "</li>";
                                    echo "<li>";
                                    echo "    <a href='./backend.php?do=vote_history'>投票紀錄查詢</a>";
                                    echo "</li>";
                                    break;
                            }
                        }
                        ?>
                    </ul>
                <li>
                    <input class="search-bar" type="search" name="search" id="search" placeholder="請輸入關鍵字">
                    <button class="search-btn">Search</button>

                </li>
            </ul>
        </div>
    </nav>



   
    </nav>
    <div class="backend_main_bg ">
        <main>
            <?php
            $file = "./back/" . $do . ".php";
            if (file_exists($file)) {
                include $file;
            } else {
                include "./back/error.php";
            }
            ?>
        </main>

    </div>




</body>
<footer>

    All pictures are used from Freepik.

</footer>

</html>