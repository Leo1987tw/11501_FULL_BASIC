<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>九九乘法表</title>
    <style>
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
    <h2>九九乘法表</h2>
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

        <br>
    <br>
    <br>
    <br>
    <br>

</body>
</html>