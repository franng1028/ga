<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>长度计算器</title>
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
                <li><a href="number_calculator.php">数字计算器 |</a></li>
                <li><a href="length_calculator.php">长度转换 |</a></li>
                <li><a href="weight_calculator.php">重量转换 |</a></li>
                <li><a href="temperature_calculator.php">温度转换 |</a></li>
                <li><a href="currency_converter.php">汇率转换</a></li>
            </ul>
        </div>
    </div>

    <!-- 长度转换器 -->
    <div class="container">
        <h2>长度转换器</h2>

        <form method="post">
            <input type="number" name="length" placeholder="请输入长度（米）" min="0" step="0.01" required>
            <select name="conversion">
                <option value="to_km">米转千米</option>
                <option value="to_cm">米转厘米</option>
                <option value="to_in">米转英寸</option>
                <option value="to_ft">米转英尺</option>
                <option value="to_yd">米转码</option>
                <option value="to_mile">米转英里</option>
            </select>
            <button type="submit">转换</button>
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
                echo "<p>数字不可负数或零，请输入正数！</p>";
            } else {
                // 根据用户选择的单位进行换算
                switch ($conversion) {
                    case 'to_km':
                        $result = $length / 1000 . " 千米";
                        break;
                    case 'to_cm':
                        $result = $length * 100 . " 厘米";
                        break;
                    case 'to_in':
                        $result = $length * 39.3701 . " 英寸"; // 1 米 = 39.3701 英寸
                        break;
                    case 'to_ft':
                        $result = $length * 3.28084 . " 英尺"; // 1 米 = 3.28084 英尺
                        break;
                    case 'to_yd':
                        $result = $length * 1.09361 . " 码"; // 1 米 = 1.09361 码
                        break;
                    case 'to_mile':
                        $result = $length / 1609.34 . " 英里"; // 1 英里 = 1609.34 米
                        break;
                    default:
                        $result = "无效的转换选项";
                        break;
                }

                // 输出转换结果
                echo "<p>转换结果：$result</p>";
            }
        }
        ?>
    </div>
</body>
</html>
