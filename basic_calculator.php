<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Advanced number calculator</title>
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
        <li><a href="basic_calculator.php">Basic Calculator</a></li>
        <li><a href="scientific_calculator.php">Scientific Calculator</a></li>
        </ul>
    </div>

    <div class="container">
        <h2>Digital Calculator</h2>

        <form method="post">
            <input type="number" name="num1" placeholder="Number1" step="0.01" required>
            <input type="number" name="num2" placeholder="Number2" step="0.01">
            <select name="operation">
                <option value="add">Addition</option>
                <option value="subtract">Subtract</option>
                <option value="multiply">Multiply</option>
                <option value="divide">Divide</option>
            </select>
            <button type="submit">Calculate it</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $num1 = isset($_POST['num1']) ? $_POST['num1'] : 0;
            $num2 = isset($_POST['num2']) ? $_POST['num2'] : 0;
            $operation = $_POST['operation'];
            $result = '';

            switch ($operation) {
                case 'add':
                    $result = $num1 + $num2;
                    break;
                case 'subtract':
                    $result = $num1 - $num2;
                    break;
                case 'multiply':
                    $result = $num1 * $num2;
                    break;
                case 'divide':
                    $result = $num2 != 0 ? $num1 / $num2 : 'Can Not Divide By 0';
                    break;
                case 'power':
                    $result = pow($num1, $num2);
                    break;
                case 'sqrt1':
                    $result = $num1 >= 0 ? sqrt($num1) : 'Unable to take the square root of a negative number';
                    break;
                case 'sqrt2':
                    $result = $num2 >= 0 ? sqrt($num2) : 'Unable to take the square root of a negative number';
                    break;
                case 'log10':
                    $result = $num1 > 0 ? log10($num1) : 'Logarithmic input must be greater than zero';
                    break;
                case 'sin':
                    $result = sin(deg2rad($num1));
                    break;
                case 'cos':
                    $result = cos(deg2rad($num1));
                    break;
                case 'tan':
                    $result = tan(deg2rad($num1));
                    break;
                default:
                    $result = 'Errol';
                    break;
            }

            echo "<p>Conversion result：$result</p>";

            }
        ?>

        <div class="w3-content">
            <img class="mySlides" src="Online.png">
            <img class="mySlides" src="MATHP1.png">
            <img class="mySlides" src="MATHP2.png">

            <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
            <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
        </div>

        <script src="script.js"></script> <!-- Link to external JavaScript -->
        

    </div>
</body>
</html>
