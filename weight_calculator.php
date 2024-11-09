<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>重量计算器</title>
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

    <!-- 重量转换器 -->
    <div class="container">
        <h2>重量转换器</h2>

        <form method="post">
            <input type="number" name="weight" placeholder="请输入重量（公斤）" min="0" step="0.01" required>
            <select name="conversion">
                <option value="to_grams">公斤转克</option>
                <option value="to_mg">公斤转毫克</option>
                <option value="to_pounds">公斤转磅</option>
                <option value="to_ounces">公斤转盎司</option>
                <option value="to_tonnes">公斤转公吨</option>
                <option value="to_us_ton">公斤转美吨</option>
                <option value="to_uk_ton">公斤转英吨</option>
            </select>
            <button type="submit">转换</button>
        </form>

        <?php
        // 处理表单提交
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // 使用 isset() 检查变量是否存在，并提供默认值
            $length = isset($_POST['weight']) ? $_POST['weight'] : null; 
            $conversion = isset($_POST['conversion']) ? $_POST['conversion'] : null; 
            $result = '';

            // 验证输入是否为正数
            if ($length <= 0) {
                echo "<p>数字不可负数或零，请输入正数！</p>";
            } else {
                // 根据用户选择的单位进行换算
                switch ($conversion) {
                    case 'to_grams':
                        $result = $weight * 1000 . " 克"; // 1 公斤 = 1000 克
                        break;
                    case 'to_mg':
                        $result = $weight * 1_000_000 . " 毫克"; // 1 公斤 = 1,000,000 毫克
                        break;
                    case 'to_pounds':
                        $result = $weight * 2.20462 . " 磅"; // 1 公斤 = 2.20462 磅
                        break;
                    case 'to_ounces':
                        $result = $weight * 35.274 . " 盎司"; // 1 公斤 = 35.274 盎司
                        break;
                    case 'to_tonnes':
                        $result = $weight / 1000 . " 公吨"; // 1 公吨 = 1000 公斤
                        break;
                    case 'to_us_ton':
                        $result = $weight * 0.00110231 . " 美吨"; // 1 公斤 = 0.00110231 美吨
                        break;
                    case 'to_uk_ton':
                        $result = $weight * 0.000984207 . " 英吨"; // 1 公斤 = 0.000984207 英吨
                        break;
                    default:
                        $result = "无效的转换选项";
                        break;
                }
            }
            // 输出转换结果
            echo "<p>转换结果：$result</p>";
        }
        ?>
    </div>
</body>
</html>
