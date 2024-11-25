<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>Length Calculator</title>
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

    <!-- 长度转换器 -->
    <div class="container">
        <h2>Length Converter</h2>

        <form method="post">
            <input type="number" name="length" placeholder="Please enter the length (meters)" min="0" step="0.01" required>
            <select name="conversion">
                <option value="to_km">Meters to kilometers</option>
                <option value="to_cm">Meters to centimeters</option>
                <option value="to_in">Meters to inches</option>
                <option value="to_ft">Meters to feet</option>
                <option value="to_yd">Mi transcoding</option>
                <option value="to_mile">Meters to miles</option>
            </select>
            <button type="submit">Convert</button>
        </form>

        <?php
        // 处理表单提交
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // 使用 isset() 检查变量是否存在，并提供默认值
            $length = isset($_POST['length']) ? $_POST['length'] : null; 
            $conversion = isset($_POST['conversion']) ? $_POST['conversion'] : null; 
            $result = '';

            // 验证输入是否为正数
            if ($length <= 0) {
                echo "<p>The number cannot be negative or zero, please enter a positive number!</p>";
            } else {
                // 根据用户选择的单位进行换算
                switch ($conversion) {
                    case 'to_km':
                        $result = $length / 1000 . " Kilometers";
                        break;
                    case 'to_cm':
                        $result = $length * 100 . " Centimeters";
                        break;
                    case 'to_in':
                        $result = $length * 39.3701 . " Inches"; // 1 米 = 39.3701 英寸
                        break;
                    case 'to_ft':
                        $result = $length * 3.28084 . " Feet"; // 1 米 = 3.28084 英尺
                        break;
                    case 'to_yd':
                        $result = $length * 1.09361 . " Yard"; // 1 米 = 1.09361 码
                        break;
                    case 'to_mile':
                        $result = $length / 1609.34 . " Miles"; // 1 英里 = 1609.34 米
                        break;
                    default:
                        $result = "Invalid conversion option";
                        break;
                }

                // 输出转换结果
                echo "<p>Conversion result：$result</p>";
            }
        }
        ?>
    </div>
</body>
</html>