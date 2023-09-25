<?php
$id = $_GET['id'];
$options = $pdo->query("select * from `options` where `subject_id`=$id")->fetchAll(PDO::FETCH_ASSOC);
$subject = $pdo->query("select * from `topics` where `id`=$id")->fetch(PDO::FETCH_ASSOC);

?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
   .container{
    display: flex;
    width: 800px;
    justify-content: space-around;
   }
   

.chart{
    font-size: 30px;
}
</style>



<h1>投票結果</h1>

    <h2><?= $subject['subject']; ?></h2>
    <div class="container">
    <div>
        <!-- <div class="table">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>序號</th>
                        <th>項目</th>
                        <th>票數</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($options as $idx => $option) {
                    ?>
                        <tr>
                            <td><?= $idx + 1; ?>.</td>
                            <td><?= $option['description']; ?></td>
                            <td><?= $option['total']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div> -->

        <div class="chart">
            <div class="chart_bg">
                <canvas id="myChart" width="600px" height="400px"></canvas>

            </div>

            <script>
                const ctx = document.getElementById('myChart').getContext('2d');
                // console.log(ctx);

                let myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {

                        labels: [
                            <?php
                            foreach ($options as $idx => $option) {
                                $tmp[] = $option['description'];
                            }

                            echo "'" . join("','", $tmp) . "'";
                            ?>
                        ],
                        datasets: [{
                            label: '票數',
                            axis: 'y',

                            data: [
                                <?php
                                foreach ($options as $idx => $option) {
                                    $tmp2[] = $option['total'];
                                }

                                echo "'" . join("','", $tmp2) . "'";

                                ?>
                            ],

                            backgroundColor: [
                                'rgba(255, 99, 132,0.8 )',
                                'rgba(54, 162, 235,0.8 )',
                                'rgba(255, 206, 86,0.8 )',
                                'rgba(75, 192, 192,0.8 )',
                                'rgba(153, 102, 255,0.8)',
                                'rgba(255, 159, 64,0.8 )'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        indexAxis: 'y',
                        scales: {
                            x: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>
        </div>
    </div>
</div>