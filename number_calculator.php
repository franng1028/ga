<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>长度计算器</title>
    <link rel="stylesheet" type="text/css" href="GA.css">
</head>
<body>
    <!-- 导航栏 -->
    <div class="navbar">
        <div class="left">
            <a href="index.php" class="plain-link">欢迎使用多功能计算器</a>
        </div>
        <div class="right">
            <ul>
                <li><a href="number_calculator.php">数字计算器 |</a></li>
                <li><a href="length_calculator.php?type">长度转换 |</a></li>
                <li><a href="weight_calculator.php?type">重量转换 |</a></li>
                <li><a href="temperature_calculator.php">温度转换</a></li>
            </ul>
        </div>
    </div>

    <!-- 计算器部分 -->
    <div class="container">
        <h2>长度转换器</h2>

        <!-- number_calculator.php -->
        <form method="post">
            <input type="number" name="num1" placeholder="数字1" required>
            <input type="number" name="num2" placeholder="数字2" required>
            <select name="operation">
                <option value="add">加</option>
                <option value="subtract">减</option>
                <option value="multiply">乘</option>
                <option value="divide">除</option>
            </select>
            <button type="submit">计算</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $operation = $_POST['operation'];
            $result = 0;

            switch ($operation) {
                case 'add':
                    $result = $num1 + $num2;
                    break;
                case 'subtract':
                    $result = $num1 - $num2;
                    break;
                case 'multiply':
                    $result = $num1 * $num2;
                    break;
                case 'divide':
                    $result = $num2 != 0 ? $num1 / $num2 : '无法除以零';
                    break;
            }
            echo "结果：$result";
        }
        ?>
    </div>

</body>
</html>
