<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>汇率转换器</title>
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

    <!-- 汇率转换器 -->
    <div class="container">
        <h2>汇率转换器</h2>
        <form method="post">
            <input type="number" name="amount" placeholder="金额（MYR）" min="0" step="0.01" required>
            <select name="currency">
                <option value="USD">美元 (USD)</option>
                <option value="EUR">欧元 (EUR)</option>
                <option value="GBP">英镑 (GBP)</option>
                <option value="JPY">日元 (JPY)</option>
                <option value="AUD">澳元 (AUD)</option>
            </select>
            <button type="submit">转换</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // 获取用户输入的金额和选择的目标货币
            $amount = isset($_POST['amount']) ? $_POST['amount'] : null; 
            $currency = isset($_POST['currency']) ? $_POST['currency'] : null; 
            $result = '';

            // 验证输入是否为正数
            if ($length <= 0) {
                echo "<p>数字不可负数或零，请输入正数！</p>";
            } else {
                // 汇率数据（假设汇率是固定的，可以替换为实时获取的API数据）
                $rates = [
                    'USD' => 0.22,   // 1 MYR = 0.22 USD
                    'EUR' => 0.21,   // 1 MYR = 0.21 EUR
                    'GBP' => 0.18,   // 1 MYR = 0.18 GBP
                    'JPY' => 30.12,  // 1 MYR = 30.12 JPY
                    'AUD' => 0.34    // 1 MYR = 0.34 AUD
                ];

                // 计算转换结果
                if (array_key_exists($currency, $rates)) {
                    $result = $amount * $rates[$currency] . " " . $currency;
                } else {
                    $result = "不支持该货币";
                }
            }
            echo "转换结果：$result";
        }
        ?>
    </div>
</body>
</html>
