    <style> 
    .btn-warning-self{
        border: none;
        background-color: transparent;
        color:transparent;
    }  
    .btn-warning-self:hover{
        border: none;
        background-color: transparent;
        color:transparent;
    }

        
    </style>


<body>
<div class="container mt-3">
    <h2>投票吧</h2>
    <br>
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="th th-1">序號</th>
                <th class="th th-2">投票主題</th>
                <th class="th th-3">功能</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "select * from `topics` where `close_time` >= '" . date("Y-m-d H:i:s") . "'";
            $rows = $pdo->query($sql)->fetchAll();
            foreach ($rows as $idx => $row) {
            ?>
                <tr>
                    <td><?= $idx + 1; ?></td>
                    <td><?= $row['subject']; ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>
                    <button class="btn btn-outline-primary" onclick="location.href='?do=vote&id=<?= $row['id']; ?>'">我要投票</button>
                    &nbsp;  
                    <button  class="btn btn-outline-success">
                            <?php
                            switch ($row['type']) {
                                case 1:
                                    echo "單選";
                                    break;
                                case 2:
                                    echo "多選";
                                    break;
                            }

                            ?>
                        </button>
                        &nbsp;
                        <?php
                        if ($row['login'] == 1) {
                            echo '<button class="btn btn-warning">';
                            echo "會員限定";
                            echo "</button >";

                        } else{
                            
                            echo '<button class="btn btn-warning-self " >';
                            echo "會員限定";
                            echo "</button >";
                        }
                        ?>

                        &nbsp;
                        

                    </td>
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>
</div>


</body>









