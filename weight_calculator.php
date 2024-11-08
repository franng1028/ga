<!-- index.php -->
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>重量计算器</title>
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
    <!-- weight_calculator.php -->
    <form method="post">
        <input type="number" name="weight" placeholder="重量（公斤）" required>
        <select name="conversion">
            <option value="to_grams">公斤转克</option>
            <option value="to_pounds">公斤转磅</option>
        </select>
        <button type="submit">转换</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $weight = $_POST['weight'];
        $conversion = $_POST['conversion'];
        $result = 0;

        if ($conversion == 'to_grams') {
            $result = $weight * 1000 . " 克";
        } elseif ($conversion == 'to_pounds') {
            $result = $weight * 2.20462 . " 磅";
        }
        echo "转换结果：$result";
    }
    ?>
</body>
</html>