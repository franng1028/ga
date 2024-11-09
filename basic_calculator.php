<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>高级数字计算器</title>
    <link rel="stylesheet" type="text/css" href="GA.css">
    <style>
        
    </style>
</head>
<body>
    <!-- 导航栏 -->
    <div class="navbar">
        <div class="left">
            <a href="index.php" class="plain-link">欢迎使用多功能计算器</a>
        </div>
        <div class="right">
            <ul>
                <li><a href="number_calculator.php">数字计算器|</a></li>
                <li><a href="conversion_calculator.php">转换计算器</a></li>
            </ul>
        </div>
    </div>

    <!-- 计算器部分 -->
    <div class="container">
        <h2>数字计算器</h2>

        <!-- 计算器表单 -->
        <form method="post">
            <input type="number" name="num1" placeholder="数字1" step="0.01" required>
            <input type="number" name="num2" placeholder="数字2" step="0.01">
            <select name="operation">
                <option value="add">加法</option>
                <option value="subtract">减法</option>
                <option value="multiply">乘法</option>
                <option value="divide">除法</option>
            </select>
            <button type="submit">计算</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $num1 = isset($_POST['num1']) ? $_POST['num1'] : 0;
            $num2 = isset($_POST['num2']) ? $_POST['num2'] : 0;
            $operation = $_POST['operation'];
            $result = '';

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
                case 'power':
                    $result = pow($num1, $num2);
                    break;
                case 'sqrt1':
                    $result = $num1 >= 0 ? sqrt($num1) : '无法对负数开平方根';
                    break;
                case 'sqrt2':
                    $result = $num2 >= 0 ? sqrt($num2) : '无法对负数开平方根';
                    break;
                case 'log10':
                    $result = $num1 > 0 ? log10($num1) : '对数输入必须大于零';
                    break;
                case 'sin':
                    $result = sin(deg2rad($num1));
                    break;
                case 'cos':
                    $result = cos(deg2rad($num1));
                    break;
                case 'tan':
                    $result = tan(deg2rad($num1));
                    break;
                default:
                    $result = '无效的操作';
                    break;
            }

            echo "<p>计算结果：$result</p>";
        }
        ?>
    </div>
</body>
</html>
