<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Weight Converter</title>
    <link rel="stylesheet" type="text/css" href="GA.css">
    <style>
        
    </style>
</head>
<body>
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

    <div class="sidebar">
        <h3>Navigation</h3>
        <ul>
            <li><a href="length_calculator.php">Length Converter</a></li>
            <li><a href="weight_calculator.php">Weight Converter</a></li>
            <li><a href="temperature_calculator.php">Temperature Converter</a></li>
            <li><a href="currency_converter.php">Currency Converter</a></li>
        </ul>
    </div>

    <div class="container">
        <h2>Weight Converter</h2>

        <form method="post">
            <input type="number" name="weight" placeholder="Please Enter Weight（KG）" min="0" step="0.01" required>
            <select name="conversion">
                <option value="to_grams">Kilograms to Grams</option>
                <option value="to_mg">Kilograms to  Miligrams</option>
                <option value="to_pounds">Kilograms to Pounds</option>
                <option value="to_ounces">Kilograms to Ounces</option>
                <option value="to_tonnes">Kilograms to Tonnes</option>
                <option value="to_us_ton">Kilograms to US Tons</option>
                <option value="to_uk_ton">Kilograms to UK Tons</option>
            </select>
            <button type="submit">Conversion</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $weight = isset($_POST['weight']) ? $_POST['weight'] : null; 
            $conversion = isset($_POST['conversion']) ? $_POST['conversion'] : null; 
            $result = '';

            if ($weight <= 0) {
                echo "<p>The number cannot be negative or zero, please enter a positive number!</p>";
            } else {
                switch ($conversion) {
                    case 'to_grams':
                        $result = $weight * 1000 . " Grams"; // 1 公斤 = 1000 克
                        break;
                    case 'to_mg':
                        $result = $weight * 1_000_000 . " Milograms"; // 1 公斤 = 1,000,000 毫克
                        break;
                    case 'to_pounds':
                        $result = $weight * 2.20462 . " Pounds"; // 1 公斤 = 2.20462 磅
                        break;
                    case 'to_ounces':
                        $result = $weight * 35.274 . " Ounces"; // 1 公斤 = 35.274 盎司
                        break;
                    case 'to_tonnes':
                        $result = $weight / 1000 . " Tonnes"; // 1 公吨 = 1000 公斤
                        break;
                    case 'to_us_ton':
                        $result = $weight * 0.00110231 . " US Tons"; // 1 公斤 = 0.00110231 美吨
                        break;
                    case 'to_uk_ton':
                        $result = $weight * 0.000984207 . " UK Tons"; // 1 公斤 = 0.000984207 英吨
                        break;
                    default:
                        $result = "Invalid conversion option";
                        break;
                }
            }
            echo "<p>Conversion result：$result</p>";
        }
        ?>
    </div>
</body>
</html>
