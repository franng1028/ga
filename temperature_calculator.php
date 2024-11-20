<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>温度计算器</title>
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

    <!-- 左侧导航栏 -->
    <div class="sidebar">
        <h3>快速导航</h3>
        <ul>
            <li><a href="length_calculator.php">长度转换</a></li>
            <li><a href="weight_calculator.php">重量转换</a></li>
            <li><a href="temperature_calculator.php">温度转换</a></li>
            <li><a href="currency_converter.php">汇率转换</a></li>
        </ul>
    </div>

    <!-- 温度转换器 -->
    <div class="container">
        <h2>温度转换器</h2>

        <form method="post">
            <input type="number" name="temperature" placeholder="请输入温度（°C）" min="0" step="0.01" required>
            <select name="conversion">
                <option value="to_fahrenheit">摄氏度 (°C) 转 华氏度 (°F)</option>
                <option value="to_kelvin">摄氏度 (°C) 转 开尔文 (K)</option>
            </select>
            <button type="submit">转换</button>
        </form>

        <?php
// 处理表单提交
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 获取表单数据，并确保是数值
    $temperature = isset($_POST['temperature']) ? floatval($_POST['temperature']) : null; 
    $conversion = isset($_POST['conversion']) ? $_POST['conversion'] : null; 
    $result = ''; // 初始化结果变量

    // 验证输入是否为 null
    if ($temperature === null || $temperature === '') {
        echo "<p>请输入有效的温度值！</p>";
    } else {
        // 根据用户选择的单位进行换算
        if ($conversion == 'to_fahrenheit') {
            $result = ($temperature * 9 / 5) + 32; // 摄氏度转华氏度
            echo "<p>转换结果：{$temperature}°C = {$result}°F</p>";
        } elseif ($conversion == 'to_kelvin') {
            $result = $temperature + 273.15; // 摄氏度转开尔文
            echo "<p>转换结果：{$temperature}°C = {$result} K</p>";
        } else {
            echo "<p>请选择有效的转换选项</p>";
        }
    }
}
?>


    </div>
</body>
</html>
