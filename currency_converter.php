<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Currency Converter</title>
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
        <h2>Currency Converter</h2>
        <form method="post">
            <input type="number" name="amount" placeholder="Amount (MYR)" min="0" step="0.01" required>
            <select name="currency">
                <option value="USD">United States Dollar (USD)</option>
                <option value="EUR">Euro (EUR)</option>
                <option value="GBP">Pound (GBP)</option>
                <option value="JPY">Japanese Yen (JPY)</option>
                <option value="AUD">Australian Dollar (AUD)</option>
            </select>
            <button type="submit">Converter</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $amount = isset($_POST['amount']) ? $_POST['amount'] : null; 
            $currency = isset($_POST['currency']) ? $_POST['currency'] : null; 
            $result = '';

            if ($amount <= 0) {
                echo "<p>The number cannot be negative or zero, please enter a positive number!</p>";
            } else {
                $rates = [
                    'USD' => 0.22,   // 1 MYR = 0.22 USD
                    'EUR' => 0.21,   // 1 MYR = 0.21 EUR
                    'GBP' => 0.18,   // 1 MYR = 0.18 GBP
                    'JPY' => 30.12,  // 1 MYR = 30.12 JPY
                    'AUD' => 0.34    // 1 MYR = 0.34 AUD
                ];

                if (array_key_exists($currency, $rates)) {
                    $result = $amount * $rates[$currency] . " " . $currency;
                } else {
                    $result = "The currency is not supported";
                }
            }
            echo "Conversion result：$result";
        }
        ?>
    </div>
</body>
</html>
