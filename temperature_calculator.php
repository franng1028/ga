<!-- index.php -->
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>温度计算器</title>
    <link rel="stylesheet" type="text/css" href="GA.css">
</head>
<body>
    <header>
        <h1>欢迎使用多功能计算器</h1>
        <p>选择你的计算器类型，体验简单快捷的转换操作</p>
        <a href="number_calculator.php">数字计算器 | </a>
        <a href="length_calculator.php?type">长度转换 | </a>
        <a href="weight_calculator.php?type">重量转换 | </a>
        <a href="temperature_calculator.php">温度转换</a>
    </header>
    <!-- temperature_calculator.php -->
    <form method="post">
        <input type="number" name="temperature" placeholder="温度（摄氏度）" required>
        <select name="conversion">
            <option value="to_fahrenheit">摄氏度转华氏度</option>
            <option value="to_kelvin">摄氏度转开尔文</option>
        </select>
        <button type="submit">转换</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $temperature = $_POST['temperature'];
        $conversion = $_POST['conversion'];
        $result = 0;

        if ($conversion == 'to_fahrenheit') {
            $result = ($temperature * 9/5) + 32 . " 华氏度";
        } elseif ($conversion == 'to_kelvin') {
            $result = $temperature + 273.15 . " 开尔文";
        }
        echo "转换结果：$result";
    }
    ?>
</body>
</html>