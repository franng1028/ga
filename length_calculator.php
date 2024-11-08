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
                <li><a href="number_calculator.php">数字计算器|</a></li>
                <li><a href="length_calculator.php?type">长度转换|</a></li>
                <li><a href="weight_calculator.php?type">重量转换|</a></li>
                <li><a href="temperature_calculator.php">温度转换</a></li>
            </ul>
        </div>
    </div>

    <!-- 计算器部分 -->
    <div class="container">
        <h2>长度转换器</h2>

        <form method="post">
            <input type="number" name="length" placeholder="长度（米）" required>
            <select name="conversion">
                <option value="to_km">米转千米</option>
                <option value="to_cm">米转厘米</option>
            </select>
            <button type="submit">转换</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $length = $_POST['length'];
            $conversion = $_POST['conversion'];
            $result = 0;

            if ($conversion == 'to_km') {
                $result = $length / 1000 . " 千米";
            } elseif ($conversion == 'to_cm') {
                $result = $length * 100 . " 厘米";
            }
            echo "转换结果：$result";
        }
        ?>
    </div>

</body>
</html>
