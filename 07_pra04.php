<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>九九乘法表</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            max-width: 800px;
            width: 100%;
        }
        h3 {
            color: #fff;
            margin-bottom: 20px;
            font-size: 1.8em;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        p, div {
            color: #fff;
        }
        .back-btn {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        .back-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-3px);
        }
        table {
            border: 1px solid black;
            text-align: center;
        }

        .table11 td{
            border: 0px;
            padding: 10px;
        }

        .table2 {
            border-collapse:collapse;
        }
        
        .table2 th{
            background-color: #ddd;
            border: 1px solid black;
            padding: 10px;
        }

        .table2 td{
            border: 1px solid black;
            padding: 10px;
        }
        
    </style>

</head>
<body>
    <div class="container">
        <a href="index.html" class="back-btn">← 返回首頁</a>
        <h3>九九乘法表</h3>
        <img src="九九乘法表.png" alt="九九乘法表">

    <br>
    <br>
    <br>
    <br>
    <br>

    <div>
        <table>
            <tr>
                <td>
                    <table">
                        <tr>
                            <td>
                                <table class="table1">
                                    <?php
                                    for($i=1; $i<=9; $i++){
                                        echo "<tr>";
                                        for($j=1; $j<=9; $j++){
                                            echo "<td>" . $j . " x " . $i . " = " . ($i*$j) . "</td>";
                                        }
                                        echo "</tr>";
                                    }
                                    ?>
                                </table>
                            </td>
                        </tr>

                    </td>
                </tr>
            </table>
        </table>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>

    

    <div>
        <table>
            <tr>
                <td>
                    <table">
                        <tr>
                            <td>
                                <table class="table2">
                                    <tr>
                                        <th></th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                        <th>6</th>
                                        <th>7</th>
                                        <th>8</th>
                                        <th>9</th>
                                    </tr>
                                    <?php
                                    for($i=1; $i<=9; $i++){
                                        echo "<tr>";
                                        echo "<th>" . $i . "</th>";
                                        for($j=1; $j<=9; $j++){
                                            echo "<td>" . ($j*$i) . "</td>";
                                        }
                                        echo "</tr>";
                                    }
                                    ?>
                                </table>
                            </td>
                        </tr>

                    </td>
                </tr>
            </table>
        </table>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>

    <div>
        <table>
            <tr>
                <td>
                    <table">
                        <tr>
                            <td>
                                <table class="table2">
                                    <tr>
                                        <th></th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                        <th>6</th>
                                        <th>7</th>
                                        <th>8</th>
                                        <th>9</th>
                                    </tr>
                                    <?php
                                    for($i=1; $i<=9; $i++){
                                        echo "<tr>";
                                        echo "<th>" . $i . "</th>";
                                        for($j=1; $j<=9; $j++){
                                            if($j<=$i){
                                                echo "<td>" . ($j*$i) . "</td>";
                                            }else{
                                                echo "<td></td>";
                                            }
                                        }
                                        echo "</tr>";
                                    }
                                    ?>
                                </table>
                            </td>
                        </tr>

                    </td>
                </tr>
            </table>
        </table>
    </div>
    </div>

</body>
</html>