<?php
// 设置API的URL和API密钥
$api_url = 'https://api.exchangeratesapi.io/latest?access_key=789ea8db9bc31e3fe4ab49c7d9b1b7ea';

// 初始化cURL会话
$ch = curl_init();

// 设置cURL选项
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// 执行cURL请求并获取响应
$response = curl_exec($ch);

// 关闭cURL会话
curl_close($ch);

// 将响应解析为数组
$data = json_decode($response, true);

// 检查API响应是否成功
if ($data && isset($data['rates'])) {
    $rates = $data['rates'];
} else {
    die('无法获取汇率数据');
}
?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>汇率转换器</title>
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
                <li><a href="conversion_calculator.php">转换计算器</a></li>
            </ul>
        </div>
    </div>

    <!-- 左侧导航栏 -->
    <div class="sidebar">
        <h3>快速导航</h3>
        <ul>
            <li><a href="number_calculator.php">数字计算器</a></li>
            <li><a href="length_calculator.php">长度转换</a></li>
            <li><a href="weight_calculator.php">重量转换</a></li>
            <li><a href="temperature_calculator.php">温度转换</a></li>
            <li><a href="currency_converter.php">汇率转换</a></li>
        </ul>
    </div>

    <!-- 汇率转换器 -->
    <div class="container">
        <h2>汇率转换器</h2>

        <!-- 表单 -->
        <form method="POST">
            <label for="amount">金额:</label>
            <input type="number" id="amount" name="amount" required><br><br>

            <label for="from_currency">原币种:</label>
            <select id="from_currency" name="from_currency" required>
                <?php
                // 生成原币种下拉选项
                foreach ($rates as $currency => $rate) {
                    echo "<option value='$currency'>$currency</option>";
                }
                ?>
            </select><br><br>

            <label for="to_currency">目标币种:</label>
            <select id="to_currency" name="to_currency" required>
                <?php
                // 生成目标币种下拉选项
                foreach ($rates as $currency => $rate) {
                    echo "<option value='$currency'>$currency</option>";
                }
                ?>
            </select><br><br>

            <button type="submit" name="calculate">计算</button>
        </form>

        <?php
        // 处理表单提交
        if (isset($_POST['calculate'])) {
            $amount = $_POST['amount'];
            $from_currency = $_POST['from_currency'];
            $to_currency = $_POST['to_currency'];

            if ($from_currency == $to_currency) {
                echo "<p>选择的原币种和目标币种相同，无需转换。</p>";
            } else {
                // 计算汇率
                $from_rate = $rates[$from_currency];
                $to_rate = $rates[$to_currency];
                $converted_amount = ($amount / $from_rate) * $to_rate;

                echo "<p>$amount $from_currency 转换为 $to_currency 的金额为: " . round($converted_amount, 2) . " $to_currency</p>";
            }
        }
        ?>
    </div>
</body>
</html>
