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
            // 使用 isset() 检查变量是否存在，并提供默认值
            $length = isset($_POST['temperature']) ? $_POST['temperature'] : null; 
            $conversion = isset($_POST['conversion']) ? $_POST['conversion'] : null; 
            $result = '';

            // 验证输入是否为正数
            if ($length <= 0) {
                echo "<p>数字不可负数或零，请输入正数！</p>";
            } else {
                // 根据用户选择的单位进行换算
                if ($conversion == 'to_fahrenheit') {
                    $result = ($temperature * 9 / 5) + 32;
                    echo "<p>转换结果：$temperature°C = $result°F</p>"; // 输出摄氏度转华氏度的结果
                } elseif ($conversion == 'to_kelvin') {
                    $result = $temperature + 273.15;
                    echo "<p>转换结果：$temperature°C = $result K</p>"; // 输出摄氏度转开尔文的结果
                } else {
                    echo "<p>请选择有效的转换选项</p>";
                }
            }
        }
        ?>
    </div>
</body>
</html>
