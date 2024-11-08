<!-- index.php -->
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>重量计算器</title>
    <link rel="stylesheet" type="text/css" href="GA.css">
</head>
<body>
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
    <!-- weight_calculator.php -->
    <div class="container">
        <h2>长度转换器</h2>
        <form method="post">
            <input type="number" name="weight" placeholder="重量（公斤）" required>
            <select name="conversion">
                <option value="to_grams">公斤转克</option>
                <option value="to_pounds">公斤转磅</option>
            </select>
            <button type="submit">转换</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $weight = $_POST['weight'];
            $conversion = $_POST['conversion'];
            $result = 0;

            if ($conversion == 'to_grams') {
                $result = $weight * 1000 . " 克";
            } elseif ($conversion == 'to_pounds') {
                 $result = $weight * 2.20462 . " 磅";
            }
            echo "转换结果：$result";
        }
        ?>
    </div>
</body>
</html>