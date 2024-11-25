<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>temperature_Converter</title>
    <link rel="stylesheet" type="text/css" href="GA.css">
    <style>
        
    </style>
</head>
<body>
    <!-- 导航栏 -->
    <div class="navbar">
        <div class="left">
            <a href="index.php" class="plain-link">Welcome to The Multi-Function Caculator</a>
        </div>
        <div class="right">
            <ul>
                <li><a href="number_calculator.php">Digital Calculator|</a></li>
                <li><a href="conversion_calculator.php">Coversion Calculator</a></li>
            </ul>
        </div>
    </div>

    <!-- 左侧导航栏 -->
    <div class="sidebar">
        <h3>Navigation</h3>
        <ul>
            <li><a href="length_calculator.php">Length Converter</a></li>
            <li><a href="weight_calculator.php">Weight Converter</a></li>
            <li><a href="temperature_calculator.php">Temperature Converter</a></li>
            <li><a href="currency_converter.php">Currency Converter</a></li>
        </ul>
    </div>

    <!-- 温度转换器 -->
    <div class="container">
        <h2>Temperature Converter</h2>

        <form method="post">
            <input type="number" name="temperature" placeholder="Please Enter Temperature（°C）" min="0" step="0.01" required>
            <select name="conversion">
                <option value="to_fahrenheit">Celsius (°C) TO Fahrenheit (°F)</option>
                <option value="to_kelvin">Celsius (°C) TO Kelvin (K)</option>
            </select>
            <button type="submit">Convert</button>
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
                echo "<p>The number cannot be negative or zero, please enter a positive number!</p>";
            } else {
                // 根据用户选择的单位进行换算
                if ($conversion == 'to_fahrenheit') {
                    $result = ($temperature * 9 / 5) + 32;
                    echo "<p>Conversion result：$temperature°C = $result°F</p>"; // 输出摄氏度转华氏度的结果
                } elseif ($conversion == 'to_kelvin') {
                    $result = $temperature + 273.15;
                    echo "<p>Conversion result：$temperature°C = $result K</p>"; // 输出摄氏度转开尔文的结果
                } else { 
                    echo "<p>Please select a valid conversion option</p>";
                }
            }
        }
        ?>
    </div>
</body>
</html>
